<!DOCTYPE html>

<?php
	$crow = $compinfo[0];

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<head>

<title>Edit competition</title>

<style>

.main {
	margin-top: 10px;
}

.panel {
	max-width: 500px;
	min-width: 300px;
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

function checkDiff()
{
        if(document.getElementById("compname").value != '<?= $crow["competition_name"]; ?>' ||
           document.getElementById("compdate").value != '<?= $crow["competition_date"]; ?>' ||
           document.getElementById("comptype").value != '<?= $crow["competition_type"]; ?>')
        {
                document.getElementById("finalizebtn").disabled = false;
        }
        else
        {
                document.getElementById("finalizebtn").disabled = true;
        }
}

function enableFinalize(name) {

	if (document.getElementsByName(name).checked != '<?php echo (in_array($row["SCID"], $participants_row)) ? true : false ?>')
		document.getElementById("finalizebtn").disabled = false;
	else
		document.getElementById("finalizebtn").disabled = true;

}

</script>

</head>


<body>
<div class="container-fluid main">
	<div class="container-fluid panel panel-primary">
		<div class="panel-heading"><h4>Edit competition</h4></div>
		<div class="panel-body">
			<form id="compinfo" onsubmit="return checkSubmit();" action="editcompetition.php" method="post">
        			<div class="col-xs-offset-2 col-xs-8">
					<div class="row">
						<div class="form-group">
							<label for="compdate">Competition Date</label>
							<input id="compdate" type="date" class="form-control" oninput="checkDiff()" name="compdate" placeholder="Date (yyyy-mm-dd)" value=<?= $crow['competition_date'] ?> required>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="comptype">Competition Type</label>
							<div class="dropdown">
								<select name="comptype" id="comptype" class="col-xs-12" onchange="checkDiff()">
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
							<input type="text" class="form-control" name="compname" id="compname" oninput="checkDiff()" placeholder="competition name" value="<?= $crow['competition_name'] ?>" required>
						</div>
					</div><br>
					<div class="row">
						<div class="dropdown">
							<button id="schoolmenu" class="btn btn-default dropdown-toggle col-xs-12" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Select school(s)
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu container-fluid" id="schooldrop" aria-labelledby="schoolmenu">
								<?php foreach($schinfo as $row): ?>
									<li>
										<div class="row">
											<div class="checkbox col-xs-offset-1 col-xs-7">
												<label><input type="checkbox" oninput="checkDiff()" id=<?= "check" . $row["SCID"] ?> name=<?= $row["SCID"] ?> value="yes" <?php echo (in_array($row["SCID"], $participants_row) ? "checked" : "") ?>><p class="labelcheck"><?= $row["team_name"] ?></p></label>
	   	 									</div>
											<a class="btn btn-sm btn-success col-xs-2" href=<?php echo "/editschool.php?SCID=" . $row["SCID"]; ?>>Edit</a><br>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div><br>
				</div><br>
				<div class="row">
					<div class="form-group">
						<input type="hidden" id="cid" name="cid" value=<?= $_GET["CID"] ?>>
					</div>
				</div>
			</form>
		</div>
		<div class="panel-footer">
			<div class="row">
				<button id="finalizebtn" type="submit" class="btn btn-primary col-sm-offset-0 col-sm-4 col-xs-offset-2 col-xs-8" form="compinfo" name="finalize" disabled>Finalize changes</button>
                                <a class="btn btn-danger col-xs-offset-1 col-xs-4 col-sm-offset-1 col-sm-2" href="/admin.php">Back</a>
                                <form onsubmit="return deleteComp()" method="post" action="">
                                        <button class="btn btn-danger col-sm-offset-1 col-xs-offset-1 col-xs-5 col-sm-4" name="delete" type="submit">Delete competition</button>
                                        <input type="hidden" name="cid" value=<?= $_GET["CID"] ?>>
                                </form>
			</div>
		</div>
	</div>
</div>
</body>

</html>
