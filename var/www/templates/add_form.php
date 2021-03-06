<!DOCTYPE html>


<head>

<script src="./scripts/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Add school</title>

<style>

.panel {
	max-width: 500px;
}

.firsty {
	margin-left: 2px;
	margin-top: 3px;
}

.panel-heading {
	text-align: center;
}

.panel-heading h4 {
	font-weight: 600;
	font-size: 20px;
}

#student-list {
        list-style-type: none;
        padding: 0px;
        margin: 0px;
        text-align: left;
}

#student-list li {
        padding: 11px;
        border-bottom: 1px solid #ddd;
}

#student-list li:last-child {
        border-bottom: none;
}

#student-list li p {
        text-align: left;
        width: 50%;
        display: inline-block;
}

#student-list li button {
        float: right;
}

</style>

<script type="text/javascript">

function checkSubmit()
{
        var town = document.getElementById("town").value;

        if(town === "")
        {
                malert("Please fill out the school town");
                return false;
        }

	/*
	var mes = "Are you sure you want to create a school with team name '";
	mes += document.getElementById("teamname").value;
	mes += "' from the town '";
	mes += document.getElementById("town").value;
	mes += "'?";
	*/

	//return confirm(mes);
}

$(document).ready(function() {
        $("#student-input").keypress(function(e) {
                if(e.which == 13) {
                        e.preventDefault();
                        var name = $("#student-input").val() ;
                        $("#student-list").append("<li><p>" + name + "</p><button form=\"none\" class=\"btn btn-danger\" onclick=\"deleteStudent(this);\">Delete</button></li>");
                        $("#students").val($("#students").val() + name + ";");
                        $("#student-input").val("");
                }
                else if(e.which == 59)
                        e.preventDefault();
                else
                        $("#student-input").val($("#student-input").val().replace(";", ""));
        });
});

function deleteStudent(e)
{
        $("#students").val($("#students").val().replace(e.previousSibling.innerHTML + ";", ""));
        $(e.parentNode).remove();
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
	<div class="container-fluid panel panel-primary">
		<div class="panel-heading">
			<h4>Fill out the boxes below to create a new school</h4>
		</div>
        	<div class="panel-body">
                        <form id="schoolinfo" onsubmit="return checkSubmit();" action="" method="post">
                		<div class="col-xs-offset-1 col-xs-10">
					<div class="row">
						<div class="form-group">
							<label for="town">Town</label>
							<input id="town" type="text" class="form-control" name="town" placeholder="Town" required>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<label for="teamname">Team name (optional)</label>
							<input id="teamname" type="text" class="form-control" name="teamname" placeholder="School Name">
                				</div>
					</div>
				        <br>
                                        <div class="row text-center">
                                                <h4><b>Add students</b></h4>
                                                <div class="well">
                                                        <input id="students" type="hidden" name="students" value="">
                                                        <ul id="student-list">
                                                        </ul>
                                                        <input id="student-input" class="form-control" type="text" placeholder="Student Name" form="none">
                                                </div>
                                        </div>
                                </div>
			</form>
		</div>
		<div class="panel-footer">
			<div class="row">
				<a class="btn btn-danger col-xs-offset-1 col-xs-3" href=<?= ($returncid == 0) ? "/create.php" : "/editcompetition.php?CID=$returncid" ?>>Back</a>
                		<input type="submit" class="btn btn-success col-xs-offset-1 col-xs-6" form="schoolinfo" name="createschool" value="Create school"></input>
			</div>
		</div>
	</div>
</div>
</body>

</html>

