<?php

require(dirname(__FILE__) . "/../includes/functions.php");

checkSession('admin');

$conn = dbConnect_new();

if(isset($_POST["RID"]) && isset($_POST["COID"]))
{
	$answer = 

	$conflict = dbQuery_new($conn, "SELECT * FROM grading_conflicts WHERE COID=:coid", ["coid" => $_POST["COID"]]);
	if(empty($conflict))
		echo "error";
	else
	{
		$conflict = $conflict[0];
		$response = dbQuery_new($conn, "SELECT * FROM grader_responses WHERE RID=:rid", ["rid" => $_POST["RID"]])[0];

                $key = dbQuery_new($conn, "SELECT answer FROM competition_answers WHERE CID=:cid AND problem_number=:pn AND problem_type=:round", [
                		"cid" => $response["CID"],
                                "pn" => $response["problem_number"],
                                "round" => $response["problem_type"]
                ]);
                if(empty($key))
			exit;
                else
                	$key = $key[0]["answer"];


                $correct = compareAnswers($key, $response["answer"]);
                $points = $correct * ($response["problem_type"] == "sprint" ? 1 : 2);

                dbQuery_new($conn, "INSERT INTO student_answers SET CID=:cid, SID=:sid, problem_number=:pn, problem_type=:round, answer=:answer, points=:points", [
                                "cid" => $info["CID"],
                                "pn" => $info["problem_number"],
				"sid" => $info["SID"],
                                "round" => $info["problem_type"],
                                "answer" => $,
                		"points" => $points
        	]);
	}
}
else if(isset($_POST["COID"]))
{
	$info = dbQuery_new($conn, "SELECT * FROM grading_conflicts WHERE COID=:coid", ["coid" => $_POST["COID"]]);
	if(empty($info))
		exit;
	$info = $info[0];

	$responses = dbQuery_new($conn, "SELECT a.*, b.answer, b.RID FROM user AS a LEFT JOIN (grader_responses AS b) ON (a.UID=b.UID) WHERE b.SID=:sid AND b.problem_number=:pn AND b.problem_type=:round AND b.CID=:cid", [
			"sid" => $info["SID"],
			"pn" => $info["problem_number"],
			"round" => $info["problem_type"],
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
else
{
$cid = dbQuery_new($conn, "SELECT * FROM current_competition");
if(!empty($cid))
{
	$cid = $cid[0]["CID"];

	$result = dbQuery_new($conn, "SELECT COID, SID, problem_number, problem_type FROM grading_conflicts WHERE CID=:cid", ["cid" => $cid]);

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
						"round" => $result[$i]["problem_type"]
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
					"round" => $result[$i]["problem_type"]
				]);
			}
		}

		echo json_encode($array);
	}
}
}

?>
