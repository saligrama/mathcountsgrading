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
	margin-left: auto;
	margin-right: auto;
	min-width: 320px;
	max-width: 450px;
}

.btn-sm {
        padding: 3px;
        font-size: 12px;
        border-radius: 4px;
        margin-top: 10px;
}

.dropdown-menu {
        min-width: 300px;
}

</style>

</head>


<body>

<div class="container-fluid main">
	<div class="container-fluid panel panel-primary">
		<div class="panel-heading"><h4>Choose an existing or create a new competition</h4></div>
		<div class="panel-body container-fluid">
			<div class="row">
		       		<form id="selectcomp" class="form-group" method="post" action="add.php">
                			<div class="dropdown col-xs-8">
						<button id="compmenu1" class="btn btn-default dropdown-toggle col-xs-12" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        		            			Select a competition
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu container-fluid" id="compdrop" aria-labelledby="compmenu1">
							<?php foreach($result as $row): ?>
								<li>
									<div class="row">
										<div class="radio col-xs-offset-1 col-xs-7">
											<?php if($row["competition_name"] != ""): ?>
                        									<label><input type="radio" value=<?= $row["CID"] ?> name="comp"><?= $row["competition_name"] ?> (<?= $row["competition_date"] ?>)</label>
                    									<?php else: ?>
												<label><input type="radio" value=<?= $row["CID"] ?> name="comp"><?= $row["competition_date"] ?></label>
											<?php endif; ?>
										</div>
										<a class="btn btn-sm btn-success col-xs-2" href=<?php echo "/editcompetition.php?CID=" . $row["CID"]; ?>>Edit</a>
									</div>
								</li>
							<?php endforeach; ?>
                				</ul>
					</div>
                			<a href="/info.php" type="submit" class="btn btn-primary col-xs-offset-1 col-xs-3">Go</a>
				</form>
			</div>
			<br>
			<br>
			<div class="row">
                    		<a href="/create.php" class="btn btn-primary col-xs-offset-2 col-xs-8">Create New Competition</a>
			</div>
		</div>
	</div>
</div>

</body>

</html>
