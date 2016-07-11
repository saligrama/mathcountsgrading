<?php

        require("../includes/functions.php");

	checkSession('admin');

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (isset($_POST["createschool"])) {
			
			$conn = dbConnect();

                        $teamname = mysqli_real_escape_string($conn, $_POST["teamname"]);
                        $town = mysqli_real_escape_string($conn, $_POST["town"]);
                        $coach = mysqli_real_escape_string($conn, $_POST["coach"]);
                        $address = mysqli_real_escape_string($conn, $_POST["address"]);
                        $email = mysqli_real_escape_string($conn, $_POST["email"]);
                        $firstyear = $_POST["firstyear"] ? 1 : 0;

                        $query = "INSERT INTO school_info SET team_name='$teamname',town='$town',coach='$coach',address='$address',contact_email='$email',first_year='$firstyear';";

			$result = mysqli_query($conn, $query);

			if ($result === false) {
				
				echo ("Error adding school" . mysqli_error($conn));

			}

		}

	}
	else {

		render("add_form.php");

	}

?>
