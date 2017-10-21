<!DOCTYPE html>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<script src="./scripts/jquery.capslockstate.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/select2.css">
<script src="./scripts/select2.js"></script>

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
	will-change: transform;
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
	z-index: 20;
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

.answers-header-row-s {
	padding: 2px;
	white-space: nowrap;
	background-color: #777;
	color: white;
	margin-top: 2px;
	-webkit-box-shadow: 0px 4px 5px 0px rgba(200,200,200,200.75);
        -moz-box-shadow: 0px 4px 5px 0px rgba(200,200,200,200.75);
        box-shadow: 0px 4px 5px 0px rgba(200,200,200,0.75);
	font-size: 15px;
	line-height: 22px;
	position: relative;
	margin-right: 6px;
	z-index: 20;
}

.answers-input-student, .answers-input-regular, .answer-input-list-wrap, .answers-input-school {
	display: block;
}

.answer-input-list {
	white-space: nowrap;
	height: 38px;
}

.answer-input-list-wrap {
	width: 100%;
	height: 38px;
}

.answers-input-student, .answers-input-school {
	width: 100%;
	height: 100%;
	text-align: center;
	padding: 2px 6px;
	line-height: 30px;
	background-color: #eee;
        -webkit-box-shadow: 4px 0px 5px 0px rgba(200,200,200,0.75);
        -moz-box-shadow: 4px 0px 5px 0px rgba(200,200,200,0.75);
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
	height: 34px;
	margin: 2px 3px;
	padding: 3px 5px;
	vertical-align: middle;
	background-color: #efefef;
}

.answer-input-input {
	height: 28px;
	border-radius: 0px;
	overflow: hidden;
}

.answer-input:hover {
	cursor: pointer;
}

.answer-input.highlight {
	background-color: #ddd;
}

.answer-input.ehighlight {
	border: 1px solid #666;
	-webkit-box-shadow: 0px 0px 5px 0px rgba(150,150,150,0.85);
        -moz-box-shadow: 0px 0px 5px 0px rgba(150,150,150,0.85);
        box-shadow: 0px 0px 5px 0px rgba(150,150,150,0.85);
}

.answer-input-input span {
	line-height: 28px;
	height: 28px;
	position: relative;
}

.answers-wrap {
	display: inline-block;
	max-width: 66.666%;
	padding-left: 15px;
	padding-right: 15px;
	text-align: center;
}

.all-wrap {
	text-align: left;
}

.input-temp {
	width: 100%;
	text-align: center;
	background-color: #ddd;
	height: 28px;
	border: none;
	outline: 0;
}

.input-temp:focus {
	border: none;
	outline: 0;
}

#answers {
	overflow-y: auto;
	overflow-x: hidden;
	max-height: 500px;
	will-change: transform;
	position: relative;
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

#saved {
	padding: 3px 15px;
	font-size: 18px;
	border-radius: 4px;
	border-style: solid;
	border-width: 2px;
	text-align: center;
	white-space: nowrap;
}

#saved.error {
	border-color: red;
}

#saved.no {
	border-color: orange;
}

#saved.yes {
	border-color: green;
}

#searchBar {
	border-radius: 0px;
}

.name-highlight {
	padding: 0px;
	margin: 0px;
	background-color: #EE2;
}

#searchResults {
	display: none;
	color: #888;
	font-size: 14px;
	text-align: center;
	padding: 4px;
	margin-top: 4px;
	margin-bottom: -20px;
}

