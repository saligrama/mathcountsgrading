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

.wheel-loader-wrapper {
   position: fixed;
   width: 100%;
   height: 100%;
   left: 0;
   top: 0;
   background-color: rgba(1, 1, 1, 0);
}

.wheel-loader {
    border: 16px solid #f3f3f3;
    border-top: 16px solid #3498db;
    border-radius: 50%;
    width: 100px;
    height: 100px;
    animation: wheel-spin 2s linear infinite;

    position: relative;
    margin-top: -50px;
    margin-left: -50px;
    top: 35%;
    left: 50%;

    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    background-color: rgba(1, 1, 1, 0);
    //background-image: url("https://upload.wikimedia.org/wikipedia/commons/a/ab/Harvard_Crimson.svg");
    vertical-align: middle;
}

@keyframes wheel-spin {
    0% { transform: rotate(0deg);
	 -ms-transform: rotate(0deg);
	 -webkit-transform: rotate(0deg);
         //width: 110px;
	 //height: 140px;
	}
    /*50% { transform: rotate(360deg);
         -ms-transform: rotate(360deg);
         -webkit-transform: rotate(360deg);
          width: 1758px;
	  height: 2068px;
	 }*/
    100% { transform: rotate(360deg);
         -ms-transform: rotate(360deg);
         -webkit-transform: rotate(360deg);
         //width: 110px;
         //height: 140px;
       }
}

/*.m-overlay {
    background-color: rgba(0.8, 0.8, 0.8, 1);
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
}*/

.wheel-loader-wrapper {
    opacity: 0.5;
    display: none;
    z-index: 0;

    transition: opacity 1s ease-in;
    -webkit-transition: opacity 1s ease-in;

    transition: z-index 0;
    -webkit-transition: z-index 0;

    transition-delay: z-index 1.3s;
    -webkit-transition-delay: z-index 1.3s;

}

body {
	z-index: 5;
}

body.loading-first {
	min-width: 100%;
	overflow: hidden;
}

.body-wrapper {
	opacity 1;

	transition: opacity 1s ease-in;
	-webkit-transition: opacity 1s ease-in;
}

body.loading-first .body-wrapper {
	opacity: 0;
}

body.loading .wheel-loader-wrapper {
	display: block;
//	z-index: 999;
}

.slider-top-divider {
	height: 1px;
	overflow: hidden;
	background-color: #d5d5d5;
	margin-left: 5%;
	margin-bottom: 10px;
	width: 90%;
}

.select2-container--default {
	max-width: 410px !important;
}

.select2-container--default .select2-results__option[aria-disabled=true] {
    display: none;
}

.panel {
	max-width: 900px;
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

#stcont {
	min-height: 483px;
	max-height: 483px;
}

#scont {
	max-height: 250px;
}

#compdate {
	padding: 6px 12px;
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
	vertical-align: top;
}

.colobj:last-child {
	margin-left: 4%;
}

.panel-footer a,
.panel-footer button {
	width: 100%;
}

.col-divider {
	display: inline-block;
	position: relative;
	width: 1px;
	height: 600px;
	bottom: 330px;
	vertical-align: middle;
	background-color: #d5d5d5;
	margin: 0;
	padding: 0;
}

.searchbar {
	width: 100%;
	margin-bottom: 8px;
}

.panel-body {
	padding-top: 25px;
}

.foot-button-2, .foot-button-3 {
	float: left;
	padding: 0px 15px;
}

.foot-button-2 {
	width: 16.66666667%;
}

.foot-button-3 {
	width: 25%;
}

@media (max-width: 1000px) {
	.foot-button-2, .foot-button-3 {
		width: 50%;
	}

	.foot-button-small {
		padding-bottom: 10px !important;
		width: 33%;
	}

	.foot-button-large {
		width: 50%;
	}

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

	.slider-container-fixed {
		min-height: 0 !important;
		max-height: 250px !important;
	}

	#stcont {
		max-height: 350px !important;
	}

	.panel-footer .row div {
        	padding: 0 5px;
	}
}

