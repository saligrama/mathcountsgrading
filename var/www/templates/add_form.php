<!DOCTYPE html>


<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Add school</title>

<style>

.panel {
	max-width: 500px;
}

.firsty {
	margin-left: 2px;
	margin-top: 3px;
}

.panel-heading {
	text-align: center;
}

.panel-heading h4 {
	font-weight: 600;
	font-size: 20px;
}

</style>

<script type="text/javascript">

function checkSubmit()
{
	var name = document.getElementById("teamname").value;

        if(name === "")
        {
                malert("Please fill out the school name");
                return false;
        }

	return true;
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
		<div class="panel-heading">
			<h4>Fill out the boxes below to create a new school</h4>
			<p>You can create students to add to this school by editing it later</p>
		</div>
        	<div class="panel-body">
			<form id="schoolinfo" onsubmit="return checkSubmit();" action="" method="post">
                		<div class="col-xs-offset-1 col-xs-10">
					<div class="row">
						<div class="form-group">
							<label for="teamname">Team name</label>
							<input id="teamname" type="text" class="form-control" name="teamname" placeholder="School Name" required>
                				</div>
					</div>
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<div class="row">
				<a class="btn btn-danger col-xs-offset-1 col-xs-3" href=<?= ($returncid == 0) ? "/create.php" : "/editcompetition.php?CID=$returncid" ?>>Back</a>
                		<input type="submit" class="btn btn-success col-xs-offset-1 col-xs-6" form="schoolinfo" name="createschool" value="Create school"></input>
			</div>
		</div>
	</div>
</div>
</body>

</html>