@media (max-width: 991px) {

	.filters-wrap {
		max-width: 400px;
		margin: auto;
	}

	.panel {
		margin-left: auto;
		margin-right: auto;
		max-width: 700px;
	}

	.all-wrap {
		text-align: center;
	}

	.answers-wrap {
		max-width: none;
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

var all_answers = [];
var all_team_answers = [];
var all_regulars = [];

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
						{
							var value = "";
							if(round_problems[rndid]["indiv"] == "1")
							{
								if(all_answers[this.dataset.sid] && all_answers[this.dataset.sid][rndid] && all_answers[this.dataset.sid][rndid][i+1])
									value = all_answers[this.dataset.sid][rndid][i+1];
							}
							else
							{
								if(all_team_answers[this.dataset.scid] && all_team_answers[this.dataset.scid][rndid] && all_team_answers[this.dataset.scid][rndid][i+1])
									value = all_team_answers[this.dataset.scid][rndid][i+1];
							}

							list.append("<div class='answer-input'><div class='answer-input-input' data-lastsent='' id='" + (i+1) + "answer" + this.dataset.scid + "|" + (this.dataset.sid ? this.dataset.sid : "0") + "'><span>" + value + "</span></div></div>");
                				}
					}
				}
				else
					this.style.display = "none";
			});

		$("#subtable-regulars .answers-row").each(function() {
			$(this).find(".checkbox-custom").prop("checked", all_regulars[this.dataset.sid][rndid] === 1 ? true : false);
		});

		$("#answers #answers-header-list").empty().each(function() {
			for(var i = 0; i < round_problems[rndid]["pnum"]; i++)
				$(this).append("<div class='answers-header'>" + (i+1) + "</div>");
		});

		if(round_problems[rndid]["indiv"])
		{
			$("#student-header").html("Student");
			$("#subtable-regulars").css("display", "inline-block");
		}
		else
		{
			$("#student-header").html("School");
			$("#subtable-regulars").css("display", "none");
		}
}

var firstHighlighted = -1;

function search(str)
{
	str = str.toLowerCase().trim();

        var scrolltop = $("#answers").scrollTop();
        var scrollto = scrolltop;
	var scrollPad = 100;

	if(str === "") {
		$("#table-names .answers-row").each(function() {
			var e = this.children[0].children[0];
			e.innerHTML = e.dataset.name;
		});

		firstHighlighted = -1;

		$("#searchResults").css("display", "none");
	}
	else {
		var shown = 0;

		firstHighlighted = -1;

        	$("#table-names .answers-row").each(function(idx) {
        	        var e = this.children[0].children[0];
			var l = e.dataset.name.toLowerCase().indexOf(str);
			if(l == -1) {
				e.innerHTML = e.dataset.name;
			} else {
				if(firstHighlighted == -1) {
					scrollto = this.offsetTop - scrollPad;
					firstHighlighted = idx;
				}

			//	console.log(this.offsetTop);

				e.innerHTML = e.dataset.name.substr(0, l) + "<span class='name-highlight'>" + e.dataset.name.substr(l, str.length) + "</span>" + e.dataset.name.substr(l + str.length);
				shown++;
        	        }
       		});

		$("#searchResults").css("display", "block");
		if(shown == 0)
			$("#searchResults").html("No results");
		else if(shown == 1)
			$("#searchResults").html("1 result");
		else
			$("#searchResults").html(shown + " results");

		console.log("final: " + scrollto);
        	$("#answers").scrollTop(scrollto);
	}
}

var current_cell = 0;
var selection_start = 0;
var firsttype = true;

