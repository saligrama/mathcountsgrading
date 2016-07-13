<?php

    require(dirname(__FILE__) . "/../includes/functions.php");
    
	checkSession('admin');

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["finalize"])) {

		$conn = dbConnect_new();

        dbQuery_new($conn,
            "UPDATE school_info SET
            team_name=:teamname,
            town=:town,
            coach=:coach,
            address=:address,
            contact_email=:email,
            first_year=:firstyear", [
                "team_name" => $_POST["teamname"],
                "town" => $_POST["town"],
                "coach" => $_POST["coach"],
                "address" => $_POST["address"],
                "email" => $_POST["email"],
                "firstyear" => (isset($_POST["firstyear"]) && $_POST["firstyear"] == "yes") ? 1 : 0
            ]

        );

	}

	else {

		$conn = dbConnect_new();

		$result = dbQuery_new($conn, "SELECT * FROM school_info WHERE SCID=:scid", ["scid" => $_GET["SCID"]]);

		render("edit_form.php", ["result" => $result]);

	}

?>
