<!DOCTYPE html>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/select2.css">
<script src="./scripts/select2.full.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/custom-checkbox.css">

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Grading school</title>

<style>

* {
	box-sizing: border-box;
}

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

.answers-table {
	width: 100%;
	display: flex;
}

.answers-subtable-wrap {
	display: inline-block;
}

.answers-subtable-fixed {
	flex: 0;
}

.answers-subtable-fluid {
	flex: 1;
	overflow: auto;
}

.answers-subtable {
}

.answers-row {
	display: block;
	height: 40px;
}

.answers-header-row {
	display: block;
	height: 24px;
	margin-bottom: 5px;
	white-space: nowrap;
}

#numbers-header {
	position: relative;
}

.answers-header {
	background-color: #eee;
	-webkit-box-shadow: 0px 4px 5px 0px rgba(200,200,200,200.75);
	-moz-box-shadow: 0px 4px 5px 0px rgba(200,200,200,200.75);
	box-shadow: 0px 4px 5px 0px rgba(200,200,200,0.75);
	display: inline-block;
	width: 60px;
	text-align: center;
	font-size: 16px;
	margin: 2px 3px;
	vertical-align: middle;
}

.answers-input-student, .answers-input-regular, .answer-input-list-wrap, .answers-input-school {
	display: block;
}

.answer-input-list {
	white-space: nowrap;
}

.answer-input-list-wrap {
	width: 100%;
}

.answers-input-student, .answers-input-school {
	width: 100%;
	height: 100%;
	text-align: center;
	padding: 2px 6px;
	line-height: 30px;
	background-color: #eee;
        -webkit-box-shadow: 4px 0px 5px 0px rgba(200,200,200,200.75);
        -moz-box-shadow: 4px 0px 5px 0px rgba(200,200,200,200.75);
        box-shadow: 4px 0px 5px 0px rgba(200,200,200,0.75);
}

#table-names .answers-subtable {
	margin-right: 6px;
}

#table-names {
	margin-right: 10px;
}

#table-names .answers-row {
	height: 40px;
	padding: 3px 0px;
}

#table-scroll .answers-row {
	padding: 1px;
}

.answers-input-student.highlight, .answers-input-school.highlight, .answers-header.highlight {
	background-color: #999;
	color: white;
}

.answer-input-span {
	display: inline-block;
	vertical-align: middle;
	white-space: nowrap;
}

.answers-input-school {
}

.answers-input-regular {
	width: 40px;
	height: 40px;
	line-height: 30px;
}

.answer-input {
	display: inline-block;
	width: 60px;
	margin: 2px 3px;
	vertical-align: middle;
}

.answer-input-input {
	border-radius: 0px;
}

.answers-wrap {
	display: inline-block;
	max-width: 66.666%;
	padding-left: 15px;
	padding-right: 15px;
}

.all-wrap {
	text-align: left;
}

#answers {
	overflow-y: auto;
	overflow-x: hidden;
	max-height: 500px;
}

.relative-panel {
	position: relative;
}

#subtable-regulars {
	width: 40px;
}

.checkbox-custom + .checkbox-custom-label:before, .radio-custom + .radio-custom-label:before {
	margin: auto;
}

@media (max-width: 991px) {

	.panel {
		margin-left: auto;
		margin-right: auto;
		max-width: 400px;
	}

	.all-wrap {
		text-align: center;
	}

	.answers-wrap {
		max-width: none;
		display: block;
	}

	.form-group {
		margin: 0;
	}

	.answer-input {
		margin: 2px 3px;
	}
}

</style>

<script type="text/javascript">

var student_answers = {};
var previous_sid = 0;

var round_problems = [];

<?php foreach($roundrows as $round): ?>
round_problems[<?= $round["RNDID"] ?>] = {};
round_problems[<?= $round["RNDID"] ?>]["pnum"] = <?php echo clean($round["num_questions"]); ?>;
round_problems[<?= $round["RNDID"] ?>]["indiv"] = <?= $round["indiv"] == "1" ? "true" : "false" ?>;
<?php endforeach; ?>

