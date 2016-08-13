<!DOCTYPE html>


<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="./styles/mnavbar.css">

<title>Add school</title>

<style>

.main {
	margin-top: 10px;
}

.panel-heading {
	margin-left: -15px;
	margin-right: -15px;
}

.btn {
	margin-bottom: 10px;
}

.row {
	margin-top: -5px;
}

</style>

<script type="text/javascript">

function checkLogout()
{
        if(confirm("Are you sure you want to logout?"))
                return true;
        else
                return false;
}

</script>

</head>

<body>
<nav class="mnavbar">
        <div class="mnavcontainer container">
                <ul class="mnavlist">
                        <li class="mnav-left"><a href="/admin.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
                        <li class="mnav-left"><p class="mnav-text">Signed in as <strong><?= $fullname ?></strong></p></li>
                        <li class="mnav-right">
                                <form method="post" onsubmit="return checkLogout();" action="/login.php">
                                        <input class="mnav-logout" type="submit" name="logoutsubmit" value="Logout"></input>
                                </form>
                        </li>
                        <li class="mnav-right"><a href="/editprofile.php">Edit Profile</a></li>
                </ul>
        </div>
</nav>
<div class="container-fluid main">
	<div class="panel panel-primary col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10">
		<div class="panel-heading"><h4>Fill out the boxes below to create a new school</h4></div>
        	<div class="panel-body">
			<form id="schoolinfo" action="" method="post">
                		<div class="col-xs-offset-1 col-xs-10">
					<div class="row">
						<div class="form-group">
							<label for="teamname">Team name</label>
							<input id="teamname" type="text" class="form-control" name="teamname" placeholder="School Name" required>
                				</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="town">Town</label>
							<input id="town" type="text" class="form-control" name="town" placeholder="Town" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="address">Address</label>
							<input id="address" type="text" class="form-control" name="address" placeholder="School Address" required>
                				</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="coach">Coach</label>
							<input id="coach" type="text" class="form-control" name="coach" placeholder="Coach Name" required>
                				</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="email">Email</label>
							<input id="email" type="email" class="form-control" name="email" placeholder="Contact Email">
                				</div>
					</div>
					<div class="row">
						<div class="checkbox">
							<label><input type="checkbox" name="firstyear" value="yes"><strong>First Year?</strong></label>
						</div>
					</div>
					<br>
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<div class="row">
				<a class="btn btn-danger col-xs-3 col-xs-offset-1" href="/create.php">Back</a>
                		<button type="submit" class="btn btn-primary col-xs-offset-1 col-xs-6" form="schoolinfo" name="createschool">Create school</button>
			</div>
		</div>
	</div>
</div>
</body>

</html>

