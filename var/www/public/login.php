<?php

require("../includes/functions.php");

$error = 0;

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

	$passwd = $name = "";
        $passwd = htmlspecialchars($_POST["passwd"]);

	$name = htmlspecialchars($_POST["logname"]);

	if(!$passwd || !$name || $passwd == "" || $name == "") {
		$error = 1;
	}

	else {
		$conn = dbConnect_new();

		$result = dbQuery_new($conn, "SELECT UID, password, type FROM user WHERE email = :name", ["name" => $name]);

		if(empty($result)) {
			$error = 2;
			render("login_form.php", ["error" => $error]);
			exit;
		}

		foreach($result as $row) {

			if(!password_verify($passwd, $row['password'])) {
				$error = 2;
				render("login_form.php", ["error" => $error]);
				exit;
			}

			session_start();
			$_SESSION['UID'] = $row['UID'];
			$_SESSION['type'] = $row['type'];
			$_SESSION['starttime'] = time();

		}

		switch ($_SESSION['type'])
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
