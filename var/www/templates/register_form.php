<!DOCTYPE html>

<head>

<title>Add new user</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<style>

.panel {
	max-width: 400px;
}

#check {
	background-color: #e74c3c;
}

.inline_alert {
        margin-left: -5px;
}

</style>

<script type="text/javascript">

function checkConfirm()
{
	var glyph = document.getElementById("check-glyph");
	var check = document.getElementById("check");

	if((document.getElementById("passwd").value == document.getElementById("confirm").value) &&
		(document.getElementById("passwd").value != "" && document.getElementById("confirm").value != ""))
	{
		check.style.backgroundColor = "#2ecc71";
		glyph.className = "glyphicon glyphicon-ok";
	}
	else
	{
		check.style.backgroundColor = "#e74c3c";
		glyph.className = "glyphicon glyphicon-remove";
	}
}

function checkSubmit()
{
	if(document.getElementById("passwd").value != document.getElementById("confirm").value)
	{
		var div = document.createElement('div');

		div.innerHTML = "<div class='alert alert-danger col-sm-offset-0 col-sm-12' role='alert'>\n" +
    					"<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>\n" +
    					"<span class='sr-only'>Error:</span>\n" +
    					"Ahhh, Shucks. Those passwords don't match!\n" +
				"</div>\n";

		document.getElementById("input_form").appendChild(div);

		return false;
	}

	$mes = "Are you sure you want to register a ";
	$mes += (document.getElementById("schaf").value > 0) ? "grader" : "admin";
	$mes += " account with the logname/email '";
	$mes += document.getElementById("logname").value;
	$mes += "'?";

	if(confirm($mes))
		return true;

	return false;
}

</script>

</head>


<body>
<?php if ($fullname !== 0): ?>
	<nav class="mnavbar">
        	<div class="mnavcontainer container">
                	<ul class="mnavlist">
                        	<li class="mnav-left"><a href="/admin.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
	                        <li class="mnav-left"><p class="mnav-text">Signed in as <strong><?php echo clean($fullname); ?></strong></p></li>
        	                <li class="mnav-right">
                	                <form method="post" onsubmit="return checkLogout();" action="/login.php">
                        	                <input class="mnav-logout" type="submit" name="logoutsubmit" value="Logout"></input>
                                	</form>
                        	</li>
	                        <li class="mnav-right"><a href="/editprofile.php">Edit Profile</a></li>
        	        </ul>
        	</div>
	</nav>
<?php endif; ?>
<div class="container-fluid main">
	<div class="container-fluid panel panel-default">
        	<div class="panel-heading"><h4>Register</h4></div>
		<div class="panel-body">
			<form id="input_form" onsubmit="return checkSubmit();" action="" method="post">
                		<label for="logname">Email</label>
                		<input type="email" class="form-control" id="logname" name="logname" placeholder="email" autofocus required><br>

				<label for"firstname">First name (optional)</label>
				<input type="text" class="form-control" id="firstname" name="firstname" placeholder="first name"><br>

				<label for="lastname">Last name (optional)</label>
				<input type="text" class="form-control" id="lastname" name="lastname" placeholder="last name"><br>

				<label for="passwd">Password</label>
                		<input type="password" oninput="checkConfirm();" class="form-control" name="passwd" id="passwd" placeholder="password" required><br>

				<label for="confirm">Confirm Password</label>
                		<div class="input-group">
					<input type="password" oninput="checkConfirm();" class="form-control" name="confirm" id="confirm" placeholder="confirm password" aria-describedby="check" required>
					<span class="input-group-addon" id="check">
						<span class="glyphicon glyphicon-remove" id="check-glyph" aria-hidden="true"></span>
					</span>
				</div><br>
				<label for="schaf">School Affiliation</label><br>
				<select class="col-xs-8" id="schaf" name="schaf" class="dropdown"><br>
                                        <option value="0">None (admin)</option>
                                        <?php foreach($schoolrows as $row): ?>
                                                <option value='<?= $row["SCID"] ?>'><?php echo clean($row["team_name"]); ?></option>
                                        <?php endforeach; ?>
                                </select><br><br>
			</form>
                </div>
		<div class="panel-footer">
			<div class="row">
				<input type="submit" form="input_form" class="btn btn-primary text-center col-xs-offset-4 col-xs-4" id="submit" name="submit" value="Register">
			</div>
		</div>
	</div>
</div>
</body>

</html>
