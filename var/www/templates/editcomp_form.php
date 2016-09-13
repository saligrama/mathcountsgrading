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

<link rel="stylesheet" type="text/css" href="./styles/custom-checkbox.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/css/bootstrap-datepicker.css" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.js" crossorigin="anonymous"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Edit competition</title>

<style>

.select2-container--default .select2-results__option[aria-disabled=true] {
    display: none;
}

.panel {
	max-width: 900px;
}

.panel-body {
	margin-bottom: -246px;
}

.noschool {
	display: block;
	padding: 3px 6px 2px 10px;
}

.checkbox-custom-label {
	text-overflow: ellipsis;
	overflow: hidden;
	white-space: nowrap;
	width: 75%;
}

#stcont .slider-edit {
	width: 16%;
	float: none;
	margin-left: 5% !important;
}

.checkbox-custom-label-stu {
	width: 30%;
	margin-left: 5%;
	font-weight: normal;
}

.slider-li h5 {
	font-size: 16px;
	word-wrap: break-word;
}

#stcont .slider-li:nth-child(3) {
	padding-top: 4px !important;
}

#stcont {
	min-height: 483px;
	max-height: 483px;
}

#scont {
	min-height: 250px;
	max-height: 250px;
}

.slider-well {
	margin: 0;
	position: relative;
}

