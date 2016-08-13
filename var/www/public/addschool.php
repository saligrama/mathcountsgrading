<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createschool"])) {

        dbQuery_new($conn,
            "INSERT INTO school_info SET
             team_name=:teamname,
             town=:town,
             coach=:coach,
             address=:address,
             contact_email=:email,
             first_year=:firstyear", [
                 "teamname" => $_POST["teamname"],
                 "town" => $_POST["town"],
                 "coach" => $_POST["coach"],
                 "address" => $_POST["address"],
                 "email" => $_POST["email"],
                 "firstyear" => (isset($_POST["firstyear"]) && $_POST["firstyear"] == "yes") ? 1 : 0
             ]

        );

	popupAlert("Success! school created");
	redirectTo("/create.php");

    }
    else {
	$namerows = dbQuery_new($conn, "SELECT first_name, last_name, email FROM user WHERE UID = :UID;", ["UID" => $_SESSION["UID"]]);

	render("add_form.php", ["fullname" => getFullName($namerows)]);
    }

?>
