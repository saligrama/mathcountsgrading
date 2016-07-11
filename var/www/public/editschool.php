<?php

        require("../includes/functions.php");

	checkSession('admin');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (isset($_POST["finalize"])) {

			$conn = dbConnect();

                        $teamname = mysqli_real_escape_string($conn, $_POST["teamname"]);
                        $town = mysqli_real_escape_string($conn, $_POST["town"]);
                        $coach = mysqli_real_escape_string($conn, $_POST["coach"]);
                        $address = mysqli_real_escape_string($conn, $_POST["address"]);
                        $email = mysqli_real_escape_string($conn, $_POST["email"]);
                        $firstyear = ($_POST["firstyear"] ? 1 : 0);
			$SCID = $_POST["scid"];

                        $query = "UPDATE school_info SET team_name='$teamname',town='$town',coach='$coach',address='$address',contact_email='$email',first_year='$firstyear' WHERE SCID = $SCID;";

			$result = mysqli_query($conn, $query);

			if ($result === false)
				echo ("Error editing school" . mysqli_error($conn));
			else
				redirectTo("/create.php");

		}

	}
	else {

		$conn = dbConnect();

		$scid = $_GET["SCID"];

		$query = "SELECT * FROM school_info WHERE SCID=$scid";

		$result = mysqli_query($conn, $query);

		if ($result === false)
			echo "Error executing SQL statement: " . mysqli_error($conn);

		render("edit_form.php", ["result" => $result]);

	}

?>
