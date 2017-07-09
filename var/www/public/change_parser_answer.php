<?php

require("../includes/functions.php");

checkSession("admin");

$conn = dbConnect_new();

$cid = getCurrentComp($conn);

if($cid !== 0 && isset($_GET["scid"]) && isset($_GET["sid"]) && isset($_GET["round"]) && isset($_GET["pnum"]) && isset($_GET["answer"]))
{
	if($_GET["answer"] == "3")
	{
		if($_GET["sid"] == "0")
		{
			dbQuery_new($conn, "DELETE FROM team_answers WHERE CID=:cid AND SCID=:scid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "scid" => $_GET["scid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"]]);
		}
		else
		{
			dbQuery_new($conn, "DELETE FROM student_answers WHERE CID=:cid AND SID=:sid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "sid" => $_GET["sid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"]]);
		}
	}
	else
	{
        	$roundinfo = dbQuery_new($conn, "SELECT * FROM round WHERE RNDID=:round", ["round" => $_GET["round"]]);
        	if(empty($roundinfo))
        	{
                	echo "error";
                	exit;
        	}

        	$roundinfo = $roundinfo[0];

		$points = 0;
		if($_GET["answer"] == "2")
			$points = $roundinfo["points_per_question"];

		if($_GET["sid"] == "0")
        	{
			$exists = dbQuery_new($conn, "SELECT CID FROM team_answers WHERE CID=:cid AND SCID=:scid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "scid" => $_GET["scid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"]]);
			if(empty($exists))
			{
				dbQuery_new($conn, "INSERT INTO team_answers SET points=:points, CID=:cid, SCID=:scid, RNDID=:round, problem_number=:pnum, answer=''", ["cid" => $cid, "scid" => $_GET["scid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"], "points" => $points]);
			}
			else
			{
                		dbQuery_new($conn, "UPDATE team_answers SET points=:points WHERE CID=:cid AND SCID=:scid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "scid" => $_GET["scid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"], "points" => $points]);
        		}
		}
        	else
        	{
			$exists = dbQuery_new($conn, "SELECT CID FROM student_answers WHERE CID=:cid AND SID=:sid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "sid" => $_GET["sid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"]]);
                        if(empty($exists))
                        {
                                dbQuery_new($conn, "INSERT INTO student_answers SET points=:points, CID=:cid, SID=:sid, RNDID=:round, problem_number=:pnum, answer=''", ["cid" => $cid, "sid" => $_GET["sid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"], "points" => $points]);
                        }
                        else
                        {
                                dbQuery_new($conn, "UPDATE student_answers SET points=:points WHERE CID=:cid AND SID=:sid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "sid" => $_GET["sid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"], "points" => $points]);
                        }
        	}
	}

	if($_GET["sid"] != "0")
		updateStudentScore($conn, $_GET["sid"], $cid, $_GET["round"]);

	updateTeamScore($conn, $_GET["scid"], $cid, $_GET["round"]);

	updateCompStatus($conn, $cid, $_GET["round"]);
}
?>
