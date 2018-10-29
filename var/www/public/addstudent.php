<?php

require("../includes/functions.php");

checkSession("admin");

$conn = dbConnect_new();

if(!isset($_POST["scid"]) || !isset($_POST["name"]) || sempty($_POST["name"]))
{
	exit;
}
                        dbQuery_new($conn,
                                "INSERT INTO mathlete_info SET
                                SCID=:scid,
                                name=:name", [
                                        "scid" => $_POST["scid"],
                                        "name" => $_POST["name"]
                                ]
                        );

echo $conn->lastInsertId();

$cid = getCurrentComp($conn);

if($cid)
	updateCompStatusAll($conn, $cid);

?>
