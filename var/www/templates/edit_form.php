<!DOCTYPE html>

<?php $row = $result[0] ?>

<head>

<title>Welcome</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<style>

.panel {
	max-width: 540px;
}

.firsty {
        margin-left: 2px;
        margin-top: 3px;
}

.btmbtn {
	margin-bottom: 5px;
	margin-top: 5px;
}

.btmrow {
	margin-bottom: -5px;
	margin-top: -5px;
}

</style>

<script type="text/javascript">

function checkSubmit()
{
        var name = document.getElementById("teamname").value;
        var town = document.getElementById("town").value;
        var address = document.getElementById("address").value;
        var coach = document.getElementById("coach").value;
        var email = document.getElementById("email").value;

        if(name == null || name == "")
        {
                malert("Please fill out the school name");
                return false;
        }

        if(town == null || town == "")
        {
                malert("Please fill out the school town");
                return false;
        }

        if(address == null || address == "")
        {
                malert("Please fill out the school address");
                return false;
        }

        if(coach == null || coach == "")
        {
                malert("Please fill out the school coach");
                return false;
        }

        if(email == null || email == "")
        {
                malert("Please fill out the school email");
                return false;
        }

        if(confirm("Are you sure you want to finalize the changes?"))
                return true;

        return false;
}

/*function checkDiff()
{
	if(document.getElementById("teamname").value != "<?php echo clean($row['team_name']); ?>" ||
	   document.getElementById("town").value != "<?php echo clean($row['town']); ?>" ||
	   document.getElementById("address").value != "<?php echo clean($row['address']); ?>" ||
	   document.getElementById("coach").value != "<?php echo clean($row['coach']); ?>" ||
	   document.getElementById("email").value != "<?php echo clean($row['contact_email']); ?>" ||
	   (document.getElementById("firstyear").checked ? 1 : 0) != "<?php echo clean($row['first_year']); ?>")
	{
		document.getElementById("finalizebtn").disabled = false;
	}
	else
	{
		document.getElementById("finalizebtn").disabled = true;
	}
}*/

function deleteSchool()
{
	if(confirm("Are you sure you want to delete the team/school '" + "<?php echo clean($row['team_name']); ?>" + "'?"))
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
                <div class="panel-heading"><h4>Make any necessary changes to the boxes below</h4></div>
                <div class="panel-body">
                        <form id="schoolinfo" onsubmit="return checkSubmit();" action="" method="post">
                                <div class="col-xs-offset-1 col-xs-10">
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="teamname">Team name</label>
                                                                <input id="teamname" type="text" oninput="checkDiff()" class="form-control" name="teamname" placeholder="School Name" value="<?php echo clean($row['team_name']); ?>" required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="town">Town</label>
                                                                <input id="town" type="text" oninput="checkDiff()" class="form-control" name="town" placeholder="Town" value="<?php echo clean($row['town']); ?>" required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input id="address" type="text" oninput="checkDiff()" class="form-control" name="address" placeholder="School Address" value="<?php echo clean($row['address']); ?>" required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="coach">Coach</label>
                                                                <input id="coach" type="text" oninput="checkDiff()" class="form-control" name="coach" placeholder="Coach Name" value="<?php echo clean($row['coach']); ?>" required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input id="email" type="email" oninput="checkDiff()" class="form-control" name="email" placeholder="Contact Email" value="<?php echo clean($row['contact_email']); ?>" required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="checkbox">
                                                                <label><input id="firstyear" class="check" type="checkbox" onchange="checkDiff()" name="firstyear" value="yes" <?php echo ($row['first_year'] == 1 ? "checked" : ""); ?>><p class="firsty"><strong>First Year?</strong></p></label>
                                                        </div>
                                                </div>
        					<input type="hidden" name="scid" value="<?php echo clean($_GET['SCID']); ?>">
                                </div>
                        </form>
		</div>
		<div class="panel-footer">
                        <div class="btmrow row">
				<button id="finalizebtn" type="submit" class="btmbtn btn btn-success col-sm-offset-0 col-sm-4 col-xs-offset-2 col-xs-8" form="schoolinfo" name="finalize">Finalize changes</button>
                                <a class="btmbtn btn btn-danger col-xs-offset-1 col-xs-4 col-sm-offset-1 col-sm-2" href="/create.php">Back</a>
				<form onsubmit="return deleteSchool();" method="post" action="">
					<button class="btmbtn btn btn-danger col-sm-offset-1 col-xs-offset-1 col-xs-5 col-sm-4" name="delete" type="submit">Delete school</button>
					<input type="hidden" name="scid" value="<?php echo clean($_GET['SCID']); ?>">
				</form>
			</div>
                </div>
        </div>
</div>
</body>


</html>
