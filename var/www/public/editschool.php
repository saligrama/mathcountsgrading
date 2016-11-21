<?php

	require(dirname(__FILE__) . "/../includes/functions.php");

	checkSession('admin');

	$conn = dbConnect_new();

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST["finalize"]))
		{
			if(!isset($_POST["teamname"]) || !isset($_POST["town"]) || !isset($_POST["coach"]) || !isset($_POST["address"]) || !isset($_POST["email"]) || !isset($_POST["scid"]) ||
			   sempty($_POST["teamname"]) || sempty($_POST["town"]) || sempty($_POST["coach"]) || sempty($_POST["address"]) || sempty($_POST["email"]))
			{
	               		internalErrorRedirect(isset($_POST["scid"]) ? "/editschool.php?SCID=" . $_POST["scid"] : "/admin.php");
			}

			$previous = dbQuery_new($conn, "SELECT * FROM school_info WHERE team_name = :teamname AND town = :town AND address = :address AND SCID != :scid;",
                                ["teamname" => $_POST["teamname"], "town" => $_POST["town"], "address" => $_POST["address"], "scid" => $_POST["scid"]]);
        		if(!empty($previous)) {
        		        popupAlert("Whoops! A school with the same team name, town, and address already exists.");
                		redirectTo("/editschool.php?SCID=" . $_POST["scid"]);
        		}

        		dbQuery_new($conn,
        			"UPDATE school_info SET
        			team_name=:team_name,
    	        		town=:town,
    	        		coach=:coach,
                		address=:address,
                		contact_email=:email
	        		WHERE SCID=:scid", [
					"scid" => $_POST["scid"],
                			"team_name" => $_POST["teamname"],
                			"town" => $_POST["town"],
                			"coach" => $_POST["coach"],
                			"address" => $_POST["address"],
                			"email" => $_POST["email"]
                		]

                	);

    	        	redirectTo("/create.php");
		}
		else if(isset($_POST["delete"]))
		{
			if(!isset($_POST["scid"]))
				internalErrorRedirect("/admin.php");

			dbQuery_new($conn, "DELETE FROM school_info WHERE SCID = :scid", ["scid" => $_POST["scid"]]);

			popupAlert("Success! school deleted");
			redirectTo("/create.php");
		}
		else if(isset($_POST["addstudent"]))
		{
			if(!isset($_POST["scid"]) || !isset($_POST["firstname"]) || !isset($_POST["lastname"]) || !isset($_POST["nickname"]) ||
			   !isset($_POST["gender"]) || (sempty($_POST["firstname"]) && sempty($_POST["lastname"])))
                        {
			        internalErrorRedirect(isset($_POST["scid"]) ? "/editschool.php?SCID=" . $_POST["scid"] : "/admin.php");
			}

			dbQuery_new($conn,
				"INSERT INTO mathlete_info SET
				SCID=:scid,
				first_name=:firstname,
				last_name=:lastname,
				nickname=:nickname,
				gender=:gender", [
					"scid" => $_POST["scid"],
					"firstname" => $_POST["firstname"],
					"lastname" => $_POST["lastname"],
					"nickname" => $_POST["nickname"],
					"gender" => $_POST["gender"]
				]
			);

			popupAlert("Success! Student created.");
			redirectTo("/editschool.php?SCID=" . $_POST["scid"]);
		}
		else if(isset($_POST["editstudent"]))
                {
                        if(!isset($_POST["scid"]) || !isset($_POST["firstname"]) || !isset($_POST["lastname"]) || !isset($_POST["nickname"]) ||
                           !isset($_POST["gender"]) || !isset($_POST["sid"]) || (sempty($_POST["firstname"]) && sempty($_POST["lastname"])))
                        {
                                internalErrorRedirect(isset($_POST["scid"]) ? "/editschool.php?SCID=" . $_POST["scid"] : "/admin.php");
                        }

                        dbQuery_new($conn,
                                "UPDATE mathlete_info SET
                                first_name=:firstname,
                                last_name=:lastname,
                                nickname=:nickname,
                                gender=:gender
				WHERE SID=:sid", [
                                        "sid" => $_POST["sid"],
                                        "firstname" => $_POST["firstname"],
                                        "lastname" => $_POST["lastname"],
                                        "nickname" => $_POST["nickname"],
                                        "gender" => $_POST["gender"]
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
