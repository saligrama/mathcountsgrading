<?php
	require("../includes/functions.php");

        checkSession('grader');

	$conn = dbConnect();

	if(!isset($_POST["goptsubmit"]))
                redirectTo('grader.php');

	$school = $_POST["School"];
        $studentrows = dbQuery($conn, "SELECT * FROM mathlete_info WHERE SCID = $school;");

        render("grade_form.php", ["studentrows" => $studentrows, "sheet_type" => $_POST["Sheet_Type"]]);
?>

