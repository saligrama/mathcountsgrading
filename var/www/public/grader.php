<?php

        require(dirname(__FILE__) . "/../includes/functions.php");

        checkSession('grader');

	$conn = dbConnect_new();

        $result = dbQuery_new($conn, "SELECT team_name, SCID FROM school_info");

        $gschool = array_pop(dbQuery_new($conn, "SELECT SCID FROM user WHERE UID = :UID", ["UID" => $_SESSION["UID"]]));

	render("grader_form.php", ["result" => $result, "gschool" => $gschool["SCID"]]);

?>
