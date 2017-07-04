<?php

require("../includes/functions.php");

checkSession("grader");

if(isset($_POST["rndid"]) && isset($_POST["sid"]) && isset($_POST["yes"]))
{
	$conn = dbConnect_new();

	$cid = getCurrentComp($conn);

	$row = dbQuery_new($conn, "SELECT * FROM student_participants WHERE SID=:sid AND CID=:cid", ["sid" => $_POST["sid"], "cid" => $cid]);
	if(empty($row))
		exit;

	$row = $row[0];

	if(($row["type"] == "regular" && $_POST["yes"] == "false") || ($row["type"] == "alternate" && $_POST["yes"] == "true"))
	{
		dbQuery_new($conn, "INSERT INTO regular_overrides SET CID=:cid, SID=:sid, RNDID=:rndid, type=:type", [
				"cid" => $cid,
				"sid" => $_POST["sid"],
				"rndid" => $_POST["rndid"],
				"type" => $_POST["yes"] == "true" ? "regular" : "alternate"
		]);
	}
	else
	{
		dbQuery_new($conn, "DELETE FROM regular_overrides WHERE CID=:cid AND SID=:sid AND RNDID=:rndid", [
				"cid" => $cid,
				"sid" => $_POST["sid"],
				"rndid" => $_POST["rndid"]
		]);
	}

	echo "success";
}

?>
