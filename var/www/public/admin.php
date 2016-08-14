<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    $result = dbQuery_new($conn, "SELECT * FROM competition;");
    if(empty($result))
	$result = 0;

    $namerows = dbQuery_new($conn, "SELECT first_name, last_name, email FROM user WHERE UID = :UID;", ["UID" => $_SESSION["UID"]]);

    $comp = dbQuery_new($conn, "SELECT * FROM current_competition");
    if(empty($comp))
	$comp = 0;
    else {
        $comp = dbQuery_new($conn, "SELECT competition_name FROM competition WHERE CID = :CID;", ["CID" => $comp[0][0]]);

	if($comp[0]["competition_name"] != NULL && $comp[0]["competition_name"] != "")
	    $comp = $comp[0]["competition_name"];
	else
	    $comp = $comp[0]["competition_date"];
    }

    render("admin_form.php", ["result" => $result, "compname" => $comp, "fullname" => getFullName($namerows)]);

?>
