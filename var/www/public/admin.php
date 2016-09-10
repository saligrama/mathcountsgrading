<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    $result = dbQuery_new($conn, "SELECT * FROM competition;");
    if(empty($result))
	$result = 0;

    $comprow = dbQuery_new($conn, "SELECT * FROM current_competition;");

    if(empty($comprow))
    {
        $comprow = 0;
	dbQuery_new($conn, "INSERT INTO current_competition SET CID = 0;");
    }
    else
    {
	$comprow = dbQuery_new($conn, "SELECT * FROM competition WHERE CID = :CID;", ["CID" => $comprow[0]["CID"]]);

	if(empty($comprow))
	    $comprow = 0;
	else
	    $comprow = $comprow[0];
    }

    if(isset($_GET["setComp"]))
    {
	if($_GET["setComp"] == 0)
	{
	    $comprow = 0;
	    dbQuery_new($conn, "DELETE FROM current_competition;");
	}
	else
	{
            $exists = dbQuery_new($conn, "SELECT * FROM competition WHERE CID = :CID;", ["CID" => $_GET["setComp"]]);

            if(!empty($exists))
	    {
                $comprow = $exists[0];

		dbQuery_new($conn, "UPDATE current_competition SET CID = :CID;", ["CID" => $_GET["setComp"]]);
	    }
	}
    }

    render("admin_form.php", ["result" => $result, "comprow" => $comprow, "fullname" => getFullName($conn)]);

?>
