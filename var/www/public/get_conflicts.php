<?php

require(dirname(__FILE__) . "/../includes/functions.php");

checkSession('admin');

$conn = dbConnect_new();

// Resolves a conflict
if(isset($_POST["RID"]) && isset($_POST["COID"]))
{
	$conflict = dbQuery_new($conn, "SELECT * FROM grading_conflicts WHERE COID=:coid", ["coid" => $_POST["COID"]]);
	if(empty($conflict))
		echo "error";
	else
	{
		$conflict = $conflict[0];
		$response = dbQuery_new($conn, "SELECT * FROM grader_responses WHERE RID=:rid", ["rid" => $_POST["RID"]]);
		if(empty($response))
		{
			echo "error";
			exit;
		}

		$response = $response[0];
                $answer = $response["answer"];

		$roundinfo = dbQuery_new($conn, "SELECT * FROM round WHERE RNDID=:round AND indiv=true", ["round" => $response["RNDID"]]);
		if(empty($roundinfo))
		{
			echo "error";
			exit;
		}

		$roundinfo = $roundinfo[0];

		if(isset($_POST["ranswer"]))
		{
			$arr = [
                                                "cid" => $response["CID"],
                                                "uid" => $_SESSION["UID"],
                                                "pn" => $response["problem_number"],
                                                "round" => $response["RNDID"],
                                                "answer" => $_POST["ranswer"]
                        ];

			$exists = dbQuery_new($conn, "SELECT CID FROM grader_responses WHERE CID=:cid AND UID=:uid AND problem_number=:pn AND RNDID=:round AND answer=:answer", $arr);
			if(empty($exists))
				dbQuery_new($conn, "INSERT INTO grader_responses SET CID=:cid, UID=:uid, problem_number=:pn, RNDID=:round, answer=:answer", $arr);

			$answer = $_POST["ranswer"];
		}

                $key = dbQuery_new($conn, "SELECT answer FROM competition_answers WHERE CID=:cid AND problem_number=:pn AND RNDID=:round", [
                		"cid" => $response["CID"],
                                "pn" => $response["problem_number"],
                                "round" => $response["RNDID"]
                ]);
                if(empty($key))
		{
			echo "error";
			exit;
		}
                else
                	$key = $key[0]["answer"];


                $correct = compareAnswers($key, $answer);
                $points = $correct * $roundinfo["points_per_question"];


		$exists = dbQuery_new($conn, "SELECT CID FROM student_answers WHERE CID=:cid AND SID=:sid AND problem_number=:pn AND RNDID=:round", [
				"cid" => $response["CID"],
				"pn" => $response["problem_number"],
				"sid" => $response["SID"],
				"round" => $response["RNDID"]
		]);
		if(empty($exists))
		{
                	dbQuery_new($conn, "INSERT INTO student_answers SET CID=:cid, SID=:sid, problem_number=:pn, RNDID=:round, answer=:answer, points=:points", [
                        	        "cid" => $response["CID"],
                        	        "pn" => $response["problem_number"],
					"sid" => $response["SID"],
                        	        "round" => $response["RNDID"],
                                	"answer" => $answer,
                			"points" => $points
        		]);
		}
		else
		{
			dbQuery_new($conn, "UPDATE student_answers SET answer=:answer, points=:points WHERE CID=:cid AND SID=:sid AND problem_number=:pn AND RNDID=:round", [
                                        "cid" => $response["CID"],
                                        "pn" => $response["problem_number"],
                                        "sid" => $response["SID"],
                                        "round" => $response["RNDID"],
                                        "answer" => $answer,
                                        "points" => $points
                        ]);
		}

		dbQuery_new($conn, "DELETE FROM grading_conflicts WHERE COID=:coid", ["coid" => $_POST["COID"]]);

		updateStudentScore($conn, $response["SID"], $response["CID"], $response["RNDID"]);

		$scid = dbQuery_new($conn, "SELECT SCID FROM mathlete_info WHERE SID=:sid", ["sid" => $response["SID"]]);
		if(empty($scid))
			echo "error";
		else
		{
                	updateTeamScore($conn, $scid[0]["SCID"], $response["CID"], $response["RNDID"]);

                	updateCompStatus($conn, $response["CID"], $response["RNDID"]);
		}
	}
}
// Gets more info about one conflict
else if(isset($_POST["COID"]))
{
	$info = dbQuery_new($conn, "SELECT * FROM grading_conflicts WHERE COID=:coid", ["coid" => $_POST["COID"]]);
	if(empty($info))
		exit;
	$info = $info[0];

	$responses = dbQuery_new($conn, "SELECT a.*, b.answer, b.RID FROM user AS a LEFT JOIN (grader_responses AS b) ON (a.UID=b.UID) WHERE b.SID=:sid AND b.problem_number=:pn AND b.RNDID=:round AND b.CID=:cid", [
			"sid" => $info["SID"],
			"pn" => $info["problem_number"],
			"round" => $info["RNDID"],
			"cid" => $info["CID"]
	]);

	$result = [];
	for($i = 0; $i < count($responses); $i++)
	{
		$name = "";
        	if(sempty($responses[$i]["first_name"])) {
                	if(sempty($responses[$i]["last_name"]))
                        	$name = $responses[$i]["email"];
                	else
                	        $name = $responses[$i]["last_name"];
        	}
        	else {
                	if(sempty($responses[$i]["last_name"]))
                        	$name = $responses[$i]["first_name"];
                	else
                	        $name = $responses[$i]["first_name"] . " " . $responses[$i]["last_name"];
        	}

		$result[$i] = [
			"gname" => $name,
			"gtype" => $responses[$i]["type"],
			"UID" => $responses[$i]["UID"],
			"answer" => $responses[$i]["answer"],
			"RID" => $responses[$i]["RID"]
		];
	}

	if(!empty($result))
		echo json_encode($result);
}
// Gets all conflicts
else
{
$cid = dbQuery_new($conn, "SELECT * FROM current_competition");
if(!empty($cid))
{
	$cid = $cid[0]["CID"];

	$result = dbQuery_new($conn, "SELECT COID, SID, problem_number, RNDID FROM grading_conflicts WHERE CID=:cid", ["cid" => $cid]);

	if(!empty($result))
	{
		$array = [];
		$indices = [];
		$sids = [];

		for($i = 0; $i < count($result); $i++)
		{
			$name = dbQuery_new($conn, "SELECT first_name, last_name FROM mathlete_info WHERE SID=:sid", ["sid" => $result[$i]["SID"]]);
			if(empty($name))
				exit;
			else
				$name = $name[0];

			$roundinfo = dbQuery_new($conn, "SELECT round_name FROM round WHERE RNDID=:round AND indiv=true", ["round" => $result[$i]["RNDID"]]);
			if(empty($roundinfo))
				exit;
			else
				$roundinfo = $roundinfo[0];

			$idx = array_search($result[$i]["SID"], $sids);
			if($idx === FALSE)
			{
				array_push($sids, $result[$i]["SID"]);

				array_push($array, [
					"SID" => $result[$i]["SID"],
					"name" => getStudentFullName($name),
					"conflicts" => [[
						"COID" => $result[$i]["COID"],
						"pn" => $result[$i]["problem_number"],
						"round_name" => $roundinfo["round_name"]
					]]
				]);

				end($array);
				$indices[$result[$i]["SID"]] = key($array);
			}
			else
			{
				array_push($array[$indices[$sids[$idx]]]["conflicts"], [
					"COID" => $result[$i]["COID"],
					"pn" => $result[$i]["problem_number"],
					"round_name" => $roundinfo["round_name"]
				]);
			}
		}

		echo json_encode($array);
	}
}
}

?>
