<!DOCTYPE html>


<?php
$avgprogress = clean(intval((30.0*floatval($comprow['status_sprint']) +
                10.0*floatval($comprow['status_team']) +
                2.0*floatval($comprow['status_target1']) +
                2.0*floatval($comprow['status_target2']) +
                2.0*floatval($comprow['status_target3']) +
                2.0*floatval($comprow['status_target4'])) / 48.0));
?>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<title>Welcome</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

.ncont {
	width: 500px;
}

.dropdown-toggle {
	margin-right: 7px;
}

p, h1, h2, h3, h4, h5, h6 {
	word-wrap: break-word;
}

.currentcomp {
	font-size: 16px !important;
	margin-bottom: 4px !imporant;
}

.curlabel {
	font-size: 20px;
}

.nocomp {
	display: block !important;
	padding: 5px 10px;
}

.dropdown-menu {
	width: 300px;
}

.panel {
	max-width: 500px;
}

.btn-danger {
	border-radius: 4px !important;
}

.progress {
	height: 26px;
}

.progress-bar {
	line-height: 26px;
	font-size: 14px;
	min-width: 2em;
}

</style>

<script type="text/javascript">

function changeComp(CID)
{
	if(!isHovered(document.getElementById("editbtn" + CID)))
		redirectTo("/admin.php?setComp=" + CID);
}

</script>

</head>


<body>

<div class="jumbotron malert"></div>
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
			<li class="mnav-right"><a href="/editprofile.php">Edit Profile</a></li>
			<li class="mnav-right"><a href="/register.php">New User</a></li>
		</ul>
	</div>
</nav>
<div class="main">
	<div class="container ncont text-center">
		<?php if($comprow == 0): ?>
			<div class="jumbotron">
				<h3>Whoops! The current competition hasn't been set yet.</h3>
				<div class="btn-group" role="group">
					<a href="/create.php" class="btn btn-default">Add competition</a>
					<button class="btn btn-default">Select competition </button>
					<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
					<ul class="dropdown-menu slider-container">
                                                <?php if ($result == 0): ?>
                                                        <li class="nocomp">Looks like there aren't any competitions yet.</li>
                                                <?php else: ?>
                                                        <?php foreach($result as $row): ?>
                                                                <li class="slider-li" onclick="changeComp(<?php echo $row['CID']; ?>);">
                                                                	<p class="slider-text"><?php echo clean(getCompFullName($row)); ?></p>
                                                                        <button class="btn btn-primary slider-edit" onclick="redirectTo('/editcompetition.php?CID=' + '<?php echo $row['CID']; ?>');" id="editbtn<?php echo $row['CID']; ?>">Edit</button>
                                                                </li>
								<li class="divider slider-divider"></li>
                                                        <?php endforeach; ?>
                                                <?php endif; ?>
                                        </ul>
				</div>
			</div>
		<?php else: ?>
			<label class="curlabel">Current competition:</label>
			<div class="jumbotron">
				<h2 class="compname"><?php echo clean(getCompFullName($comprow)); ?></h2><br>
				<div class="btn-group" role="group">
					<a class="btn btn-default" href=<?php echo "/editcompetition.php?CID=" . $comprow["CID"]; ?>>Edit </a>
					<a class="btn btn-default" href="/create.php">Add </a>
					<button class="btn btn-default">Change</button>
					<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
					<ul class="dropdown-menu slider-container">
                                                <?php if ($result == 0): ?>
                                                        <li class="nocomp">Looks like there aren't any competitions yet.</li>
                                                <?php else: ?>
                                                        <?php foreach($result as $row): ?>
                                                                <li class="slider-li" onclick="changeComp(<?php echo $row['CID']; ?>);">
                                                                        <p class="slider-text"><?php echo clean(getCompFullName($row)); ?></p>
                                                                        <button role="button" class="btn btn-primary slider-edit"  onclick="redirectTo('/editcompetition.php?CID=' + '<?php echo $row['CID']; ?>');" id="editbtn<?php echo $row['CID']; ?>">Edit</button>
                                                                </li>
                                                                <li class="divider slider-divider"></li>
                                                        <?php endforeach; ?>
                                                <?php endif; ?>
                                        </ul>
					<a class="btn btn-danger" href="/admin.php?setComp=0">Unselect</a>
				</div>
			</div>
			<div class="panel panel-primary container-fluid">
				<div class="panel-heading text-center"><h4>Competition Progress</h4></div>
				<div class="panel-body">
					<br><label style="font-size:16px;">Total grading progress:</label>
					<div class="progress">
						<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="<?= $avgprogress ?>"
												     aria-valuemin="0" aria-valuemax="100" style="width:<?= $avgprogress ?>%">
							<?= $avgprogress ?>%
						</div>
					</div><br><br>
					<label>Sprint round grading progress:</label>
                                        <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $comprow['status_sprint'] ?>"
                                                                                                     aria-valuemin="0" aria-valuemax="100" style="width:<?= $comprow['status_sprint'] ?>%">
                                                        <?= $comprow['status_sprint'] ?>%
                                                </div>
                                        </div>
					<?php for($i = 1; $i < 5; $i++): ?>
						<?php $progress = $comprow["status_target" . $i]; ?>
						<label>Target round <?= $i ?> grading progress:</label>
	                                        <div class="progress">
        	                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $progress ?>"
                	                                                                                     aria-valuemin="0" aria-valuemax="100" style="width:<?= $progress ?>%">
                        	                                <?= $progress ?>%
                                	                </div>
                                        	</div>
					<?php endfor; ?>
					<label>Team round grading progress:</label>
                                        <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $comprow['status_team'] ?>"
                                                                                                     aria-valuemin="0" aria-valuemax="100" style="width:<?= $comprow['status_team'] ?>%">
                                                        <?= $comprow['status_team'] ?>%
                                                </div>
                                        </div>
				</div>
				<div class="panel-footer"></div>
			</div>
		<?php endif; ?>
	</div>
</div>

</body>


</html>