</style>

<script type="text/javascript">

/*function alphabeticalSort(a, b)
{
        var aa = a.stringToSort.toLowerCase();
        var bb = b.stringToSort.toLowerCase();

	var ap = parseInt(aa);
	var bp = parseInt(bb);

	if(ap != NaN) {
		if(bp != NaN)
			return 0;
		else
			return -1;
	}
	else if(bp != NaN) {
		if(ap != NaN)
			return 0;
		else
			return 1;
	}
	if(aa > bb)
                return 1;
        else if(aa < bb)
                return -1;
        else
                return 0;
}*/

function loadSelect2()
{
/*	var selects = document.getElementsByClassName("js-select-sort");

	for(var i = 0; i < selects.length; i++)
	{
		var tag = selects[i].tagName;
		if(typeof(tag) != 'undefined' && tag.toLowerCase() == "select")
		{
			var options = selects[i].options;
			var sortArray = [];
			var index = 0;

			for(var j = 0; j < selects[i].childNodes.length; j++)
			{
    				var tagName = selects[i].childNodes[j].tagName;
				if(typeof(tagName) != 'undefined' && tagName.toLowerCase() == "option")
				{
					if(selects[i].childNodes[j].dataset.first === "1")
						continue;

					sortArray[index] = {};

					sortArray[index].node = selects[i].childNodes[j];
					sortArray[index].stringToSort = selects[i].childNodes[j].innerHTML;

					selects[i].removeChild(selects[i].childNodes[j]);
					index++;
				}
			}

			if(sortArray.length > 1)
				sortArray.sort(alphabeticalSort);

			for(var h = 0; h < sortArray.length; h++)
				selects[i].appendChild(sortArray[h].node);
		}
	}
*/
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

function toggleLoading(on)
{
	if(on)
	{
		document.getElementsByTagName("body")[0].classList.add("loading");
	}
	else
	{
		document.getElementsByTagName("body")[0].classList.remove("loading");
	}
}

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

function checkAllStudents()
{
        var ul = document.getElementById("stcont");
        var lis = ul.getElementsByClassName("slider-li");

        var allregs = document.getElementById("checkallregulars");
        var allalts = document.getElementById("checkallalternates");

        allregs.checked = true;
        allalts.checked = true;

        var notregfound = false;
        var notaltfound = false;

	var numvis = 0;

        for(var i = 0; i < lis.length; i++)
        {
                if(lis[i].style.display != "none")
                {
                        var inputs = lis[i].getElementsByTagName("input");

                        if(!inputs[0].checked) {
                                allregs.checked = false;
                                notregfound = true;

                                if(notaltfound)
                                        return;
                        }
                        if(!inputs[1].checked) {
                                allalts.checked = false;
                                notaltfound = true;

                                if(notregfound)
                                        return;
                        }

			numvis++;
                }
        }

	if(!numvis) {
		allregs.checked = false;
		allalts.checked = false;
	}
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

	var firstStudent = true;

	if(scid == "all")
	{
		for(var i = 0; i < lis.length; i++)
		{
			lis[i].style.display = "none";
			nextSibling(lis[i]).style.display = "none";
			hidden++;

			var studentName = lis[i].getElementsByTagName("H5")[0].innerHTML;

			var searchRes = searchText === "" ? true : searchCompare(searchText, studentName);
			var id = parseInt(lis[i].id);

			if(searchRes)
			{
				for(var j = 0; j < select.options.length; j++)
				{
					if(!select.options[j].disabled && id == select.options[j].value)
					{
						lis[i].style.paddingTop = "10px";

						if(firstStudent) {
							lis[i].style.paddingTop = "4px";
							firstStudent = false;
						}

						lis[i].style.display = "block";
						nextSibling(lis[i]).style.display = "block";
						lastVis = i;
						hidden--;
						break;
					}
				}
			}
		}
	}
	else
	{
		for(var i = 0; i < lis.length; i++)
		{
			var studentName = lis[i].getElementsByTagName("H5")[0].innerHTML;

			var searchRes = searchText === "" ? true : searchCompare(searchText, studentName);

			if(parseInt(lis[i].id) == scid && searchRes)
			{
				if(firstStudent) {
                                        lis[i].style.paddingTop = "4px";
                	                firstStudent = false;
                               	}

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

	checkAllStudents();

	if(lis.length)
		nextSibling(lis[lastVis]).style.display = "none";

	<?php if(!empty($studentinfo) && !empty($schinfo)): ?>
		var searchRes = document.getElementById("stusearchres");
		var noStudents = document.getElementById("nostusch");

		if(hidden == lis.length) {
			if(searchText === "")
			{
				noStudents.style.display = "block";
				searchRes.style.display = "none";
			}
			else
			{
				noStudents.style.display = "none";
				searchRes.style.display = "block";
			}
		}
		else {
			searchRes.style.display = "none";
			noStudents.style.display = "none";
		}
	<?php endif; ?>
}

/*window.onready = function() {
	var main = document.getElementsByClassName("main")[0];
        main.style.display = "none";
}*/

//var shouldBeLoading = false;

window.onload = function() {
	setAllStudentsCount();
	loadSelect2();
	studentSelect();
	checkAllSchools();

	document.getElementsByTagName("body")[0].classList.remove("loading-first");
	toggleLoading(false);
	//document.getElementsByClassName("body-wrapper")[0].style.display = "block";

	//window.setInterval(function() { toggleLoading(shouldBeLoading); }, 5);
}

function checkAllSchools()
{
	var ul = document.getElementById("scont");
	var lis = ul.getElementsByClassName("slider-li");

	var allsch = document.getElementById("checkallschools");
	var numvis = 0;

	allsch.checked = true;

	for(var i = 0; i < lis.length; i++)
	{
		if(lis[i].style.display != "none")
                {
                        var inputs = lis[i].getElementsByTagName("input");

                        if(!inputs[0].checked) {
				allsch.checked = false;
				return;
			}

			numvis++;
                }
	}

	if(!numvis)
		allsch.checked = false;
}

function schoolSelect(scid, doFunc)
{
	var select = document.getElementById("stuschselect");
	var check = document.getElementById("check" + scid);

        for(var i = 0; i < select.options.length; i++)
	{
        	if(parseInt(select.options[i].value) == scid)
		{
			if(check.checked) {
				select.options[i].disabled = false;
			}
			else {
				select.options[i].disabled = true;

				if(select.selectedIndex === i)
					select.selectedIndex = 0;
			}

			if(doFunc) {
				setAllStudentsCount();
				studentSelect();
				loadSelect2();
			}

			break;
		}
	}

	checkAllSchools();
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

	checkAllStudents();
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

	checkAllSchools();

	<?php if(!empty($schinfo)): ?>
		var searchRes = document.getElementById("schsearchres");

		if(lis.length)
			nextSibling(lis[lastVis]).style.display = "none";

		if(hidden == lis.length)
			searchRes.style.display = "block";
		else
			searchRes.style.display = "none";
	<?php endif; ?>
}

function allSchools(loading)
{
	var ul = document.getElementById("scont");
	var lis = ul.getElementsByClassName("slider-li");

	var select = document.getElementById("stuschselect");

	var checked = document.getElementById("checkallschools").checked;

	for(var i = 0; i < lis.length; i++)
	{
		if(lis[i].style.display != "none")
		{
			var inputs = lis[i].getElementsByTagName("input");

			if(inputs[0].checked != checked) {
				inputs[0].checked = checked;
				//select.options[i+1].disabled = false;
				schoolSelect(parseInt(inputs[0].getAttribute("name")), false);
			}
		}
	}

	setAllStudentsCount();
        studentSelect();
        loadSelect2();
}

function allStudents(type)
{
	var ul = document.getElementById("stcont");
	var lis = ul.getElementsByClassName("slider-li");

	var checked = document.getElementById("checkall" + (type ? "alternates" : "regulars")).checked;
	var otherCheck = document.getElementById("checkall" + (type ? "regulars" : "alternates"));

	var otherType = type ? 0 : 1;

	if(otherCheck.checked)
		otherCheck.checked = false;

	for(var i = 0; i < lis.length; i++)
	{
		if(lis[i].style.display != "none")
		{
			var inputs = lis[i].getElementsByTagName("input");

			inputs[type].checked = checked;
			if(checked)
				inputs[otherType].checked = false;
		}
	}
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

<body class="loading loading-first">

<div class="m-overlay"></div>

<div class="wheel-loader-wrapper"><div class="wheel-loader"></div></div>

<div class="body-wrapper">

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
								<?php foreach($comptypeinfo as $type): ?>
                                                                        <option value="<?= $type['CTID'] ?>" <?= $crow['CTID'] == $type['CTID'] ? "selected" : "" ?>><?php echo clean($type["type_name"]); ?></option>
                                                                <?php endforeach; ?>
							</select>
						</div>
					</div><br>
					 <div class="row">
                                                <div class="form-group">
                                                        <label for="complevel">Competition Level</label><br>
                                                        <select name="complevel" id="complevel" class="js-select form-control">
								<option value="chapter" <?= $crow['competition_level'] == 'chapter' ? "selected" : "" ?>>Chapter</option>
                                                                <option value="state" <?= $crow['competition_level'] == 'state' ? "selected" : "" ?>>State</option>
                                                                <option value="national" <?= $crow['competition_level'] == 'national' ? "selected" : "" ?>>National</option>
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
								<div class="row" style="margin-left: 10px; margin-top: 10px; margin-bottom: 5px;">
                                                                        <div class="col-xs-12" style="padding:0">
                                                                                <input onchange="allSchools(true)" type="checkbox" class="checkbox-custom" id="checkallschools">
                                                                                <label for="checkallschools" class="checkbox-custom-label" style="width:100%;">All schools</label>
                                                                        </div>
								</div>
								<div class="slider-top-divider"></div>
								<ul class="slider-container-fixed" id="scont">
									<?php if($schinfo == 0): ?>
										<li class="noschool" style="display:block;">Looks like there aren't any schools yet.</li>
									<?php else: ?>
										<li id="schsearchres" class="noschool" style="display:none;">No results found</li>
										<?php foreach($schinfo as $row): ?>
											<li class="slider-li">
												<input onchange="schoolSelect(<?= $row['SCID'] ?>, true);" type="checkbox" class="checkbox-custom" id=<?= "check" . $row["SCID"] ?> name="<?= $row['SCID'] ?>" value="yes" <?php echo (in_array($row["SCID"], $participants_row) ? "checked" : "") ?>>
												<label id="label<?= $row['SCID'] ?>" for=<?= "check" . $row["SCID"] ?> class="checkbox-custom-label"><?php echo clean($row["team_name"]); ?></label>
												<a class="btn btn-primary slider-edit" href="/editschool.php?SCID=<?= $row['SCID'] ?>&returnCID=<?= $_GET['CID'] ?>">Edit</a>
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
				<div class="colobj">
					<div class="row">
						<label id="partdrop">Participating students from school:</label>
						<div class="form-group">
							<select onchange="studentSelect();" id="stuschselect" class="js-select form-control">
								<option id="allschoption" data-first="1" value="all">All selected schools</option>
								<?php foreach($schinfo as $row): ?>
									<option data-numstudents="<?= $row['num_students']; ?>" id="<?= $row['SCID'] ?>schoption" value="<?= $row['SCID'] ?>"
									<?php if(!in_array($row["SCID"], $participants_row)) echo "disabled"; ?>>
									<?php echo clean($row["team_name"] . " (" . $row["num_students"] . " students)"); ?></option>
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
								<div class="row" style="margin-left: 19px; margin-top: 10px; margin-bottom: 5px;">
                                                                        <div class="col-xs-5" style="padding:0">
                                                                                <input onchange="allStudents(0)" type="checkbox" class="checkbox-custom" id="checkallregulars">
	                                                                        <label for="checkallregulars" class="checkbox-custom-label" style="width:100%;">All regulars</label>
                                                                        </div>
                                                                        <div class="col-xs-6" style="padding:0;">
                                                                                <input onchange="allStudents(1)" type="checkbox" class="checkbox-custom" id="checkallalternates">
                                	                                        <label for="checkallalternates" class="checkbox-custom-label" style="width:100%;">All alternates</label>
                                        	                        </div>
                                                                </div>
								<div class="slider-top-divider"></div>
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
										<li class="noschool" id="stusearchres" style="display:none;">No results found</li>
										<li class="noschool" id="nostusch" style="display:none;">Looks like there aren't any students in your selection.</li>
										<?php foreach($studentinfo as $row): ?>
                      		                                      	        	<li class="slider-li" id="<?= $row['SCID'] ?>student<?= $row['SID'] ?>">
												<h5 class="text-center"><?php echo clean(getStudentFullName($row)); ?></h5>

												<input onchange="studentCheck(1, <?= $row['SID'] ?>);" form="compinfo" type="checkbox" class="checkbox-custom" id=<?= "rcheck" . $row["SID"] ?> name="<?= $row['SCID'] . 'reg' . $row['SID'] ?>" value="yes" <?php if(in_array($row["SID"], $regulars_row)) echo "checked"; ?>>
      	                                                              	                 	<label id="<?= $row['SCID'] . 'rlabel' . $row['SID'] ?>" for=<?= "rcheck" . $row["SID"] ?> class="checkbox-custom-label checkbox-custom-label-stu">Regular</label>

												<input onchange="studentCheck(0, <?= $row['SID'] ?>);" form="compinfo" type="checkbox" class="checkbox-custom" id=<?= "acheck" . $row["SID"] ?> name="<?= $row['SCID'] . 'alt' . $row['SID'] ?>" value="yes" <?php if(in_array($row["SID"], $alternates_row)) echo "checked"; ?>>
 	                                                                      		        <label id="<?= $row['SCID'] . 'alabel' . $row['SID'] ?>" for=<?= "acheck" . $row["SID"] ?> class="checkbox-custom-label checkbox-custom-label-stu">Alternate</label>

												<a href="editschool.php?SCID=<?= $row['SCID'] ?>&SID=<?= $row['SID'] ?>&returnCID=<?= $_GET['CID'] ?>" class="btn btn-primary slider-edit">Edit</a>
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
				<div class="foot-button-2 foot-button-small">
                                	<a class="btn btn-danger" href="/admin.php">Back</a>
                                </div>
				<div class="foot-button-3 foot-button-small">
					<form onsubmit="return deleteComp();" method="post" action="/editcompetition.php">
                                        	<button class="btn btn-danger" name="delete" type="submit">Delete</button>
                                        	<input type="hidden" name="cid" value="<?php echo clean($_GET['CID']); ?>">
                                	</form>
				</div>
				<div class="foot-button-2 foot-button-small">
					<a class="btn btn-primary" href="/addschool.php?returnCID=<?php echo clean($_GET['CID']); ?>">New school</a>
                        	</div>
				<div class="foot-button-2 foot-button-large">
					<a class="btn btn-primary" href="/editanswers.php?CID=<?php echo clean($_GET['CID']); ?>">Edit Answers</a>
				</div>
				<div class="foot-button-3 foot-button-large">
                                        <button id="finalizebtn" type="submit" class="btn btn-success" form="compinfo" name="finalize">Finalize changes</button>
                                </div>
			</div>
                </div>
	</div>
</div>

</div>

</body>

</html>
