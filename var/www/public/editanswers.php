<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
	if(isset($_POST["answerssubmit"]))
	{
	    if(!isset($_POST["CID"]) || !isset($_POST["round"]))
		internalErrorRedirect("/admin.php");

	    $roundinfo = dbQuery_new($conn, "SELECT * FROM round WHERE RNDID=:round", ["round" => $_POST["round"]]);
	    if(empty($roundinfo))
		internalErrorRedirect("/admin.php");

	    $roundinfo = $roundinfo[0];

	    for($i = 1; $i <= $roundinfo["num_questions"]; $i++)
		if(!isset($_POST[$i . "question"]))
		    internalErrorRedirect("/editanswers.php?CID=" . $_POST["CID"]);

	    $student_update = [];
	    $team_update = [];

	    echo "<script type='text/javascript'>window.location.replace('/editcompetition.php?CID=" . $_POST["CID"] . "');</script>";

	    for($i = 1; $i <= $roundinfo["num_questions"]; $i++)
	    {
		$key = $_POST[$i . "question"];

		$exists = dbQuery_new($conn, "SELECT * FROM competition_answers WHERE
                           	              CID=:cid AND
                                	      RNDID=:round AND
                              	              problem_number=:problem_number", [
                                                 "cid" => $_POST["CID"],
                                        	 "round" => $roundinfo["RNDID"],
                               		         "problem_number" => $i
                                     	      ]
                );

		if(!empty($exists))
		{
	    		dbQuery_new($conn, "UPDATE competition_answers SET
				    	     answer=:answer WHERE
					     CID=:cid AND
					     RNDID=:round AND
					     problem_number=:problem_number", [
			    			"answer" => $key,
						"cid" => $_POST["CID"],
						"round" => $roundinfo["RNDID"],
						"problem_number" => $i
				     	     ]
			);
		}
		else
		{
			dbQuery_new($conn, "INSERT INTO competition_answers SET
                                             answer=:answer,
                                             CID=:cid,
                                             RNDID=:round,
                                             problem_number=:problem_number", [
                                                "answer" => $key,
                                                "cid" => $_POST["CID"],
                                                "round" => $roundinfo["RNDID"],
                                                "problem_number" => $i
                                             ]
                        );
		}

		$student_answers = $roundinfo["indiv"] == "1" ? "student_answers" : "team_answers";

		$p_answers = dbQuery_new($conn, "SELECT * FROM $student_answers WHERE CID=:cid AND problem_number=:pn AND RNDID=:round", [
			"cid" => $_POST["CID"],
			"pn" => $i,
			"round" => $roundinfo["RNDID"]
		]);

		foreach($p_answers as $row)
		{

                        // Check if the entered answer is right
                        $correct = compareAnswers($key, $row["answer"]);
                        $points = $correct * $roundinfo["points_per_question"];

			$id = $roundinfo["indiv"] == "1" ? ("SID=" . $row["SID"]) : ("SCID=" . $row["SCID"]);

                        dbQuery_new($conn, "UPDATE $student_answers SET points=:points WHERE CID=:cid AND $id AND problem_number=:pn AND RNDID=:round", [
                                                                        "points" => $points,
									"cid" => $_POST["CID"],
                                                                        "pn" => $i,
                                                                        "round" => $roundinfo["RNDID"]
                        ]);

			if($roundinfo["indiv"] == "1")
			{
				if(!in_array($row["SID"], $student_update))
					array_push($student_update, $row["SID"]);

				$scid = dbQuery_new($conn, "SELECT SCID FROM mathlete_info WHERE SID=:sid", ["sid" => $row["SID"]]);

				if(!in_array($scid[0]["SCID"], $team_update))
                                	array_push($team_update, $scid[0]["SCID"]);
			}
			else if(!in_array($row["SCID"], $team_update))
				array_push($team_update, $row["SCID"]);
		}
	    }

	    foreach($student_update as $sid)
                updateStudentScore($conn, $sid, $_POST["CID"], $roundinfo["RNDID"]);

	    foreach($team_update as $scid)
                updateTeamScore($conn, $scid, $_POST["CID"], $roundinfo["RNDID"]);

            updateCompStatus($conn, $_POST["CID"], $roundinfo["RNDID"]);
	//    redirectTo("/editcompetition.php?CID=" . $_POST["CID"]);
	}
    }
    else
    {
        if(!isset($_GET["CID"]))
	    redirectTo("/admin.php");

        $exists = dbQuery_new($conn, "SELECT CTID, competition_name, competition_date FROM competition WHERE CID=:cid", ["cid" => $_GET["CID"]]);
        if(empty($exists))
	    redirectTo("/admin.php");

        $typeinfo = dbQuery_new($conn, "SELECT * FROM competition_type WHERE CTID=:ctid", ["ctid" => $exists[0]["CTID"]]);
        if(empty($typeinfo))
	    redirectTo("/admin.php");

        $typeinfo = $typeinfo[0];

        $result = dbQuery_new($conn, "SELECT * FROM round WHERE CTID=:ctid", ["ctid" => $typeinfo["CTID"]]);

        render("editanswers_form.php", ["roundrows" => $result, "fullname" => getFullName($conn), "comprow" => $exists[0], "typerow" => $typeinfo]);
    }

?>
