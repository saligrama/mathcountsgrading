<!DOCTYPE html>

<?php $schoolrow = $result[0]; ?>

<head>

<title>Welcome</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/select2.css">
<script src="./scripts/select2.full.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

.panel {
	max-width: none;
	min-width: 340px;
}

.panel-heading {
	font-size: 16px;
}

.searchbar {
        width: 100%;
        margin-bottom: 8px;
}

.nostudent {
        display: block;
        padding: 3px 6px;
}

#editstudent-label {
	font-size: 16px;
	font-weight: 500;
	padding: 7px 3px 5px 3px;
}

.editstudent {
	-webkit-transition: border-color ease-in-out 3s, -webkit-box-shadow ease-in-out 3s;
	transition: border-color ease-in-out 3s, box-shadow ease-in-out 3s;
}

.editstudent-load {
	border-color: #66afe9;

	-webkit-box-shadow: 0 0 30px 15px rgba(102, 175, 233, .6);
	box-shadow: 0 0 30px 15px rgba(102, 175, 233, .6);
}

@media (max-width: 991px) {

	.panel {
		max-width: 480px;
	}
}

</style>

<script type="text/javascript">

function reloadSelect2()
{
        $(".js-select").select2({
                minimumResultsForSearch: Infinity
        });
}

$(document).ready(function() {
        reloadSelect2();

	<?php if(isset($_GET["SID"])): ?>
		chooseStudentEdit(<?php echo clean($editsid); ?>);
		document.getElementsByClassName("editstudent")[0].classList.remove("editstudent-load");
	<?php endif; ?>
});