function selectChange()
{
		var scid = parseInt($("#schoollist").val());
		var rndid = parseInt($("#roundlist").val());

			$("#answers .answers-row").each(function() {
				if((!scid || this.dataset.scid == scid) && (!!this.dataset.sid == round_problems[rndid]["indiv"]))
				{
					this.style.display = "block";

					if(this.dataset.haslist == "y")
					{
						var list = $(this).find(".answer-input-list").empty();

						for(var i = 0; i < round_problems[rndid]["pnum"]; i++)
							list.append("<div class='form-group answer-input'><input type='text' class='form-control answer-input-input' form='answers' name='" + i + "answer" + this.dataset.scid + "|" + this.dataset.sid + "'></input></div>");
                			}
				}
				else
					this.style.display = "none";
			});

		$("#answers #answers-header-list").empty().each(function() {
			for(var i = 0; i < round_problems[rndid]["pnum"]; i++)
				$(this).append("<div class='answers-header'>" + (i+1) + "</div>");
		});
}

$(document).ready(function() {
        $(".js-select").select2({
                minimumResultsForSearch: 6,
        });

	$("#schoollist").change(selectChange);
	$("#roundlist").change(selectChange);

	selectChange();

	$("#table-scroll").on("focus", ".answer-input-input", function() {
		var rect = this.getBoundingClientRect();
		var scroll = document.getElementById("table-scroll");
		var brect = scroll.getBoundingClientRect();

		var form = document.getElementById("answers");
		var frect = form.getBoundingClientRect();

		var pad = 4;
		var topStuff = 29;

		if(rect.right > brect.right - pad)
			scroll.scrollLeft = scroll.scrollLeft + (rect.right - brect.right) + pad;
		else if(rect.left < brect.left + pad)
			scroll.scrollLeft = scroll.scrollLeft - (brect.left - rect.left) - pad;

		if(rect.bottom > frect.bottom - pad)
                        form.scrollTop = form.scrollTop + (rect.bottom - frect.bottom) + pad;
                else if(rect.top < frect.top + pad + topStuff)
                        form.scrollTop = form.scrollTop - (frect.top - rect.top) - pad - topStuff;

		var row = this.parentNode.parentNode.parentNode.parentNode;
		var sid = row.dataset.sid;
		var scid = row.dataset.scid;

		$("#table-names .answers-row").each(function() {
			if(this.dataset.scid == scid && (!sid || this.dataset.sid == sid))
			{
				console.log("highlight");

				$(this).children().addClass("highlight");
				return false;
			}
		});

		var idx = $(this.parentNode).index();
		$("#answers-header-list .answers-header").get(idx).classList.add("highlight");

		var ridx = $(row).index();

		var rows = row.parentNode.children;

		var first = true;

		for(var i = ridx-1; i >= 0; i--)
		{
			if(rows[i].style.display == "block")
			{
				first = false;
				break;
			}
		}

		if(first)
			$("#answers").scrollTop(0);
	});

	$("#table-scroll").on("blur", ".answer-input-input", function(event) {
		$("#table-names .answers-input-school, #table-names .answers-input-student, #answers-header-list .answers-header").removeClass("highlight");
	});

	$("#table-scroll").on("keydown", ".answer-input-input", function(event) {
		// left
		if(event.which == 37)
		{
			if(this.parentNode.previousSibling && this.selectionStart == this.selectionEnd && this.selectionStart == 0)
			{
				event.preventDefault();
				$(this).blur();
				$(this.parentNode.previousSibling.children[0]).focus();
			}
		}
		// right
		else if(event.which == 39)
		{
			if(this.parentNode.nextSibling && this.selectionStart == this.selectionEnd && this.selectionStart == this.value.length)
			{
				event.preventDefault();
				$(this).blur();
				$(this.parentNode.nextSibling.children[0]).focus();
			}
		}
		// top
		else if(event.which == 38)
		{
			var row = this.parentNode.parentNode.parentNode.parentNode;
			var prev = $(row).prev();

			if(prev.length && prev.hasClass("answers-row") && prev.css("display") == "block")
			{
				var idx = $(this.parentNode).index();

				//console.log(idx);

				if(idx > -1)
				{
					event.preventDefault();
                                	$(this).blur();
					prev.find(".answer-input-input").get(idx).focus();
				}
			}
		}
		// bottom
                else if(event.which == 40)
                {
                        var row = this.parentNode.parentNode.parentNode.parentNode;
			var next = $(row).next();

                        if(next.length && next.hasClass("answers-row") && next.css("display") == "block")
                        {
                                var idx = $(this.parentNode).index();

                                if(idx > -1)
                                {
                                        event.preventDefault();
                                        $(this).blur();
					next.find(".answer-input-input").get(idx).focus()
                                }
                        }
                }
	});

	$("#answers").scroll(function() {
		$("#numbers-header").css("top", this.scrollTop + "px");
	});
});

