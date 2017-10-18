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

	$("#addstudent").submit(checkSubmitAddStudent);
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

        if(name === "")
        {
                malert("Please fill out the school name");
                return false;
        }

        return true;
}

function checkSubmitAddStudent(e)
{
	e.preventDefault();

	var firstname = document.getElementById("firstname-add").value;
	var lastname = document.getElementById("lastname-add").value;
	var scid = document.getElementById("scid-add").value;

	if(firstname === "" && lastname === "")
	{
		alert("Please enter a either a first name or a last name, or both");
		return;
	}

	$.post("/addstudent.php", { firstname: firstname, lastname: lastname, scid: scid }, function(r) {
		var sid = parseInt(r);

		if(!isNaN(sid) && sid > 0)
		{
			document.getElementById("lastname-add").value = "";
			document.getElementById("firstname-add").value = "";
			document.getElementById("firstname-add").focus();

			studentinfo[sid] = [];
			studentinfo[sid]["first_name"] = firstname;
			studentinfo[sid]["last_name"] = lastname;

			var n = document.getElementById("nostudentsatall");
			if(n)
				n.style.display = "none";

			$("#stcont").append("<li class='slider-li'><p class='slider-text'>" + firstname + " " + lastname + "</p><button onclick='chooseStudentEdit(" + sid + ");' class='btn btn-primary slider-edit' form=''>Edit</button></li><li class='divider slider-divider'></li>");
		}
		else
			alert("Error creating student!");
	});
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

        return true;
}

function clearAddStudent()
{
	document.getElementById("firstname-add").value = "";
	document.getElementById("lastname-add").value = "";

	reloadSelect2();
}

function cancelEditStudent()
{
	document.getElementById("choosestudent").style.display = "block";

	document.getElementById("editstudent").style.display = "none";
	document.getElementById("editstudentfooter").style.display = "none";

	document.getElementById("editstudentheading").innerHTML = "Edit student";
}

var studentinfo = [];
<?php if($studentinfo): ?>
	<?php foreach($studentinfo as $row): ?>
		studentinfo[<?= $row["SID"] ?>] = [];
		studentinfo[<?= $row["SID"] ?>]["first_name"] = "<?php echo clean($row['first_name']); ?>";
		studentinfo[<?= $row["SID"] ?>]["last_name"] = "<?php echo clean($row['last_name']); ?>";
	<?php endforeach; ?>
<?php endif; ?>

function chooseStudentEdit(sid)
{
	document.getElementById("choosestudent").style.display = "none";

	document.getElementById("editstudent").style.display = "block";
	document.getElementById("editstudentfooter").style.display = "block";

	document.getElementById("sideditstudent").value = sid;

	document.getElementById("firstname-edit").value = studentinfo[sid]["first_name"];
	document.getElementById("lastname-edit").value = studentinfo[sid]["last_name"];

	document.getElementById("sid-delete").value = sid;

	reloadSelect2();
}

<?php if($editsid): ?>
	window.onload = function() {
		chooseStudentEdit(<?php echo clean($editsid); ?>);
	}
<?php endif; ?>

function deleteSchool()
{
	return confirm("Are you sure you want to delete the team/school '" + "<?php echo clean($schoolrow['team_name']); ?>" + "'? All data associated with this school in all competitions will be deleted");
}

function deleteStudent()
{
	return confirm("Are you sure you want to delete this student? All data associated with this student in all competitions will be deleted");
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
                                                	<div class="dropdown">
                                                        	<label for="stwell">Students</label>
                                                        	<div class="well well-sm slider-well" id="stwell">
                                                                	<div class="input-group searchbar">
                                                                        	<input id="stusearch" type="text" class="form-control" placeholder="Search" oninput="studentSearch();">
                                                                	</div>
                                                                	<ul class="slider-container-fixed" id="stcont">
                                                                        	<?php if($studentinfo == 0): ?>
                                                                                	<li id="nostudentsatall" class="nostudent" style="display:block;">Looks like there aren't any students in this school yet.</li>
                                                                        	<?php else: ?>
                                                                                	<li id="nostusearchres" class="nostudent" style="display:none;">No results found</li>
                                                                                	<?php foreach($studentinfo as $row): ?>
                                                                                	        <li class="slider-li">
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
                                	<a class="btn btn-danger col-xs-offset-1 col-xs-2" href=<?= ($returncid == 0) ? "/create.php" : "/editcompetition.php?CID=$returncid" ?>>Back</a>
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
				<form id="addstudent">
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
						<input type="hidden" id="scid-add" name="scid" value="<?php echo clean($_GET['SCID']); ?>">
					</div>
				</form>
			</div>
			<div class="panel-footer">
				<div class="row">
					<button class="btn btn-success col-xs-offset-1 col-xs-5" id="submit-add" type="submit" name="addstudent" form="addstudent">Add student</button>
					<button class="btn btn-danger col-xs-offset-2 col-xs-3" onclick="clearAddStudent();">Clear</button>
				</div>
			</div>
		</div>
		<div class="container-fluid panel panel-primary">
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
						<input id="sideditstudent" type="hidden" name="sid" value="0">
                                                <input type="hidden" name="scid" value="<?php echo clean($_GET['SCID']); ?>">
					</div>
				</form>
			</div>
			<div id="editstudentfooter" class="panel-footer" style="display:none">
                                <div class="row">
					<button class="btn btn-success col-xs-4" type="submit" name="editstudent" form="editstudent">Apply</button>
					<form onsubmit="return deleteStudent();" method="post" action="">
						<button class="btn btn-danger col-xs-offset-1 col-xs-3" name="deletestudent">Delete</button>
						<input type="hidden" name="SID" id="sid-delete"></input>
						<input type="hidden" name="SCID" value="<?php echo clean($_GET['SCID']); ?>">
					</form>
                                        <button class="btn btn-danger col-xs-offset-1 col-xs-3" onclick="cancelEditStudent();">Cancel</button>
                                </div>
                        </div>
		</div>
	</div>
</div>

</body>


</html>
