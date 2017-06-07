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

<title>Grading school</title>

<style>

.panel {
	max-width: none;
	min-width: 0;
}

.panel-heading {
	margin: 0;
}

.main {
	max-width: 1100px;
}

.schoolinfo {
	text-align: center;
	display: block;
	font-size: 18px;
}

button.disabled {
	background-color: #AAA;
}

button.disabled:hover {
	background-color: #AAA;
}

@media (max-width: 991px) {

	.panel {
		margin-left: auto;
		margin-right: auto;
		max-width: 400px;
	}

	.form-group {
		margin: 0;
	}
}

</style>

<script type="text/javascript">

var student_answers = {};
var previous_sid = 0;

$(document).ready(function() {
        $(".js-select").select2({
                minimumResultsForSearch: 6,
		allowClear: true,
		placeholder: {
			id: "0",
			text: "Select a student"
		}
        });

	$("#studentlist").change(function() {
		var sid = parseInt($(this).val());

		if(previous_sid != sid)
		{
			student_answers[previous_sid] = {};

			$("#answers .answer-input").each(function() {
				student_answers[previous_sid][parseInt(this.name)] = this.value;
				this.value = "";
			});

			previous_sid = sid;

			if(sid > 0 && student_answers[sid])
			{
				$("#answers .answer-input").each(function() {
					var num = parseInt(this.name);

					if(student_answers[sid][num])
						this.value = student_answers[sid][num];
				});
			}

			$("#gradesubmit").removeClass("btn-success").addClass("btn-primary").html("submit");
		}

		if(sid == 0)
			$("#gradesubmit").addClass("disabled");
		else
			$("#gradesubmit").removeClass("disabled");
	});

	$("#gradesubmit").on("click", function(e) {
		e.preventDefault();

		if($(this).hasClass("btn-primary") && parseInt($("#studentlist").val()) > 0)
		{
			checkSubmit();

			$(this).removeClass("btn-primary").addClass("btn-success").html("saved!");

			$(this).trigger("focus");
		}
	});
});

function inputChange()
{
	$("#gradesubmit").removeClass("btn-success").addClass("btn-primary").html("submit");
}

