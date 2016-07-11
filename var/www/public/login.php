<?php

require("../includes/functions.php");

$error = 0;

if($_POST) {
	$passwd = $name = "";
        $passwd = htmlspecialchars($_POST["passwd"]);

	$name = htmlspecialchars($_POST["logname"]);

	if(!$passwd || !$name) {
		$error = 1;
	}
	else {
		$conn = dbConnect();

		$name = mysqli_real_escape_string($conn, $name);
		$passwd = mysqli_real_escape_string($conn, $passwd);

		$result = dbQuery($conn, "SELECT UID, password, type FROM user WHERE email = '$name';");
		if(mysqli_num_rows($result) != 1) {
			$error = 2;
			render("login_form.php", ["error" => $error]);
			exit;
		}

		$row = mysqli_fetch_assoc($result);
		if(!password_verify($passwd, $row['password'])) {
			$error = 2;
			render("login_form.php", ["error" => $error]);
			exit;
		}

		session_start();
		$_SESSION['UID'] = $row['UID'];
		$_SESSION['type'] = $row['type'];
		$_SESSION['starttime'] = time();


		switch ($row['type'])
		{
		case 'admin':
			redirectTo('admin.php');
			break;
		case 'grader':
			redirectTo('grader.php');
			break;
		default:
			endLoginSession();

			dieError('We\'re sorry, there was an internal error. Please try again');
		};

		echo "Success! Username and password matched\n";
	}
}

render("login_form.php", ["error" => $error]);

?>
