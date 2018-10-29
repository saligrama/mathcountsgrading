<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    $cid = getCurrentComp($conn);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createschool"])) {

	if(!isset($_POST["teamname"]) || !isset($_POST["town"]) || !isset($_POST["students"]) || sempty($_POST["town"]))
	{
        	internalErrorRedirect(isset($_POST["scid"]) ? "/editschool.php?SCID=" . $_POST["scid"] : "/admin.php");
        }

	$previous = dbQuery_new($conn, "SELECT * FROM school_info WHERE team_name = :teamname AND town = :town ",
                                ["teamname" => $_POST["teamname"], "town" => $_POST["town"]]);
        if(!empty($previous)) {
                popupAlert("Whoops! A school in the same town with the same team name already exists.");
                redirectTo("/addschool.php");
        }

        dbQuery_new($conn,
            "INSERT INTO school_info SET
             team_name=:teamname,
             town=:town", [
                 "teamname" => $_POST["teamname"],
                 "town" => $_POST["town"]
             ]
        );

        foreach(preg_split(";", $_POST["students"]) as $a) {
                dbQuery_new($conn, "INSERT INTO mathlete_info SET SCID=:scid, name=:name", [
                        "scid" => $scid,
                        "name" => $a
                ]);
        }

	if($cid)
        	updateCompStatusAll($conn, $cid);

	redirectTo("/create.php");

    }
    else {

	$returncid = 0;
	if(isset($_GET["returnCID"]))
		$returncid = $_GET["returnCID"];

	render("add_form.php", ["fullname" => getFullName($conn), "returncid" => $returncid]);
    }

?>

