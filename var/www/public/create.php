<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["go"])) {

        $conn = dbConnect_new();

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

        $conn = dbConnect_new();

        $result = dbQuery_new($conn, "SELECT SCID, team_name FROM school_info");

        render("create_form.php", ["title" => "Create competition", "result" => $result]);

    }


?>
