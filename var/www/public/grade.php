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

        		$studentrows = dbQuery_new($conn, "SELECT * FROM mathlete_info WHERE SCID = :school AND SID IN (SELECT SID FROM student_participants WHERE CID=:cid);", ["school" => $_POST["School"], "cid" => getCurrentComp($conn)]);
			if(empty($studentrows)) {
				popupAlert("This school doesn't have any students yet.");
				redirectTo("/grader.php");
			}

			$school = dbQuery_new($conn, "SELECT SCID, team_name FROM school_info WHERE SCID=:school", ["school" => $_POST["School"]]);
			if(empty($school))
				internalErrorRedirect("/grader.php");

			render("grade_form.php", ["studentrows" => $studentrows, "schoolrow" => $school[0], "sheet_type" => $_POST["Sheet_Type"], "fullname" => getFullName($conn)]);
		}
		elseif(isset($_POST["gradesubmit"]))
		{
			// sanity check
			if(!isset($_POST["numquestions"]) || !isset($_POST["round"]) || !isset($_POST["SCID"]) || ($_POST["round"] != "team" && !isset($_POST["SID"])))
				internalErrorRedirect("/grader.php");

			// more sanity checks
			for($i = 1; $i <= intval($_POST["numquestions"]); $i++)
				if(!isset($_POST[$i . "question"]))
					internalErrorRedirect("/grader.php");

			// user type
			$ut = dbQuery_new($conn, "SELECT type FROM user WHERE UID=:uid", ["uid" => $_SESSION["UID"]]);
			if(empty($ut))
				internalErrorRedirect("/grader.php");
			else
				$ut = $ut[0]["type"];

			$cid = getCurrentComp($conn);
			if($cid === 0)
				internalErrorRedirect("/grader.php");

			$valid = dbQuery_new($conn, "SELECT SCID FROM competition_participants WHERE CID=:cid AND SCID=:scid", ["cid" => $cid, "scid" => $_POST["SCID"]]);
			if(empty($valid))
				internalErrorRedirect("/grader.php");
			else if($_POST["round"] != "team")
			{
				$valid = dbQuery_new($conn, "SELECT SID FROM student_participants WHERE CID=:cid AND SID=:sid", ["cid" => $cid, "sid" => $_POST["SID"]]);
				if(empty($valid))
					internalErrorRedirect("/grader.php");
			}

			// insert responses
			for($i = 1; $i <= intval($_POST["numquestions"]); $i++)
			{
				/*$graded = dbQuery_new($conn, "SELECT * FROM student_cleaner WHERE SID=:sid", [
						"sid" => $_POST["SID"]
				]);*/

				$grader_responses = "grader_responses";
				$student_answers = "student_answers";
				$grading_conflicts = "grading_conflicts";
				$id = $_POST["round"] == "team" ? ("SCID=" . $_POST["SCID"]) : ("SID=" . $_POST["SID"]);

				if($_POST["round"] == "team")
				{
					$grader_responses = "grader_responses_team";
					$student_answers = "team_answers";
					$grading_conflicts = "grading_conflicts_team";
				}

				// sanity check
				$sexists = [];
				if($_POST["round"] == "team")
					$sexists = dbQuery_new($conn, "SELECT SCID FROM school_info WHERE SCID=:scid", ["scid" => $_POST["SCID"]]);
				else
					$sexists = dbQuery_new($conn, "SELECT SID FROM mathlete_info WHERE SID=:sid", ["sid" => $_POST["SID"]]);
				if(empty($sexists))
					internalErrorRedirect("/grader.php");

				$answer = $_POST[$i . "question"];

				// other grader's (or admin's) responses
				$presponses = dbQuery_new($conn, "SELECT answer, UID FROM $grader_responses WHERE CID=:cid AND $id AND problem_number=:pn AND problem_type=:round", [
						"cid" => $cid,
                      	        	        "pn" => $i,
                               	                "round" => $_POST["round"]
				]);

				/*

				The admin's response is automatically entered into the database.
				As for the grader, their response is only recorded if the question hasn't
				already been graded twice.

				*/
				if(count($presponses) > 1 && $ut == "grader") {
					popupAlert("That student has already been graded!");
					redirectTo("/grader.php");
				}
				else if(count($presponses) == 1 && $presponses[0]["UID"] == $_SESSION["UID"] && $ut == "grader") {
					popupAlert("You can't grade this " . ($_POST["round"] == "team" ? "school" : "student") . " twice.");
					redirectTo("/grader.php");
				}
				else if(count($presponses) < 2 || $ut == "admin")
				{
					$arr = [
						"cid" => $cid,
                                                "uid" => $_SESSION["UID"],
                                                "pn" => $i,
                                                "round" => $_POST["round"],
                                                "answer" => $answer
					];

					// enter response in database
					$exist = dbQuery_new($conn, "SELECT UID FROM $grader_responses WHERE CID=:cid AND UID=:uid AND $id AND problem_number=:pn AND problem_type=:round AND answer=:answer", $arr);
					if(empty($exist))
						dbQuery_new($conn, "INSERT INTO $grader_responses SET CID=:cid, UID=:uid, $id, problem_number=:pn, problem_type=:round, answer=:answer", $arr);

					// look for a conflict between graders
					$conflict = 0;
					for($j = 0; $j < count($presponses); $j++)
					{
						if(!compareAnswers($presponses[$j]["answer"], $answer))
						{
							// If a conflict is found, put it in the database so the admin can see it and fix it from their homepage

							$array = [
								"cid" => $cid,
                                                               	"pn" => $i,
                                                               	"round" => $_POST["round"]
							];

							$exists = dbQuery_new($conn, "SELECT CID FROM $grading_conflicts WHERE CID=:cid AND $id AND problem_number=:pn AND problem_type=:round", $array);
							if(empty($exists))
								dbQuery_new($conn, "INSERT INTO $grading_conflicts SET CID=:cid, $id, problem_number=:pn, problem_type=:round", $array);

							// If there is a conflict, there shouldn't be a final answer for the problem and student
							dbQuery_new($conn, "DELETE FROM $student_answers WHERE CID=:cid AND $id AND problem_number=:pn AND problem_type=:round", [
									"cid" => $cid,
									"pn" => $i,
									"round" => $_POST["round"]
							]);

							$conflict = 1;
							break;
						}
					}

					if(!$conflict && (count($presponses) > 0 || $ut == "admin"))
					{
						// Get the correct answer
						$key = dbQuery_new($conn, "SELECT answer FROM competition_answers WHERE CID=:cid AND problem_number=:pn AND problem_type=:round", [
								"cid" => $cid,
								"pn" => $i,
								"round" => $_POST["round"]
						]);
						if(empty($key))
							internalErrorRedirect("/grader.php");
						else
							$key = $key[0]["answer"];


						// Check if the entered answer is right
						$correct = compareAnswers($key, $answer);
						$points = $correct * ($_POST["round"] == "sprint" ? 1 : 2);

						// Is there a final answer in the database already?
						$exists = dbQuery_new($conn, "SELECT CID FROM $student_answers WHERE CID=:cid AND $id AND problem_number=:pn AND problem_type=:round", [
								"cid" => $cid,
                                                        	"pn" => $i,
                                                		"round" => $_POST["round"]
						]);

						if(empty($exists))
						{
							// Insert it if it doesn't exist
							dbQuery_new($conn, "INSERT INTO $student_answers SET CID=:cid, $id, problem_number=:pn, problem_type=:round, answer=:answer, points=:points", [
									"cid" => $cid,
                                                        		"pn" => $i,
                                                        		"round" => $_POST["round"],
									"answer" => $answer,
									"points" => $points
							]);
						}
						else
						{
							dbQuery_new($conn, "UPDATE $student_answers SET answer=:answer WHERE CID=:cid AND $id AND problem_number=:pn AND problem_type=:round", [
									"answer" => $answer,
									"cid" => $cid,
                                                        		"pn" => $i,
                                                 		       	"round" => $_POST["round"]
							]);
						}
					}
				}
			}

			if($_POST["round"] != "team")
				updateStudentScore($conn, $_POST["SID"], $cid, $_POST["round"]);

                        updateTeamScore($conn, $_POST["SCID"], $cid);

			updateCompStatus($conn, $cid);

			popupAlert("Your input has been scored successfully!");
			redirectTo("/grader.php");
		}
		else
			redirectTo("/grader.php");
	}
	else
		redirectTo("/grader.php");

?>
