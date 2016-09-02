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
				redirectTo("/admin.php");

			dbQuery_new($conn, "DELETE FROM school_info WHERE SCID = :scid", ["scid" => $_POST["scid"]]);

			popupAlert("Success! school deleted");
			redirectTo("/create.php");
		}
	}

	else {

		if(!isset($_GET["SCID"]))
			redirectTo("admin.php");

		$result = dbQuery_new($conn, "SELECT * FROM school_info WHERE SCID = :scid", ["scid" => $_GET["SCID"]]);
		if(empty($result))
			redirectTo("/admin.php");

		$studentinfo = dbQuery_new($conn, "SELECT * FROM mathlete_info WHERE SCID = :scid", ["scid" => $_GET["SCID"]]);
		if(empty($studentinfo))
			$studentinfo = 0;

		render("edit_form.php", ["result" => $result, "studentinfo" => $studentinfo, "fullname" => getFullName($conn)]);

	}

?>
