<!DOCTYPE html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login</title>

<style>

.main {
	margin-top: 10px;
}

.panel-heading {
	margin-left: -15px;
	margin-right: -15px;
}

.panel {
	max-width: 400px;
}

.form-control {
	max-width: 400px;
}

.inline_alert {
	margin-left: -5px;
}

</style>

</head>

<body>

<div class="container-fluid main">
	<div class="panel panel-default col-sm-offset-4 col-sm-4">
		<div class="panel-heading">User Login</div>
		<div class="panel-body">
			<form id="input_form" action="" method="post">
				<div class="form-group">
					<label for="logname">Email</label>
        				<input type="email" class="form-control" id="logname" name="logname" placeholder="email" autofocus>
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
			<button type="submit" class="btn btn-primary text-center" form="input_form">Login</button>
		</div>
	</div>
</div>

<?php phpinfo() ?>

</body>


</html>
