<?php

if(!isset($_POST["CID"]) || !isset($_POST["round"]) || !isset($_POST["type"]))
	exit;

require("../includes/functions.php");

checkSession('admin');

$conn = dbConnect_new();

$cid = getCurrentComp($conn);

if($cid !== 0)
{
	$schools = dbQuery_new($conn, "SELECT SCID FROM competition_participants WHERE CID=:cid", ["cid" => $_POST["CID"]]);
	if(empty($schools))
	{
		echo json_encode([ "error" => "There aren't any participating schools in this competition"]);
		exit;
	}

	$roundinfo = dbQuery_new($conn, "SELECT * FROM round WHERE RNDID=:round", ["round" => $_POST["round"]]);
	if(empty($roundinfo))
		exit;

	$roundinfo = $roundinfo[0];

	$student_arr = [];

	/*foreach($schools as $school)
	{
		$schoolinfo = dbQuery_new($conn, "SELECT * FROM school_info WHERE SCID=:scid", ["scid" => $school["SCID"]]);
		if(empty($schoolinfo))
			continue;

		$schoolinfo = $schoolinfo[0];

		array_push($arr, [ "school" => $schoolinfo*/

        $students = dbQuery_new($conn, "SELECT * FROM mathlete_info WHERE SID IN (SELECT SID FROM student_participants WHERE CID=:cid) ORDER BY SCID", ["cid" => $_POST["CID"]]);

	if(empty($students))
	{
		echo json_encode([ "error" => "There aren't any participating students in this competition"]);
		exit;
	}

	foreach($students as $student)
	{
		$answers = dbQuery_new($conn, "SELECT * FROM student_answers WHERE CID=:cid AND RNDID=:round AND SID=:sid ORDER BY problem_number", ["cid" => $_POST["CID"], "round" => $_POST["round"], "sid" => $student["SID"]]);

		array_push($student_arr, [ "student_info" => $student, "answers" => $answers ]);
	}

	$arr = [
		"round_info" => $roundinfo,
		"schools" => $schools,
		"students" => $studens
	];

	echo json_encode($arr);
}

?>