.checkbox-custom {
	display: none;
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
	margin: 7px 0;
	width: 100%;
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

.searchbar {
	width: 100%;
	margin-bottom: 8px;
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

	#stcont {
		max-height: 350px !important;
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

function alphabeticalSort(a, b)
{
        var aa = a.stringToSort.toLowerCase();
        var bb = b.stringToSort.toLowerCase();

        if(aa > bb)
                return 1;
        else if(aa < bb)
                return -1;
        else
                return 0;
}

function reloadSelect2()
{
	var selects = document.getElementsByClassName("js-select");

	var i = 0;
	for(i in selects)
	{
		var tag = selects[i].tagName;
		if(typeof(tag) != 'undefined' && tag.toLowerCase() == "select")
		{
			var options = selects[i].options;
			var sortArray = [];
			var index = 0;

			var j = 0;
			for(j in selects[i].childNodes)
			{
    				var tagName = selects[i].childNodes[j].tagName;
				if(typeof(tagName) != 'undefined' && tagName.toLowerCase() == "option")
				{
					//sortArray[j] = {};

					//sortArray[j].node = options[j];
					//sortArray[j].stringToSort = options[j].innerHTML;

					options[index].parentNode.removeChild(options[index]);
					index++;
				}
			}

			//if(sortArray.length > 1)
			//	sortArray.sort(alphabeticalSort);

			//for(var h in sortArray)
			//	selects[i].appendChild(sortArray[h].node);
		}
	}

	$(".js-select").select2({
                minimumResultsForSearch: 6
        });
}

/*function expandEllipsis(SCID)
{
	var e = document.getElementById("label" + SCID);

	if(e.offsetWidth < e.scrollWidth)
	{
		e.style.display = "absolute";
	}
}*/


/*var schoolinfo = [];

<?php if(!empty($schinfo)): ?>
	<?php foreach($schinfo as $row): ?>
		schoolinfo[<?= $row["SCID"] ?>] = [];
		schoolinfo[<?= $row["SCID"] ?>]["team_name"] = "<?php echo clean($row['team_name']); ?>";
		schoolinfo[<?= $row["SCID"] ?>]["num_students"] = <?php echo $row["num_students"]; ?>;
	<?php endforeach; ?>
<?php endif; ?>*/


function setAllStudentsCount()
{
	var select = document.getElementById("stuschselect");

	var total = 0;
	for(var i = 1; i < select.options.length; i++)
	{
		if(!select.options[i].disabled)
			total += parseInt(select.options[i].dataset.numstudents);
	}

	select.options[0].innerHTML = "All selected schools ("
	if(total === 1)
		select.options[0].innerHTML += "1 student)";
	else
		select.options[0].innerHTML += total + " students)";
}

function studentSelect()
{
	var select = document.getElementById("stuschselect");
	var scid = select.options[select.selectedIndex].value;

	var ul = document.getElementById("stcont");
	var lis = ul.getElementsByClassName("slider-li");

	var searchText = document.getElementById("stusearch").value;

	var hidden = 0;
	var lastVis = 0;

	if(scid == "all")
	{
		for(var i = 0; i < lis.length; i++)
		{
			lis[i].style.display = "none";
			nextSibling(lis[i]).style.display = "none";
			hidden++;

			var studentName = lis[i].getElementsByTagName("H5")[0].innerHTML;

			for(var j = 0; j < select.options.length; j++)
			{
				if(!select.options[j].disabled && parseInt(lis[i].id) == select.options[j].value && searchCompare(searchText, studentName)) {
					lis[i].style.display = "block";
					nextSibling(lis[i]).style.display = "block";
					lastVis = i;
					hidden--;
					break;
				}
			}
		}
	}
	else
	{
		for(var i = 0; i < lis.length; i++)
		{
			var studentName = lis[i].getElementsByTagName("H5")[0].innerHTML;

			if(parseInt(lis[i].id) == scid && searchCompare(searchText, studentName)) {
				lis[i].style.display = "block";
				nextSibling(lis[i]).style.display = "block";
				lastVis = i;
			}
			else {
				lis[i].style.display = "none";
                                nextSibling(lis[i]).style.display = "none";
                                hidden++;
			}
		}
	}

	/*
	var curschool = select.options[select.selectedIndex];
	curschool.innerHTML = schoolinfo[curschool.value];

	if((lis.length - hidden) > 1)
		curschool.innerHTML += " (" + (lis.length - hidden) + " students)";
	else if((lis.length - hidden) == 1)
		curschool.innerHTML += " (1 student)";

	for(var i = 0; i < select.options.length; i++)
		if(select.options[i].id !== curschool.id)
			select.options[i].innerHTML = schoolinfo[select.options[i].value];

	reloadSelect2();
	*/

	if(lis.length)
		nextSibling(lis[lastVis]).style.display = "none";

	<?php if(!empty($studentinfo) && !empty($schinfo)): ?>
		var searchRes = document.getElementById("stusearchres");
		var noStudents = document.getElementById("nostusch");

		if(hidden == lis.length) {
			if(searchText === "") {
				noStudents.style.display = "block";
				searchRes.style.display = "none";
			}
			else {
				searchRes.style.display = "block";
				searchRes.innerHTML = "No results found";

				noStudents.style.display = "none";
			}
		}
		else {
			if(searchText !== "")
			{
				searchRes.style.display = "block";

				if(lis.length - hidden === 1)
                                	searchRes.innerHTML = "1 result";
                        	else
                                	searchRes.innerHTML = (lis.length - hidden) + " results";
			}
			else
				searchRes.style.display = "none";

			noStudents.style.display = "none";
		}
	<?php endif; ?>
}

window.onload = function() {
	setAllStudentsCount();
	studentSelect();
	reloadSelect2();
}

function schoolSelect(scid)
{
	var options = document.getElementById("stuschselect").options;
	var check = document.getElementById("check" + scid);

	var sortArray = [];

        for(var i = 0; i < options.length; i++)
	{
        	if(options[i].value == scid)
		{
			if(check.checked)
				options[i].disabled = false;
			else
				options[i].disabled = true;
		}
	}

	setAllStudentsCount();
	studentSelect();
	reloadSelect2();
}

function studentCheck(type, sid)
{
	var acheck = document.getElementById("acheck" + sid);
	var rcheck = document.getElementById("rcheck" + sid);

	if(type) {
		if(acheck.checked)
			document.getElementById("acheck" + sid).checked = false;
	}
	else {
		if(rcheck.checked)
			document.getElementById("rcheck" + sid).checked = false;
	}
}

function schoolSearch()
{
	var ul = document.getElementById("scont");
	var lis = ul.getElementsByClassName("slider-li");

	var searchText = document.getElementById("schsearch").value;

	var lastVis = 0;
	var hidden = 0;

	for(var i = 0; i < lis.length; i++)
	{
		var schoolName = lis[i].getElementsByTagName("LABEL")[0].innerHTML;

		if(searchCompare(searchText, schoolName)) {
			lis[i].style.display = "block";
			nextSibling(lis[i]).style.display = "block";
			lastVis = i;
		}
		else {
			lis[i].style.display = "none";
			nextSibling(lis[i]).style.display = "none";
			hidden++;
		}
	}

	<?php if(!empty($schinfo)): ?>
		if(lis.length)
			nextSibling(lis[lastVis]).style.display = "none";

		if(hidden == lis.length)
			document.getElementById("noschsearchres").style.display = "block";
		else
			document.getElementById("noschsearchres").style.display = "none";
	<?php endif; ?>
}

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

	return confirm(mes);
}

function deleteComp()
{
	return confirm("Are you sure you want to delete the competition?");
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
								<div class="input-group searchbar">
                                                                        <input id="schsearch" type="text" class="form-control" placeholder="Search" oninput="schoolSearch();">
                                                                </div>
								<ul class="slider-container-fixed" id="scont">
									<?php if($schinfo == 0): ?>
										<li class="noschool" style="display:block;">Looks like there aren't any schools yet.</li>
									<?php else: ?>
										<li id="noschsearchres" class="noschool" style="display:none;">No results found</li>
										<?php foreach($schinfo as $row): ?>
											<li class="slider-li">
												<input onchange="schoolSelect(<?= $row['SCID'] ?>);" type="checkbox" class="checkbox-custom" id=<?= "check" . $row["SCID"] ?> name="<?= $row['SCID'] ?>" value="yes" <?php echo (in_array($row["SCID"], $participants_row) ? "checked" : "") ?>>
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
					<div class="row">
						<label id="partdrop">Participating students from school:</label>
						<div class="form-group">
							<select onchange="studentSelect();" id="stuschselect" class="js-select form-control">
								<option id="allschoption" value="all">All selected schools</option>
								<?php foreach($schinfo as $row): ?>
									<?php if(in_array($row["SCID"], $participants_row)): ?>
										<option data-numstudents="<?= $row['num_students']; ?>" id="<?= $row['SCID'] ?>schoption" value="<?= $row['SCID'] ?>"><?php echo clean($row["team_name"] . " (" . $row["num_students"] . " students)"); ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="row">
              	 		               	<div class="dropdown">
               	       		                	<div class="well well-sm slider-well" id="stwell">
								<div class="input-group searchbar">
                                	                                <input id="stusearch" type="text" class="form-control" placeholder="Search" oninput="studentSelect();">
                                                                </div>
                 		        		        <ul class="slider-container-fixed" id="stcont">
                       		               	      	       		<?php if($studentinfo == 0): ?>
										<?php if($schinfo == 0): ?>
											<li class="noschool" style="display:block;">Looks like there aren't any schools or students yet.</li>
										<?php else: ?>
											<li class="noschool" style="display:block;">Looks like there aren't any students at all yet.</li>
										<?php endif; ?>
									<?php elseif($schinfo == 0): ?>
										<li class="noschool" style="display:block">Looks like there aren't any schools yet.</li>
									<?php else: ?>
										<li class="noschool" id="nostusch" style="display:none;">Looks like there aren't any students in your selection.</li>
                       		                               	        	<li class="noschool" id="stusearchres" style="display:none;">No results found</li>
										<?php foreach($studentinfo as $row): ?>
                      		                                      	        	<li class="slider-li" id="<?= $row['SCID'] ?>student<?= $row['SID'] ?>">
												<h5 class="text-center"><?php echo clean(getStudentFullName($row)); ?></h5>

												<input onchange="studentCheck(1, <?= $row['SID'] ?>);" form="compinfo" type="checkbox" class="checkbox-custom" id=<?= "rcheck" . $row["SID"] ?> name="<?= $row['SCID'] . 'reg' . $row['SID'] ?>" value="yes" <?php if(in_array($row["SID"], $regulars_row)) echo "checked"; ?>>
      	                                                              	                 	<label id="<?= $row['SCID'] . 'rlabel' . $row['SID'] ?>" for=<?= "rcheck" . $row["SID"] ?> class="checkbox-custom-label checkbox-custom-label-stu">Regular</label>

												<input onchange="studentCheck(0, <?= $row['SID'] ?>);" form="compinfo" type="checkbox" class="checkbox-custom" id=<?= "acheck" . $row["SID"] ?> name="<?= $row['SCID'] . 'alt' . $row['SID'] ?>" value="yes" <?php if(in_array($row["SID"], $alternates_row)) echo "checked"; ?>>
 	                                                                      		        <label id="<?= $row['SCID'] . 'alabel' . $row['SID'] ?>" for=<?= "acheck" . $row["SID"] ?> class="checkbox-custom-label checkbox-custom-label-stu">Alternate</label>

												<button form="" class="btn btn-primary slider-edit">Edit</button>
											</li>
                               	        	                                	<li class="divider slider-divider"></li>
                                       	        		               	<?php endforeach; ?>
                                               	       			<?php endif; ?>
                               	               	 		</ul>
            	                       			</div>
                            			</div>
                	       		</div><br>
				</div>
			</form>
		</div>
		<div class="panel-footer">
               		<div class="row">
				<div class="col-xs-offset-1 col-xs-2">
                                	<a class="btn btn-danger" href="/admin.php">Back</a>
                                </div>
				<div class="col-xs-3">
					<button id="finalizebtn" type="submit" class="btn btn-success" form="compinfo" name="finalize">Finalize changes</button>
				</div>
				<div class="col-xs-3">
					<form onsubmit="return deleteComp();" method="post" action="/editcompetition.php">
                                        	<button class="btn btn-danger" name="delete" type="submit">Delete competition</button>
                                        	<input type="hidden" name="cid" value="<?php echo clean($_GET['CID']); ?>">
                                	</form>
				</div>
				<div class="col-xs-2">
					<a class="btn btn-primary col-xs-2" href="/addschool.php">New school</a>
                        	</div>
			</div>
                </div>
	</div>
</div>
</body>

</html>
