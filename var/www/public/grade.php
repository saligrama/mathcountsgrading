<?php

        require(dirname(__FILE__) . "/../includes/functions.php");

        checkSession('grader');

	$conn = dbConnect_new();

	if($_SERVER["REQUEST_METHOD"] == "POST")
     	{
		// Coming from grader.php
		if(isset($_POST["goptsubmit"]))
		{
			if(!isset($_POST["School"]) || !isset($_POST["Round"]))
				internalErrorRedirect("/grader.php");

        		$studentrows = dbQuery_new($conn, "SELECT * FROM mathlete_info WHERE SCID = :school AND SID IN (SELECT SID FROM student_participants WHERE CID=:cid);", ["school" => $_POST["School"], "cid" => getCurrentComp($conn)]);
			if(empty($studentrows))
			{
				popupAlert("This school doesn't have any students yet.");
				redirectTo("/grader.php");
			}

			$school = dbQuery_new($conn, "SELECT SCID, team_name FROM school_info WHERE SCID=:school", ["school" => $_POST["School"]]);
			if(empty($school))
				internalErrorRedirect("/grader.php");

			$roundrow = dbQuery_new($conn, "SELECT * FROM round WHERE RNDID=:id", ["id" => $_POST["Round"]]);
			if(empty($roundrow))
				internalErrorRedirect("/grader.php");

			$roundrow = $roundrow[0];

			render("grade_form.php", ["studentrows" => $studentrows, "schoolrow" => $school[0], "roundrow" => $roundrow, "fullname" => getFullName($conn)]);
		}
		// Coming from grade.php
		elseif(isset($_POST["gradesubmit"]))
		{
			// sanity check
			if(!isset($_POST["numquestions"]) || !isset($_POST["round"]) || !isset($_POST["SCID"]))
				internalErrorRedirect("/grader.php");

			// Get round info
			$roundrow = dbQuery_new($conn, "SELECT * FROM round WHERE RNDID=:id", ["id" => $_POST["round"]]);
			if(empty($roundrow))
				internalErrorRedirect("/grader.php");
			$roundrow = $roundrow[0];

			if($roundrow["indiv"] == "1" && !isset($_POST["SID"]))
				internalErrorRedirect("/grader.php");

			// Get competition type info
			$typerow = dbQuery_new($conn, "SELECT * FROM competition_type WHERE CTID=:id", ["id" => $roundrow["CTID"]]);
			if(empty($typerow))
				internalErrorRedirect("/grader.php");
			$typerow = $typerow[0];

			// more sanity checks
			for($i = 1; $i <= intval($roundrow["num_questions"]); $i++)
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
			else if($roundrow["indiv"] == "1")
			{
				$valid = dbQuery_new($conn, "SELECT SID FROM student_participants WHERE CID=:cid AND SID=:sid", ["cid" => $cid, "sid" => $_POST["SID"]]);
				if(empty($valid))
					internalErrorRedirect("/grader.php");
			}

			// insert responses
			for($i = 1; $i <= intval($roundrow["num_questions"]); $i++)
			{
				/*$graded = dbQuery_new($conn, "SELECT * FROM student_cleaner WHERE SID=:sid", [
						"sid" => $_POST["SID"]
				]);*/

				$grader_responses = "grader_responses";
				$student_answers = "student_answers";
				$grading_conflicts = "grading_conflicts";
				$id = $roundrow["indiv"] == "0" ? ("SCID=" . $_POST["SCID"]) : ("SID=" . $_POST["SID"]);

				if($roundrow["indiv"] == "0")
				{
					$grader_responses = "grader_responses_team";
					$student_answers = "team_answers";
					$grading_conflicts = "grading_conflicts_team";
				}

				// sanity check
				$sexists = [];
				if($roundrow["indiv"] == "0")
					$sexists = dbQuery_new($conn, "SELECT SCID FROM school_info WHERE SCID=:scid", ["scid" => $_POST["SCID"]]);
				else
					$sexists = dbQuery_new($conn, "SELECT SID FROM mathlete_info WHERE SID=:sid", ["sid" => $_POST["SID"]]);
				if(empty($sexists))
					internalErrorRedirect("/grader.php");

				// Grader's response
				$answer = $_POST[$i . "question"];

				// other grader's (or admin's) responses
				$presponses = dbQuery_new($conn, "SELECT answer, UID FROM $grader_responses WHERE CID=:cid AND $id AND problem_number=:pn AND RNDID=:round", [
						"cid" => $cid,
                      	        	        "pn" => $i,
                               	                "round" => $roundrow["RNDID"]
				]);

				/*

				The response is automatically entered into the database.

				*/
				/*if($ut == "grader") {
					if(count($presponses) >= $typerow["num_graders_to_confirm"]) {
                                        	popupAlert("That student has already been graded!");
                                        	redirectTo("/grader.php");
                                	}

					for($k = 0; $k < count($presponses); $k++) {
						if($presponses[$k]["UID"] == $_SESSION["UID"]) {
							popupAlert("You can't grade this " . ($roundrow["indiv"] == "0" ? "school" : "student") . " twice.");
							redirectTo("/grader.php");
						}
					}
				}*/

				//if(count($presponses) < $typerow["num_graders_to_confirm"] || $ut == "admin")
				{
					$arr = [
						"cid" => $cid,
                                                "uid" => $_SESSION["UID"],
                                                "pn" => $i,
                                                "round" => $roundrow["RNDID"],
                                                "answer" => $answer
					];

					// enter response in database
					$exist = dbQuery_new($conn, "SELECT UID FROM $grader_responses WHERE CID=:cid AND UID=:uid AND $id AND problem_number=:pn AND RNDID=:round AND answer=:answer", $arr);
					if(empty($exist))
						dbQuery_new($conn, "INSERT INTO $grader_responses SET CID=:cid, UID=:uid, $id, problem_number=:pn, RNDID=:round, answer=:answer", $arr);

					// look for a conflict between graders
					$conflict = 0;
					for($j = 0; $j < count($presponses); $j++)
					{
						if(!compareAnswers($presponses[$j]["answer"], $answer))
						{
							//echo "conflict found\n";
							// If a conflict is found, put it in the database so the admin can see it and fix it from their homepage

							$array = [
								"cid" => $cid,
                                                               	"pn" => $i,
                                                               	"round" => $roundrow["RNDID"]
							];

							$exists = dbQuery_new($conn, "SELECT CID FROM $grading_conflicts WHERE CID=:cid AND $id AND problem_number=:pn AND RNDID=:round", $array);
							if(empty($exists))
								dbQuery_new($conn, "INSERT INTO $grading_conflicts SET CID=:cid, $id, problem_number=:pn, RNDID=:round", $array);

							// If there is a conflict, there shouldn't be a final answer for the problem and student
							dbQuery_new($conn, "DELETE FROM $student_answers WHERE CID=:cid AND $id AND problem_number=:pn AND RNDID=:round", [
									"cid" => $cid,
									"pn" => $i,
									"round" => $roundrow["RNDID"]
							]);

							$conflict = 1;
							break;
						}
					}

					// The student's final answer is only entered if an admin graded it (Admin's responses override the grader responses, but if the admin's response has a conflict with the grader response then it is still registered in the conflicts) or the correct number of graders have provided unconflicting responses
					if(!$conflict && ((count($presponses) > ($typerow["num_graders_to_confirm"] - 2)) || $ut == "admin"))
					{
						// Get the correct answer
						$key = dbQuery_new($conn, "SELECT answer FROM competition_answers WHERE CID=:cid AND problem_number=:pn AND RNDID=:round", [
								"cid" => $cid,
								"pn" => $i,
								"round" => $roundrow["RNDID"]
						]);
						if(empty($key))
							internalErrorRedirect("/grader.php");
						else
							$key = $key[0]["answer"];


						// Check if the entered answer is right
						$correct = compareAnswers($key, $answer);
						$points = $correct * $roundrow["points_per_question"];

						// Is there a final answer in the database already?
						$exists = dbQuery_new($conn, "SELECT CID FROM $student_answers WHERE CID=:cid AND $id AND problem_number=:pn AND RNDID=:round", [
								"cid" => $cid,
                                                        	"pn" => $i,
                                                		"round" => $roundrow["RNDID"]
						]);

						if(empty($exists))
						{
							// Insert it if it doesn't exist
							dbQuery_new($conn, "INSERT INTO $student_answers SET CID=:cid, $id, problem_number=:pn, RNDID=:round, answer=:answer, points=:points", [
									"cid" => $cid,
                                                        		"pn" => $i,
                                                        		"round" => $roundrow["RNDID"],
									"answer" => $answer,
									"points" => $points
							]);
						}
						else
						{
							dbQuery_new($conn, "UPDATE $student_answers SET answer=:answer, points=:points WHERE CID=:cid AND $id AND problem_number=:pn AND RNDID=:round", [
									"answer" => $answer,
									"points" => $points,
									"cid" => $cid,
                                                        		"pn" => $i,
                                                 		       	"round" => $roundrow["RNDID"]
							]);
						}
					}
				}
			}

			if($roundrow["indiv"] == "1")
				updateStudentScore($conn, $_POST["SID"], $cid, $roundrow["RNDID"]);

                        updateTeamScore($conn, $_POST["SCID"], $cid, $roundrow["RNDID"]);

			updateCompStatus($conn, $cid, $roundrow["RNDID"]);

			//popupAlert("Your input has been scored successfully!");
			//redirectTo("/grader.php");

			echo "done";
		}
		else
			redirectTo("/grader.php");
	}
	else
		redirectTo("/grader.php");

?>
