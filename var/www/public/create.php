<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["go"])) {

	if(!isset($_POST["compdate"]) || !isset($_POST["compname"]) || !isset($_POST["comptype"]) ||
           sempty($_POST["compdate"]) || sempty($_POST["comptype"]))
	{
                internalErrorRedirect("/create.php");
        }

        $scids = dbQuery_new($conn, "SELECT SCID FROM school_info;");

	$previous = dbQuery_new($conn, "SELECT * FROM competition WHERE competition_date = :compdate AND competition_name = :compname;",
				["compdate" => $_POST["compdate"], "compname" => $_POST["compname"]]);
	if(!empty($previous)) {
		popupAlert("Whoops! A competition with the same name and date already exists.");
		redirectTo("/create.php");
	}

        dbQuery_new($conn, "INSERT INTO competition SET competition_date = :compdate, competition_type = :comptype, competition_name = :compname, " .
				"status_sprint = 0.00, status_team = 0.00, status_target1 = 0.00, status_target2 = 0.00, status_target3 = 0.00, status_target4 = 0.00;",
			["compdate" => $_POST["compdate"], "comptype" => $_POST["comptype"], "compname" => $_POST["compname"]]);

	$liid = $conn->lastInsertId();

        foreach($scids as $i) {
	    $scid = $i['SCID'];

	    $firstyear = dbQuery_new($conn, "SELECT * FROM competition_participants WHERE SCID = :scid;", ["scid" => $scid]);
	    $firstyear = (int)(empty($firstyear));

	    if(isset($_POST["$scid"]) && $_POST["$scid"] == "yes")
                dbQuery_new($conn, "INSERT INTO competition_participants SET CID = :liid, SCID = :scid, firstyear = :firstyear;", ["liid" => $liid, "scid" => $scid, "firstyear" => $firstyear]);
	}

	popupAlert("Success! Competition created");
	redirectTo("/admin.php");

    }

    else {

	$schinfo = dbQuery_new($conn, "SELECT * FROM school_info");
        if(empty($schinfo))
                $schinfo = 0;
	else
        	usort($schinfo, 'schoolSort');

        $studentinfo = dbQuery_new($conn, "SELECT * FROM mathlete_info");
        if(empty($studentinfo))
                $studentinfo = 0;
	else
        	usort($studentinfo, 'studentSort');

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

        render("create_form.php", [
               "schinfo" => $schinfo,
               "studentinfo" => $studentinfo,
               "fullname" => getFullName($conn)
	     ]
	);

    }


?>