function checkSubmit()
{
	/*var se = document.getElementById("studentlist");

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
	}*/

	return confirm("Are you sure you want to submit?");
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
	<div class="row text-center all-wrap">
                <div class="col-md-4">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4>Filters</h4>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group col-xs-12">
							<label>School</label>
							<select form="answers" name="SCID" class="form-control js-select" id="schoollist">
								<option value="0" selected>All schools</option>
								<?php foreach($schoolrows as $row): ?>
									<option value="<?= $row['SCID']?>"> <?php echo clean($row["team_name"]); ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="row">
                                                <div class="form-group col-xs-12">
                                                        <label>Round</label>
                                                        <select form="answers" name="RNDID" class="form-control js-select" id="roundlist">
                                                                <?php foreach($roundrows as $row): ?>
                                                                        <option value="<?= $row['RNDID']?>"> <?php echo clean($row["round_name"]); ?></option>
                                                                <?php endforeach; ?>
                                                        </select>
                                                </div>
                                        </div>
				</div>
			</div>
		</div>
                <div class="answers-wrap">
			<div class="panel panel-primary">
               			<div class="panel-heading"><h4>Fill out answers</h4></div>
                		<div class="panel-body relative-panel">
					<form id="answers" method="post" action="" onsubmit="return checkSubmit()">
						<div class="answers-table">
							<div id="table-names" class="answers-subtable-wrap answers-subtable-fixed">
								<div class="answers-header-row">
                                                                        <div class="answers-header"></div>
                                                                </div>
								<div class="answers-subtable">
									<?php foreach($studentrows as $student): ?>
										<div class="answers-row" data-sid="<?= $student['SID'] ?>" data-scid="<?= $student['SCID'] ?>" style="display: none">
											<div class="answers-input-student">
												<span class="answer-input-span"><?php echo clean(getStudentFullName($student)); ?></span>
											</div>
										</div>
									<?php endforeach; ?>
									<?php foreach($schoolrows as $school): ?>
                                                                		<div class="answers-row" data-scid="<?= $school['SCID'] ?>" style="display: none">
                                                                        		<div class="answers-input-school">
                                                                                		<span class="answer-input-span"><?php echo clean($school["team_name"]); ?></span>
                                                                        		</div>
                                                                		</div>
                                                        		<?php endforeach; ?>
								</div>
							</div>
							<div id="table-scroll" class="answers-subtable-wrap answers-subtable-fluid">
								<div class="answers-header-row" id="numbers-header">
                                                                        <div class="answers-header-wrap" id="answers-header-list"></div>
                                                                </div>
								<div class="answers-subtable">
									<?php foreach($studentrows as $student): ?>
               	                                                        	<div class="answers-row" data-haslist="y" data-sid="<?= $student['SID'] ?>" data-scid="<?= $student['SCID'] ?>" style="display: none">
               	                                	                      		<div class="answer-input-list-wrap">
												<div class="answer-input-list"></div>
											</div>
										</div>
                                                                	<?php endforeach; ?>
                                                                	<?php foreach($schoolrows as $school): ?>
                                                                        	<div class="answers-row" data-haslist="y" data-scid="<?= $school['SCID'] ?>" style="display: none">
                                                                        		<div class="answer-input-list-wrap">
                                                                                                <div class="answer-input-list"></div>
                                                                                        </div>
										</div>
                                                                	<?php endforeach; ?>
								</div>
							</div>
							<div class="answers-subtable-wrap answers-subtable-fixed" id="subtable-regulars">
								<div class="answers-subtable">
									<div class="answers-header-row">
                                                                                <div class="answers-header"></div>
                                                                        </div>
									<?php foreach($studentrows as $student): ?>
                                                                        	<div class="answers-row" data-sid="<?= $student['SID'] ?>" data-scid="<?= $student['SCID'] ?>" style="display: none">
                                                                                	<div class="answers-input-regular">
                                                                                        	<input type="checkbox" value="yes" class="checkbox-custom"></span>
												<label class="checkbox-custom-label"></label>
                                                                                	</div>
                                                                        	</div>
                                                                	<?php endforeach; ?>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="panel-footer">
					<div class="row">
						<a type="submit" class="btn btn-danger col-xs-offset-1 col-xs-4" href="/grader.php">Back</a>
						<button type="submit" class="btn btn-primary col-xs-offset-1 col-xs-4" name="gradesubmit" form="answers" id="gradesubmit">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>

</html>

