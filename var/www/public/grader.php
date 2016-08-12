<?php

        require(dirname(__FILE__) . "/../includes/functions.php");

        checkSession('grader');

	$conn = dbConnect_new();

        $result = dbQuery_new($conn, "SELECT team_name, SCID FROM school_info");

	$result2 = dbQuery_new($conn, "SELECT SCID FROM user WHERE UID = :UID", ["UID" => $_SESSION["UID"]]);
	$gschool = array_pop($result2);

	if(!$gschool || $gschool == null)
		$gschool = 0;

	render("grader_form.php", ["result" => $result, "gschool" => $gschool["SCID"]]);

?>
