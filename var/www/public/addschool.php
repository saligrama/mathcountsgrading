<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    $cid = getCurrentComp($conn);

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createschool"])) {

	if(!isset($_POST["teamname"]) || sempty($_POST["teamname"]))
	{
        	internalErrorRedirect(isset($_POST["scid"]) ? "/editschool.php?SCID=" . $_POST["scid"] : "/admin.php");
        }

	$previous = dbQuery_new($conn, "SELECT * FROM school_info WHERE team_name = :teamname;",
                                ["teamname" => $_POST["teamname"]]);
        if(!empty($previous)) {
                popupAlert("Whoops! A school with the same team name already exists.");
                redirectTo("/addschool.php");
        }

        dbQuery_new($conn,
            "INSERT INTO school_info SET
             team_name=:teamname;", [
                 "teamname" => $_POST["teamname"]
             ]

        );

	if($cid)
        	updateCompStatusAll($conn, $cid);

	//popupAlert("Success! school created");
	redirectTo("/create.php");

    }
    else {

	$returncid = 0;
	if(isset($_GET["returnCID"]))
		$returncid = $_GET["returnCID"];

	render("add_form.php", ["fullname" => getFullName($conn), "returncid" => $returncid]);
    }

?>

