<?php

        require("../includes/functions.php");

	checkSession('admin');

	$conn = dbConnect();

	$result = mysqli_query($conn, "SELECT * FROM school_info");

	render("create_form.php", ["title" => "Create competition", "result" => $result]);

?>