function studentSearch()
{
        var ul = document.getElementById("stcont");
        var lis = ul.getElementsByClassName("slider-li");

        var searchText = document.getElementById("stusearch").value;

        var lastVis = 0;
        var hidden = 0;

        for(var i = 0; i < lis.length; i++)
        {
                var studentName = lis[i].getElementsByTagName("P")[0].innerHTML;

                if(searchCompare(searchText, studentName)) {
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

        <?php if(!empty($studentinfo)): ?>
                if(lis.length)
                        nextSibling(lis[lastVis]).style.display = "none";

                if(hidden == lis.length)
                        document.getElementById("nostusearchres").style.display = "block";
                else
                        document.getElementById("nostusearchres").style.display = "none";
        <?php endif; ?>
}

function checkSubmit()
{
        var name = document.getElementById("teamname").value;
        var town = document.getElementById("town").value;
        var address = document.getElementById("address").value;
        var coach = document.getElementById("coach").value;
        var email = document.getElementById("email").value;

        if(name === "")
        {
                malert("Please fill out the school name");
                return false;
        }

        if(town === "")
        {
                malert("Please fill out the school town");
                return false;
        }

        if(address === "")
        {
                malert("Please fill out the school address");
                return false;
        }

        if(coach === "")
        {
                malert("Please fill out the school coach");
                return false;
        }

        if(email === "")
        {
                malert("Please fill out the school email");
                return false;
        }

        return confirm("Are you sure you want to finalize your changes?");
}

function checkSubmitAddStudent()
{
	var firstname = document.getElementById("firstname-add").value;
	var lastname = document.getElementById("lastname-add").value;

	if(firstname === "" && lastname === "")
	{
		alert("Please enter a either a first name or a last name, or both");
		return false;
	}

	var fullname = firstname === "" ? "" : firstname;
	fullname += lastname === "" ? "" : " " + lastname;

	return confirm("Are you sure you want to create a student with the name '" + fullname + "'?");
}

function checkSubmitEditStudent()
{
	var firstname = document.getElementById("firstname-edit").value;
        var lastname = document.getElementById("lastname-edit").value;

        if(firstname === "" && lastname === "")
        {
                alert("Please enter a either a first name or a last name, or both");
                return false;
        }

        return confirm("Are you sure you want to finalize your changes?");
}

function clearAddStudent()
{
	document.getElementById("firstname-add").value = "";
	document.getElementById("lastname-add").value = "";

	document.getElementById("nickname-add").value = "";
	document.getElementById("gender-add").selectedIndex = "0";

	reloadSelect2();
}

function cancelEditStudent()
{
	document.getElementById("choosestudent").style.display = "block";

	document.getElementById("editstudent").style.display = "none";
	document.getElementById("editstudentfooter").style.display = "none";

	document.getElementById("editstudentheading").innerHTML = "Edit student";
}

/*function setEditStudentHeading()
{
	var firstname = document.getElementById("firstname-edit").value;
	var lastname = document.getElementById("lastname-edit").value

	var heading = document.getElementById("editstudentheading");
	heading.innerHTML = "Editing student '";

	if(firstname === "")
		heading.innerHTML += lastname;
	else {
		if(lastname === "")
			heading.innerHTML += firstname;
		else
			heading.innerHTML += firstname + " " + lastname;
	}

	heading.innerHTML += "':";
}*/

function chooseStudentEdit(sid)
{
	var list = document.getElementById("stcont").getElementsByClassName("slider-li");

	var e = 0;
	for(var i = 0; i < list.length; i++)
		if(list[i].dataset.sid == sid)
			e = list[i];

	if(e)
	{
		document.getElementById("choosestudent").style.display = "none";

        	document.getElementById("editstudent").style.display = "block";
        	document.getElementById("editstudentfooter").style.display = "block";

		document.getElementById("editstudentheading").innerHTML = "Editing student '" + e.getElementsByClassName("slider-text")[0].innerHTML + "':";
		//"Editing student '" + e.dataset.firstname + (e.dataset.firstname !== "" && e.dataset.lastname !== "" ? " " : "") + e.dataset.lastname + "':";

        	document.getElementById("sideditstudent").value = sid;

		document.getElementById("firstname-edit").value = e.dataset.firstname; //studentinfo[sid]["first_name"];
		document.getElementById("lastname-edit").value = e.dataset.lastname; //studentinfo[sid]["last_name"];
		document.getElementById("nickname-edit").value = e.dataset.nickname; //studentinfo[sid]["nickname"];
		document.getElementById("gender-edit").value = e.dataset.gender; //studentinfo[sid]["gender"];

		reloadSelect2();
	}
}

/*function checkDiff()
{
	if(document.getElementById("teamname").value != "<?php echo clean($row['team_name']); ?>" ||
	   document.getElementById("town").value != "<?php echo clean($row['town']); ?>" ||
	   document.getElementById("address").value != "<?php echo clean($row['address']); ?>" ||
	   document.getElementById("coach").value != "<?php echo clean($row['coach']); ?>" ||
	   document.getElementById("email").value != "<?php echo clean($row['contact_email']); ?>" ||
	   (document.getElementById("firstyear").checked ? 1 : 0) != "<?php echo clean($row['first_year']); ?>")
	{
		document.getElementById("finalizebtn").disabled = false;
	}
	else
	{
		document.getElementById("finalizebtn").disabled = true;
	}
}*/

function deleteSchool()
{
	return confirm("Are you sure you want to delete the team/school '" + "<?php echo clean($schoolrow['team_name']); ?>" + "'?");
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
<div class="container-fluid main">
	<div class="col-md-7">
        	<div class="container-fluid panel panel-primary">
                	<div class="panel-heading"><h4>Edit school</h4></div>
                	<div class="panel-body">
                        	<form id="schoolinfo" onsubmit="return checkSubmit();" action="/editschool.php" method="post">
                                	<div class="col-xs-offset-1 col-xs-10">
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="teamname">Team name</label>
                                                                <input id="teamname" type="text" class="form-control" name="teamname" placeholder="School Name" value="<?php echo clean($schoolrow['team_name']); ?>" required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="town">Town</label>
                                                                <input id="town" type="text" class="form-control" name="town" placeholder="Town" value="<?php echo clean($schoolrow['town']); ?>" required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input id="address" type="text" class="form-control" name="address" placeholder="School Address" value="<?php echo clean($schoolrow['address']); ?>" required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="coach">Coach</label>
                                                                <input id="coach" type="text" class="form-control" name="coach" placeholder="Coach Name" value="<?php echo clean($schoolrow['coach']); ?>" required>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input id="email" type="email" class="form-control" name="email" placeholder="Contact Email" value="<?php echo clean($schoolrow['contact_email']); ?>" required>
                                                        </div>
                                                </div><br>
						<div class="row">
                                                	<div class="dropdown">
                                                        	<label for="stwell">Students</label>
                                                        	<div class="well well-sm slider-well" id="stwell">
                                                                	<div class="input-group searchbar">
                                                                        	<input id="stusearch" type="text" class="form-control" placeholder="Search" oninput="studentSearch();">
                                                                	</div>
                                                                	<ul class="slider-container-fixed" id="stcont">
                                                                        	<?php if($studentinfo == 0): ?>
                                                                                	<li class="nostudent" style="display:block;">Looks like there aren't any students in this school yet.</li>
                                                                        	<?php else: ?>
                                                                                	<li id="nostusearchres" class="nostudent" style="display:none;">No results found</li>
                                                                                	<?php foreach($studentinfo as $row): ?>
                                                                                	        <li class="slider-li" data-sid="<?= $row['SID']; ?>"
														      data-firstname="<?php echo clean($row['first_name']); ?>"
														      data-nickname="<?php echo clean($row['nickname']); ?>"
														      data-lastname="<?php echo clean($row['last_name']); ?>"
														      data-gender="<?php echo clean($row['gender']); ?>">
                                                                        	                        <p class="slider-text"><?php echo clean(getStudentFullName($row)); ?></p>
                                                                	                                <button form="" onclick="chooseStudentEdit(<?= $row['SID'] ?>);" class="btn btn-primary slider-edit">Edit</button>
                                                	                                        </li>
                                                                                        	<li class="divider slider-divider"></li>
                                                                                	<?php endforeach; ?>
                                                                        	<?php endif; ?>
                                                                	</ul>
                                                        	</div>
                                                        </div>
                                        	</div><br>
        					<input type="hidden" name="scid" value="<?php echo clean($_GET['SCID']); ?>">
                                	</div>
                        	</form>
			</div>
			<div class="panel-footer">
                        	<div class="row">
					<button id="finalizebtn" type="submit" class="btn btn-success col-xs-4" form="schoolinfo" name="finalize">Finalize changes</button>
                                	<a class="btn btn-danger col-xs-offset-1 col-xs-2" href="/create.php">Back</a>
					<form onsubmit="return deleteSchool();" method="post" action="">
						<button class="btn btn-danger col-xs-offset-1 col-xs-4" name="delete" type="submit">Delete school</button>
						<input type="hidden" name="scid" value="<?php echo clean($_GET['SCID']); ?>">
					</form>
				</div>
        	        </div>
        	</div>
	</div>
	<div class="col-md-5">
		<div class="container-fluid panel panel-primary">
			<div class="panel-heading">Add student</div>
			<div class="panel-body">
				<form id="addstudent" method="post" action="/editschool.php" onsubmit="return checkSubmitAddStudent();">
					<div class="col-xs-offset-1 col-xs-10">
						<div class="row">
                                                        <div class="form-group">
                                                                <label for="firstname-add">First name</label>
                                                                <input id="firstname-add" type="text" class="form-control" name="firstname" placeholder="First Name">
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="form-group">
                                                                <label for="lastname-add">Last name</label>
                                                                <input id="lastname-add" type="text" class="form-control" name="lastname" placeholder="Last Name">
                                                        </div>
                                                </div>
						<div class="row">
                                                        <div class="form-group">
                                                                <label for="nickname-add">Nickname (optional)</label>
                                                                <input id="nickname-add" type="text" class="form-control" name="nickname" placeholder="Nickname">
                                                        </div>
                                                </div>
						<div class="row">
							<div class="form-group">
								<label for="gender-add">Gender</label>
								<select id="gender-add" name="gender" class="js-select form-control">
									<option value='Male'>Male</option>
									<option value='Female'>Female</option>
									<option value='Other'>Other</option>
								</select>
							</div>
						</div>
						<input type="hidden" name="scid" value="<?php echo clean($_GET['SCID']); ?>">
					</div>
				</form>
			</div>
			<div class="panel-footer">
				<div class="row">
					<button class="btn btn-danger col-xs-offset-1 col-xs-3" onclick="clearAddStudent();">Clear</button>
					<button class="btn btn-success col-xs-offset-2 col-xs-5" type="submit" name="addstudent" form="addstudent">Add student</button>
				</div>
			</div>
		</div>
		<div class="container-fluid panel panel-primary <?php if(isset($_GET['SID'])): ?>editstudent editstudent-load<?php endif; ?>">
			<div id="editstudentheading" class="panel-heading">Edit student</div>
			<div class="panel-body">
				<div id="choosestudent" class="row">
       	                                <div class="text-center">
        	                                <p id="editstudent-label">Choose a student to edit in the main panel</p>
                	                </div>
                                </div>
				<form id="editstudent" method="post" action="/editschool.php" onsubmit="return checkSubmitEditStudent();" style="display:none;">
					<div class="col-xs-offset-1 col-xs-10">
						<div class="row">
                                                       	<div class="form-group">
                                                               	<label for="firstname-edit">First name</label>
                                                               	<input id="firstname-edit" type="text" class="form-control" name="firstname" placeholder="First Name">
                                                       	</div>
                                               	</div>
                                               	<div class="row">
                                                       	<div class="form-group">
                                                               	<label for="lastname-edit">Last name</label>
                                                               	<input id="lastname-edit" type="text" class="form-control" name="lastname" placeholder="Last Name">
                                                       	</div>
                                               	</div>
						<div class="row">
                                                       <div class="form-group">
                                                               <label for="nickname-edit">Nickname (optional)</label>
                                                               <input id="nickname-edit" type="text" class="form-control" name="nickname" placeholder="Nickname">
                                                       </div>
                                               </div>
                                               <div class="row">
                                                        <div class="form-group">
                                                                <label for="gender-edit">Gender</label>
                                                                <select id="gender-edit" name="gender" class="js-select form-control">
                                                                        <option value='Male'>Male</option>
                                                                        <option value='Female'>Female</option>
                                                                        <option value='Other'>Other</option>
                                                                </select>
                                                        </div>
                                                </div>
						<input id="sideditstudent" type="hidden" name="sid" value="0">
                                                <input type="hidden" name="scid" value="<?php echo clean($_GET['SCID']); ?>">
					</div>
				</form>
			</div>
			<div id="editstudentfooter" class="panel-footer" style="display:none">
                                <div class="row">
                                        <button class="btn btn-danger col-xs-offset-1 col-xs-3" onclick="cancelEditStudent();">Cancel</button>
                                        <button class="btn btn-success col-xs-offset-2 col-xs-5" type="submit" name="editstudent" form="editstudent">Finalize changes</button>
                                </div>
                        </div>
		</div>
	</div>
</div>

</body>


</html>
