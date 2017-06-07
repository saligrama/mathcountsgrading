<?php

require("../includes/functions.php");

checkSession("admin");

if(isset($_POST["round"]))
	$_SESSION["grader_round"] = $_POST["round"];

if(isset($_POST["school"]))
	$_SESSION["grader_school"] = $_POST["school"];

?>
