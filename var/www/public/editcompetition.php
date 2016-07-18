<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["finalize"])) {

        $set_schools = $unset_schools = $cur_participants = [];

        $conn = dbConnect_new();

        $scids_list = dbQuery_new($conn, "SELECT SCID FROM school_info");
        $cur_participants_list = dbQuery_new($conn, "SELECT SCID FROM competition_participants WHERE CID=:cid", ["cid" => $_POST["cid"]]);
	$cur_participants = $set_schools = $unset_schools = [];

        foreach ($cur_participants_list as $cur_participant)
            array_push($cur_participants, $cur_participant["SCID"]);

        foreach ($scids_list as $row) {

            if (isset($_POST[$row["SCID"]]) && $_POST[$row["SCID"]] == "yes" && !in_array($row["SCID"], $cur_participants))
                array_push($set_schools, $row["SCID"]);
	    else if (!isset($_POST[$row["SCID"]]) && in_array($row["SCID"], $cur_participants))
                array_push($unset_schools, $row["SCID"]);

        }

        dbQuery_new($conn, "UPDATE competition SET
                            competition_date = :compdate,
                            competition_type = :comptype,
                            competition_name = :compname
                            WHERE CID=:cid", [
                                "compdate" => $_POST["compdate"],
                                "comptype" => $_POST["comptype"],
                                "compname" => $_POST["compname"],
                                "cid" => $_POST["cid"]
                            ]
       );

        foreach($set_schools as $i) {

            dbQuery_new($conn, "INSERT INTO competition_participants SET
                                CID = :cid,
                                SCID = :scid", [
                                    "cid" => $_POST["cid"],
                                    "scid" => $i
                                ]
           );

        }

        foreach($unset_schools as $i) {

            dbQuery_new($conn, "DELETE FROM competition_participants WHERE
                                CID = :cid,
                                SCID = :scid", [
                                    "cid" => $_POST["cid"],
                                    "scid" => $i
                                ]
            );

        }

	    redirectTo("admin.php");

    }
    elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {

	dbQuery_new(dbConnect_new(), "DELETE FROM competition WHERE CID = :cid", ["cid" => $_GET["CID"]]);

	popupAlert("Success! The competition has been deleted");
	redirectTo("/admin.php");

    }
    else {

        checkSession('admin');

	if(!isset($_GET["CID"]))
		redirectTo("/admin.php");

        $conn = dbConnect_new();
        $schinfo = dbQuery_new($conn, "SELECT * FROM school_info");
        $compinfo = dbQuery_new($conn, "SELECT * FROM competition WHERE CID=:cid", ["cid" => $_GET["CID"]]);
        $participants = dbQuery_new($conn, "SELECT * FROM competition_participants WHERE CID=:cid", ["cid" => $_GET["CID"]]);

        $participants_row = [];

        foreach($participants as $participant)
            array_push($participants_row, $participant["SCID"]);

        render("editcomp_form.php", [
               "title" => "Edit competition",
               "schinfo" => $schinfo,
               "compinfo" => $compinfo,
               "participants_row" => $participants_row
              ]
        );

    }


?>

