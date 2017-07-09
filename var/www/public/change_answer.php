<?php

require("../includes/functions.php");

checkSession("admin");

$conn = dbConnect_new();

$cid = getCurrentComp($conn);

if($cid !== 0 && isset($_GET["scid"]) && isset($_GET["sid"]) && isset($_GET["round"]) && isset($_GET["pnum"]) && isset($_GET["answer"]))
{
	$roundinfo = dbQuery_new($conn, "SELECT * FROM round WHERE RNDID=:round", ["round" => $_GET["round"]]);
	if(empty($roundinfo))
	{
		echo "error";
		exit;
	}

	$roundinfo = $roundinfo[0];

	$key = dbQuery_new($conn, "SELECT answer FROM competition_answers WHERE CID=:cid AND problem_number=:pn AND RNDID=:round", [
                        "cid" => $cid,
                	"pn" => $_GET["pnum"],
        		"round" => $_GET["round"]
        ]);
        if(empty($key))
        {
		echo "error";
		exit;
	}
        else
        	$key = $key[0]["answer"];


        $correct = compareAnswers($key, $_GET["answer"]);
        $points = $correct * $roundinfo["points_per_question"];


	if($_GET["sid"] == "0")
	{
		$exists = dbQuery_new($conn, "SELECT CID FROM team_answers WHERE CID=:cid AND SCID=:scid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "scid" => $_GET["scid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"]]);
		if(empty($exists))
		{
			dbQuery_new($conn, "INSERT INTO team_answers SET answer=:answer, points=:points, CID=:cid, SCID=:scid, RNDID=:round, problem_number=:pnum", ["cid" => $cid, "scid" => $_GET["scid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"], "points" => $points, "answer" => $_GET["answer"]]);
		}
		else
		{
			dbQuery_new($conn, "UPDATE team_answers SET answer=:answer, points=:points WHERE CID=:cid AND SCID=:scid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "scid" => $_GET["scid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"], "points" => $points, "answer" => $_GET["answer"]]);
		}
	}
	else
	{
		$exists = dbQuery_new($conn, "SELECT CID FROM student_answers WHERE CID=:cid AND SID=:sid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "sid" => $_GET["sid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"]]);
                if(empty($exists))
                {
                        dbQuery_new($conn, "INSERT INTO student_answers SET answer=:answer, points=:points, CID=:cid, SID=:sid, RNDID=:round, problem_number=:pnum", ["cid" => $cid, "sid" => $_GET["sid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"], "points" => $points, "answer" => $_GET["answer"]]);
                }
                else
                {
                        dbQuery_new($conn, "UPDATE student_answers SET answer=:answer, points=:points WHERE CID=:cid AND SID=:sid AND RNDID=:round AND problem_number=:pnum", ["cid" => $cid, "sid" => $_GET["sid"], "round" => $_GET["round"], "pnum" => $_GET["pnum"], "points" => $points, "answer" => $_GET["answer"]]);
                }
	}

	if($_GET["sid"] != "0")
                updateStudentScore($conn, $_GET["sid"], $cid, $_GET["round"]);

        updateTeamScore($conn, $_GET["scid"], $cid, $_GET["round"]);
}
else
	echo "error";

?>
