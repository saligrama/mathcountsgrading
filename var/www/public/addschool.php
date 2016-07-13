<?php

        require("../includes/functions.php");

	checkSession('admin');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if ($_POST) {

			$conn = dbConnect();

                        $teamname = mysqli_real_escape_string($conn, $_POST["teamname"]);
                        $town = mysqli_real_escape_string($conn, $_POST["town"]);
                        $coach = mysqli_real_escape_string($conn, $_POST["coach"]);
                        $address = mysqli_real_escape_string($conn, $_POST["address"]);
                        $email = mysqli_real_escape_string($conn, $_POST["email"]);
                        $firstyear = (isset($_POST["firstyear"]) && $_POST["firstyear"] == "yes") ? 1 : 0;

                        dbQuery($conn, "INSERT INTO school_info SET team_name='$teamname',town='$town',coach='$coach',address='$address',contact_email='$email',first_year='$firstyear';");

			redirectTo("admin.php");
		}
		else {
			render("add_form.php");
		}

	}
	else {

		render("add_form.php");

	}

?>
