<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    $result = dbQuery_new($conn, "SELECT * FROM competition;");
    if(empty($result))
	$result = 0;

    $comprow = getCurrentComp($conn);

    $compstatus = 0;

    $rounds = 0;
    $students = 0;
    $schools = 0;

    if(isset($_GET["setComp"]))
    {
        if($_GET["setComp"] == 0)
        {
            $comprow = 0;
            dbQuery_new($conn, "DELETE FROM current_competition;");
        }
        else
        {
	    $cid = intval($_GET["setComp"]);

            $exists = dbQuery_new($conn, "SELECT * FROM competition WHERE CID=:cid;", ["cid" => $cid]);

            if(!empty($exists))
            {
		if($comprow == 0)
			dbQuery_new($conn, "INSERT INTO current_competition SET CID=:cid", ["cid" => $cid]);
		else
                    dbQuery_new($conn, "UPDATE current_competition SET CID=:cid;", ["cid" => $cid]);

		$comprow = $cid;
	    }
        }
    }

    if($comprow != 0)
    {
	$comprow = dbQuery_new($conn, "SELECT * FROM competition WHERE CID = :CID;", ["CID" => $comprow]);

	if (!empty($comprow))
	{
		$comprow = $comprow[0];

		$compstatus = dbQuery_new($conn, "SELECT * FROM round WHERE CTID=:ctid", ["ctid" => $comprow["CTID"]]);

		if(empty($compstatus))
		    $compstatus = 0;

		$students = dbQuery_new($conn, "SELECT mathlete_info.*, student_participants.type FROM mathlete_info INNER JOIN student_participants ON mathlete_info.SID = student_participants.SID WHERE student_participants.CID=:cid ORDER BY SCID", ["cid" => $comprow["CID"]]);

		$schools = dbQuery_new($conn, "SELECT * FROM school_info WHERE SCID IN (SELECT SCID FROM competition_participants WHERE CID=:cid)", ["cid" => $comprow["CID"]]);
	}
	else
	{
		$comprow = 0;
	}

    }

    render("admin_form.php", ["result" => $result, "comprow" => $comprow, "compstatus" => $compstatus, "fullname" => getFullName($conn), "students" => $students, "schools" => $schools]);

?>

