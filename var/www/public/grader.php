<?php

        require(dirname(__FILE__) . "/../includes/functions.php");

        checkSession('grader');

	$conn = dbConnect_new();

	$schoolinfo = $currentcomp = 0;

	$currentcomp = dbQuery_new($conn, "SELECT * FROM current_competition");
	if(empty($currentcomp))
		$currentcomp = 0;
	else {
		$currentcomp = $currentcomp[0]["CID"];

		$exists = dbQuery_new($conn, "SELECT * FROM competition WHERE CID = :cid", ["cid" => $currentcomp]);
		if(empty($exists))
			$currentcomp = 0;
		else {
			$schoolinfo = dbQuery_new($conn, "SELECT team_name, SCID FROM school_info WHERE SCID IN (SELECT SCID FROM competition_participants WHERE CID = :cid)", [
								"cid" => $currentcomp
						]);

        		if(empty($schoolinfo))
                		$schoolinfo = 0;
		}
	}

	$result = dbQuery_new($conn, "SELECT SCID FROM user WHERE UID = :UID", ["UID" => $_SESSION["UID"]]);
	$gschool = 0;
	if(empty($result))
		internalErrorRedirect("/grader.php");
	else
		$gschool = $result[0]["SCID"];


	render("grader_form.php", ["schoolinfo" => $schoolinfo, "currentcomp" => $currentcomp, "gschool" => $gschool, "fullname" => getFullName($conn)]);

?>
