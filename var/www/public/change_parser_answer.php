<?php

require("../includes/functions.php");

checkSession("admin");

$conn = dbConnect_new();

$cid = getCurrentComp($conn);

if($cid !== 0 && isset($_POST["scid"]) && isset($_POST["sid"]) && isset($_POST["round"]) && isset($_POST["pnum"]) && isset($_POST["answer"]))
{
	if($_POST["answer"] == "3")
	{
		if($_POST["sid"] == "0")
		{
			dbQuery_new($conn, "DELETE FROM team_answers WHERE CID=:cid AND SCID=:scid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "scid" => $_POST["scid"], "round" => $_POST["round"], "pnum" => $_POST["pnum"]]);
		}
		else
		{
			dbQuery_new($conn, "DELETE FROM student_answers WHERE CID=:cid AND SID=:sid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "sid" => $_POST["sid"], "round" => $_POST["round"], "pnum" => $_POST["pnum"]]);
		}
	}
	else
	{
        	$roundinfo = dbQuery_new($conn, "SELECT * FROM round WHERE RNDID=:round", ["round" => $_POST["round"]]);
        	if(empty($roundinfo))
        	{
                	echo "error";
                	exit;
        	}

        	$roundinfo = $roundinfo[0];

		$points = 0;
		if($_POST["answer"] == "2")
			$points = $roundinfo["points_per_question"];

		if($_POST["sid"] == "0")
        	{
			$exists = dbQuery_new($conn, "SELECT CID FROM team_answers WHERE CID=:cid AND SCID=:scid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "scid" => $_POST["scid"], "round" => $_POST["round"], "pnum" => $_POST["pnum"]]);
			if(empty($exists))
			{
				dbQuery_new($conn, "INSERT INTO team_answers SET points=:points, CID=:cid, SCID=:scid, RNDID=:round, problem_number=:pnum, answer=''", ["cid" => $cid, "scid" => $_POST["scid"], "round" => $_POST["round"], "pnum" => $_POST["pnum"], "points" => $points]);
			}
			else
			{
                		dbQuery_new($conn, "UPDATE team_answers SET points=:points WHERE CID=:cid AND SCID=:scid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "scid" => $_POST["scid"], "round" => $_POST["round"], "pnum" => $_POST["pnum"], "points" => $points]);
        		}
		}
        	else
        	{
			$exists = dbQuery_new($conn, "SELECT CID FROM student_answers WHERE CID=:cid AND SID=:sid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "sid" => $_POST["sid"], "round" => $_POST["round"], "pnum" => $_POST["pnum"]]);
                        if(empty($exists))
                        {
                                dbQuery_new($conn, "INSERT INTO student_answers SET points=:points, CID=:cid, SID=:sid, RNDID=:round, problem_number=:pnum, answer=''", ["cid" => $cid, "sid" => $_POST["sid"], "round" => $_POST["round"], "pnum" => $_POST["pnum"], "points" => $points]);
                        }
                        else
                        {
                                dbQuery_new($conn, "UPDATE student_answers SET points=:points WHERE CID=:cid AND SID=:sid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "sid" => $_POST["sid"], "round" => $_POST["round"], "pnum" => $_POST["pnum"], "points" => $points]);
                        }
        	}
	}

	if($_POST["sid"] != "0")
		updateStudentScore($conn, $_POST["sid"], $cid, $_POST["round"]);

	updateTeamScore($conn, $_POST["scid"], $cid, $_POST["round"]);

	updateCompStatus($conn, $cid, $_POST["round"]);
}
?>
