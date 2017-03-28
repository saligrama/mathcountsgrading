<!DOCTYPE html>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/select2.css">
<script src="./scripts/select2.full.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Grading</title>

<style>

.btn {
	margin: 5px;
	min-width: 100px;
}

.ncont {
        width: 500px;
}

</style>

<script type="text/javascript">

$(document).ready(function() {
	$(".js-select").select2({
                minimumResultsForSearch: 7,
		allowClear: false,
                placeholder: {
                        id: "0",
                        text: "Select a school"
                }
        });
});

</script>

<script type="text/javascript">

function checkSubmit()
{
	var gschool = "<?php echo $gschool; ?>";
	if(!gschool)
		return true;

	var select = document.getElementById("school_list");
	var curval = select.options[select.selectedIndex].value;

	if(curval == "0")
	{
		alert("Please select the school of the student you wish to grade");
		return false;
	}
	else if(curval == gschool)
	{
		alert("Please choose a different school: you are not allowed to grade your own school");
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
                </ul>
        </div>
</nav>
<div class="main">
	<?php if($schoolinfo == 0): ?>
		<div class="container ncont text-center">
                        <div class="jumbotron">
                                <?php if($currentcomp == 0): ?>
					<h4>The current competition hasn't been set yet. Please contact your administrator.</h4>
				<?php else: ?>
					<h4>There aren't any schools yet in the current competition. Please contact your administrator.</h4>
				<?php endif; ?>
			</div>
		</div>
	<?php elseif($roundtypes == 0): ?>
		<div class="container ncont text-center">
			<div class="jumbotron">
				<h4>There aren't any rounds in this competition type yet. Please contact your administrator.</h4>
			</div>
		</div>
	<?php else: ?>
		<div class="container-fluid panel panel-primary">
                        <div class="panel-heading"><h4>Choose a school and round to grade</h4></div>
			<div class="panel-body">
				<form class="form-group" id="input_form" method="post" onsubmit="return checkSubmit();" action="grade.php">
					<div class="col-xs-offset-1 col-xs-10">
						<div class="row">
							<div class="form-group">
								<label for="school_list">School</label>
								<select name="School" id="school_list" class="js-select form-control" required>
               								<option value="0"></option>
									<?php foreach($schoolinfo as $row): ?>
       	        	    							<option value="<?= $row['SCID'] ?>"><?php echo clean($row["team_name"]); ?></option>
      									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<label for="round">Round</label>
								<select name="Round" id="round" class="js-select form-control" required>
									<?php foreach($roundtypes as $type): ?>
										<option value="<?= $type['RNDID'] ?>"><?php echo clean($type["round_name"]); ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
				</form>
			</div>
       			<div class="panel-footer">
				<button class="btn btn-primary" form="input_form" name="goptsubmit">GO</button>
			</div>
		</div>
	<?php endif; ?>
</div>

</body>

</html>

