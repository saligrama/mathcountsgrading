<?php

	require(dirname(__FILE__) . "/../includes/functions.php");

	checkSession('admin');

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if(isset($_POST["finalize"]))
		{
			$conn = dbConnect_new();

        		dbQuery_new($conn,
        			"UPDATE school_info SET
        			team_name=:team_name,
    	        		town=:town,
    	        		coach=:coach,
                		address=:address,
                		contact_email=:email,
                		first_year=:firstyear
	        		WHERE SCID=:scid", [
					"scid" => $_POST["scid"],
                			"team_name" => $_POST["teamname"],
                			"town" => $_POST["town"],
                			"coach" => $_POST["coach"],
                			"address" => $_POST["address"],
                			"email" => $_POST["email"],
                			"firstyear" => (isset($_POST["firstyear"]) && $_POST["firstyear"] == "yes") ? 1 : 0
                		]

                	);

    	        	redirectTo("create.php");
		}
		else if(isset($_POST["delete"]))
		{
			dbQuery_new(dbConnect_new(), "DELETE FROM school_info WHERE SCID = :scid", ["scid" =>$_POST["scid"]]);

			popupAlert("Success! school deleted");
			redirectTo("/create.php");
		}
		else
		{
			if(!isset($_GET["SCID"]))
                        	redirectTo("admin.php");

                	$conn = dbConnect_new();

                	$result = dbQuery_new($conn, "SELECT * FROM school_info WHERE SCID = :scid", ["scid" => $_GET["SCID"]]);

                	render("edit_form.php", ["result" => $result]);
        	}
	}

	else {

		if(!isset($_GET["SCID"]))
			redirectTo("admin.php");

		$conn = dbConnect_new();

		$result = dbQuery_new($conn, "SELECT * FROM school_info WHERE SCID = :scid", ["scid" => $_GET["SCID"]]);

		render("edit_form.php", ["result" => $result]);

	}

?>
