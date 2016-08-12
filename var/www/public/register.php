<?php

    require("../includes/functions.php");

    $error = 0;

    $conn = dbConnect_new();

    if(!empty(dbQuery_new($conn, "SELECT * FROM user;")))
        checkSession('admin');


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

            $passwd = $name = $confirm = "";
	    $schaf = 0;

            $passwd = htmlspecialchars($_POST["passwd"]);
            $confirm = htmlspecialchars($_POST["confirm"]);
            $name = htmlspecialchars($_POST["logname"]);

            if (!$passwd || !$name || !isset($_POST["schaf"]))
                $error = 1;
            elseif (!$confirm || $confirm !== $passwd)
                $error = 1;
            else {

                $result = dbQuery_new($conn, "INSERT INTO user SET
                                      email=:name,
                                      password=:ph,
                                      SCID=:schaf,
                                      type=:type", [
                                              "name" => $name,
                                              "ph" => password_hash($passwd, PASSWORD_DEFAULT),
                                              "schaf" => $_POST["schaf"],
                                              "type" => $_POST["schaf"] ? 'grader' : 'admin'
                                      ]

                );

                popupAlert("Success! You can now log in");
                redirectTo("/login.php");

	    }

    }
    else {
	$error = 0;
    }

    switch($error) {
	case 0:
	    render("register_form.php", ["schoolrows" => dbQuery_new(dbConnect_new(), "SELECT * FROM school_info;")]);
	    break;
	case 1:
	    popupAlert("Woopsie! Something went wrong. Please try again");
	    redirectTo("/register.php");
	    break;
	case 2:
	    popupAlert("Whoopise! There was an internal error. Please try again");
	    redirectTo("/register.php");
	    break;
    }
?>
