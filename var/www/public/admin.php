<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    $result = dbQuery_new($conn, "SELECT * FROM competition;");
    if(empty($result))
	$result = 0;

    $comp = 0;
    if(isset($_GET["setComp"])
	$comp = dbQuery_new($conn, "SELECT * FROM competition WHERE CID = :CID;", ["CID" => $_GET["setComp"]]);
    $comp = dbQuery_new($conn, "SELECT * FROM current_competition");
    if(empty($comp))
	$comp = 0;
    else {
        $comp = dbQuery_new($conn, "SELECT competition_name FROM competition WHERE CID = :CID;", ["CID" => $comp[0][0]]);
	$comp = getCompFullName($comp[0]);
    }

    render("admin_form.php", ["result" => $result, "compname" => $comp, "fullname" => getFullName($conn)]);

?>
