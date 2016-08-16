<!DOCTYPE html>


<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<title>Add school</title>

<style>

.panel {
	max-width: 540px;
}

.firsty {
	margin-left: 2px;
	margin-top: 3px;
}

</style>

<script type="text/javascript">

function checkSubmit()
{
	var mes = "Are you sure you want to create a school with team name '";
	mes += document.getElementById("teamname").value;
	mes += "' from the town '";
	mes += document.getElementById("town").value;
	mes += "'?";

	if(confirm(mes))
		return true;

	return false;
}

</script>

</head>

<body>
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
<div class="main">
	<div class="container-fluid panel panel-primary">
		<div class="panel-heading"><h4>Fill out the boxes below to create a new school</h4></div>
        	<div class="panel-body">
			<form id="schoolinfo" onsubmit="return checkSubmit();" action="" method="post">
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
							<label><input type="checkbox" name="firstyear" value="yes"><p class="firsty"><strong>First Year?</strong></p></input></label>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<div class="row">
				<a class="btn btn-danger col-xs-offset-1 col-xs-3" href="/create.php">Back</a>
                		<input type="submit" class="btn btn-success col-xs-offset-1 col-xs-6" form="schoolinfo" name="createschool" value="Create school"></input>
			</div>
		</div>
	</div>
</div>
</body>

</html>

