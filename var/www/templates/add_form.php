<!DOCTYPE html>


<head>

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

</style>

</head>

<body>
<div class="container-fluid main">
	<div class="panel panel-primary col-sm-offset-3 col-sm-5">
		<div class="panel-heading">Fill out the boxes below to create a new school</div>
        	<div class="panel-body">
			<form id="schoolinfo" action="" method="POST">
                		<div class="input-group">
					<input type="text" class="form-control" name="teamname" placeholder="School Name"><br>
                		</div>
				<br>
				<div class="input-group">
					<input type="text" class="form-control" name="town" placeholder="Town"><br>
				</div>
				<br>
				<div class="input-group">
					<input type="text" class="form-control" name="address" placeholder="School Address"><br>
                		</div>
				<br>
				<div class="input-group">
					<input type="text" class="form-control" name="coach" placeholder="Coach Name"><br>
                		</div>
				<br>
				<div class="input-group"
					<input type="email" class="form-control" name="email" placeholder="Contact Email"><br>
                		</div>
				<div class="checkbox">
					<label><input type="checkbox" value="" name="firstyear">First Year?</label>
				</div>
				<br>
				<button type="submit" class="btn btn-primary col-sm-offset-1 col-sm-4" form="schoolinfo">Create school</button>
			</form>
        		<form id="students" class="form-group" action="admin.php">
                		<button type="submit" class="btn btn-primary col-sm-offset-1 col-sm-5" form="students"><= Back to dashboard</button>
        		</form>
		</div>
	</div>
</div>
</body>

</html>

