<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    $conn = dbConnect_new();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["go"])) {

        $scids = dbQuery_new($conn, "SELECT SCID FROM school_info");

        dbQuery_new($conn, "INSERT INTO competition SET
                        competition_date = :compdate,
                        competition_type = :comptype,
                        competition_name = :compname", [
                            "compdate" => $_POST["compdate"],
                            "comptype" => $_POST["comptype"],
                            "compname" => $_POST["compname"]
		    ]
        );

	$liid = $conn->lastInsertId();

        foreach($scids as $i) {

            dbQuery_new($conn, "INSERT INTO competition_participants SET
                            CID = :liid,
                            SCID = :scid", [
                                "liid" => $liid,
                                "scid" => $i
                            ]
           );

        }

	redirectTo("admin.php");

    }

    else {

        checkSession('admin');

        $result = dbQuery_new($conn, "SELECT SCID, team_name FROM school_info");

	$namerows = dbQuery_new($conn, "SELECT first_name, last_name, email FROM user WHERE UID = :UID;", ["UID" => $_SESSION["UID"]]);

	render("create_form.php", ["result" => $result, "fullname" => getFullName($namerows)]);

    }


?>
