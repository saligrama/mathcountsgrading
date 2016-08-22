<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createschool"])) {

	if(sempty($_POST["teamname"]) || sempty($_POST["town"]) || sempty($_POST["coach"]) || sempty($_POST["address"]) || sempty($_POST["email"]))
                                redirectTo("/addschool.php");

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
    else
	render("add_form.php", ["fullname" => getFullName($conn)]);

?>
