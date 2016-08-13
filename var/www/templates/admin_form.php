<!DOCTYPE html>

<?php
$fullname = "";

$name = $namerows[0];

if($name["first_name"] == NULL || $name["first_name"] == "") {
	if($name["last_name"] == NULL || $name["last_name"] == "")
        	$fullname = $name["email"];
	else
		$fullname = $name["last_name"];
}
else {
	if($name["last_name"] == NULL || $name["last_name"] == "")
		$fullname = $name["first_name"];
	else
		$fullname = $name["first_name"] . " " . $name["last_name"];
}
?>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/mnavbar.css">

<title>Welcome</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

.panel-heading {
	margin-left: -15px;
	margin-right: -15px;
}

.main {
	margin-top: 30px;
	min-width: 600px;
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

<script type="text/javascript">

function checkSubmit()
{
	if(confirm("Are you sure you want to logout?"))
		return true;
	else
		return false;
}

</script>

</head>


<body>

<nav class="mnavbar">
	<div class="mnavcontainer container">
		<ul class="mnavlist">
			<li class="mnav-left"><a href="/admin.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
			<li class="mnav-left"><p class="mnav-text">Signed in as <strong><?= $fullname ?></strong></p></li>
			<li class="mnav-right">
				<form method="post" onsubmit="return checkSubmit();" action="/login.php">
					<input class="mnav-logout" type="submit" name="logoutsubmit" value="Logout"></input>
				</form>
			</li>
			<li class="mnav-right"><a href="/editprofile.php">Edit Profile</a></li>
		</ul>
	</div>
</nav>
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
