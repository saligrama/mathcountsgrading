<?php

require(dirname(__FILE__) . "/../includes/functions.php");

$conn = dbConnect_new();

checkSession('admin');

$cid = getCurrentComp($conn);
if($cid !== 0)
{
	$array = [
		"students" => [],
		"teams" => []
	];

	$students = dbQuery_new($conn, "SELECT (sprint_raw + target1_raw + target2_raw + target3_raw + target4_raw) AS score, SID FROM student_cleaner WHERE CID=:cid ORDER BY score DESC", ["cid" => $cid]);
	for($i = 0; $i < count($students); $i++)
	{
		$name = dbQuery_new($conn, "SELECT first_name, last_name, SCID FROM mathlete_info WHERE SID=:sid", ["sid" => $students[$i]["SID"]]);
		if(empty($name))
			exit;

		$array["students"][$i] = [
			"name" => getStudentFullName($name[0]),
			"SCID" => $name[0]["SCID"],
			"score" => $students[$i]["score"]
		];
	}

	$array["teams"] = dbQuery_new($conn, "SELECT a.team_raw, b.team_name, b.SCID FROM team_cleaner AS a LEFT JOIN (school_info AS b) ON (a.CID=:cid AND a.SCID=b.SCID) ORDER BY a.team_raw DESC", ["cid" => $cid]);

	echo json_encode($array);
}

?>
