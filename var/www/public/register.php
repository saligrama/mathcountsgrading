<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    $conn = dbConnect_new();

    $forceadmin = false;

    if(!empty(dbQuery_new($conn, "SELECT * FROM user;")))
        checkSession('admin');
    else
        $forceadmin = true;


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

	    if(!isset($_POST["passwd"]) || !isset($_POST["confirm"]) || !isset($_POST["logname"]) || (!isset($_POST["schaf"]) && !$forceadmin))
		internalErrorRedirect("/register.php");

            $passwd = $confirm = "";
	        $schaf = 0;

            $passwd = $_POST["passwd"];
            $confirm = $_POST["confirm"];
            $logname = $_POST["logname"];

            if (sempty($passwd) || sempty($logname) || sempty($confirm) || $confirm !== $passwd)
                internalErrorRedirect("/register.php");
            else {

		$previous = dbQuery_new($conn, "SELECT * FROM user WHERE username = :username;",
                                ["username" => $logname]);
	        if(!empty($previous)) {
        	        popupAlert("Whoops! A user with the same username already exists");
                	redirectTo("/register.php");
 		}


		$scid = (!isset($_POST["schaf"]) || $_POST["schaf"] == "-1") ? 0 : intval($_POST["schaf"]);
		$type = $scid == 0 ? "admin" : "grader";

                $result = dbQuery_new($conn, "INSERT INTO user SET
                                      username=:name,
                                      password=:ph,
                                      SCID=:schaf,
                                      type=:type", [
                                              "name" => $logname,
                                              "ph" => password_hash($passwd, PASSWORD_DEFAULT),
                                              "schaf" => $scid,
                                              "type" => $type,
					]

                );

                popupAlert("Success! You can now log in");
                redirectTo("/login.php");

	    }

    }

    if($forceadmin)
        render("register_admin_form.php", [ "fullname" => 0 ]);
    else
        render("register_form.php", ["schoolrows" => dbQuery_new($conn, "SELECT * FROM school_info;"), "fullname" => getFullName($conn)]);
?>
