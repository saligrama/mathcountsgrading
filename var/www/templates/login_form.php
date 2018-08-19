<!DOCTYPE html>

<script src="./scripts/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login</title>

<style>

.form-control {
	max-width: 400px;
}

.inline_alert {
	margin-left: -5px;
}

.panel {
	max-width: 380px;
}

</style>

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
<div class="main">
	<div class="container-fluid panel panel-default">
		<div class="panel-heading">User Login</div>
		<div class="panel-body">
			<form id="input_form" action="" method="post">
				<div class="form-group">
					<label for="logname">Username</label>
        				<input type="text" class="form-control" id="logname" name="logname" placeholder="email" autofocus>
				</div>
				<div class="form-group">
					<label for="passwd">Password</label>
					<input type="password" class="form-control" name="passwd" id="passwd" placeholder="password">
				</div>
			</form>
			<div class="row inline_alert">
				<?php
				if($error) {
					if($error > 1)
						inlineAlert(0, 12, " Wrong email or password");
					else
						inlineAlert(0, 12, " Please enter an email and password");
				}
				?>
			</div>
		</div>
		<div class="panel-footer">
			<button type="submit" name="login" class="btn btn-primary text-center" form="input_form">Login</button>
		</div>
	</div>
</div>

</body>


</html>
