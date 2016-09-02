<?php

        require(dirname(__FILE__) . "/../includes/functions.php");

        checkSession('grader');

	$conn = dbConnect_new();

	if($_SERVER["REQUEST_METHOD"] == "POST")
     	{
		if(isset($_POST["goptsubmit"]))
		{
			if(!isset($_POST["School"]) || !isset($_POST["Sheet_Type"]))
				internalErrorRedirect("/grader.php");

        		$studentrows = dbQuery_new($conn, "SELECT * FROM mathlete_info WHERE SCID = :school;", ["school" => $_POST["School"]]);
			if(empty($studentrows)) {
				popupAlert("This school doesn't have any students yet.");
				redirectTo("/grader.php");
			}

			render("grade_form.php", ["studentrows" => $studentrows, "sheet_type" => $_POST["Sheet_Type"], "fullname" => getFullName($conn)]);
		}
		elseif(isset($_POST["gradesubmit"]))
		{
			if(!isset($_POST["numquestions"]))
				internalErrorRedirect("/grader.php");

			for($i = 1; $i <= intval($_POST["numquestions"]); $i++)
				if(!isset($_POST[$i . "question"]))
					internalErrorRedirect("/grader.php");



			// parser grading stuff here



			popupAlert("Your input has been scored successfully!");
			redirectTo("/grader.php");
		}
		else
			redirectTo("/grader.php");
	}
	else
		redirectTo("/grader.php");

?>
