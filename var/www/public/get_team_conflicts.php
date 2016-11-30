<?php

require(dirname(__FILE__) . "/../includes/functions.php");

checkSession('admin');

$conn = dbConnect_new();

if(isset($_POST["TRID"]) && isset($_POST["TCID"]))
{
	$conflict = dbQuery_new($conn, "SELECT * FROM grading_conflicts_team WHERE TCID=:tcid", ["tcid" => $_POST["TCID"]]);
	if(empty($conflict))
		echo "error";
	else
	{
		$conflict = $conflict[0];
		$response = dbQuery_new($conn, "SELECT * FROM grader_responses_team WHERE TRID=:trid", ["trid" => $_POST["TRID"]]);
		if(empty($response))
		{
			echo "error";
			exit;
		}

		$response = $response[0];
		$answer = $response["answer"];

		if(isset($_POST["ranswer"]))
		{
			$arr = [
                                                "cid" => $response["CID"],
                                                "uid" => $_SESSION["UID"],
                                                "pn" => $response["problem_number"],
                                                "round" => "team",
                                                "answer" => $_POST["ranswer"]
                        ];

			$exists = dbQuery_new($conn, "SELECT CID FROM grader_responses_team WHERE CID=:cid AND UID=:uid AND problem_number=:pn AND problem_type=:round AND answer=:answer", $arr);
			if(empty($exists))
				dbQuery_new($conn, "INSERT INTO grader_responses_team SET CID=:cid, UID=:uid, problem_number=:pn, problem_type=:round, answer=:answer", $arr);

			$answer = $_POST["ranswer"];
		}

                $key = dbQuery_new($conn, "SELECT answer FROM competition_answers WHERE CID=:cid AND problem_number=:pn AND problem_type=:round", [
                		"cid" => $response["CID"],
                                "pn" => $response["problem_number"],
                                "round" => "team"
                ]);
                if(empty($key))
		{
			echo "error";
			exit;
		}
                else
                	$key = $key[0]["answer"];


                $correct = compareAnswers($key, $answer);
                $points = $correct * 2;


		$exists = dbQuery_new($conn, "SELECT CID FROM team_answers WHERE CID=:cid AND SCID=:scid AND problem_number=:pn AND problem_type=:round", [
				"cid" => $response["CID"],
				"pn" => $response["problem_number"],
				"scid" => $response["SCID"],
				"round" => "team"
		]);
		if(empty($exists))
		{
                	dbQuery_new($conn, "INSERT INTO team_answers SET CID=:cid, SCID=:scid, problem_number=:pn, problem_type=:round, answer=:answer, points=:points", [
                        	        "cid" => $response["CID"],
                        	        "pn" => $response["problem_number"],
					"scid" => $response["SCID"],
                        	        "round" => "team",
                                	"answer" => $answer,
                			"points" => $points
        		]);
		}
		else
		{
			dbQuery_new($conn, "UPDATE team_answers SET answer=:answer, points=:points WHERE CID=:cid AND SCID=:scid AND problem_number=:pn AND problem_type=:round", [
                                        "cid" => $response["CID"],
                                        "pn" => $response["problem_number"],
                                        "scid" => $response["SCID"],
                                        "round" => "team",
                                        "answer" => $answer,
                                        "points" => $points
                        ]);
		}

		dbQuery_new($conn, "DELETE FROM grading_conflicts_team WHERE TCID=:tcid", ["tcid" => $_POST["TCID"]]);


                updateTeamScore($conn, $response["SCID"], $response["CID"]);

                updateCompStatus($conn, $response["CID"]);
	}
}
else if(isset($_POST["TCID"]))
{
	$info = dbQuery_new($conn, "SELECT * FROM grading_conflicts_team WHERE TCID=:tcid", ["tcid" => $_POST["TCID"]]);
	if(empty($info))
		exit;
	$info = $info[0];

	$responses = dbQuery_new($conn, "SELECT a.*, b.answer, b.TRID FROM user AS a LEFT JOIN (grader_responses_team AS b) ON (a.UID=b.UID) WHERE b.SCID=:scid AND b.problem_number=:pn AND b.problem_type=:round AND b.CID=:cid", [
			"scid" => $info["SCID"],
			"pn" => $info["problem_number"],
			"round" => "team",
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
else
{
$cid = dbQuery_new($conn, "SELECT * FROM current_competition");
if(!empty($cid))
{
	$cid = $cid[0]["CID"];

	$result = dbQuery_new($conn, "SELECT TCID, SCID, problem_number FROM grading_conflicts_team WHERE CID=:cid", ["cid" => $cid]);

	if(!empty($result))
	{
		$array = [];
		$indices = [];
		$scids = [];

		for($i = 0; $i < count($result); $i++)
		{
			$name = dbQuery_new($conn, "SELECT team_name FROM school_info WHERE SCID=:scid", ["scid" => $result[$i]["SCID"]]);
			if(empty($name))
				exit;
			else
				$name = $name[0];

			$idx = array_search($result[$i]["SCID"], $scids);
			if($idx === FALSE)
			{
				array_push($scids, $result[$i]["SCID"]);

				array_push($array, [
					"SCID" => $result[$i]["SCID"],
					"team_name" => $name["team_name"],
					"conflicts" => [[
						"TCID" => $result[$i]["TCID"],
						"pn" => $result[$i]["problem_number"]
					]]
				]);

				end($array);
				$indices[$result[$i]["SCID"]] = key($array);
			}
			else
			{
				array_push($array[$indices[$scids[$idx]]]["conflicts"], [
					"TCID" => $result[$i]["TCID"],
					"pn" => $result[$i]["problem_number"]
				]);
			}
		}

		echo json_encode($array);
	}
}
}

?>
