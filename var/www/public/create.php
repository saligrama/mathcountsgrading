<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    $conn = dbConnect_new();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["go"])) {

        $scids = dbQuery_new($conn, "SELECT SCID FROM school_info;");


	$previous = dbQuery_new($conn, "SELECT * FROM competition WHERE competition_date = :compdate AND competition_type = :comptype AND competition_name = :compname;",
				["compdate" => clean($_POST["compdate"]), "comptype" => clean($_POST["comptype"]), "compname" => clean($_POST["compname"])]);
	if(!empty($previous)) {
		popupAlert("Whoops! A competition with the same name, type, and date already exists.");
		redirectTo("/create.php");
	}

        dbQuery_new($conn, "INSERT INTO competition SET competition_date = :compdate, competition_type = :comptype, competition_name = :compname;",
			["compdate" => clean($_POST["compdate"]), "comptype" => clean($_POST["comptype"]), "compname" => clean($_POST["compname"])]);

	$liid = $conn->lastInsertId();

        foreach($scids as $i) {
	    $scid = $i['SCID'];
	    if(isset($_POST["$scid"]) && $_POST["$scid"] == "On")
                dbQuery_new($conn, "INSERT INTO competition_participants SET CID = :liid, SCID = :scid;", ["liid" => $liid, "scid" => $scid]);
	}

	redirectTo("/admin.php");

    }

    else {

        checkSession('admin');

        $result = dbQuery_new($conn, "SELECT SCID, team_name FROM school_info");

	render("create_form.php", ["result" => $result, "fullname" => getFullName($conn)]);

    }


?>
