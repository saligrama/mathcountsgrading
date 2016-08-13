<!DOCTYPE html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.min.css" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="./styles/mnavbar.css">

<head>

<title>Create new competition</title>

<style>

.main {
	padding-top: 10px;
	min-width: 550px;
	max-width: 930px;
}

.panel {
	max-width: 500px;
	margin-left: auto;
	margin-right: auto;
}

.panel-heading {
	margin-left: -15px;
	margin-right: -15px;
}

.btn-sm {
	padding: 3px;
	font-size: 12px;
	border-radius: 4px;
	margin-top: 10px;
}

.labelcheck {
	margin-top: 2px;
	margin-left: 2px;
}

.dropdown-menu {
	min-width: 300px;
}

</style>

<script type="text/javascript">

function checkSubmit()
{
	var date = document.getElementById("compdate").value;
	var name = document.getElementById("compname").value;

	if(date == null || date == "")
	{
		alert("Please fill out a date for the competition");
		return false;
	}

	if(name == null || name == "")
	{
		alert("Please fill out a name for the competition");
		return false;
	}

	var listItems = document.getElementById("schooldrop").getElementsByTagName("input");
	var numc = 0;

	for(var i = 0; i < listItems.length; i++)
	{
		if(listItems[i].checked)
			numc++;
	}

	if(numc < 2)
	{
		alert("Please select 2 or more schools to compete");
		return false;
	}

	var mes = "Are you sure you want to create a ";
	mes += document.getElementById("comptype").options[document.getElementById("comptype").selectedIndex].value;
	mes += " competition on the date ";
	mes += document.getElementById("compdate").value;
	mes += " with the name '";
	mes += document.getElementById("compname").value;
	mes += "'?";

	if(confirm(mes))
		return true;

	return false;
}

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
	<div class="container-fluid panel panel-primary">
		<div class="panel-heading"><h4>Create new competition</h4></div>
		<div class="panel-body">
			<form id="schools" onsubmit="return checkSubmit();" action="create.php" method="post">
        			<div class="col-xs-offset-2 col-xs-8">
					<div class="row">
						<div class="form-group">
							<label for="compdate">Competition Date</label>
							<input id="compdate" data-provide="datepicker" class="form-control input-group date datepicker" data-date-format="yyyy-mm-dd" name="compdate" placeholder="Date (yyyy-mm-dd)" value="<?php echo date('Y-m-d'); ?>" required>
        					</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="comptype">Competition Type</label>
							<div class="dropdown">
								<select name="comptype" id="comptype" class="col-xs-12">
									<option value="chapter">Chapter</option>
									<option value="state">State</option>
									<option value="national">National</option>
								</select>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="form-group">
							<label for="compname">Competition Name</label>
							<input type="text" class="form-control" name="compname" id="compname" placeholder="competition name" required>
						</div>
					</div><br>
					<div class="row">
						<div class="dropdown">
							<button id="schoolmenu" class="btn btn-default dropdown-toggle col-xs-12" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Select school(s)
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu container-fluid" id="schooldrop" aria-labelledby="schoolmenu">
        							<?php foreach($result as $row): ?>
									<li>
										<div class="row">
											<div class="checkbox col-xs-offset-1 col-xs-7">
												<label><input type="checkbox" id=<?= "check" . $row["SCID"] ?> name=<?= $row["SCID"] ?> value="On"><p class="labelcheck"><?= $row["team_name"] ?></p></label>
           	 									</div>
											<a class="btn btn-sm btn-success col-xs-2" href=<?php echo "/editschool.php?SCID=" . $row["SCID"]; ?>>Edit</a><br>
        									</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div><br>
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<div class="row">
				<a class="btn btn-danger col-xs-3" href="/admin.php">Cancel</a>
	        		<input type="submit" class="btn btn-success col-xs-4 col-xs-offset-1" value="Create" name="go" form="schools">
				<a class="btn btn-primary col-xs-offset-1 col-xs-3" href="/addschool.php">New school</a>
			</div>
		</div>
	</div>
</div>
</body>

</html>

