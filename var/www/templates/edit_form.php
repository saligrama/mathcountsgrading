<!DOCTYPE html>

<?php $row = $result[0] ?>

<head>

<title>Welcome</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

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

function checkSubmit()
{
        var name = document.getElementById("teamname").value;
        var town = document.getElementById("town").value;
        var address = document.getElementById("address").value;
        var coach = document.getElementById("coach").value;
        var email = document.getElementById("email").value;

        if(name == null || name == "")
        {
                alert("Please fill out the school name");
                return false;
        }

        if(town == null || town == "")
        {
                alert("Please fill out the school town");
                return false;
        }

        if(address == null || address == "")
        {
                alert("Please fill out the school address");
                return false;
        }

        if(coach == null || coach == "")
        {
                alert("Please fill out the school coach");
                return false;
        }

        if(email == null || email == "")
        {
                alert("Please fill out the school email");
                return false;
        }

        if(confirm("Are you sure you want to finalize the changes?"))
                return true;

        return false;
}

function checkDiff()
{
	if(document.getElementById("teamname").value != '<?php echo $row["team_name"]; ?>' ||
	   document.getElementById("town").value != '<?php echo $row["town"]; ?>' ||
	   document.getElementById("address").value != '<?php echo $row["address"]; ?>' ||
	   document.getElementById("coach").value != '<?php echo $row["coach"]; ?>' ||
	   document.getElementById("email").value != '<?php echo $row["contact_email"]; ?>' ||
	   (document.getElementById("firstyear").checked ? 1 : 0) != '<?php echo $row["first_year"]; ?>')
	{
		document.getElementById("finalizebtn").disabled = false;
	}
	else
	{
		document.getElementById("finalizebtn").disabled = true;
	}
}

function deleteSchool()
{
	if(confirm('Are you sure you want to delete the team/school \'' + '<?php echo $row["team_name"]; ?>' + '\'?'))
		return true;

	return false;
}

</script>

</head>


<body>
<div class="container-fluid main">
        <div class="panel panel-primary col-sm-offset-3 col-sm-7 col-xs-offset-1 col-xs-10">
                <div class="panel-heading"><h4>Make any necessary changes to the boxes below</h4></div>
                <div class="panel-body">
                        <form id="schoolinfo" onsubmit="return checkSubmit();" action="" method="post">
                                <div class="col-sm-offset-1 col-sm-10">
                                        <?php foreach($result as $row): ?>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="teamname">Team name</label>
                                                                <input id="teamname" type="text" oninput="checkDiff()" class="form-control" name="teamname" placeholder="School Name" value='<?= "$row[team_name]" ?>' required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="town">Town</label>
                                                                <input id="town" type="text" oninput="checkDiff()" class="form-control" name="town" placeholder="Town" value='<?= "$row[town]" ?>' required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input id="address" type="text" oninput="checkDiff()" class="form-control" name="address" placeholder="School Address" value='<?= "$row[address]" ?>' required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="coach">Coach</label>
                                                                <input id="coach" type="text" oninput="checkDiff()" class="form-control" name="coach" placeholder="Coach Name" value='<?= "$row[coach]" ?>' required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input id="email" type="email" oninput="checkDiff()" class="form-control" name="email" placeholder="Contact Email" value='<?= "$row[contact_email]" ?>' required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="checkbox">
                                                                <label><input id="firstyear" class="check" type="checkbox" onchange="checkDiff()" name="firstyear" value="yes" <?php echo ($row['first_year'] == 1 ? "checked" : ""); ?>><strong>First Year?</strong></label>
                                                        </div>
                                                </div>
        					<input type="hidden" name="scid" value=<?= $row['SCID'] ?>>
                                                <br>
                                        <?php endforeach; ?>
                                </div>
                        </form>
		</div>
		<div class="panel-footer">
                        <div class="row">
				<button id="finalizebtn" type="submit" class="btn btn-primary col-sm-offset-0 col-sm-4 col-xs-offset-2 col-xs-8" form="schoolinfo" name="finalize" disabled>Finalize changes</button>
                                <a class="btn btn-danger col-xs-offset-1 col-xs-4 col-sm-offset-1 col-sm-2" href="/create.php">Back</a>
				<form onsubmit="return deleteSchool();" method="post" action="">
					<button class="btn btn-danger col-sm-offset-1 col-xs-offset-1 col-xs-5 col-sm-4" name="delete" type="submit">Delete school</button>
					<input type="hidden" name="scid" value=<?= $row['SCID'] ?>>
				</form>
			</div>
                </div>
        </div>
</div>
</body>


</html>
