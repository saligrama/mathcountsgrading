<?php

require(dirname(__FILE__) . "/../includes/functions.php");

checkSession('admin');

$conn = dbConnect_new();

$cid = getCurrentComp($conn);
if($cid !== 0)
{
	$progress_data = dbQuery_new($conn, "SELECT status, RNDID FROM competition_status WHERE CID=:cid", ["cid" => $cid]);

	$schools = dbQuery_new($conn, "SELECT * FROM school_info WHERE SCID IN (SELECT SCID FROM competition_participants WHERE CID=:cid)", ["cid" => $cid]);

        $roundinfo = dbQuery_new($conn, "SELECT * FROM round WHERE CTID IN (SELECT CTID FROM competition WHERE CID=:cid)", ["cid" => $cid]);

        $student_arr = [];
	$school_arr = [];

        $students = dbQuery_new($conn, "SELECT * FROM mathlete_info WHERE SID IN (SELECT SID FROM student_participants WHERE CID=:cid) ORDER BY SCID", ["cid" => $cid]);

        foreach($students as $student)
        {
                $answers = dbQuery_new($conn, "SELECT a.*, b.round_name FROM student_answers as a INNER JOIN round as b ON a.RNDID = b.RNDID WHERE CID=:cid AND SID=:sid ORDER BY RNDID, problem_number", ["cid" => $cid, "sid" => $student["SID"]]);

                array_push($student_arr, [ "student_info" => $student, "answers" => $answers ]);
        }

        foreach($schools as $school)
        {
                $answers = dbQuery_new($conn, "SELECT a.*, b.round_name FROM team_answers as a INNER JOIN round as b ON a.RNDID = b.RNDID WHERE CID=:cid AND SCID=:scid ORDER BY RNDID, problem_number", ["cid" => $cid, "scid" => $school["SCID"]]);

                array_push($school_arr, [ "team_info" => $school, "answers" => $answers ]);
        }

        $arr = [
		"progress" => $progress_data,
                "round_info" => $roundinfo,
                "part_schools" => $schools,
                "student_info_and_answers" => $student_arr,
		"team_info_and_answers" => $school_arr
        ];

        echo json_encode($arr);
}

?>
