<?php

	require(dirname(__FILE__) . "/../includes/functions.php");

	checkSession('admin');

	$conn = dbConnect_new();

	$cid = getCurrentComp($conn);

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST["finalize"]))
		{
			if(!isset($_POST["teamname"]) || !isset($_POST["town"]) || !isset($_POST["scid"]) || sempty($_POST["town"]))
			{
	               		internalErrorRedirect(isset($_POST["scid"]) ? "/editschool.php?SCID=" . $_POST["scid"] : "/admin.php");
			}

			$previous = dbQuery_new($conn, "SELECT * FROM school_info WHERE team_name = :teamname AND town = :town AND SCID != :scid;",
                                ["teamname" => $_POST["teamname"], "town" => $_POST["town"], "scid" => $_POST["scid"]]);
        		if(!empty($previous)) {
        		        popupAlert("Whoops! A school from the same town with the same team name already exists.");
                		redirectTo("/editschool.php?SCID=" . $_POST["scid"]);
        		}

        		dbQuery_new($conn,
        			"UPDATE school_info SET
        			team_name=:team_name,
    	        		town=:town
	        		WHERE SCID=:scid", [
					"scid" => $_POST["scid"],
                			"team_name" => $_POST["teamname"],
                			"town" => $_POST["town"]
                		]

                	);

    	        	redirectTo("/create.php");
		}
		else if(isset($_POST["delete"]))
		{
			if(!isset($_POST["scid"]))
				internalErrorRedirect("/admin.php");

			dbQuery_new($conn, "DELETE FROM school_info WHERE SCID = :scid", ["scid" => $_POST["scid"]]);
			dbQuery_new($conn, "DELETE FROM competition_participants WHERE SCID = :scid", ["scid" => $_POST["scid"]]);
			dbQuery_new($conn, "DELETE FROM grader_responses_team WHERE SCID = :scid", ["scid" => $_POST["scid"]]);
			dbQuery_new($conn, "DELETE FROM grading_conflicts_team WHERE SCID = :scid", ["scid" => $_POST["scid"]]);
			dbQuery_new($conn, "DELETE FROM team_answers WHERE SCID = :scid", ["scid" => $_POST["scid"]]);
			dbQuery_new($conn, "DELETE FROM team_cleaner WHERE SCID = :scid", ["scid" => $_POST["scid"]]);

			$students = dbQuery_new($conn, "SELECT SID FROM mathlete_info WHERE SCID=:scid", ["scid" => $_POST["scid"]]);
			foreach($students as $student)
			{
				dbQuery_new($conn, "DELETE FROM grader_responses WHERE SID = :sid", ["sid" => $student["SID"]]);
                        	dbQuery_new($conn, "DELETE FROM grading_conflicts WHERE SID = :sid", ["sid" => $student["SID"]]);
                        	dbQuery_new($conn, "DELETE FROM regular_overrides WHERE SID = :sid", ["sid" => $student["SID"]]);
                        	dbQuery_new($conn, "DELETE FROM student_answers WHERE SID = :sid", ["sid" => $student["SID"]]);
                        	dbQuery_new($conn, "DELETE FROM student_cleaner WHERE SID = :sid", ["sid" => $student["SID"]]);
                        	dbQuery_new($conn, "DELETE FROM student_participants WHERE SID = :sid", ["sid" => $student["SID"]]);
                        	dbQuery_new($conn, "DELETE FROM mathlete_info WHERE SID=:sid", ["sid" => $student["SID"]]);
			}

			dbQuery_new($conn, "DELETE FROM mathlete_info WHERE SCID = :scid", ["scid" => $_POST["scid"]]);

			if($cid)
                        	updateCompStatusAll($conn, $cid);

       			redirectTo("/create.php");
		}
		else if(isset($_POST["deletestudent"]))
		{
			if(!isset($_POST["SID"]) || !isset($_POST["SCID"]))
				internalErrorRedirect("/admin.php");

			dbQuery_new($conn, "DELETE FROM grader_responses WHERE SID = :sid", ["sid" => $_POST["SID"]]);
                        dbQuery_new($conn, "DELETE FROM grading_conflicts WHERE SID = :sid", ["sid" => $_POST["SID"]]);
                        dbQuery_new($conn, "DELETE FROM regular_overrides WHERE SID = :sid", ["sid" => $_POST["SID"]]);
                        dbQuery_new($conn, "DELETE FROM student_answers WHERE SID = :sid", ["sid" => $_POST["SID"]]);
                        dbQuery_new($conn, "DELETE FROM student_cleaner WHERE SID = :sid", ["sid" => $_POST["SID"]]);
                        dbQuery_new($conn, "DELETE FROM student_participants WHERE SID = :sid", ["sid" => $_POST["SID"]]);
			dbQuery_new($conn, "DELETE FROM mathlete_info WHERE SID=:sid", ["sid" => $_POST["SID"]]);

			if($cid)
                        	updateCompStatusAll($conn, $cid);

			redirectTo("/editschool.php?SCID=" . $_POST["SCID"]);
		}
		else if(isset($_POST["editstudent"]))
                {
                        if(!isset($_POST["scid"]) || !isset($_POST["name"]) ||
                           !isset($_POST["sid"]) || sempty($_POST["name"]))
                        {
                                internalErrorRedirect(isset($_POST["scid"]) ? "/editschool.php?SCID=" . $_POST["scid"] : "/admin.php");
                        }

                        dbQuery_new($conn,
                                "UPDATE mathlete_info SET
                                name=:name,
				WHERE SID=:sid", [
                                        "sid" => $_POST["sid"],
                                        "name" => $_POST["name"]
                                ]
                        );

                        redirectTo("/editschool.php?SCID=" . $_POST["scid"]);
                }

		else
			internalErrorRedirect("/admin.php");
	}

	else {

		$editsid = 0;

		if(isset($_GET["SCID"]))
		{
			if(isset($_GET["SID"]))
			{
				if(empty(dbQuery_new($conn, "SELECT * FROM mathlete_info WHERE SID=:sid AND SCID=:scid", ["sid" => $_GET["SID"], "scid" => $_GET["SCID"]])))
					redirectTo("/admin.php");
				else
					$editsid = $_GET["SID"];
			}
		}
		else
			redirectTo("/admin.php");

		$result = dbQuery_new($conn, "SELECT * FROM school_info WHERE SCID = :scid", ["scid" => $_GET["SCID"]]);
		if(empty($result))
			redirectTo("/admin.php");

		$studentinfo = dbQuery_new($conn, "SELECT * FROM mathlete_info WHERE SCID = :scid", ["scid" => $_GET["SCID"]]);
		if(empty($studentinfo))
			$studentinfo = 0;

		$returncid = 0;
        	if(isset($_GET["returnCID"]))
                	$returncid = $_GET["returnCID"];

		render("edit_form.php", ["result" => $result, "studentinfo" => $studentinfo, "fullname" => getFullName($conn), "editsid" => $editsid, "returncid" => $returncid]);

	}

?>