$(document).ready(function() {
	$(".js-select").select2({
                minimumResultsForSearch: 6,
        });

	$(window).capslockstate();

	$.post("/get_all_answers.php", function(r) {
		console.log(r);
		var data = JSON.parse(r);

		for(var i = 0; i < data.parts.length; i++)
		{
			all_answers[data.parts[i].SID] = [];

                        all_regulars[data.parts[i].SID] = [];

                        var t = (data.parts[i].type == "regular" ? 1 : 0);

                        for(var j = 0; j < data.rounds.length; j++)
			{
                                all_regulars[data.parts[i].SID][data.rounds[j].RNDID] = t;
                		all_answers[data.parts[i].SID][data.rounds[j].RNDID] = [];
			}
		}

                for(var i = 0; i < data.overrides.length; i++)
                {
                        if(!all_regulars[data.overrides[i].SID])
                                all_regulars[data.overrides[i].SID] = [];

                        var t = (data.overrides[i].type == "regular" ? 1 : 0);

                        all_regulars[data.overrides[i].SID][data.overrides[i].RNDID] = t;
                }

		for(var i = 0; i < data.schools.length; i++)
                {
                        all_team_answers[data.schools[i].SCID] = [];

                        for(var j = 0; j < data.rounds.length; j++)
                                all_team_answers[data.schools[i].SCID][data.rounds[j].RNDID] = [];
                }

		for(var i = 0; i < data.answers.length; i++)
			all_answers[data.answers[i].SID][data.answers[i].RNDID][data.answers[i].problem_number] = data.answers[i].answer;

		for(var i = 0; i < data.team_answers.length; i++)
			all_team_answers[data.team_answers[i].SCID][data.team_answers[i].RNDID][data.team_answers[i].problem_number] = data.team_answers[i].answer;

	$("#schoollist").change(selectChange);
	$("#roundlist").change(selectChange);

	selectChange();

	$("#table-scroll").on("click", ".answer-input-input", function(event) {
		if(this.id != current_cell.id)
		{
			exit(current_cell);
			enter(this);
		}
		else if(this.children[0].nodeName != "INPUT")
		{
			var v = this.children[0].innerHTML;

			var inp = document.createElement("INPUT");
                        inp.type = "text";
                        inp.classList = "input-temp";
			inp.value = v;
			inp.form = "";

                        $(this).empty().append(inp);
                        inp.focus();

			$(this).parent().addClass("ehighlight");
		}

		event.stopPropagation();
	});

	$(document).click(function() {
		if(current_cell !== 0)
			exit(current_cell);
	});

	function enter(e)
	{
		if(current_cell !== 0)
			exit(current_cell);

		var rect = e.getBoundingClientRect();
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

		var row = e.parentNode.parentNode.parentNode.parentNode;
		var sid = row.dataset.sid;
		var scid = row.dataset.scid;

		$("#table-names .answers-row").each(function() {
			if(this.dataset.scid == scid && (!sid || this.dataset.sid == sid))
			{
				//console.log("highlight");

				$(this).children().addClass("highlight");
				return false;
			}
		});

		$(e).parent().addClass("highlight");

		var idx = $(e.parentNode).index();
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

		firsttype = true;
		current_cell = e;
	}

	function exit(e)
	{
		$("#table-names .answers-input-school, #table-names .answers-input-student, #answers-header-list .answers-header").removeClass("highlight");

		if(e !== 0)
		{
			gradeProblem(e);

			$(e).parent().removeClass("highlight ehighlight");

			if(e.children[0].nodeName == "INPUT")
			{
				var v = e.children[0].value;

				$(e).empty().append("<span>" + v + "</span>");
			}
		}

		current_cell = 0;
	}

	$("#searchBar").on("blur", function() {
		search("");
	});

	$("#searchBar").on("focus", function() {
		search(this.value);
	});

	$(window).on("keydown", function(event) {
		//console.log(selection_start);

		if(current_cell == 0) {
			console.log("current cell is 0");

			if($("#searchBar").is(":focus")) {
				if(firstHighlighted != -1 && (event.which == 13 || event.which == 9)) {
					event.preventDefault();
					$("#table-scroll .answers-row").eq(firstHighlighted).find(".answer-input-input").eq(0).trigger("click");
					$("#searchBar").trigger("blur");
				}
			}
			else {
				console.log("searchbar is out of focus");
				if(event.which > 47 && event.which < 91) {
					event.preventDefault();
					$("#searchBar").focus().val(event.key);
					search(event.key);
				}
				else if(event.which == 83 && event.ctrlKey) {
					event.preventDefault();
					$("#searchBar").focus().val("");
					search("");
				}
			}

			return;
		}

		var e = current_cell;

		if(selection_start < 0)
			selection_start = 0;

		var v = e.children[0].innerHTML;

		var ehigh = $(e).parent().hasClass("ehighlight");

		// tab and right
		if(event.which == 9 || event.which == 39)
		{
			event.preventDefault();

			if(e.parentNode.nextSibling)
                        {
                                exit(e);
                                enter(e.parentNode.nextSibling.children[0]);
                        //      selection_start = 0;
                        }
			else
			{
				var row = e.parentNode.parentNode.parentNode.parentNode;
                        	var next = $(row).next();

                        	if(next.length && next.hasClass("answers-row") && next.css("display") == "block")
                        	{
                                       	exit(e);
                                       	enter(next.find(".answer-input-input").get(0));
                        //              selection_start = 0;
                        	}
			}
		}
		// left
		else if(event.which == 37)
		{
			event.preventDefault();

                        if(e.parentNode.previousSibling)
                        {
                                exit(e);
                                enter(e.parentNode.previousSibling.children[0]);
                        //      selection_start = 0;
                        }
                        else
                        {
                                var row = e.parentNode.parentNode.parentNode.parentNode;
                                var prev = $(row).prev();

                                if(prev.length && prev.hasClass("answers-row") && prev.css("display") == "block")
                                {
                                        exit(e);
                                        enter(prev.find(".answer-input-input").get(-1));
                        //              selection_start = 0;
                                }
                        }
		}
		// right
		/*else if(event.which == 39)
		{
			//if(selection_start == v.length)
			//{
				if(!ehigh && e.parentNode.nextSibling)
				{
					event.preventDefault();
					exit(e);
					enter(e.parentNode.nextSibling.children[0]);
			//		selection_start = 0;
				}
			//}
			//else
			//{
			//	event.preventDefault();
			//	selection_start++;
			//}
		}*/
		// top
		else if(event.which == 38)
		{
			var row = e.parentNode.parentNode.parentNode.parentNode;
			var prev = $(row).prev();

			if(prev.length && prev.hasClass("answers-row") && prev.css("display") == "block")
			{
				var idx = $(e.parentNode).index();

				//console.log(idx);

				if(idx > -1)
				{
					event.preventDefault();
                                	exit(e);
					enter(prev.find(".answer-input-input").get(idx));
			//		selection_start = Math.min(selection_start, current_cell.children[0].innerHTML.length);
				}
			}
		}
		// bottom
                else if(event.which == 40)
                {
                        var row = e.parentNode.parentNode.parentNode.parentNode;
			var next = $(row).next();

                        if(next.length && next.hasClass("answers-row") && next.css("display") == "block")
                        {
                                var idx = $(e.parentNode).index();

                                if(idx > -1)
                                {
                                        event.preventDefault();
                                        exit(e);
					enter(next.find(".answer-input-input").get(idx));
			//		selection_start = Math.min(selection_start, current_cell.children[0].innerHTML.length);
                                }
                        }
                }
		else
		{
			if(event.which == 13 || event.which == 27)
				event.preventDefault();
			else
				$("#saved").removeClass("no yes error").addClass("no").html("Saving...");

			if(e.children[0].nodeName != "INPUT")
			{
				if(event.which == 27)
					exit(e);
				else
				{
					var v = e.children[0].innerHTML;

					var inp = document.createElement("INPUT");
					inp.type = "text";
					inp.classList = "input-temp";
					inp.form = "";

					if(event.which == 13)
						inp.value = v;

					$(e).empty().append(inp);
					inp.focus();

					$(e).parent().addClass("ehighlight");
				}
			}
			else if(event.which == 13 || event.which == 27)
			{
				var v = e.children[0].value;

                                $(e).empty().append("<span>" + v + "</span>").parent().removeClass("ehighlight");
			}

			/*var c = String.fromCharCode(event.which);

			if(!!event.shiftKey == !!$(window).capslockstate("state"))
				c = c.toLowerCase();

			if(firsttype)
			{
				e.children[0].innerHTML = c;
				firsttype = false;
			}
			else
				e.children[0].innerHTML = e.children[0].innerHTML + c;

			var sbox = e.children[0].getBoundingClientRect();
			var pbox = e.getBoundingClientRect();

			if(sbox.right > pbox.right)
				e.children[0].style.left = "-" + 2*(sbox.right - pbox.right) + "px";*/
		}
	});

	$("#answers").scroll(function() {
		$("#numbers-header").css("top", this.scrollTop + "px");
		$(".answers-header-row-s").css("top", this.scrollTop + "px");
	});

	setInterval(function() {
		if(current_cell !== 0)
			gradeProblem(current_cell);
	}, 2000);

	$(".checkbox-custom-label").click(function() {
		var prev = $(this).prev().prop("checked");

		$(this).prev().prop("checked", !prev);

		var rndid = $("#roundlist").val();
		var sid = this.parentNode.parentNode.dataset.sid;

		$.post("/set_regular_override.php", { rndid: rndid, sid: sid, yes: !prev }, function(r) {
			if(r == "success")
			{
				all_regulars[sid][rndid] = prev ? 0 : 1;
				//console.log(sid + "  " + rndid + "   " + !prev);
			}
			else
				$("#saved").removeClass("no yes error").addClass("error").html("Error Saving");
		});
	});

	});
});

