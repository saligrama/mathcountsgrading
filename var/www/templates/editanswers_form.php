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

<title>Edit answer key</title>

<style>

.panel {
	max-width: none;
	min-width: 0;
}

.main {
	max-width: 1500px;
	padding: 10px 30px;
}

.panel-body {
	padding-top: 20px;
}

</style>

<script type="text/javascript">

function checkSubmit()
{
        var mes = "Are you sure you want to record these answers?";

        for(i = 1; i <= 48; i++)
        {
                var e = document.getElementById(i + "question");

		if(e.value === "")
		{
			mes = "Some problems were left blank. Are you sure you want to continue?";
			break;
		}
	}

        return confirm(mes);
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
                        <li class="mnav-right"><a href="/editprofile.php">Edit Profile</a></li>
                </ul>
        </div>
</nav>
<div class="main">
	<div class="row text-center">
		<form onsubmit="return checkSubmit();" id="answers" action="" method="post"></form>
		<input type="hidden" form="answers" name="CID" value="<?= $_GET['CID'] ?>">

		<div class="col-lg-6 col-lg-offset-0 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12">
			<div class="container-fluid panel panel-primary">
                                <div class="panel-heading"><h4>Sprint Round</h4></div>
                                <div class="panel-body">
                                        <div class="row">
						<?php for($j = 0; $j < 3; $j++): ?>
                                       	                <div class="col-xs-4">
                               	                                <div class="form-group">
                  	                                              <?php for($i = 1; $i <= 10; $i++): ?>
                		                                                <div class="input-group">
        	                                                                        <span class="input-group-addon"><?php echo (10*$j + $i); ?> </span>
      		                                                                        <input type="text" form="answers" class="form-control col-xs-12" id="<?= (10*$j + $i) ?>question"
												name="<?= (10*$j + $i) ?>question"
												value="<?php getProblemSolution($result, (10*$j + $i), 'sprint'); ?>">
											</input>
                                                                              	</div><br>
                      	                                                <?php endfor; ?>
                               	                                </div>
                                       	                </div>
                                               	<?php endfor; ?>
					</div>
				</div>
				<div class="panel-footer">
                                        <div class="row">
                                                <button type="submit" class="btn btn-success col-xs-offset-3 col-xs-6" name="answersubmit" form="answers">Submit</button>
                                        </div>
                                </div>
			</div>
		</div>
		<div class="col-lg-3 col-lg-offset-0 col-sm-5 col-sm-offset-1 col-md-offset-2 col-md-4 col-xs-6">
			<div class="container-fluid panel panel-primary">
				<div class="panel-heading"><h4>Team Round</h4></div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 col-sm-10 col-sm-offset-1">
                        	                        <?php for($i = 1; $i <= 10; $i++): ?>
        	                                                <div class='input-group'>
                                         	                      	<span class='input-group-addon'><?php echo $i; ?> </span>
                                                                      	<input form="answers" type="text" class="form-control col-xs-10" name="<?= (30 + $i) ?>question"
										id="<?= (30 + $i) ?>question"
										value="<?php getProblemSolution($result, 30 + $i, 'team'); ?>">
									</input>
                                                                </div><br>
                                                        <?php endfor; ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="panel-footer">
                                        <div class="row">
                                                <button type="submit" class="btn btn-success col-xs-offset-2 col-xs-8" name="answersubmit" form="answers">Submit</button>
                                        </div>
                                </div>
                        </div>
		</div>
		<div class="col-lg-3 col-sm-5 col-md-4 col-xs-6">
			<?php for($i = 1; $i <= 4; $i++): ?>
				<div class="container-fluid panel panel-primary">
                                	<div class="panel-heading"><h4>Target Round <?= $i ?></h4></div>
                                	<div class="panel-body">
                                        	<div class="row">
                                                	<div class="col-xs-12 col-sm-offset-1 col-sm-10">
                              	                        	<div class='input-group'>
                                                               		<span class='input-group-addon'>1 </span>
                                         	               		<input form="answers" type="text" class="form-control col-xs-10" name="<?= (40 + 2*$i - 1) ?>question"
										id="<?= (40 + 2*$i - 1) ?>question"
										value="<?php getProblemSolution($result, 40 + 2*$i - 1, 'target' . $i); ?>">
									</input>
                                        	        		</div><br>
								<div class='input-group'>
                                                        	       	<span class='input-group-addon'>2 </span>
                                                               		<input form="answers" type="text" class="form-control col-xs-10" name="<?= (40 + 2*$i) ?>question"
										id="<?= (40 + 2*$i) ?>question"
										value="<?php getProblemSolution($result, 40 + 2*$i, 'target' . $i); ?>">
									</input>
                                                        	</div><br>
                                                	</div>
                                        	</div>
                                	</div>
				</div>
			<?php endfor; ?>
                </div>
	</div>
</div>
</body>

</html>
