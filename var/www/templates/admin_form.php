<!DOCTYPE html>


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

.btn-sm {
        padding: 3px;
        font-size: 12px;
        border-radius: 4px;
        margin-top: 5px;
}

.dropdown-menu {
        width: 250px;
}

.dropdown-toggle {
	margin-right: 7px;
}

.compch {
}

.compch:hover {
	background-color: #eeeeee;
}

.nocomp {
	font-size: 14px;
	padding: 5px 10px 5px 10px;
}

</style>

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
		</ul>
	</div>
</nav>
<div class="container-fluid main">
	<div class="container ncont">
		<div class="jumbotron">
			<?php if($compname == 0): ?>
				<h3>Whoops! The current competition hasn't been set yet.</h3>
				<div class="btn-group">
					<button class="btn btn-default">Select competition </button>
					<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
					<ul class="dropdown-menu container">
						<?php if ($result == 0): ?>
							<li class="nocomp">Looks like there aren't any competitions yet.</li>
						<?php else: ?>
							<?php foreach($result as $row): ?>
        	                                        	<li>
         								<div class="row">
		                       	                                        <div class="col-xs-offset-1 col-xs-8">
                                                                                	<a class="btn compch" href=<?php echo "/admin.php?setComp=" . $row["CID"]; ?>><?php echo clean(getCompFullName($row)); ?></a>
	                                                                	</div>
										<a class="btn btn-sm btn-primary col-xs-2" href=<?php echo "/editcompetition.php?CID=" . $row["CID"]; ?>>Edit</a>
									</div>
								</li>
                        	                	<?php endforeach; ?>
						<?php endif; ?>
					</ul>
                                	<a href="/create.php" class="btn btn-default addcomp" style="border-radius: 4px;-webkit-border-radius: 4px;-moz-border-radius: 4px;">Add competition</a>
                        	</div>
			<?php else: ?>
				<h3><?php echo clean($compname); ?></h3>
			<?php endif; ?>
		</div>
	</div>
</div>
		       		<form id="selectcomp" class="form-group" method="post" action="add.php">
               				<div class="dropdown col-xs-8">
						<button id="compmenu2" class="btn btn-default dropdown-toggle col-xs-12" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        		           				Select a competition
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu container-fluid" id="compdrop" aria-labelledby="compmenu2">
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