function checkSubmit()
{
	var se = document.getElementById("studentlist");

	if(se.options[se.selectedIndex].value == "0")
	{
		alert("Please select a student to grade");
		return false;
	}

	var length = document.getElementById("answers").elements.length;

        var mes = "";

	var numb = 0;
        for(i = 0; i < length-1; i++)
        {
		var e = document.getElementById("answers").elements[i];

                if(e.value === "")
                {
                        mes += parseInt(e.getAttribute("name")) + ", ";
                	numb++;
		}
        }

        if(mes != "")
        {
		var smes = "";
		if(numb == 1)
			smes = "The following question was left blank:\n";
		else
			smes = "The following questions were left blank:\n";

                //if(confirm(smes + mes.slice(0, -2) + "\n\n" + "Would you like to proceed?"))
		{
			submit();
        		return false;
		}
	}

	//if(confirm("Are you sure you want to submit?"))
	{
		submit();
		return false;
	}

	function submit()
	{
		var inputs = $("#answers :input");

    		var values = {};
	    	inputs.each(function() {
        		values[this.name] = $(this).val();
			console.log(this.name);
    		});

		values["gradesubmit"] = "y";
		values["SID"] = $("#studentlist").val();

		$.post("/grade.php", values, function(r) {
			console.log(r);
		});
	}

	return false;
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
	<div class="row text-center">
		<?php if ($roundrow["indiv"] == "1"): ?>
                <div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Choose a student</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-xs-12">
							<p class="schoolname">From school '<b><?php echo clean($schoolrow["team_name"]); ?></b>':</p>
							<select form="answers" name="SID" class="form-control js-select" id="studentlist">
								<option value="0"></option>
								<?php foreach($studentrows as $row): ?>
									<option value=<?= $row['SID']?>> <?php echo clean(getStudentFullName($row)); ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if($roundrow["num_questions"] < 11): ?>
			<?php if($roundrow["indiv"] == "0"): ?>
			<div class="col-md-4 col-md-offset-4 col-xs-offset-1 col-xs-10">
			<?php else: ?>
			<div class="col-md-4 col-md-offset-0 col-xs-offset-1 col-xs-10">
			<?php endif; ?>
		<?php elseif($roundrow["num_questions"] < 21): ?>
			<?php if($roundrow["indiv"] == "0"): ?>
                        <div class="col-md-3 col-md-offset-6 col-xs-offset-1 col-xs-10">
                        <?php else: ?>
                        <div class="col-md-6 col-md-offset-0 col-xs-offset-1 col-xs-10">
                        <?php endif; ?>
		<?php else: ?>
		<?php if($roundrow["indiv"] == "0"): ?>
                        <div class="col-md-8 col-md-offset-2 col-xs-offset-1 col-xs-10">
                        <?php else: ?>
                        <div class="col-md-8 col-md-offset-0 col-xs-offset-1 col-xs-10">
                        <?php endif; ?>
		<?php endif; ?>
			<div class="panel panel-primary">
               			<div class="panel-heading"><h4>Fill out answers</h4></div>
                		<div class="panel-body">
					<div class="row">
						<div class="col-xs-12">
                        				<label style="font-size:21px;" for="answers"><?php echo clean($roundrow["round_name"]); ?></label>
							<?php if($roundrow["indiv"] == "0"): ?>
								<p class="schoolname">For school '<?php echo clean($schoolrow["team_name"]); ?>':</p>
							<?php endif; ?>
                        			</div>
					</div><br>
					<form id="answers">
						<input type="hidden" name="round" value="<?= $roundrow['RNDID'] ?>"></input>
						<input type="hidden" name="SCID" value="<?= $schoolrow['SCID'] ?>"></input>
						<input type="hidden" name="indiv" value="<?= $roundrow['indiv'] ?>"></input>
						<?php for($i = 0; $i < $roundrow["num_questions"] / 30; $i++): ?>
							<div class="row">
		                               			<?php for($j = 0; $j < ($roundrow["num_questions"] - 30 * $i) / 10 && $j < 3; $j++): ?>
        		                               			<?php if($roundrow["num_questions"] < 11): ?>
									<div class="col-xs-offset-1 col-xs-10">
									<?php elseif($roundrow["num_questions"] < 21): ?>
									<div class="col-md-offset-1 col-md-5 col-xs-offset-1 col-xs-10">
									<?php else: ?>
									<div class="col-md-4 col-md-offset-0 col-xs-offset-1 col-xs-10">
									<?php endif; ?>
										<div class="form-group">
											<?php for($k = 0; $k < ($roundrow["num_questions"] - 30 * $i - 10 * $j) && $k < 10; $k++): ?>
												<div class="input-group">
                                	                					<span class="input-group-addon"><?php echo (30 * $i + 10 * $j + $k + 1); ?> </span>
               	                         	        					<input oninput="inputChange()" type="text" form="answers" class="form-control answer-input" name=<?= (30 * $i + 10 * $j + $k + 1)  . "question"?>></input>
               	                         						</div><br>
											<?php endfor; ?>
										</div>
        	                	        			</div>
								<?php endfor; ?>
							</div>
						<?php endfor; ?>
						<input type="hidden" name="numquestions" value="<?= $roundrow['num_questions'] ?>">
					</form>
				</div>
				<div class="panel-footer">
					<div class="row">
						<a type="submit" class="btn btn-danger col-xs-offset-1 col-xs-4" href="/grader.php">Back</a>
						<button type="submit" class="btn btn-primary col-xs-offset-1 col-xs-4 disabled" name="gradesubmit" form="answers" id="gradesubmit">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>

</html>

