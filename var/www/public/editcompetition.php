<?php

        require("../includes/functions.php");

	checkSession('admin');

	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["finalize"]))
	{
		$conn = dbConnect();

                $teamname = mysqli_real_escape_string($conn, $_POST["teamname"]);
                $town = mysqli_real_escape_string($conn, $_POST["town"]);
                $coach = mysqli_real_escape_string($conn, $_POST["coach"]);
                $address = mysqli_real_escape_string($conn, $_POST["address"]);
                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                $firstyear = (isset($_POST["firstyear"]) && $_POST["firstyear"] == "yes") ? 1 : 0;
		$SCID = $_POST["scid"];

                $query = "UPDATE school_info SET team_name='$teamname',town='$town',coach='$coach',address='$address',contact_email='$email',first_year='$firstyear' WHERE SCID = $SCID;";

		$result = mysqli_query($conn, $query);

		if ($result === false)
			echo ("Error editing school" . mysqli_error($conn));
		else
			redirectTo("/create.php");
	}
	else {
		$conn = dbConnect();

		if(!isset($_GET["CID"]))
			redirectTo("/admin.php");

		$cid = $_GET["CID"];

		$result = mysqli_query($conn, "SELECT * FROM competition WHERE CID=$cid;");
		$schoolrows = mysqli_query($conn, "SELECT * FROM school_info;");
		$participants = mysqli_query($conn, "SELECT * FROM school_info WHERE SCID IN (SELECT SCID FROM competition_participants WHERE CID=$cid);");

		if ($result === false || $schoolrows === false || $participants == false)
			echo "Error executing SQL statement: " . mysqli_error($conn);

		render("editcomp_form.php", ["result" => $result, "schoolrows" => $schoolrows, "participants" => $participants]);
	}

?>
