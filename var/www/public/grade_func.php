<?php

require("../includes/functions.php");

checkSession("grader");

if(isset($_POST["rndid"]) && isset($_POST["pn"]) && isset($_POST["answer"]) && isset($_POST["scid"]))
{
	$conn = dbConnect_new();

	$cid = getCurrentComp($conn);
	$uid = $_SESSION["UID"];

	$userrow = dbQuery_new($conn, "SELECT * FROM user WHERE UID=:uid", ["uid" => $uid]);
	if(empty($userrow))
		exit;
	$userrow = $userrow[0];

	$uscid = intval($userrow["SCID"]);

	if($uscid != 0 && $uscid == intval($_POST["scid"]))
		exit;

	$typerow = dbQuery_new($conn, "SELECT * FROM competition_type WHERE CTID IN (SELECT CTID FROM competition WHERE CID=:cid)", ["cid" => $cid]);
	if(empty($typerow))
		exit;
	$typerow = $typerow[0];

	$roundrow = dbQuery_new($conn, "SELECT * FROM round WHERE RNDID=:rndid AND CTID=:ctid", ["rndid" => $_POST["rndid"], "ctid" => $typerow["CTID"]]);
	if(empty($roundrow))
		exit;
	$roundrow = $roundrow[0];

	$sid = 0;
	if(isset($_POST["sid"]))
		$sid = $_POST["sid"];

	if(grade_func($conn, $roundrow, $_POST["pn"], $_POST["answer"], $_POST["scid"], $sid, $userrow, $cid, $typerow))
		echo "success";
}

function grade_func($conn, $roundrow, $pn, $answer, $scid, $sid, $userrow, $cid, $typerow)
{
	if($cid < 1 || $pn < 1 || $scid < 1)
		return false;

        $grader_responses = "grader_responses";
        $student_answers = "student_answers";
        $grading_conflicts = "grading_conflicts";
        $id = $roundrow["indiv"] == "0" ? ("SCID=" . $scid) : ("SID=" . $sid);

        if($roundrow["indiv"] == "0")
        {
        	$grader_responses = "grader_responses_team";
                $student_answers = "team_answers";
                $grading_conflicts = "grading_conflicts_team";
        }

        // other grader's (or admin's) responses
        $presponses = dbQuery_new($conn, "SELECT answer, UID FROM $grader_responses WHERE CID=:cid AND $id AND problem_number=:pn AND RNDID=:round AND UID!=:cuid", [
                                                "cid" => $cid,
                                                "pn" => $pn,
						"cuid" => $userrow["UID"],
                                                "round" => $roundrow["RNDID"]
        ]);

        $arr = [
                                                "cid" => $cid,
                                                "uid" => $userrow["UID"],
                                                "pn" => $pn,
                                                "round" => $roundrow["RNDID"],
                                                "answer" => $answer
        ];

        // enter response in database
        $exist = dbQuery_new($conn, "SELECT UID FROM $grader_responses WHERE CID=:cid AND UID=:uid AND $id AND problem_number=:pn AND RNDID=:round", [
		"cid" => $cid,
		"uid" => $userrow["UID"],
		"pn" => $pn,
		"round" => $roundrow["RNDID"]
	]);

        if(empty($exist))
        	dbQuery_new($conn, "INSERT INTO $grader_responses SET CID=:cid, UID=:uid, $id, problem_number=:pn, RNDID=:round, answer=:answer", $arr);
	else
		dbQuery_new($conn, "UPDATE $grader_responses SET answer=:answer WHERE CID=:cid AND UID=:uid AND $id AND problem_number=:pn AND RNDID=:round", $arr);

        // look for a conflict between graders

	$array = [
                                "cid" => $cid,
                                "pn" => $pn,
                                "round" => $roundrow["RNDID"]
        ];

        $conflict = 0;
        for($j = 0; $j < count($presponses); $j++)
        {
        	if(!compareAnswers($presponses[$j]["answer"], $answer))
                {
                	//echo "conflict found\n";
                        // If a conflict is found, put it in the database so the admin can see it and fix it from their homepage

                        $exists = dbQuery_new($conn, "SELECT CID FROM $grading_conflicts WHERE CID=:cid AND $id AND problem_number=:pn AND RNDID=:round", $array);
                        if(empty($exists))
                        	dbQuery_new($conn, "INSERT INTO $grading_conflicts SET CID=:cid, $id, problem_number=:pn, RNDID=:round", $array);

                        // If there is a conflict, there shouldn't be a final answer for the problem and student
                        dbQuery_new($conn, "DELETE FROM $student_answers WHERE CID=:cid AND $id AND problem_number=:pn AND RNDID=:round", [
                                                                        "cid" => $cid,
                                                                        "pn" => $pn,
                                                                        "round" => $roundrow["RNDID"]
                        ]);

                        $conflict = 1;
                        break;
		}
	}

	if(!$conflict)
		dbQuery_new($conn, "DELETE FROM $grading_conflicts WHERE CID=:cid AND $id AND problem_number=:pn AND RNDID=:round", $array);


                                        // The student's final answer is only entered if an admin graded it (Admin's responses override the grader responses, but if the admin's response has a conflict with the grader response then it is still registered in the conflicts) or the correct number of graders have provided unconflicting responses
                                        if(!$conflict && ((count($presponses) > ($typerow["num_graders_to_confirm"] - 2)) || $userrow["type"] == "admin"))
                                        {
                                                // Get the correct answer
                                                $key = dbQuery_new($conn, "SELECT answer FROM competition_answers WHERE CID=:cid AND problem_number=:pn AND RNDID=:round", [
                                                                "cid" => $cid,
                                                                "pn" => $pn,
                                                                "round" => $roundrow["RNDID"]
                                                ]);
                                                if(empty($key))
                                                        $key = "";
						else
                                                	$key = $key[0]["answer"];


                                                // Check if the entered answer is right
                                                $correct = compareAnswers($key, $answer);
                                                $points = $correct * $roundrow["points_per_question"];

                                                // Is there a final answer in the database already?
                                                $exists = dbQuery_new($conn, "SELECT CID FROM $student_answers WHERE CID=:cid AND $id AND problem_number=:pn AND RNDID=:round", [
                                                                "cid" => $cid,
                                                                "pn" => $pn,
                                                                "round" => $roundrow["RNDID"]
                                                ]);

                                                if(empty($exists))
                                                {
                                                        // Insert it if it doesn't exist
                                                        dbQuery_new($conn, "INSERT INTO $student_answers SET CID=:cid, $id, problem_number=:pn, RNDID=:round, answer=:answer, points=:points", [
                                                                        "cid" => $cid,
                                                                        "pn" => $pn,
                                                                        "round" => $roundrow["RNDID"],
                                                                        "answer" => $answer,
                                                                        "points" => $points
                                                        ]);
                                                }
                                                else
                                                {
                                                        dbQuery_new($conn, "UPDATE $student_answers SET answer=:answer, points=:points WHERE CID=:cid AND $id AND problem_number=:pn AND RNDID=:round", [
                                                                        "answer" => $answer,
                                                                        "points" => $points,
                                                                        "cid" => $cid,
                                                                        "pn" => $pn,
                                                                        "round" => $roundrow["RNDID"]
                                                        ]);
                                                }
                                        }

                        if($roundrow["indiv"] == "1")
                                updateStudentScore($conn, $sid, $cid, $roundrow["RNDID"]);

                        updateTeamScore($conn, $scid, $cid, $roundrow["RNDID"]);

                        updateCompStatus($conn, $cid, $roundrow["RNDID"]);


	return true;
}

?>
