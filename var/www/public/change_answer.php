<?php

require("../includes/functions.php");

checkSession("admin");

$conn = dbConnect_new();

$cid = getCurrentComp($conn);

if($cid !== 0 && isset($_POST["scid"]) && isset($_POST["sid"]) && isset($_POST["round"]) && isset($_POST["pnum"]) && isset($_POST["answer"]))
{
	$roundinfo = dbQuery_new($conn, "SELECT * FROM round WHERE RNDID=:round", ["round" => $_POST["round"]]);
	if(empty($roundinfo))
	{
		echo "error";
		exit;
	}

	$roundinfo = $roundinfo[0];

	$key = dbQuery_new($conn, "SELECT answer FROM competition_answers WHERE CID=:cid AND problem_number=:pn AND RNDID=:round", [
                        "cid" => $cid,
                	"pn" => $_POST["pnum"],
        		"round" => $_POST["round"]
        ]);
        if(empty($key))
        {
		echo "error";
		exit;
	}
        else
        	$key = $key[0]["answer"];


        $correct = compareAnswers($key, $_POST["answer"]);
        $points = $correct * $roundinfo["points_per_question"];


	if($_POST["sid"] == "0")
	{
		$exists = dbQuery_new($conn, "SELECT CID FROM team_answers WHERE CID=:cid AND SCID=:scid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "scid" => $_POST["SCID"], "round" => $_POST["round"], "pnum" => $_POST["pnum"]]);
		if(empty($exists))
		{
			dbQuery_new($conn, "INSERT INTO team_answers SET answer=:answer, points=:points, CID=:cid, SCID=:scid, RNDID=:round, problem_number=:pnum", ["cid" => $cid, "scid" => $_POST["scid"], "round" => $_POST["round"], "pnum" => $_POST["pnum"], "points" => $points, "answer" => $_POST["answer"]]);
		}
		else
		{
			dbQuery_new($conn, "UPDATE team_answers SET answer=:answer, points=:points WHERE CID=:cid AND SCID=:scid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "scid" => $_POST["scid"], "round" => $_POST["round"], "pnum" => $_POST["pnum"], "points" => $points, "answer" => $_POST["answer"]]);
		}
	}
	else
	{
		$exists = dbQuery_new($conn, "SELECT CID FROM student_answers WHERE CID=:cid AND SID=:sid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "sid" => $_POST["SID"], "round" => $_POST["round"], "pnum" => $_POST["pnum"]]);
                if(empty($exists))
                {
                        dbQuery_new($conn, "INSERT INTO student_answers SET answer=:answer, points=:points, CID=:cid, SID=:sid, RNDID=:round, problem_number=:pnum", ["cid" => $cid, "sid" => $_POST["sid"], "round" => $_POST["round"], "pnum" => $_POST["pnum"], "points" => $points, "answer" => $_POST["answer"]]);
                }
                else
                {
                        dbQuery_new($conn, "UPDATE student_answers SET answer=:answer, points=:points WHERE CID=:cid AND SID=:sid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "sid" => $_POST["sid"], "round" => $_POST["round"], "pnum" => $_POST["pnum"], "points" => $points, "answer" => $_POST["answer"]]);
                }
	}

	if($_POST["sid"] != "0")
                updateStudentScore($conn, $_POST["sid"], $cid, $_POST["round"]);

        updateTeamScore($conn, $_POST["scid"], $cid, $_POST["round"]);
}
else
	echo "error";

?>
