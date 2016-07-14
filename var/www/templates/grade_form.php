<!DOCTYPE html>
<html lang="en">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<head>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

.panel-heading {
	margin-left: -15px;
	margin-right: -15px;
}

.main {
	margin: 10px;
}

</style>

<script type="text/javascript">

function checkSubmit()
{
	var se = document.getElementById("studentlist");

	if(se.options[se.selectedIndex].value == "0")
	{
		alert("Please select a student to grade");
		return false;
	}

	var length = document.getElementById("answers").elements.length;

        var mes = "";

	var numb = 0;
        for(i = 0; i < length-1; i++)
        {
                if(document.getElementById("answers").elements[i].value == null || document.getElementById("answers").elements[i].value == "")
                {
                        mes += document.getElementById("answers").elements[i].getAttribute("name") + ", ";
                	numb++;
		}
        }

        if(mes != "")
        {
		var smes = "";
		if(numb == 1)
			smes = "The following question was left blank:\n";
		else
			smes = "The following questions were left blank:\n";

                if(!confirm(smes + mes.slice(0, -2) + "\n\n" + "Would you like to proceed?"))
                        return false;

		return true;
        }

	if(!confirm("Are you sure you want to submit?"))
		return false;

	return true;
}

</script>

</style>

</head>


<?php
switch($sheet_type) {
case 'sprint':
	$numq = 30;
	$type_name = "Sprint Round";
	break;
case 'team':
	$numq = 10;
	$type_name = "Team Round";
	break;
default:
	$type_name = "Target, Round " . substr($sheet_type, -1);
	$numq = 2;
};

?>


<body>

<div class="container-fluid main">
	<div class="panel panel-primary col-sm-4">
		<div class="panel-heading"><h4>Choose a student</h4></div>
		<div class="panel-body">
			<div class="form-group row">
				<select class="form-control col-sm-12" id="studentlist">
					<option disabled selected value="0">-- select a student --</option>
					<?php foreach($studentrows as $row): ?>
						<option value=<?= $row['SID']?>> <?=$row['first_name'] . " " . $row['last_name'] ?> </option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>

	<?php if($sheet_type == 'sprint'): ?>

	<div class="panel panel-primary col-sm-offset-1 col-sm-7">
                <div class="panel-heading"><h4>Fill out answers</h4></div>
                <div class="panel-body col-sm-12">
                        <div class="row">
                                <label class="text-center col-sm-12" for="answers"><h5><?php echo $type_name; ?></h5></label>
                        </div>
                        <form id="answers" method="post" onsubmit="return checkSubmit();" action="">
                                <?php for($j = 0; $j < 3; $j++): ?>
                                        <div class="form-group col-sm-4">
						<?php for($i = 1; $i <= 10; $i++): ?>
							<div class="input-group">
                                                		<span class="input-group-addon"><?php echo (10*$j + $i); ?> </span>
                                                		<input type="text" form="answers" class="form-control col-sm-12" name=<?= (10*$j + $i) ?>></input>
                                        		</div><br>
						<?php endfor; ?>
					</div>
                                <?php endfor; ?>
                        </form>
                </div>
                <div class="panel-footer row">
                        <button type="submit" id="submitbtn" class="btn btn-primary col-sm-offset-3 col-sm-6" form="answers">Submit</button>
                </div>
        </div>

	<?php else: ?>

	<div class="panel panel-primary col-sm-offset-1 col-sm-4">
		<div class="panel-heading"><h4>Fill out answers</h4></div>
		<div class="panel-body col-sm-12">
			<div class="row">
				<label class="text-center col-sm-12" for="answers"><h5><?php echo $type_name; ?></h5></label>
			</div>
			<form id="answers" method="post" onsubmit="return checkSubmit();" action="">
				<?php for($i = 1; $i <= $numq; $i++): ?>
					<div class='input-group'>
						<span class='input-group-addon'><?php echo $i; ?> </span>
						<input type='text' class='form-control col-sm-10' name=<?= $i ?>></input>
					</div><br>
				<?php endfor; ?>
			</form>
		</div>
		<div class="panel-footer row">
			<button type="submit" class="btn btn-primary col-sm-12" form="answers">Submit</button>
		</div>
	</div>

	<?php endif; ?>
</div>

</body>

</html>
'
