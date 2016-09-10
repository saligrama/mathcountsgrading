<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["finalize"])) {

	if(!isset($_POST["compdate"]) || !isset($_POST["compname"]) || !isset($_POST["comptype"]) || !isset($_POST["cid"]) ||
	   sempty($_POST["compdate"]) || sempty($_POST["comptype"])) {
		popupAlert("Whoopsie! There was an interal error. Please try again");
		redirectTo(isset($_POST["cid"]) ? "/editcompetition.php?CID=" . $_POST["cid"] : "/admin.php");
	}

	$previous = dbQuery_new($conn, "SELECT * FROM competition WHERE competition_date = :compdate AND competition_name = :compname AND CID != :cid;",
                                ["compdate" => $_POST["compdate"], "compname" => $_POST["compname"], "cid" => $_POST["cid"]]);
        if(!empty($previous)) {
                popupAlert("Whoops! A competition with the same name and date already exists.");
                redirectTo("/editcompetition.php?CID=" . $_POST["cid"]);
        }

        $set_schools = $unset_schools = $cur_participants = [];

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

	    $firstyear = dbQuery_new($conn, "SELECT * FROM competition_participants WHERE SCID = :scid;", ["scid" => $i]);
            $firstyear = (int)(empty($firstyear));

            dbQuery_new($conn, "INSERT INTO competition_participants SET
                                CID = :cid,
                                SCID = :scid,
				firstyear = :fyear", [
                                    "cid" => $_POST["cid"],
                                    "scid" => $i,
				    "fyear" => $firstyear
                                ]
           );

        }

        foreach($unset_schools as $i) {

            dbQuery_new($conn, "DELETE FROM competition_participants WHERE
                                CID = :cid AND
                                SCID = :scid", [
                                    "cid" => $_POST["cid"],
                                    "scid" => $i
                                ]
            );

        }

	redirectTo("/admin.php");

    }
    elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {

	if(!isset($_POST["cid"]))
		redirectTo("/admin.php");

	dbQuery_new($conn, "DELETE FROM competition WHERE CID = :cid", ["cid" => $_POST["cid"]]);

	popupAlert("Success! The competition has been deleted");
	redirectTo("/admin.php");

    }
    else {

	if(!isset($_GET["CID"]))
		redirectTo("/admin.php");

        $conn = dbConnect_new();
        $schinfo = dbQuery_new($conn, "SELECT * FROM school_info");
	if(empty($schinfo))
		$schinfo = 0;

	$studentinfo = dbQuery_new($conn, "SELECT * FROM mathlete_info;");

        $compinfo = dbQuery_new($conn, "SELECT * FROM competition WHERE CID=:cid", ["cid" => $_GET["CID"]]);
        if(empty($compinfo))
		redirectTo("/admin.php");

	$participants = dbQuery_new($conn, "SELECT * FROM competition_participants WHERE CID=:cid", ["cid" => $_GET["CID"]]);

        $participants_row = [];

        foreach($participants as $participant)
            array_push($participants_row, $participant["SCID"]);

        render("editcomp_form.php", [
               "schinfo" => $schinfo,
	       "studentinfo" => $studentinfo,
               "crow" => $compinfo[0],
               "participants_row" => $participants_row,
               "fullname" => getFullName($conn)
	     ]
        );

    }


?>

