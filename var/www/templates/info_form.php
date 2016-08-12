<!DOCTYPE html>
<hmtl lang="en">

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

.progress {
	height: 25px;
	position: relative;
}

.bar {
	z-index: 1;
	position: absolute;
}

.progress span {
	position: absolute;
	display: block;
	top: 0;
	z-index: 2;
	font-size: 18px;
	padding-top: 2px;
	font-family: sans-serif;
	text-align: center;
	width: 100%;
}

</style>

</head>


<body>

<div class="container-fluid main">
	<div class="panel panel-primary col-sm-offset-1 col-sm-5">
		<div class="panel-heading">
			<div class="row">
				<select class="col-sm-12">
					<?php while($row = mysqli_fetch_assoc($eventrows)): ?>
			     	        	<?php if($row["competition_name"] != ""): ?>
                                                	<option value=<?= $row["CID"] ?>><?= $row["competition_name"] ?> (<?= $row["competition_date"] ?>)</option>
                                                <?php else: ?>
                                                        <option value=<?= $row["CID"] ?>><?= $row["competition_date"] ?></option>
                                                <?php endif; ?>
					<?php endwhile; ?>
				</select>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<label for="gradestatus">Grading progress</label>
				<div class="progress">
					<div class="progress-bar progress-bar-info progress-bar-striped active" id="gradestatus"
					     role="progress-bar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="min-width: 1em; width: 70%;">
						<span>70%</span>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
		</div>
	</div>
</div>

</body>

</html>
