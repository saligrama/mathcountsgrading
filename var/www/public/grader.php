<?php

        require("../includes/functions.php");

	checkSession('grader');

	$conn = dbConnect();

        $result = dbQuery($conn, "SELECT team_name, SCID FROM school_info");
	$gschool = mysqli_fetch_assoc(dbQuery($conn, "SELECT SCID FROM user WHERE UID = " . $_SESSION['UID'] . ";"));

	render("grader_form.php", ["result" => $result, "gschool" => $gschool["SCID"]]);

?>

