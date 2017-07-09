<?php

require(dirname(__FILE__) . "/../includes/functions.php");

checkSession('admin');

$conn = dbConnect_new();

// Resolves a conflict
if(isset($_GET["TRID"]) && isset($_GET["TCID"]))
{
	$conflict = dbQuery_new($conn, "SELECT * FROM grading_conflicts_team WHERE TCID=:tcid", ["tcid" => $_GET["TCID"]]);
	if(empty($conflict))
		echo "error";
	else
	{
		$conflict = $conflict[0];
		$response = dbQuery_new($conn, "SELECT * FROM grader_responses_team WHERE TRID=:trid", ["trid" => $_GET["TRID"]]);
		if(empty($response))
		{
			echo "error";
			exit;
		}

		$response = $response[0];
		$answer = $response["answer"];

		$roundinfo = dbQuery_new($conn, "SELECT * FROM round WHERE RNDID=:round AND indiv=false", ["round" => $response["RNDID"]]);
                if(empty($roundinfo))
                {
                        echo "error";
                        exit;
                }

		$roundinfo = $roundinfo[0];

		if(isset($_GET["ranswer"]))
		{
			$arr = [
                                                "cid" => $response["CID"],
                                                "uid" => $_SESSION["UID"],
                                                "pn" => $response["problem_number"],
                                                "round" => $response["RNDID"],
                                                "answer" => $_GET["ranswer"]
                        ];

			$exists = dbQuery_new($conn, "SELECT CID FROM grader_responses_team WHERE CID=:cid AND UID=:uid AND problem_number=:pn AND RNDID=:round AND answer=:answer", $arr);
			if(empty($exists))
				dbQuery_new($conn, "INSERT INTO grader_responses_team SET CID=:cid, UID=:uid, problem_number=:pn, RNDID=:round, answer=:answer", $arr);

			$answer = $_GET["ranswer"];
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


		$exists = dbQuery_new($conn, "SELECT CID FROM team_answers WHERE CID=:cid AND SCID=:scid AND problem_number=:pn AND RNDID=:round", [
				"cid" => $response["CID"],
				"pn" => $response["problem_number"],
				"scid" => $response["SCID"],
				"round" => $response["RNDID"]
		]);
		if(empty($exists))
		{
                	dbQuery_new($conn, "INSERT INTO team_answers SET CID=:cid, SCID=:scid, problem_number=:pn, RNDID=:round, answer=:answer, points=:points", [
                        	        "cid" => $response["CID"],
                        	        "pn" => $response["problem_number"],
					"scid" => $response["SCID"],
                        	        "round" => $response["RNDID"],
                                	"answer" => $answer,
                			"points" => $points
        		]);
		}
		else
		{
			dbQuery_new($conn, "UPDATE team_answers SET answer=:answer, points=:points WHERE CID=:cid AND SCID=:scid AND problem_number=:pn AND RNDID=:round", [
                                        "cid" => $response["CID"],
                                        "pn" => $response["problem_number"],
                                        "scid" => $response["SCID"],
                                        "round" => $response["RNDID"],
                                        "answer" => $answer,
                                        "points" => $points
                        ]);
		}

		dbQuery_new($conn, "DELETE FROM grading_conflicts_team WHERE TCID=:tcid", ["tcid" => $_GET["TCID"]]);


                updateTeamScore($conn, $response["SCID"], $response["CID"], $response["RNDID"]);

                updateCompStatus($conn, $response["CID"], $response["RNDID"]);
	}
}
// Get more info about one conflict
else if(isset($_GET["TCID"]))
{
	$info = dbQuery_new($conn, "SELECT * FROM grading_conflicts_team WHERE TCID=:tcid", ["tcid" => $_GET["TCID"]]);
	if(empty($info))
		exit;
	$info = $info[0];

	$responses = dbQuery_new($conn, "SELECT a.*, b.answer, b.TRID FROM user AS a LEFT JOIN (grader_responses_team AS b) ON (a.UID=b.UID) WHERE b.SCID=:scid AND b.problem_number=:pn AND b.RNDID=:round AND b.CID=:cid", [
			"scid" => $info["SCID"],
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
			"TRID" => $responses[$i]["TRID"]
		];
	}

	if(!empty($result))
		echo json_encode($result);
}
// Get all conflicts
else
{
$cid = getCurrentComp($conn);
if($cid !== 0)
{
	$result = dbQuery_new($conn, "SELECT TCID, SCID, problem_number, RNDID FROM grading_conflicts_team WHERE CID=:cid", ["cid" => $cid]);

	if(!empty($result))
	{
		$array = [];
		$indices = [];
		$scids = [];

		// Arranges an array of each student, where each element is the student's info and and array of their conflicts
		for($i = 0; $i < count($result); $i++)
		{
			$name = dbQuery_new($conn, "SELECT team_name FROM school_info WHERE SCID=:scid", ["scid" => $result[$i]["SCID"]]);
			if(empty($name)) {
				echo "invalid school id";
				exit;
			}
			else
				$name = $name[0];

			$roundinfo = dbQuery_new($conn, "SELECT round_name FROM round WHERE RNDID=:round AND indiv=false", ["round" => $result[$i]["RNDID"]]);
                        if(empty($roundinfo)) {
				echo "invalid round id";
                                exit;
			}
                        else
                                $roundinfo = $roundinfo[0];

			$idx = array_search($result[$i]["SCID"], $scids);
			if($idx === FALSE)
			{
				array_push($scids, $result[$i]["SCID"]);

				array_push($array, [
					"SCID" => $result[$i]["SCID"],
					"team_name" => $name["team_name"],
					"conflicts" => [[
						"TCID" => $result[$i]["TCID"],
						"pn" => $result[$i]["problem_number"],
						"round_name" => $roundinfo["round_name"]
					]]
				]);

				end($array);
				$indices[$result[$i]["SCID"]] = key($array);
			}
			else
			{
				array_push($array[$indices[$scids[$idx]]]["conflicts"], [
					"TCID" => $result[$i]["TCID"],
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
