<?php

    require("../includes/functions.php");

    checkSession('admin');

    $error = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

            $passwd = $name = $confirm = "";
	    $schaf = 0;

            $passwd = htmlspecialchars($_POST["passwd"]);
            $confirm = htmlspecialchars($_POST["confirm"]);
            $name = htmlspecialchars($_POST["logname"]);
            $schaf = $_POST["schaf"];

            if (!$passwd || !$name || !isset($_POST["schaf"]))
                $error = 1;
            elseif (!$confirm || $confirm !== $passwd)
                $error = 1;
            else {

                $conn = dbConnect();

                $name = mysqli_real_escape_string($conn, $name);
                $passwd = mysqli_real_escape_string($conn, $passwd);

                $ph = password_hash($passwd, PASSWORD_DEFAULT);

		$type = $schaf ? 'grader' : 'admin';

                $result = mysqli_query($conn, "INSERT INTO user SET email='$name', password='$ph', SCID='$schaf', type='$type'");

                if (!$result) {
		    $error = 2;
		}
		else {
		    popupAlert("Success! You can now log in");
		    redirectTo("/login.php");
		}

            }

    }
    else {
	$error = 0;
    }

    switch($error) {
	case 0:
	    render("register_form.php", ["schoolrows" => dbQuery(dbConnect(), "SELECT * FROM school_info;")]);
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

