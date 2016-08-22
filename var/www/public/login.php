<?php

require(dirname(__FILE__) . "/../includes/functions.php");

$error = 0;

session_start();

/*if(isset($_SESSION['UID'])) {
	switch($_SESSION['type'])
	{
	case 'admin':
		redirectTo('admin.php');
		break;
	case 'grader':
		redirectTo('grader.php');
		break;
	default:
		popupAlert("We're sorry, there was an internal error. Please log back in");
		endLoginSession();
	};
}*/

$conn = dbConnect_new();

if(empty(dbQuery_new($conn, "SELECT * FROM user;")))
	redirectTo("register.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_POST["login"])) {

		$passwd = $name = "";
        	$passwd = $_POST["passwd"];

		$name = $_POST["logname"];

		if(sempty($passwd) || sempty($name)) {
			$error = 1;
		}

		else {
			$result = dbQuery_new($conn, "SELECT UID, password, type FROM user WHERE email = :name", ["name" => $name]);

			if(empty($result)) {
				$error = 2;
				render("login_form.php", ["error" => $error]);
				exit;
			}

			$row = $result[0];

			if(!password_verify($passwd, $row['password'])) {
				$error = 2;
				render("login_form.php", ["error" => $error, "fullname" => 0]);
				exit;
			}

			//session_start();
			$_SESSION['UID'] = $row['UID'];
			$_SESSION['type'] = $row['type'];
			$_SESSION['starttime'] = time();

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
	elseif(isset($_POST["logoutsubmit"])) {
		//session_start();
		endLoginSession();
	}
}

render("login_form.php", ["error" => $error, "fullname" => getFullName($conn)]);

?>
