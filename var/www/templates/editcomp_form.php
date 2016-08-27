<!DOCTYPE html>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./select2/dist/css/select2.css">
<script src="./select2/dist/js/select2.full.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/custom-checkbox.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js" crossorigin="anonymous"></script>

<title>Edit competition</title>

<style>

html {
	overflow: hidden;
	height: 100%;
}

body {
	height: 100%;
	overflow: auto;
}

.panel {
	max-width: 900px;
}

.panel-body {
	margin-bottom: -246px;
}

.noschool {
	display: block !important;
	padding: 3px 6px;
}

.select2-results__option {
        text-overflow: ellipsis;
        overflow-x: hidden;
        white-space: nowrap;
}

.select2-container {
	width: 100% !important;
}

.slider-edit {
	width: 18%;
}

.checkbox-custom-label {
	text-overflow: ellipsis;
	overflow: hidden;
	white-space: nowrap;
	width: 75%;
}

.checkbox-custom-label-stu {
	width: 34%;
	font-weight: normal;
}

.slider-li h5 {
	font-size: 16px;
	word-wrap: break-word;
}

#stcont {
	min-height: 482px;
	max-height: 482px;
}

#scont {
	min-height: 250px;
	max-height: 250px;
}

.slider-well {
	margin: 0;
}

.colobj {
	width: 40.9%;
	display: inline-block;
	padding-left: 15px;
	padding-right: 15px;
	margin-left: 5%;
	margin-right: 4%;
}

.colobj:last-child {
	margin-left: 4%;
}

.panel-footer a,
.panel-footer button {
	margin: 0 7px 0 7px;
}

.col-divider {
	display: inline-block;
	position: relative;
	width: 1px;
	height: 530px;
	bottom: 290px;
	vertical-align: middle;
	background-color: #d5d5d5;
	margin: 0;
	padding: 0;
}

@media (max-width: 1000px) {
	.colobj {
		display: block;
		width: 82.66%;
		margin: 0 8.66% 0 8.66% !important;
	}

	.col-divider {
		display: block;
		height: 1px;
		width: 350px;
		bottom: 0;
		position: relative;
		margin: 5px 10% 30px 10%;
		width: 80%;
	}

	.panel {
		max-width: 500px;
	}

	.panel-body {
		margin: 0;
	}

	.slider-container-fixed {
		min-height: 0 !important;
		max-height: 250px !important;
	}

	.panel-footer .col-xs-1 {
		width: 25%;
		margin-bottom: 10px;
	}

	.panel-footer .col-xs-2 {
		width: 40%;
	}

	.panel-footer .col-xs-2:last-child {
		float: right;
	}

	.panel-footer .col-xs-3 {
		width: 33%;
		float: right;
		margin-bottom: 10px;
	}
}

</style>

<script type="text/javascript">

$(document).ready(function() {
  $(".js-select").select2({
	minimumResultsForSearch: 6
  });
});

</script>

<script type="text/javascript">

/*function expandEllipsis(SCID)
{
	var e = document.getElementById("label" + SCID);

	if(e.offsetWidth < e.scrollWidth)
	{
		e.style.display = "absolute";
	}
}*/

function checkSubmit()
{
	var date = document.getElementById("compdate").value;
	var name = document.getElementById("compname").value;

	if(date === "")
	{
		alert("Please fill out a date for the competition");
		return false;
	}

	var listItems = document.getElementById("scont").getElementsByTagName("input");
	var numc = 0;

	for(var i = 0; i < listItems.length; i++)
	{
		if(listItems[i].checked)
			numc++;
	}

	if(numc < 2)
	{
		alert("Please select 2 or more schools to compete");
		return false;
	}

	if(name === "")
        {
                if(confirm("Are you sure you want to leave the competition name empty and finalize your changes?"))
                        return true;

                return false;
        }

	var mes = "Are you sure you want to finalize your changes?";

	if(confirm(mes))
		return true;

	return false;
}

function deleteComp()
{
	if(confirm("Are you sure you want to delete the competition?"))
		return true;

	return false;
}