function gradeProblem(input)
{
	var pn = parseInt(input.id);
	var pnl = Math.ceil(Math.log(pn + 1) / Math.LN10);

	var scid = parseInt(input.id.substr(pnl + 6));
	var scidl = Math.ceil(Math.log(scid + 1) / Math.LN10);

	var sid = parseInt(input.id.substr(pnl + scidl + 7));

	var val = "";

	if(input.children[0].nodeName == "INPUT")
		val = input.children[0].value;
	else
		val = input.children[0].innerHTML;

	var rndid = $("#roundlist").val();

	if(input.dataset.lastsent != val)
	{
		$.post("/grade_func.php", { pn: pn, answer: val, scid: scid, sid: sid, rndid: rndid }, function(r) {
			if(r.indexOf("success") > -1)
			{
				$("#saved").removeClass("no yes error").addClass("yes").html("Saved");

				if(sid)
				{
					if(!all_answers[sid])
						all_answers[sid] = [];

					if(!all_answers[sid][rndid])
						all_answers[sid][rndid] = [];

					all_answers[sid][rndid][pn] = val;
				}
				else
				{
					if(!all_team_answers[scid])
                                                all_answers[scid] = [];

                                        if(!all_team_answers[scid][rndid])
                                                all_answers[scid][rndid] = [];

					all_team_answers[scid][rndid][pn] = val;
				}
			}
			else
				$("#saved").removeClass("no yes error").addClass("error").html("Error Saving");

			//console.log(r);
		});

		input.dataset.lastsent = val;
	}
	else
		$("#saved").removeClass("no yes error").addClass("yes").html("Saved");
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
                </ul>
        </div>
</nav>
<div class="container-fluid main">
	<div class="row text-center all-wrap">
                <div class="col-md-4 filters-wrap">
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
									<option value="<?= $row['SCID']?>" <?php if($row["SCID"] == $scid) echo "disabled"; ?>> <?php echo clean($row["team_name"]); ?></option>
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
					<div class="row">
						<div class="form-group col-xs-12">
							<label>Search students/schools</label>
							<input id="searchBar" class="form-control" placeholder="Search" type="text" oninput="search(this.value)">
							<div id="searchResults"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
                <div class="answers-wrap">
			<div class="panel panel-primary">
               			<div class="panel-heading"><h4>Fill out answers</h4></div>
                		<div class="panel-body relative-panel">
					<form id="answers">
						<div class="answers-table">
							<div id="table-names" class="answers-subtable-wrap answers-subtable-fixed">
								<div class="answers-header-row answers-header-row-s">
                                                                        <div class="answers-header-s" id="student-header">Student</div>
                                                                </div>
								<div class="answers-subtable">
									<?php if($studentrows !== 0): ?>
										<?php foreach($studentrows as $student): ?>
											<div class="answers-row" data-sid="<?= $student['SID'] ?>" data-scid="<?= $student['SCID'] ?>" style="display: none">
												<div class="answers-input-student">
													<div class="answer-input-span" data-name="<?php echo clean(getStudentFullName($student)); ?>"><?php echo clean(getStudentFullName($student)); ?></div>
												</div>
											</div>
										<?php endforeach; ?>
									<?php endif; ?>
									<?php if($schoolrows !== 0): ?>
										<?php foreach($schoolrows as $school): ?>
                                                                			<div class="answers-row" data-scid="<?= $school['SCID'] ?>" style="display: none">
                                                                        			<div class="answers-input-school">
                                                                                			<div class="answer-input-span" data-name="<?php echo clean($school['team_name']); ?>"><?php echo clean($school["team_name"]); ?></div>
                                                                        			</div>
                                                                			</div>
                                                        			<?php endforeach; ?>
									<?php endif; ?>
								</div>
							</div>
							<div id="table-scroll" class="answers-subtable-wrap answers-subtable-fluid">
								<div class="answers-header-row" id="numbers-header">
                                                                        <div class="answers-header-wrap" id="answers-header-list"></div>
                                                                </div>
								<div class="answers-subtable">
									<?php if($studentrows !== 0): ?>
										<?php foreach($studentrows as $student): ?>
               	                                                        		<div class="answers-row" data-haslist="y" data-sid="<?= $student['SID'] ?>" data-scid="<?= $student['SCID'] ?>" style="display: none">
               	                                	                      			<div class="answer-input-list-wrap">
													<div class="answer-input-list"></div>
												</div>
											</div>
                                                                		<?php endforeach; ?>
                                                                	<?php endif; ?>
									<?php if($schoolrows !== 0): ?>
										<?php foreach($schoolrows as $school): ?>
                                                                       		 	<div class="answers-row" data-haslist="y" data-scid="<?= $school['SCID'] ?>" style="display: none">
                                                                        			<div class="answer-input-list-wrap">
                                                                                	                <div class="answer-input-list"></div>
                                                                                	        </div>
											</div>
                                                                		<?php endforeach; ?>
									<?php endif; ?>
								</div>
							</div>
							<?php if($typerow["fluid_regulars"] == "1"): ?>
							<div class="answers-subtable-wrap answers-subtable-fixed" id="subtable-regulars">
								<div class="answers-subtable">
									<div style="margin-left: 3px" class="answers-header-row answers-header-row-s">
                                                                                <div class="answers-header-s">R</div>
                                                                        </div>
									<?php if($studentrows !== 0): ?>
										<?php foreach($studentrows as $student): ?>
                                                                        		<div class="answers-row" data-sid="<?= $student['SID'] ?>" data-scid="<?= $student['SCID'] ?>" style="display: none">
                                                                                		<div class="answers-input-regular">
													<input type="checkbox" class="checkbox-custom"></input>
													<label class="checkbox-custom-label"></label>
                                                                                		</div>
                                                                        		</div>
                                                                		<?php endforeach; ?>
									<?php endif; ?>
								</div>
							</div>
							<?php endif; ?>
						</div>
					</form>
				</div>
				<div class="panel-footer">
					<div class="row">
						<a type="submit" class="btn btn-danger col-xs-offset-1 col-xs-4" href="/admin.php">Back</a>
						<div id="saved" class="col-xs-offset-1 col-xs-4 yes">Saved</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>

</html>

