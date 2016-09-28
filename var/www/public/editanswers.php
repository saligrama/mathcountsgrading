<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
	if(isset($_POST["answersubmit"]))
	{
	    if(!isset($_POST["CID"]))
		internalErrorRedirect("/admin.php");

	    for($i = 1; $i <= 48; $i++)
		if(!isset($_POST[$i . "question"]))
		    internalErrorRedirect("/editanswers.php?CID=" . $_POST["CID"]);

	    for($i = 1; $i <= 48; $i++)
	    {
		$type = "sprint";
		if($i > 30)
		{
			if($i > 40)
				$type = "target" . ((int)(($i - 41)/2) + 1);
			else
				$type = "team";
		}

		$exists = dbQuery_new($conn, "SELECT * FROM competition_answers WHERE
                           	              CID=:cid AND
                                	      problem_type=:problem_type AND
                              	              problem_number=:problem_number", [
                                                 "cid" => $_POST["CID"],
                                        	 "problem_type" => $type,
                               		         "problem_number" => $i
                                     	      ]
                );

		if(!empty($exists))
		{
	    		dbQuery_new($conn, "UPDATE competition_answers SET
				    	     answer=:answer WHERE
					     CID=:cid AND
					     problem_type=:problem_type AND
					     problem_number=:problem_number", [
			    			"answer" => $_POST[$i . "question"],
						"cid" => $_POST["CID"],
						"problem_type" => $type,
						"problem_number" => $i
				     	     ]
			);
		}
		else
		{
			dbQuery_new($conn, "INSERT INTO competition_answers SET
                                             answer=:answer,
                                             CID=:cid,
                                             problem_type=:problem_type,
                                             problem_number=:problem_number", [
                                                "answer" => $_POST[$i . "question"],
                                                "cid" => $_POST["CID"],
                                                "problem_type" => $type,
                                                "problem_number" => $i
                                             ]
                        );
		}
	    }
	}
    }

    if(!isset($_GET["CID"]))
	redirectTo("/admin.php");

    $exists = dbQuery_new($conn, "SELECT * FROM competition WHERE CID=:cid", ["cid" => $_GET["CID"]]);
    if(empty($exists))
	redirectTo("/admin.php");

    $result = dbQuery_new($conn, "SELECT * FROM competition_answers WHERE CID=:cid", ["cid" => $_GET["CID"]]);

    render("editanswers_form.php", ["result" => $result, "fullname" => getFullName($conn)]);

?>
