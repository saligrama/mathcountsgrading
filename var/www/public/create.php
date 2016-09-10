<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["go"])) {

	if(!isset($_POST["compdate"]) || !isset($_POST["compname"]) || !isset($_POST["comptype"]) ||
           sempty($_POST["compdate"]) || sempty($_POST["comptype"])) {
                popupAlert("Whoopsie! There was an interal error. Please try again");
                redirectTo("/create.php");
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

        $result = dbQuery_new($conn, "SELECT SCID, team_name FROM school_info");
	$schinfo = dbQuery_new($conn, "SELECT * FROM school_info");
	if(empty($schinfo))
                $schinfo = 0;

	render("create_form.php", ["result" => $result, "fullname" => getFullName($conn), "schinfo" => $schinfo]);

    }


?>
