<!DOCTYPE html>

<head>

<title>Create admin user</title>

<script src="./scripts/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/select2.css">
<script src="./scripts/select2.full.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

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

.select2-results__option {
	text-overflow: ellipsis;
        overflow-x: hidden;
        white-space: nowrap;
}

</style>

<script type="text/javascript">

$(document).ready(function() {
  $(".js-select").select2({
	minimumResultsForSearch: 6
  });
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
	var username = document.getElementById("logname").value;

	if(username === "")
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

	var mes = "Are you sure you want to register an admin account with the username '";
	mes += document.getElementById("logname").value;
	mes += "'?";

	return confirm(mes);
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
        	<div class="panel-heading"><h4>Create the global admin user</h4></div>
		<div class="panel-body">
                        <div class="alert alert-info alert-dismissable col-sm-offset-0 col-sm-12">
                                Create the first administrator for use of this system. The account you create here will have access to all aspects of the grading, and it will be used for monitoring progress, examining the result of the competition (standings, etc.), and for giving access to graders by creating grader accounts.
                        </div>
			<form id="input_form" onsubmit="return checkSubmit();" action="" method="post">
                		<label for="logname">Username</label>
                		<input type="text" class="form-control" id="logname" name="logname" placeholder="username" autofocus required><br>

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
