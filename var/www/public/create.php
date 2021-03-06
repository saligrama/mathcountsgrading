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

	if(!isset($_POST["compdate"]) || !isset($_POST["compname"]) || !isset($_POST["comptype"]) ||
	   sempty($_POST["compdate"]))
	{
		internalErrorRedirect("/create.php");
	}

	$previous = dbQuery_new($conn, "SELECT * FROM competition WHERE competition_date = :compdate AND competition_name = :compname;",
                                ["compdate" => $_POST["compdate"], "compname" => $_POST["compname"]]);
        if(!empty($previous)) {
                popupAlert("Whoops! A competition of with the same name and date already exists.");
                redirectTo("/create.php");
        }

        $set_schools = $set_regulars = $set_alternates = [];

        $scids_list = dbQuery_new($conn, "SELECT SCID FROM school_info");

        foreach ($scids_list as $row) {

            if (isset($_POST[$row["SCID"]]) && $_POST[$row["SCID"]] == "yes")
                array_push($set_schools, $row["SCID"]);

        }

	$student_list = dbQuery_new($conn, "SELECT SCID, SID FROM mathlete_info");

	foreach ($student_list as $row) {

            if (isset($_POST[$row['SCID'] . "reg" . $row['SID']]) && $_POST[$row['SCID'] . "reg" . $row['SID']] == "yes")
		array_push($set_regulars, $row["SID"]);

	    if (isset($_POST[$row['SCID'] . "alt" . $row['SID']]) && $_POST[$row['SCID'] . "alt" . $row['SID']] == "yes")
                array_push($set_alternates, $row["SID"]);

	}

        dbQuery_new($conn, "INSERT INTO competition SET
                            competition_date = :compdate,
                            competition_name = :compname,
			    CTID = :ctid", [
                                "compdate" => $_POST["compdate"],
                                "compname" => $_POST["compname"],
				"ctid" => $_POST["comptype"]
                            ]
       );

	$cid = $conn->lastInsertId();

        foreach($set_schools as $i) {

            dbQuery_new($conn, "INSERT INTO competition_participants SET
                                CID = :cid,
                                SCID = :scid", [
                                    "cid" => $cid,
                                    "scid" => $i
                                ]
           );

        }

	foreach($set_regulars as $i) {

            dbQuery_new($conn, "INSERT INTO student_participants SET
                                CID = :cid,
                                SID = :sid,
           			type = 'regular'", [
                                    "cid" => $cid,
                                    "sid" => $i,
                                ]
           );

        }

	foreach($set_alternates as $i) {

            dbQuery_new($conn, "INSERT INTO student_participants SET
                                CID = :cid,
                                SID = :sid,
                                type = 'alternate'", [
                                    "cid" => $cid,
                                    "sid" => $i,
                                ]
           );

        }

	popupAlert("Success! Competition created. Now, you can fill out the answer key");
	redirectTo("/editanswers.php?CID=" . $cid);

    }
    else {

        $conn = dbConnect_new();
        $schinfo = dbQuery_new($conn, "SELECT * FROM school_info");
	if(empty($schinfo))
		$schinfo = 0;
	else
		usort($schinfo, 'schoolSort');

	// Get competition types for the dropdown
        $comptypes = dbQuery_new($conn, "SELECT CTID, type_name FROM competition_type");
        if(empty($comptypes)) {
                popupAlert("Internal error: there aren't any competition types yet.");
                redirectTo("/admin.php");
        }

	$studentinfo = dbQuery_new($conn, "SELECT * FROM mathlete_info");
	if(empty($studentinfo))
		$studentinfo = 0;
	else
		usort($studentinfo, 'studentSort');

	if($schinfo !== 0)
	{
		$i = 0;
		foreach($schinfo as $school)
		{
			$schinfo[$i++]["num_students"] = 0;

			if($studentinfo !== 0)
			{
				foreach($studentinfo as $student)
				{
					if($student["SCID"] == $school["SCID"])
						$schinfo[$i-1]["num_students"]++;
				}
			}
		}
	}

        render("create_form.php", [
               "schinfo" => $schinfo,
	       "comptypeinfo" => $comptypes,
	       "studentinfo" => $studentinfo,
               "fullname" => getFullName($conn)
	     ]
        );

    }


?>

