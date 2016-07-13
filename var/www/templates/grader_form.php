<!DOCTYPE html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Grading</title>

<style>

.main {
	margin-top: 15px;
}

.panel-heading {
	margin-left: -15px;
	margin-right: -15px;
}

.dropdown {
	margin-top: 10px;
	margin-bottom: 10px;
}

.btn {
	margin: 5px;
	min-width: 100px;
}

</style>

<script type="text/javascript">

function checkSubmit()
{
	var gschool = "<?php echo $gschool; ?>";
	var select = document.getElementById("school_list");

	if(gschool == select.options[select.selectedIndex].value)
	{
		alert("Please choose a different school: you are not allowed to grade your own school");
		return false;
	}

	return true;
}

</script>

</head>

<body>
<div class="container-fluid main">
	<div class="panel panel-primary col-sm-offset-4 col-sm-4">
		<div class="panel-heading"><h4>Choose a school and round to grade</h4></div>
		<div class="panel-body">
			<form class="form-group" id="input_form" method="post" onsubmit="return checkSubmit();" action="grade.php">
				<div class="row">
					<select name="School" id="school_list" class="dropdown col-sm-offset-1 col-sm-10" required>
                				<?php foreach($result as $row): ?>
                    					<option value='<?= $row["SCID"] ?>'><?= $row["team_name"] ?></option>
              					<?php endforeach; ?>
					</select>
				</div>
				<div class="row">
					<select name="Sheet_Type" class="dropdown col-sm-offset-1 col-sm-10" required>
        		    			<option value='sprint'>Sprint</option>
                            			<option value='target1'>Target, Round 1</option>
		           			<option value='target2'>Target, Round 2</option>
                  	          		<option value='target3'>Target, Round 3</option>
                        	    		<option value='target4'>Target, Round 4</option>
                            			<option value='team'>Team</option>
					</select>
				</div>
			</form>
		</div>
       		<div class="panel-footer"><button class="btn btn-primary" form="input_form" name="goptsubmit">GO</button></div>
	</div>
</div>
</body>
