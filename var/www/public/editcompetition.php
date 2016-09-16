<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

/*    for($i = 0; $i < 100; $i++)
	dbQuery_new($conn, "INSERT INTO school_info SET team_name='test'");

    for($i = 0; $i < 1000; $i++)
	dbQuery_new($conn, "INSERT INTO mathlete_info SET first_name='test', SCID=9");
*/
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["finalize"])) {

	if(!isset($_POST["compdate"]) || !isset($_POST["compname"]) || !isset($_POST["comptype"]) || !isset($_POST["cid"]) ||
	   sempty($_POST["compdate"]) || sempty($_POST["comptype"]))
	{
		internalErrorRedirect(isset($_POST["cid"]) ? "/editcompetition.php?CID=" . $_POST["cid"] : "/admin.php");
	}

	$previous = dbQuery_new($conn, "SELECT * FROM competition WHERE competition_date = :compdate AND competition_name = :compname AND CID != :cid;",
                                ["compdate" => $_POST["compdate"], "compname" => $_POST["compname"], "cid" => $_POST["cid"]]);
        if(!empty($previous)) {
                popupAlert("Whoops! A competition with the same name and date already exists.");
                redirectTo("/editcompetition.php?CID=" . $_POST["cid"]);
        }

        $set_schools = $unset_schools = $set_regulars = $set_alternates = $unset_regulars = $unset_alternates = $cur_participants = $current_regulars = $current_alternates = [];

        $scids_list = dbQuery_new($conn, "SELECT SCID FROM school_info");
        $cur_participants_list = dbQuery_new($conn, "SELECT SCID FROM competition_participants WHERE CID=:cid", ["cid" => $_POST["cid"]]);

        foreach ($cur_participants_list as $cur_participant)
            array_push($cur_participants, $cur_participant["SCID"]);

        foreach ($scids_list as $row) {

            if (isset($_POST[$row["SCID"]]) && $_POST[$row["SCID"]] == "yes" && !in_array($row["SCID"], $cur_participants))
                array_push($set_schools, $row["SCID"]);
	    else if (!isset($_POST[$row["SCID"]]) && in_array($row["SCID"], $cur_participants))
                array_push($unset_schools, $row["SCID"]);

        }

	$student_list = dbQuery_new($conn, "SELECT SCID, SID FROM mathlete_info");
	$current_regulars_list = dbQuery_new($conn, "SELECT SID FROM student_participants WHERE CID=:cid AND type='regular'", ["cid" => $_POST["cid"]]);
	$current_alternates_list = dbQuery_new($conn, "SELECT SID FROM student_participants WHERE CID=:cid AND type='alternate'", ["cid" => $_POST["cid"]]);

	foreach($current_regulars_list as $current_regular)
		array_push($current_regulars, $current_regular["SID"]);

	foreach($current_alternates_list as $current_alternate)
		array_push($current_alternates, $current_alternate["SID"]);

	$lastreg = 0;
	foreach ($student_list as $row) {

            if (isset($_POST[$row['SCID'] . "reg" . $row['SID']]) && $_POST[$row['SCID'] . "reg" . $row['SID']] == "yes" && !in_array($row["SID"], $current_regulars)) {
		array_push($set_regulars, $row["SID"]);
		$lastreg = $row["SID"];
	    }
	    else if (!isset($_POST[$row['SCID'] . "reg" . $row['SID']]) && in_array($row["SID"], $current_regulars))
		array_push($unset_regulars, $row["SID"]);

	    if (isset($_POST[$row['SCID'] . "alt" . $row['SID']]) && $_POST[$row['SCID'] . "alt" . $row['SID']] == "yes" && !in_array($row["SID"], $current_alternates) && $lastreg !== $row["SID"])
                array_push($set_alternates, $row["SID"]);
	    else if (!isset($_POST[$row['SCID'] . "alt" . $row['SID']]) && in_array($row["SID"], $current_alternates))
		array_push($unset_alternates, $row["SID"]);

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
                                CID = :cid AND
                                SCID = :scid", [
                                    "cid" => $_POST["cid"],
                                    "scid" => $i
                                ]
            );

        }

	foreach($set_regulars as $i) {

            dbQuery_new($conn, "INSERT INTO student_participants SET
                                CID = :cid,
                                SID = :sid,
           			type = 'regular'", [
                                    "cid" => $_POST["cid"],
                                    "sid" => $i,
                                ]
           );

        }

	foreach($set_alternates as $i) {

            dbQuery_new($conn, "INSERT INTO student_participants SET
                                CID = :cid,
                                SID = :sid,
                                type = 'alternate'", [
                                    "cid" => $_POST["cid"],
                                    "sid" => $i,
                                ]
           );

        }

        foreach($unset_regulars as $i) {

            dbQuery_new($conn, "DELETE FROM student_participants WHERE
                                CID = :cid AND
                                SID = :sid AND
				type = 'regular'", [
                                    "cid" => $_POST["cid"],
                                    "sid" => $i
                                ]
            );

        }

	foreach($unset_alternates as $i) {

            dbQuery_new($conn, "DELETE FROM student_participants WHERE
                                CID = :cid AND
                                SID = :sid AND
                                type = 'alternate'", [
                                    "cid" => $_POST["cid"],
                                    "sid" => $i
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

	usort($schinfo, 'schoolSort');

	$studentinfo = dbQuery_new($conn, "SELECT * FROM mathlete_info");
	if(empty($studentinfo))
		$studentinfo = 0;

	usort($studentinfo, 'studentSort');

        $compinfo = dbQuery_new($conn, "SELECT * FROM competition WHERE CID=:cid", ["cid" => $_GET["CID"]]);
        if(empty($compinfo))
		redirectTo("/admin.php");

	$i = 0;
	foreach($schinfo as $school)
	{
		$schinfo[$i++]["num_students"] = 0;

		foreach($studentinfo as $student)
		{
			if($student["SCID"] == $school["SCID"])
				$schinfo[$i-1]["num_students"]++;
		}
	}

	$participants = dbQuery_new($conn, "SELECT * FROM competition_participants WHERE CID=:cid", ["cid" => $_GET["CID"]]);
	$stparticipants = dbQuery_new($conn, "SELECT * FROM student_participants WHERE CID=:cid", ["cid" => $_GET["CID"]]);

        $participants_row = $regulars_row = $alternates_row = [];

        foreach($participants as $participant)
            array_push($participants_row, $participant["SCID"]);

	foreach($stparticipants as $participant) {
	    if($participant["type"] == 'regular')
	    	array_push($regulars_row, $participant["SID"]);
	    else if($participant["type"] == 'alternate')
		array_push($alternates_row, $participant["SID"]);
	}

        render("editcomp_form.php", [
               "schinfo" => $schinfo,
	       "studentinfo" => $studentinfo,
               "crow" => $compinfo[0],
               "participants_row" => $participants_row,
	       "regulars_row" => $regulars_row,
	       "alternates_row" => $alternates_row,
               "fullname" => getFullName($conn)
	     ]
        );

    }


?>

