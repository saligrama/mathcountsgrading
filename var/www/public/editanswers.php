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

	    for($i = 1; $i <= $roundinfo["num_questions"]; $i++)
	    {
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
			    			"answer" => $_POST[$i . "question"],
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
                                                "answer" => $_POST[$i . "question"],
                                                "cid" => $_POST["CID"],
                                                "round" => $roundinfo["RNDID"],
                                                "problem_number" => $i
                                             ]
                        );
		}
	    }

	    redirectTo("/editanswers.php?CID=" . $_POST["CID"]);
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
