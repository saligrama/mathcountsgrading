<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createschool"])) {

	if(!isset($_POST["teamname"]) || !isset($_POST["town"]) || !isset($_POST["coach"]) || !isset($_POST["address"]) || !isset($_POST["email"]) ||
           sempty($_POST["teamname"]) || sempty($_POST["town"]) || sempty($_POST["coach"]) || sempty($_POST["address"]) || sempty($_POST["email"])) {
        	popupAlert("Whoopsie! There was an interal error. Please try again");
                redirectTo(isset($_POST["scid"]) ? "/editschool.php?SCID=" . $_POST["scid"] : "/admin.php");
        }

	$previous = dbQuery_new($conn, "SELECT * FROM school_info WHERE team_name = :teamname AND town = :town AND address = :address;",
                                ["teamname" => $_POST["teamname"], "town" => $_POST["town"], "address" => $_POST["address"]]);
        if(!empty($previous)) {
                popupAlert("Whoops! A school with the same team name, town, and address already exists.");
                redirectTo("/addschool.php");
        }

        dbQuery_new($conn,
            "INSERT INTO school_info SET
             team_name=:teamname,
             town=:town,
             coach=:coach,
             address=:address,
             contact_email=:email", [
                 "teamname" => $_POST["teamname"],
                 "town" => $_POST["town"],
                 "coach" => $_POST["coach"],
                 "address" => $_POST["address"],
                 "email" => $_POST["email"],
             ]

        );

	popupAlert("Success! school created");
	redirectTo("/create.php");

    }
    else
	render("add_form.php", ["fullname" => getFullName($conn)]);

?>
