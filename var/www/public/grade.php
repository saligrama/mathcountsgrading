<?php

        require(dirname(__FILE__) . "/../includes/functions.php");

        checkSession('grader');

	$conn = dbConnect_new();

	if(!isset($_POST["goptsubmit"]))
                redirectTo('grader.php');

        $studentrows = dbQuery_new($conn, "SELECT * FROM mathlete_info WHERE SCID = :school;", ["school" => $_POST["School"]]);

        render("grade_form.php", ["studentrows" => $studentrows, "sheet_type" => $_POST["Sheet_Type"]]);
?>
