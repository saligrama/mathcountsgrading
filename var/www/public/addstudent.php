<?php

require("../includes/functions.php");

checkSession("admin");

$conn = dbConnect_new();

if(!isset($_POST["scid"]) || !isset($_POST["firstname"]) || !isset($_POST["lastname"]) || !isset($_POST["nickname"]) ||
                           !isset($_POST["gender"]) || (sempty($_POST["firstname"]) && sempty($_POST["lastname"])))
{
	exit;
}
                        dbQuery_new($conn,
                                "INSERT INTO mathlete_info SET
                                SCID=:scid,
                                first_name=:firstname,
                                last_name=:lastname,
                                nickname=:nickname,
                                gender=:gender", [
                                        "scid" => $_POST["scid"],
                                        "firstname" => $_POST["firstname"],
                                        "lastname" => $_POST["lastname"],
                                        "nickname" => $_POST["nickname"],
                                        "gender" => $_POST["gender"]
                                ]
                        );

echo $conn->lastInsertId();

$cid = getCurrentComp($conn);

if($cid)
	updateCompStatusAll($conn, $cid);

?>
