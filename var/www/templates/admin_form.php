<!DOCTYPE html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<head>

<title>Welcome</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

.panel-heading {
	margin-left: -15px;
	margin-right: -15px;
}

.main {
	margin-top: 10px;
}

.panel {
	min-width: 350px;
}

</style>

</head>


<body>

<div class="container-fluid main">
	<div class="panel panel-primary col-sm-4 col-sm-offset-4">
		<div class="panel-heading"><h4>Choose an existing or create a new competition</h4></div>
		<div class="panel-body container-fluid">
			<div class="row">
		       		<form id="selectcomp" class="form-group" method="post" action="add.php">
                			<select class="col-sm-9">
                    				<?php while($row = mysqli_fetch_assoc($result)): ?>
							<?php if($row["competition_name"] != ""): ?>
                        					<option value=<?= $row["CID"] ?>><?= $row["competition_name"] ?> (<?= $row["competition_date"] ?>)</option>
                    					<?php else: ?>
								<option value=<?= $row["CID"] ?>><?= $row["competition_date"] ?></option>
							<?php endif; ?>
						<?php endwhile ?>
                			</select>
                			<button type="submit" class="btn btn-primary col-sm-3">Go</button>
        			</form>
			</div>
			<br>
			<br>
			<div class="row">
                                <form id="createcomp" class="form-group" method="post" action="create.php">
                                        <button type="submit" class="btn btn-primary col-sm-offset-2 col-sm-8">Create New Competition</button>
                                </form>
                        </div>
		</div>
	</div>
</div>

</body>


</html>

