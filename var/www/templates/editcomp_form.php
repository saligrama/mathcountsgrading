<!DOCTYPE html>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js" crossorigin="anonymous"></script>

<title>Edit competition</title>

<style>

.panel {
	min-width: 500px;
}

.noschool {
	display: block !important;
	padding: 3px 6px;
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

	var listItems = document.getElementById("scont").getElementsByTagName("input");
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

	if(name == null || name == "")
        {
                if(confirm("Are you sure you want to leave the competition name empty and finalize your changes?"))
                        return true;

                return false;
        }

	var mes = "Are you sure you want to finalize your changes?";

	if(confirm(mes))
		return true;

	return false;
}

function deleteComp()
{
	if(confirm("Are you sure you want to delete the competition?"))
		return true;

	return false;
}

/*function showSchools()
{
	var well = document.getElementById("swell").style;
	var cont = document.getElementById("scont").style;

	if(well.display == "none") {
		well.display = "block";
		well.maxHeight = "400px";
		cont.maxHeight = "
		cont.classList.add("slider-container-fixed-open");
	}
	else {
		alert("not none");
		well.display = "none";
		well.maxHeight = "0";
		cont.maxHeight = "0";
		cont.padding = "0";
	}
}*/

/*function checkDiff()
{
        if(document.getElementById("compname").value != "<?php echo clean($crow['competition_name']); ?>" ||
           document.getElementById("compdate").value != "<?php echo htmlspecialchars($crow['competition_date']); ?>" ||
           document.getElementById("comptype").value != "<?php echo clean($crow['competition_type']); ?>")
        {
                document.getElementById("finalizebtn").disabled = false;
        }
        else
        {
                document.getElementById("finalizebtn").disabled = true;
        }
}*/

/*function enableFinalize(name)
{
	if (document.getElementsByName(name).checked != <?php echo (in_array($crow['SCID'], $participants_row)) ? true : false; ?>)
		document.getElementById("finalizebtn").disabled = false;
	else
		document.getElementById("finalizebtn").disabled = true;
}*/

function doCheck(scid)
{
        document.getElementById("check" + scid).checked = !document.getElementById("check" + scid).checked;
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
		<div class="panel-heading"><h4>Edit competition</h4></div>
		<div class="panel-body">
			<form id="compinfo" onsubmit="return checkSubmit();" action="/editcompetition.php" method="post">
        			<div class="col-xs-offset-2 col-xs-8">
					<div class="row">
						<div class="form-group">
							<label for="compdate">Competition Date</label>
							<input id="compdate" data-provide="datepicker" class="form-control input-group date datepicker" data-date-format="yyyy-mm-dd" name="compdate" placeholder="Date (yyyy-mm-dd)" value="<?php echo htmlspecialchars($crow['competition_date']); ?>" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="comptype">Competition Type</label>
							<div class="dropdown">
								<select name="comptype" id="comptype" class="col-xs-12">
									<option value="chapter" <?= $crow['competition_type'] == 'chapter' ? "selected" : "" ?>>Chapter</option>
									<option value="state" <?= $crow['competition_type'] == 'state' ? "selected" : "" ?>>State</option>
									<option value="national" <?= $crow['competition_type'] == 'national' ? "selected" : "" ?>>National</option>
								</select>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="form-group">
							<label for="compname">Competition Name</label>
							<input type="text" class="form-control" name="compname" id="compname" placeholder="competition name" value="<?php echo clean($crow['competition_name']); ?>">
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
												<input type="checkbox" class="slider-checkbox" id=<?= "check" . $row["SCID"] ?> name=<?= $row["SCID"] ?> value="yes" <?php echo (in_array($row["SCID"], $participants_row) ? "checked" : "") ?>>
												<p onclick="doCheck(<?= $row['SCID'] ?>)" class="slider-text"><?php echo clean($row["team_name"]); ?></p>
												<a class="btn btn-primary slider-edit" href="editschool.php?SCID=<?= $row['SCID'] ?>">Edit</a>
												</li>
											<li class="divider slider-divider"></li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div><br>
				</div><br>
				<div class="row">
					<div class="form-group">
						<input type="hidden" id="cid" name="cid" value="<?php echo clean($_GET['CID']); ?>">
					</div>
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<div class="row">
				<button id="finalizebtn" type="submit" class="btn btn-success col-xs-offset-2 col-xs-8" form="compinfo" name="finalize">Finalize changes</button>
                        </div>
		</div>
		<div class="panel-footer">
			<div class="row">
				<a class="btn btn-danger col-xs-3" href="/admin.php">Back</a>
				<form onsubmit="return deleteComp();" method="post" action="/editcompetition.php">
                                        <button class="btn btn-danger col-xs-offset-1 col-xs-4" name="delete" type="submit">Delete competition</button>
                                        <input type="hidden" name="cid" value="<?php echo clean($_GET['CID']); ?>">
                                </form>
				<a class="btn btn-primary col-xs-offset-1 col-xs-3" href="/addschool.php">New school</a>
			</div>
		</div>
	</div>
</div>
</body>

</html>
