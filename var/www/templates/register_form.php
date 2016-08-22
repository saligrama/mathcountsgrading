<!DOCTYPE html>

<head>

<title>Add new user</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./select2/dist/css/select2.css">
<script src="./select2/dist/js/select2.full.js"></script>

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

.js-select {
        width: 100%;
}

</style>

<script type="text/javascript">

$(document).ready(function() {
  $(".js-select").select2();
});

</script>

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
	var passwd = document.getElementById("passwd").value;
	var confirmp = document.getElementById("confirm").value;
	var email = document.getElementById("logname").value;

	if(email === "")
        {
                alert("Please enter your email");
                return false;
        }

	if(passwd === "")
	{
		alert("Please enter a password");
		return false;
	}

	if(confirmp === "")
	{
		alert("Please confirm your password");
		return false;
	}

	if(passwd !== confirmp)
	{
		var div = document.createElement('div');

		div.innerHTML = "<div class='alert alert-danger alert-dismissable col-sm-offset-0 col-sm-12' role='alert'>\n" +
					"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>\n" +
    					"<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>\n" +
    					"<span class='sr-only'>Error:</span>\n" +
    					"Ahhh, Shucks. Those passwords don't match!\n" +
				"</div>\n";

		document.getElementById("input_form").appendChild(div);

		return false;
	}

	var mes = "Are you sure you want to register ";
	mes += (document.getElementById("schaf").value > 0) ? "a grader" : "an admin";
	mes += " account with the logname/email '";
	mes += document.getElementById("logname").value;
	mes += "'?";

	if(confirm(mes))
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
        	<div class="panel-heading"><h4>Register new user</h4></div>
		<div class="panel-body">
			<form id="input_form" onsubmit="return checkSubmit();" action="" method="post">
                		<label for="logname">Email</label>
                		<input type="email" class="form-control" id="logname" name="logname" placeholder="email" autofocus required><br>

				<label for"firstname">First name (optional)</label>
				<input type="text" class="form-control" id="firstname" name="firstname" placeholder="first name"><br>

				<label for="lastname">Last name (optional)</label>
				<input type="text" class="form-control" id="lastname" name="lastname" placeholder="last name"><br>

				<label for="schaf">School Affiliation</label>
                                <select id="schaf" name="schaf" class="js-select">
                                        <option value="0">None (admin)</option>
                                        <?php foreach($schoolrows as $row): ?>
                                                <option value='<?= $row["SCID"] ?>'><?php echo clean($row["team_name"]); ?></option>
                                        <?php endforeach; ?>
                                </select><br><br>

				<label for="passwd">Password</label>
                		<input type="password" oninput="checkConfirm();" class="form-control" name="passwd" id="passwd" placeholder="password" required><br>

				<label for="confirm">Confirm Password</label>
                		<div class="input-group">
					<input type="password" oninput="checkConfirm();" class="form-control" name="confirm" id="confirm" placeholder="confirm password" aria-describedby="check" required>
					<span class="input-group-addon" id="check">
						<span class="glyphicon glyphicon-remove" id="check-glyph" aria-hidden="true"></span>
					</span>
				</div><br>
			</form>
                </div>
		<div class="panel-footer">
			<div class="row">
				<a class="btn btn-danger col-xs-offset-1 col-xs-4" href="/admin.php">Cancel</a>
				<input type="submit" form="input_form" class="btn btn-success col-xs-offset-1 col-xs-5" id="submit" name="submit" value="Register">
			</div>
		</div>
	</div>
</div>
</body>

</html>