/*function showSchools()
{
	var well = document.getElementById("swell").style;
	var cont = document.getElementById("scont").style;

	if(well.display == "none") {
		well.display = "block";
		well.maxHeight = "400px";
		cont.maxHeight = "
		cont.classList.add("slider-container-fixed-open");
	}
	else {
		alert("not none");
		well.display = "none";
		well.maxHeight = "0";
		cont.maxHeight = "0";
		cont.padding = "0";
	}
}*/

/*function checkDiff()
{
        if(document.getElementById("compname").value != "<?php echo clean($crow['competition_name']); ?>" ||
           document.getElementById("compdate").value != "<?php echo htmlspecialchars($crow['competition_date']); ?>" ||
           document.getElementById("comptype").value != "<?php echo clean($crow['competition_type']); ?>")
        {
                document.getElementById("finalizebtn").disabled = false;
        }
        else
        {
                document.getElementById("finalizebtn").disabled = true;
        }
}*/

/*function enableFinalize(name)
{
	if (document.getElementsByName(name).checked != <?php echo (in_array($crow['SCID'], $participants_row)) ? true : false; ?>)
		document.getElementById("finalizebtn").disabled = false;
	else
		document.getElementById("finalizebtn").disabled = true;
}*/

/*function doCheck(scid)
{
        document.getElementById("check" + scid).checked = !document.getElementById("check" + scid).checked;
}*/

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
	<div class="container-fluid panel panel-primary">
		<div class="panel-heading"><h4 class="text-center">Edit competition</h4></div>
		<div class="panel-body">
			<form id="compinfo" onsubmit="return checkSubmit();" action="/editcompetition.php" method="post">
        			<div class="colobj">
					<div class="row">
						<div class="form-group">
							<label for="compdate">Competition Date</label>
							<input id="compdate" data-provide="datepicker" class="form-control input-group date datepicker" data-date-format="yyyy-mm-dd" name="compdate" placeholder="Date (yyyy-mm-dd)" value="<?php echo htmlspecialchars($crow['competition_date']); ?>" required>
						</div>
					</div><br>
					<div class="row">
						<div class="form-group">
							<label for="comptype">Competition Type</label><br>
							<select name="comptype" id="comptype" class="js-select form-control">
								<option value="chapter" <?= $crow['competition_type'] == 'chapter' ? "selected" : "" ?>>Chapter</option>
								<option value="state" <?= $crow['competition_type'] == 'state' ? "selected" : "" ?>>State</option>
								<option value="national" <?= $crow['competition_type'] == 'national' ? "selected" : "" ?>>National</option>
							</select>
						</div>
					</div><br>
					<div class="row">
						<div class="form-group">
							<label for="compname">Competition Name (optional)</label>
							<input type="text" class="form-control" name="compname" id="compname" placeholder="competition name" value="<?php echo clean($crow['competition_name']); ?>">
						</div>
					</div><br>
					<div class="row">
						<div class="dropdown">
							<label for="swell">Participating Schools</label>
							<div class="well well-sm slider-well" id="swell">
								<ul class="slider-container-fixed" id="scont">
									<?php if($schinfo == 0): ?>
										<li class="noschool">Looks like there aren't any schools yet.</li>
									<?php else: ?>
										<?php foreach($schinfo as $row): ?>
											<li class="slider-li">
												<input type="checkbox" class="checkbox-custom" id=<?= "check" . $row["SCID"] ?> name="<?= $row['SCID'] ?>" value="yes" <?php echo (in_array($row["SCID"], $participants_row) ? "checked" : "") ?>>
												<label id="label<?= $row['SCID'] ?>" for=<?= "check" . $row["SCID"] ?> class="checkbox-custom-label"><?php echo clean($row["team_name"]); ?></label>
												<button form="" class="btn btn-primary slider-edit" onclick="redirectTo('editschool.php?SCID=<?= $row['SCID'] ?>');">Edit</button>
											</li>
											<li class="divider slider-divider"></li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
							</div>
							</div>
					</div><br>
					<div class="row">
						<div class="form-group">
							<input type="hidden" id="cid" name="cid" value="<?php echo clean($_GET['CID']); ?>">
						</div>
					</div>
				</div>
				<div class="col-divider"></div>
				<div class="colobj">
					<?php $stdrop = 1; ?>
					<div class="row">
						<label>Participating students from school:</label>
						<?php if($schinfo == 0): ?>
							<div class="well well-sm slider-well">
                       	              		                 <ul class="slider-container-fixed">
									<li class="noschool">Looks like there aren't any schools yet.</li>
								</ul>
							</div>
							<?php $stdrop = 0; ?>
						<?php else: ?>
							<div class="form-group">
								<select id="stuschselect" class="js-select form-control">
									<?php $nums = 0; ?>
									<?php foreach($schinfo as $row): ?>
										<?php if(in_array($row["SCID"], $participants_row)): ?>
											<option value="<?= $row['SCID'] ?>"><?php echo clean($row["team_name"]); ?></option>
										<?php $nums++; ?>
										<?php endif; ?>
									<?php endforeach; ?>
									<?php if($nums === 0): ?>
										<option value="0">Looks like no schools have been selected yet</option>
										<?php $stdrop = 0; ?>
									<?php endif; ?>
								</select>
							</div>
						<?php endif; ?>
					</div>
					<?php if($stdrop): ?>
						<div class="row">
              	 		                	<div class="dropdown">
               	       		        	        	<div class="well well-sm slider-well" id="stwell">
                 		        	 	      	        <ul class="slider-container-fixed" id="stcont">
                       		               	      	        		<?php if($studentinfo == 0): ?>
                       		                               	        	        <li class="noschool">Looks like there aren't any students yet.</li>
                       		                       	        	        <?php else: ?>
                       		                               	        	        <?php foreach($studentinfo as $row): ?>
                       		                                      	        	        <li class="slider-li">
													<h5 class="text-center"><?php echo clean($row["first_name"] . " " . $row["last_name"]); ?></h5>

													<input form="compinfo" type="checkbox" class="checkbox-custom" id=<?= $row["SCID"] . "rcheck" . $row["SID"] ?> name="<?= $row['SCID'] . 'reg' . $row['SID'] ?>" value="yes" <?php echo (in_array($row["SID"], $student_participants_row) ? "checked" : "") ?>>
       	                                                                       	                 	<label id="<?= $row['SCID'] . 'rlabel' . $row['SID'] ?>" for=<?= $row["SCID"] . "rcheck" . $row["SID"] ?> class="checkbox-custom-label checkbox-custom-label-stu">Regular</label>

													<button class="btn btn-primary slider-edit" onclick="redirectTo('editstudent.php?SID=<?= $row['SID'] ?>');">Edit</button>

													<input form="compinfo" type="checkbox" class="checkbox-custom" id=<?= $row["SCID"] . "acheck" . $row["SID"] ?> name="<?= $row['SCID'] . 'alt' . $row['SID'] ?>" value="yes" <?php echo (in_array($row["SID"], $student_participants_row) ? "checked" : "") ?>>
 	      	                                                                		        <label id="<?= $row['SCID'] . 'alabel' . $row['SID'] ?>" for=<?= $row["SCID"] . "acheck" . $row["SID"] ?> class="checkbox-custom-label checkbox-custom-label-stu">Alternate</label
												</li>
                                	        	                                	<li class="divider slider-divider"></li>
                                        	        		               	<?php endforeach; ?>
                                                	       			<?php endif; ?>
                                	               	 		</ul>
            	                        			</div>
                            				</div>
                	       			</div><br>
					<?php endif; ?>
				</div>
			</form>
		</div>
		<div class="panel-footer">
               		<div class="row">
                                <a class="btn btn-danger col-xs-1" href="/admin.php">Back</a>
                                <form onsubmit="return deleteComp();" method="post" action="/editcompetition.php">
                                        <button class="btn btn-danger col-xs-3" name="delete" type="submit">Delete competition</button>
                                        <input type="hidden" name="cid" value="<?php echo clean($_GET['CID']); ?>">
                                </form>
				<button id="finalizebtn" type="submit" class="btn btn-success col-xs-3" form="compinfo" name="finalize">Finalize changes</button>
				<a class="btn btn-primary col-xs-2" href="/addschool.php">New school</a>
                                <a class="btn btn-primary col-xs-2" href="/addstudent.php">New student</a>
                        </div>
                </div>
	</div>
</div>
</body>

</html>
