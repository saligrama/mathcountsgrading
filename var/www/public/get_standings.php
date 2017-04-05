<?php

require(dirname(__FILE__) . "/../includes/functions.php");

$conn = dbConnect_new();

checkSession('admin');

function teamsSort($a, $b)
{
	return floatval($b["score"]) - floatval($a["score"]);
}

$cid = getCurrentComp($conn);
if($cid !== 0)
{
	$array = [
		"regulars" => [],
		"alternates" => [],
		"teams" => []
	];

	//$students = dbQuery_new($conn, "SELECT AVG(score) FROM (SELECT SUM(raw) AS score FROM student_cleaner WHERE CID=:cid GROUP BY SID) AS T", ["cid" => $cid]);
	$students = dbQuery_new($conn, "SELECT SUM(raw) as score, SID FROM student_cleaner WHERE CID=:cid AND SID IN (SELECT SID FROM student_participants WHERE CID=:cid2) GROUP BY SID ORDER BY score DESC", ["cid" => $cid, "cid2" => $cid]);
	$r = 0;
	$a = 0;
	for($i = 0; $i < count($students); $i++)
	{
		$name = dbQuery_new($conn, "SELECT first_name, last_name, SCID FROM mathlete_info WHERE SID=:sid", ["sid" => $students[$i]["SID"]]);
		if(empty($name))
			exit;

		$type = dbQuery_new($conn, "SELECT type FROM student_participants WHERE CID=:cid AND SID=:sid", ["cid" => $cid, "sid" => $students[$i]["SID"]]);
		if(empty($type))
			exit;

		if($type[0]["type"] == "regular")
		{
			$array["regulars"][$r++] = [
				"name" => getStudentFullName($name[0]),
				"SCID" => $name[0]["SCID"],
				"score" => $students[$i]["score"]
			];
		}
		else
		{
			$array["alternates"][$a++] = [
                                "name" => getStudentFullName($name[0]),
                                "SCID" => $name[0]["SCID"],
                                "score" => $students[$i]["score"]
                        ];
		}
	}


	$type = dbQUery_new($conn, "SELECT grade_average FROM competition_type WHERE CTID IN (SELECT CTID FROM competition WHERE CID=:cid)", ["cid" => $cid]);
	if(empty($type))
		exit;

	$func = $type[0]["grade_average"] == "1" ? "AVG" : "SUM";

	$schools = dbQuery_new($conn, "SELECT SUM(a.raw) as score, b.team_name, b.SCID FROM team_cleaner AS a INNER JOIN (school_info AS b) ON (a.CID=:cid AND a.SCID=b.SCID) WHERE b.SCID IN (SELECT SCID FROM competition_participants WHERE CID=:cid2) GROUP BY SCID", ["cid" => $cid, "cid2" => $cid]);

	$h = 0;
	foreach($schools as $school)
	{
		$student = dbQuery_new($conn, "SELECT $func(score) as total FROM (SELECT SUM(raw) AS score FROM student_cleaner WHERE CID=:cid AND SID IN (SELECT SID FROM mathlete_info WHERE SCID=:scid) AND SID IN (SELECT SID FROM student_participants WHERE CID=:cid2 AND type='regular') GROUP BY SID) AS T", ["scid" => $school["SCID"], "cid" => $cid, "cid2" => $cid]);
		if(empty($student))
			exit;

		$school["score"] += $student[0]["total"];
		$array["teams"][$h++] = $school;
	}

	usort($array["teams"], 'teamsSort');

	echo json_encode($array);
}

?>
