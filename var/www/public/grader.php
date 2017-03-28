<?php

        require(dirname(__FILE__) . "/../includes/functions.php");

        checkSession('grader');

	$conn = dbConnect_new();

	$currentcomp = getCurrentComp($conn);
	$schoolinfo = 0;
	$rtypes = 0;

	if($currentcomp !== 0)
	{
		$schoolinfo = dbQuery_new($conn, "SELECT team_name, SCID FROM school_info WHERE SCID IN (SELECT SCID FROM competition_participants WHERE CID = :cid)", [
        			"cid" => $currentcomp
        	]);

        	if(empty($schoolinfo))
        		$schoolinfo = 0;


		$rtypes = dbQuery_new($conn, "SELECT RNDID, round_name FROM round WHERE CTID IN (SELECT CTID FROM competition WHERE CID=:cid)", ["cid" => $currentcomp]);
		if(empty($rtypes))
			$rtypes = 0;
	}

	$result = dbQuery_new($conn, "SELECT SCID FROM user WHERE UID = :UID", ["UID" => $_SESSION["UID"]]);
	$gschool = 0;
	if(empty($result))
		internalErrorRedirect("/grader.php");
	else
		$gschool = $result[0]["SCID"];


	render("grader_form.php", ["schoolinfo" => $schoolinfo, "currentcomp" => $currentcomp, "gschool" => $gschool, "fullname" => getFullName($conn), "roundtypes" => $rtypes]);

?>
