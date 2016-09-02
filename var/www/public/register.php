<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    $conn = dbConnect_new();

    if(!empty(dbQuery_new($conn, "SELECT * FROM user;")))
        checkSession('admin');


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

	    if(!isset($_POST["passwd"]) || !isset($_POST["confirm"]) || !isset($_POST["logname"]) || !isset($_POST["firstname"]) || !isset($_POST["lastname"]) || !isset($_POST["schaf"]))
		internalErrorRedirect("/register.php");

            $passwd = $name = $confirm = "";
	    $schaf = 0;

            $passwd = $_POST["passwd"];
            $confirm = $_POST["confirm"];
            $logname = $_POST["logname"];
	    $firstname = $_POST["firstname"];
	    $lastname = $_POST["lastname"];

            if (sempty($passwd) || sempty($logname) || sempty($confirm) || $confirm !== $passwd)
                internalErrorRedirect("/register.php");
            else {

		$previous = dbQuery_new($conn, "SELECT * FROM user WHERE email = :email;",
                                ["email" => $logname]);
	        if(!empty($previous)) {
        	        popupAlert("Whoops! A user with the same email/logname already exists");
                	redirectTo("/register.php");
 		}


                $result = dbQuery_new($conn, "INSERT INTO user SET
                                      email=:name,
				      last_name=:lastname,
				      first_name=:firstname,
                                      password=:ph,
                                      SCID=:schaf,
                                      type=:type", [
                                              "name" => $logname,
                                              "ph" => password_hash($passwd, PASSWORD_DEFAULT),
                                              "schaf" => $_POST["schaf"],
                                              "type" => $_POST["schaf"] ? 'grader' : 'admin',
                                      	      "lastname" => $lastname,
					      "firstname" => $firstname
					]

                );

                popupAlert("Success! You can now log in");
                redirectTo("/login.php");

	    }

    }

    render("register_form.php", ["schoolrows" => dbQuery_new($conn, "SELECT * FROM school_info;"), "fullname" => getFullName($conn)]);
?>
