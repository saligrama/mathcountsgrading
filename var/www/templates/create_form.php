<!DOCTYPE html>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./select2/dist/css/select2.css">
<script src="./select2/dist/js/select2.full.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/custom-checkbox.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js" crossorigin="anonymous"></script>

<title>Create new competition</title>

<style>

.panel {
	min-width: 500px;
}

.noschool {
        display: block !important;
        padding: 3px 6px;
}

.js-select {
	width: 100% !important;
}

.slider-edit {
        width: 18%;
}

.checkbox-custom-label {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        width: 75%;
}

</style>

<script type="text/javascript">

$(document).ready(function() {
  $(".js-select").select2({
        minimumResultsForSearch: Infinity
});
});

</script>

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

	var listItems = document.getElementById("scont").getElementsByTagName("input");
	var numc = 0;

	for(var i = 0; i < listItems.length; i++)
		if(listItems[i].checked)
			numc++;

	if(numc < 2)
	{
		alert("Please select 2 or more schools to compete");
		return false;
	}

	if(name == null || name == "")
        {
                if(confirm("Are you sure you want to create a competition with an empty name on the date " + document.getElementById("compdate").value + " ?"))
                        return true;

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

/*function doCheck(scid)
{
	document.getElementById("check" + scid).checked = !document.getElementById("check" + scid).checked;
}*/

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
						<label for="comptype">Competition Type</label><br>
                                                <select name="comptype" id="comptype" class="js-select">
                                                        <option value="chapter">Chapter</option>
                                                        <option value="state">State</option>
                                                        <option value="national">National</option>
                                                </select>
					</div><br>
					<div class="row">
						<div class="form-group">
							<label for="compname">Competition Name</label>
							<input type="text" class="form-control" name="compname" id="compname" placeholder="competition name">
						</div>
					</div><br>
					<div class="row">
						<div class="dropdown">
							<label for="swell">Schools</label>
                                                        <div class="well well-sm slider-well" id="swell">
                                                                <ul class="slider-container-fixed" id="scont">
                                                                        <?php if($schinfo == 0): ?>
                                                                                <li class="noschool">Looks like there aren't any schools yet.</li>
                                                                        <?php else: ?>
										<?php foreach($schinfo as $row): ?>
                                                                                	<li class="slider-li">
                                                                                        	<input type="checkbox" class="checkbox-custom" id=<?= "check" . $row["SCID"] ?> name=<?= $row["SCID"] ?> value="yes">
                                                                                        	<label for=<?= "check" . $row["SCID"] ?> class="checkbox-custom-label"><?php echo clean($row["team_name"]); ?></label>
                                                                                        	<button id=<?= "edit" . $row["SCID"] ?> form="" role="button" class="btn btn-primary slider-edit" onclick="redirectTo('editschool.php?SCID=<?= $row['SCID'] ?>');">Edit</button>
                                                                                	</li>
                                                                                	<li class="divider slider-divider"></li>
                                                                        	<?php endforeach; ?>
									<?php endif; ?>
                                                                </ul>
                                                        </div>
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

