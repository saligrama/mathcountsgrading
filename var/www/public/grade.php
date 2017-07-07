<?php

        require(dirname(__FILE__) . "/../includes/functions.php");

        checkSession('grader');

	$conn = dbConnect_new();

	$cid = getCurrentComp($conn);

                $studentrows = dbQuery_new($conn, "SELECT * FROM mathlete_info WHERE SID IN (SELECT SID FROM student_participants WHERE CID=:cid) ORDER BY CONCAT(first_name, last_name);", ["cid" => $cid]);
                if(empty($studentrows))
			$studentrows = 0;

		$schoolrows = dbQuery_new($conn, "SELECT * FROM school_info WHERE SCID IN (SELECt SCID FROM competition_participants WHERE CID=:cid) ORDER BY team_name;", ["cid" => $cid]);
		if(empty($schoolrows))
			$schoolrows = 0;

		$roundrows = dbQuery_new($conn, "SELECT * FROM round WHERE CTID IN (SELECT CTID FROM competition WHERE CID=:cid);", ["cid" => $cid]);
		if(empty($roundrows))
			$roundrows = 0;

		$typerow = dbQuery_new($conn, "SELECT * FROM competition_type WHERE CTID IN (SELECT CTID FROM competition WHERE CID=:cid);", ["cid" => $cid]);
		if(!empty($typerow))
			$typerow = $typerow[0];

		$scid = dbQuery_new($conn, "SELECT SCID FROM user WHERE UID=:uid", ["uid" => $_SESSION["UID"]]);
		if(empty($scid))
			$scid = 0;
		else
			$scid = $scid[0]["SCID"];

                render("grade_form.php", ["scid" => $scid, "typerow" => $typerow, "studentrows" => $studentrows, "schoolrows" => $schoolrows, "roundrows" => $roundrows, "fullname" => getFullName($conn)]);

?>
