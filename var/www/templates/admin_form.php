<!DOCTYPE html>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/select2.css">
<script src="./scripts/select2.js"></script>

<link rel="stylesheet" type="text/css" href="./styles/general.css">
<script src="./scripts/general.js"></script>

<title>Welcome</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

.main, .mnavcontainer {
	min-width: 850px;
}

.ncont {
	width: 800px;
	margin-bottom: 60px;
}

.dropdown-toggle {
	margin-right: 7px;
}

.currentcomp {
	font-size: 16px !important;
	margin-bottom: 4px !imporant;
}

.curlabel {
	font-size: 20px;
}

.nocomp {
	display: block !important;
	padding: 5px 10px;
}

.dropdown-menu {
	width: 300px;
}

.panel {
	max-width: 500px;
}

.btn-danger {
	border-radius: 4px !important;
}

.progress {
	height: 26px;
}

.progress-bar {
	line-height: 26px;
	font-size: 14px;
	min-width: 2em;
}

.navbar {
	-webkit-box-shadow: none;
	box-shadow: none;
	border: none;
	border-bottom: 1px solid #e7e7e7;
}

.info-wrapper {
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .15), 0 1px 5px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, .15), 0 1px 5px rgba(0, 0, 0, .075);
    background-color: #f8f8f8;
    border: 1px solid #e7e7e7;
}

.conflicts-list, #conflicts-student-list, #team-conflicts-student-list, #standings-cont ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
}

#conflicts-student-list, #team-conflicts-student-list {
	background-color: #f8f8f8;
}

.conflicts-student-li {
    border: 1px solid #ccc;
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .15), 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, .15), 0 1px 1px rgba(0, 0, 0, .075);
	border-radius: 4px;
	margin: 1px;
}

.conflicts-list {
	padding: 0px 10px;
	max-height: 0px;
	overflow: hidden;
}

.conflicts-list.cactive {
	max-height: none;
}

.conflicts-student-li button, .conflicts-li {
	display: block;
	padding: 10px 15px;
	width: 100%;
	border: none;
	-webkit-box-shadow: none;
    	box-shadow: none;
	text-align: center;
}

.conflicts-student-li button {
	font-size: 18px;
}

.conflicts-li {
	font-size: 16px;
	border-bottom: 1px solid rgba(100, 100, 100, 0.2);
}

.conflicts-li:hover {
	background-color: rgb(235, 235, 235);
	cursor: pointer;
}

.conflicts-li span {
	color: #a92112;
}

.conflicts-li:last-child {
	border-bottom: none;
}

#infocont {
	padding: 0px 15px 15px 15px;
	height: 420px;
}

.options-wrap {
	display: none;
}

.options-wrap, .options-wrap .row {
	height: 100%;
}

#infocont .row, #infocont .col-xs-6 {
	height: 100%;
}

.conflict-wrap {
	height: 100%;
	padding: 15px;
	text-align: left;
	border-radius: 5px;
	background-color: #eee;
	overflow: auto;
}

.graders-list-wrap {
	overflow: auto;
	max-height: 40%;
	margin: 15px 0px;
	text-align: center;
}

.graders-list-wrap ul {
	margin: 0;
	list-style-type: none;
	padding: 0;
	display: table;
	table-layout: fixed;
}

.grader-li {
	margin: 2px;
	display: table-row;
}

.grader-li:first-child span {
	background-color: #ccc;
}

.grader-li span {
	display: table-cell;
	vertical-align: middle;
	text-align: center;
	background-color: #ddd;
	padding: 5px 10px;
	border-bottom: 1px solid #b9b9b9;
}

.grader-li:not(:first-child):hover span {
	color: white;
	background-color: #aaa;
	cursor: pointer;
}

.grader-li:last-child span {
	border-bottom: none;
}

.grader-li span:first-child {
	border-right: 1px solid #b9b9b9;
	width: 1%;
	padding: 5px 15px;
}

.conflict-inst {
	text-align: center;
	color: #555;
	padding: 0;
	margin: 15px 5px;
	font-size: 18px;
}

.conflict-name {
	text-align: center;
	font-size: 25px;
	padding: 8px;
}

.conflict-problem {
	text-align: center;
	font-size: 20px;
	border-bottom: 1px solid #ccc;
	padding: 5px;
}

.conflict-problem span {
	font-size: 22px;
}

.progress-label {
	text-align: left;
	font-size: 20px;
	color: #888;
	margin: 15px 5px 5px 5px;
}

.standings-list {
	display: table;
	width: 100%;
}

.standings-li {
	display: table-row;
}

.standings-li span {
	display: table-cell;
	background-color: #ccc;
	border-bottom: 1px solid #aaa;
	vertical-align: middle;
	padding: 4px;
}

.standings-li:first-child span {
	background-color: #999;
	color: white;
}

.standings-li span:not(:last-child) {
	border-right: 1px solid #aaa;
}

.standings-li span:nth-child(2) {
	width: auto;
}

.standings-li:last-child span {
	border-bottom: none;
}

.standings-li span:first-child {
	width: 55px;
}

.standings-li span:last-child {
	width: 65px;
}

.standings-li:nth-child(2) span:first-child {
        background-color: #FFD700;
        color: white;
}

.standings-li:nth-child(3) span:first-child {
        background-color: #c0c0c0;
        color: white;
}

.standings-li:nth-child(4) span:first-child {
        background-color: #CD7F32;
        color: white;
}

#standings-cont .row {
	height: auto;
	max-height: 100%;
	margin-bottom: 40px;
}

#standings-cont .col-xs-6 {
	height: auto;
	max-height: 100%;
}

.standings-label {
	color: #777;
	font-size: 18px;
	text-align: center;
	font-weight: normal
}

.nav > li {
	float: left;
}

.navbar-nav > li > a {
	padding-top: 15px;
	padding-bottom: 15px;
}

.navbar-nav {
	float: left;
	margin: 0;
}

.progress-wrap {
	display: -moz-flex;
	display: -ms-flex;
	display: -webkit-flex;
	display: flex;
	margin-bottom: 30px;
}

.progress {
	-moz-flex: 1;
	-ms-flex: 1;
	-webkit-flex: 1;
	flex: 1;
	margin-bottom: 0px;
	border-top-right-radius: 0px;
	border-bottom-right-radius: 0px;
}

.progress-button {
	border-top-left-radius: 0px;
	border-bottom-left-radius: 0px;
	-moz-flex: 0;
	-ms-flex: 0;
	-webkit-flex: 0;
	flex: 0;
}

.more-progress {
	border-bottom-left-radius: 5px;
	border-bottom-right-radius: 5px;
	background-color: #eee;
	padding: 6px 12px 12px 12px;
	transition: height 1s;
	height: 300px;
	overflow: auto;
}

.more-progress.hidden {
	height: 0px;
}

.more-progress-table {
	width: 100%;
	height: 100%;
	table-layout: fixed;
}

#more-progress-head, #more-progress-list {
	//display: block;
}

#more-progress-list {
	//height: 280px;
	//overflow-x: hidden;
	//overflow-y: auto;
	height: 100%;
}

#more-progress-list tr {
	height: 100%;
}

#more-progress-list td {
	height: 100%;
}

.panswer {
	height: 100%;
	position: relative;
}

.edit-wrap {
	position: absolute;
	width: 200px;
	height: 200px;
	background-color: #eee;
	right: -200px;
	top: 0px;
}

td p, .answer-edit input {
	display: inline-block;
	padding: 4px 15px;
	width: 55%;
	border-radius: 0px;
}

.answer-edit input {
	padding: 5px 8px;
	margin-bottom: 10px;
}

.edit-select {
	display: inline-block;
	width: 55%;
	margin-bottom: 10px;
}

.panswer .btn-group, .answer-edit button {
	margin-left: 5%;
	width: 35% !important;
	display: inline-block;
}

.answer-edit button {
	padding: 5px !important;
	font-size: 13px !important;
}

.panswer .btn-group button {
	padding: 5px !important;
	font-size: 13px !important;
	width: 100% !important;
}

.panswer .dropdown-menu {
	left: -100px;
	width: 120px !important;
}

.panswer .dropdown-menu a {
	cursor: pointer;
}

td .wrong {
	background-color: #e9635f;
	color: #fff;
}

td .right {
	background-color: #4ca84c;
	color: #000;
}

td .noneyet {
	background-color: #fff;
	color: #000;
}

.filter-select {
	width: 100%;
}

.more-progress th {
	padding: 8px;
}

.filter-title {
	display: block;
	width: 100%;
	padding: 5px;
	font-size: 17px;
	margin: 0;
        padding: 5px;
	font-weight: 600;
        text-align: center;
}

.select2-selection__rendered {
	font-weight: 500;
}

#filter_number_enter {
	font-weight: 400;
}

#no-progress-results td {
	font-size: 15px;
	font-weight: 400;
	text-align: center;
	padding: 15px;
}

.small-select {
	padding: 4px;
}

</style>

<script type="text/javascript">

/*$(document).ready(
$(function()
{
	$('.slider-container').jScrollPane();
}));*/

</script>

<script type="text/javascript">

function changeComp(CID)
{
	if(!isHovered(document.getElementById("editbtn" + CID)))
		if(confirm("Are you sure you want to change the current competition? All grading activity will go to the new competition"))
			redirectTo("/admin.php?setComp=" + CID);
}

/*function getRoundName(r)
{
	if(r.substr(0, r.length-2) == "target")
		return "Target, Round " + r.slice(-1);
	else
		return r.charAt(0).toUpperCase() + r.slice(1);
}*/

var request;

var intervalFunc;

function loadProgress()
{
	intervalFunc = loadProgress;

	if(request)
                request.abort();

        request = $.ajax({
                url: "/get_progress.php",
                type: "post"
        });

        request.done(function(response, textStatus, jqXHR) {
		if(response === "")
			return;

		var data = JSON.parse(response);

		//console.log(data);

		var avg = 0.0;

		$(data.progress).each(function() {
			var p = Math.floor(parseFloat(this.status) * 100);
			$("#progressbar-" + this.RNDID + " .progress-bar").css("width", p + "%").html(p + "%");

			avg += p / data.round_info.length;
		});

		avg = Math.floor(avg);

		/*var s = parseFloat(data["status_sprint"]) * 100;
		var t1 = parseFloat(data["status_target1"]) * 100;
		var t2 = parseFloat(data["status_target2"]) * 100;
		var t3 = parseFloat(data["status_target3"]) * 100;
		var t4 = parseFloat(data["status_target4"]) * 100;
		var tm = parseFloat(data["status_team"]) * 100;

		$("#progressbar-sprint").css("width", s + "%").html(s + "%");
		$("#progressbar-target1").css("width", t1 + "%").html(t1 + "%");
		$("#progressbar-target2").css("width", t2 + "%").html(t2 + "%");
		$("#progressbar-target3").css("width", t3 + "%").html(t3 + "%");
		$("#progressbar-target4").css("width", t4 + "%").html(t4 + "%");
		$("#progressbar-team").css("width", tm + "%").html(tm + "%");*/

		$("#progressbar-total").css("width", avg + "%").html(avg + "%");

		$("#more-progress-list tr").each(function() {
			this.dataset.answer = "3";
		}).find(".panswer p").removeClass().addClass("noneyet").html("None yet");

		/*$("#more-progress-list .answer-edit-parser").each(function() {
			if(this.style.display == "none")
				this.children[0].children[0].value = "0";
		});

		$("#more-progress-list .answer-edit-answer input").each(function() {
			if(this.style.display == "none")
				this.children[0].value = "";
		});*/

		$(data.student_info_and_answers).each(function() {
			var sinfo = this.student_info;

			$(this.answers).each(function() {
				var points = this.points;
				var answer = this.answer;

				$("#more-progress-list").find("#" + sinfo.SID + "a" + this.RNDID + "a" + this.problem_number).each(function() {
					//console.log(this);
					if(points === 0)
					{
						this.dataset.answer = "1";
						/*var wrap = $(this).find(".answer-edit-parser")[0];
						var wrap2 = wrap.previousSibling;

						if(wrap.style.display == "none")
							wrap.children[0].children[0].value = "1";

						if(wrap2.style.display == "none")
							wrap2.children[0].value = answer;*/
					}
					else
					{
						this.dataset.answer = "2";
						/*var wrap = $(this).find(".answer-edit-parser")[0];
						var wrap2 = wrap.previousSibling;

                                                if(wrap.style.display == "none")
                                                        wrap.children[0].children[0].value = "2";

						if(wrap2.style.display == "none")
							wrap2.children[0].value = answer;*/
					}

				}).find(".panswer p").removeClass().addClass(points === 0 ? "wrong" : "right").html("'" + answer + "'");
			});
		});

		$(data.team_info_and_answers).each(function() {
			var tinfo = this.team_info;

			$(this.answers).each(function() {
				var points = this.points;

                                $("#more-progress-list").find("#s" + tinfo.SCID + "a" + this.RNDID + "a" + this.problem_number).each(function() {
                                        if(points === 0)
                                                this.dataset.answer = "1";
                                        else
                                                this.dataset.answer = "2";
                                }).find(".panswer p").removeClass().addClass(points === 0 ? "wrong" : "right").html("'" + this.answer + "'");
                	});
		});

		setTimeout(filterMoreProgress, 50);
	});

	request.fail(function(jqXHR, textStatus, errorThrown) {

        });
}

function filterMoreProgress()
{
	var school = false;
	var id = $("#filter_student").val();

	if(id.substr(0, 1) === "s")
	{
		school = true;
		id = id.substr(1);
	}

	var rndid = $("#filter_round").val();
	var answer = $("#filter_answer").val();
	var number = $("#filter_number").html();

	var shown = 0;

	$("#more-progress-list tr").each(function() {
		this.style.display = "none";

		//var isschool = (this.id.substr(0, 1) === "s");

		//if(school == isschool)
		//{
			if(id == "0" || (school && (this.dataset.scid == id)) || this.dataset.sid == id)
			{
				if(rndid == "0" || this.dataset.rndid == rndid)
				{
					if(answer == "0" || this.dataset.answer == answer)
					{
						if(number == "0" || this.dataset.pnum == number)
						{
							this.style.display = "table-row";
							shown++;
						}
					}
				}
			}
		//}
	});

	if(!shown)
		$("#no-progress-results").css("display", "table-row");
	else
		$("#no-progress-results").css("display", "none");
}

function loadConflicts()
{
	intervalFunc = loadConflicts;

	if(request)
		request.abort();

	request = $.ajax({
		url: "/get_conflicts.php",
		type: "post"
	});

	request.done(function(response, textStatus, jqXHR) {
		if(response === "")
			$("#conflicts-student-list").html("Looks like there aren't any conflicts yet");
		else
		{
			var array = JSON.parse(response);

			for(var i = 0; i < array.length; i++)
			{
				//console.log(array[i]["SID"]);
				var li = 0;
				var clist = 0;
				var cexists = [];

				//console.log(li);

				//console.log(cexists);

				$("#conflicts-cont .conflicts-li").each(function() {
                                	cexists.push(parseInt(this.dataset.coid));
                       	 	});

				var exist = $("#conflicts-cont .conflicts-student-li");
				for(var k = 0; k < exist.length; k++)
				{
					if(exist[k].dataset.sid == array[i]["SID"])
					{
						li = exist[k];
						break;
					}
				}

				if(li === 0)
				{
					li = document.createElement("LI");
                                        $("#conflicts-student-list").append(li);
                                        li.classList.add("conflicts-student-li");
                                        li.dataset.sid = array[i]["SID"];

                                        $(li).append("<button class='btn btn-default'>" + array[i]["name"] + "</button>");

                                        clist = document.createElement("UL");
                                        clist.classList.add("conflicts-list");

					$(li).append(clist);
				}
				else
					clist = $(li).find(".conflicts-list");

				for(var j = 0; j < array[i]["conflicts"].length; j++)
				{
					var row = array[i]["conflicts"][j];
					var round = row["round_name"];

					if(cexists.indexOf(row['COID']) === -1)
						$(clist).append("<li class='conflicts-li' data-coid='" + row["COID"] + "'>Number: <span>" + row["pn"] + "</span>  |  Round: <span>" + round + "</span></li>");
				}
			}
		}

		setTimeout(function() {
			$("#conflicts-cont .conflicts-student-li button").off("click").click(function() {
				$(this).next().toggleClass("cactive");
			});

			$("#conflicts-cont .conflicts-li").off("click").each(function() {
				$(this).click(function() {
					$("#conflict-body").css("display", "none");
					getConflict($(this)[0]);
				});
			});
		}, 50);
	});

	request.fail(function(jqXHR, textStatus, errorThrown) {
		
	});
}

function getConflict(c)
{
	if(request)
                request.abort();

        request = $.ajax({
                url: "/get_conflicts.php",
                type: "post",
		data: { COID: c.dataset.coid }
	});

        request.done(function(response, textStatus, jqXHR) {

		//console.log(response);

		if(response === "")
			return;

		var array = JSON.parse(response);

		$("#conflict-info").css("display", "none");
		$("#conflict-body").css("display", "block");
		$("#conflict-admin-list").empty().prev().css("display", "none");
		$("#conflict-grader-list").empty().prev().css("display", "none");
		$("#conflict-problem").html(c.innerHTML);
		$("#conflict-name").html(c.parentNode.previousSibling.innerHTML);

		var graders = 0;
		var admins = 0;

		for(var i = 0; i < array.length; i++)
		{
			if(array[i]["gtype"] == "admin")
			{
				$("#conflict-admin-list").append(
				"<li class='grader-li' data-rid='" + array[i]["RID"] + "'>" +
					"<span>" + array[i]["gname"] + "</span>" +
					"<span>'" + array[i]["answer"] + "'</span>" +
				"</li>");
				admins++;
			}
			else
			{
				$("#conflict-grader-list").append(
                                "<li class='grader-li' data-rid='" + array[i]["RID"] + "'>" +
                                        "<span>" + array[i]["gname"] + "</span>" +
                                        "<span>'" + array[i]["answer"] + "'</span>" +
                                "</li>");
				graders++;
			}
		}

		if(graders)
                {
                        $("#conflict-grader-list").prev().css("display", "inline-block");

                        $("#conflict-grader-list").prepend(
                        "<li class='grader-li'>" +
                                "<span>Name</span>" +
                                "<span>Answer</span>" +
                        "</li>"
                        );
                }

		if(admins)
                {
                        $("#conflict-admin-list").prev().css("display", "inline-block");

                        $("#conflict-admin-list").prepend(
                        "<li class='grader-li'>" +
                                "<span>Name</span>" +
                                "<span>Answer</span>" +
                        "</li>"
                        );
                }

		setTimeout(function() {
			$("#conflict-body .grader-li").each(function() {
				$(this).click(function() {
					var self = this;
					var name = self.children[0].innerHTML;
					var answer = self.children[1].innerHTML;

					if(confirm("Are you sure you want to choose " + name + "'s answer of '" + answer + "'?"))
					{
        					var request1 = $.ajax({
                					url: "/get_conflicts.php",
                					type: "post",
                					data: { RID: self.dataset.rid, COID: c.dataset.coid }
        					});

					        request1.done(function(response, textStatus, jqXHR) {
							if(response == "error")
								alert("There was an error recording your decision.");
							else
							{
								//console.log(response);
								alert("Your decision has been recorded");

								$("#conflict-info").css("display", "block");
                						$("#conflict-body").css("display", "none");
                						$("#conflict-admin-list").empty();
                						$("#conflict-grader-list").empty();
								if($(c).parent().children().length < 2)
									$(c).parent().remove();
								else
									$(c).remove();
							}
						});

						request1.fail(function(jqXHR, textStatus, errorThrown) {
							alert("There was an error recording your decision.");
        					});
					}
				});
			});

			$("#conflict-input-save").off("click").click(function() {
				var v = $("#conflict-input-answer").val();

				var rid = 0;
				$("#conflict-grader-list .grader-li").each(function() {
					if(this.dataset.rid)
					{
						rid = this.dataset.rid;
						return false;
					}
				});

				if(!rid)
				{
					$("#conflict-admin-list .grader-li").each(function() {
						if(this.dataset.rid)
						{
							rid = this.dataset.rid;
							return false;
						}
					});
				}

				if(v !== "" && confirm("Are you sure you want to record '" + v + "' as the answer?"))
				{
					var request1 = $.ajax({
                                               url: "/get_conflicts.php",
                                               type: "post",
         	                               data: { RID: rid, COID: c.dataset.coid, ranswer: v }
                                        });

                                        request1.done(function(response, textStatus, jqXHR) {
                                                //alert(response);
                                	        if(response == "error")
							alert("There was an error recording your response.");
                                        	else
						{
							alert("Your response has been recorded!");

							$("#conflict-info").css("display", "block");
                                                        $("#conflict-body").css("display", "none");
                                                        $("#conflict-admin-list").empty();
                                                        $("#conflict-grader-list").empty();
                                                        if($(c).parent().children().length < 2)
                                                                $(c).parent().remove();
                                                        else
                                                                $(c).remove();
						}
					});

                                        request1.fail(function(jqXHR, textStatus, errorThrown) {
                                        	alert("There was an error recording your response.");
                                	});
				}
			});
		}, 50);
	});

	request.fail(function(jqXHR, textStatus, errorThrown) {

        });
}

function loadTeamConflicts()
{
	intervalFunc = loadTeamConflicts;

        if(request)
                request.abort();

        request = $.ajax({
                url: "/get_team_conflicts.php",
                type: "post"
        });

        request.done(function(response, textStatus, jqXHR) {
        //alert(response);
		if(response === "")
                        $("#team-conflicts-student-list").html("Looks like there aren't any conflicts yet");
                else
                {
                        var array = JSON.parse(response);
                        for(var i = 0; i < array.length; i++)
                        {
                                //console.log(array[i]["SID"]);
                                var li = 0;
                                var clist = 0;
                                var cexists = [];

                                //console.log(li);

                                $("#team-conflicts-cont .conflicts-li").each(function() {
                                        cexists.push(parseInt(this.dataset.tcid));
                                });

                                //console.log(cexists);

                                var exist = $("#team-conflicts-cont .conflicts-student-li");
                                for(var k = 0; k < exist.length; k++)
                                {
                                        if(exist[k].dataset.scid == array[i]["SCID"])
                                        {
                                                li = exist[k];
                                                break;
                                        }
                                }

                                if(li === 0)
                                {
                                        li = document.createElement("LI");
                                        $("#team-conflicts-student-list").append(li);
                                        li.classList.add("conflicts-student-li");
                                        li.dataset.scid = array[i]["SCID"];

                                        $(li).append("<button class='btn btn-default'>" + array[i]["team_name"] + "</button>");

                                        clist = document.createElement("UL");
                                        clist.classList.add("conflicts-list");

                                        $(li).append(clist);
                                }
                                else
                                        clist = $(li).find(".conflicts-list");

                                for(var j = 0; j < array[i]["conflicts"].length; j++)
                                {
                                        var row = array[i]["conflicts"][j];
					var round = row["round_name"];

                                        if(cexists.indexOf(row['TCID']) === -1)
                                                $(clist).append("<li class='conflicts-li' data-tcid='" + row["TCID"] + "'>Number: <span>" + row["pn"] + "</span> | Round: <span>" + round + "</span></li>");
                                }
                        }
                }

                setTimeout(function() {
                        $("#team-conflicts-cont .conflicts-student-li button").off("click").click(function() {
                                $(this).next().toggleClass("cactive");
                        });

                        $("#team-conflicts-cont .conflicts-li").off("click").each(function() {
                                $(this).click(function() {
                                        $("#team-conflict-body").css("display", "none");
                                        getTeamConflict($(this)[0]);
                                });
                        });
                }, 50);
        });

        request.fail(function(jqXHR, textStatus, errorThrown) {

        });
}

function getTeamConflict(c)
{
        if(request)
                request.abort();

        request = $.ajax({
                url: "/get_team_conflicts.php",
                type: "post",
                data: { TCID: c.dataset.tcid }
        });

        request.done(function(response, textStatus, jqXHR) {
//alert(response);
                if(response === "")
                        return;

                var array = JSON.parse(response);

                $("#team-conflict-info").css("display", "none");
                $("#team-conflict-body").css("display", "block");
                $("#team-conflict-admin-list").empty().prev().css("display", "none");
                $("#team-conflict-grader-list").empty().prev().css("display", "none");
                $("#team-conflict-problem").html(c.innerHTML);
                $("#team-conflict-name").html(c.parentNode.previousSibling.innerHTML);

                var graders = 0;
                var admins = 0;

                for(var i = 0; i < array.length; i++)
                {
                        if(array[i]["gtype"] == "admin")
                        {
                                $("#team-conflict-admin-list").append(
                                "<li class='grader-li' data-trid='" + array[i]["TRID"] + "'>" +
                                        "<span>" + array[i]["gname"] + "</span>" +
                                        "<span>'" + array[i]["answer"] + "'</span>" +
                                "</li>");
                                admins++;
                        }
                        else
                        {
                                $("#team-conflict-grader-list").append(
                                "<li class='grader-li' data-trid='" + array[i]["TRID"] + "'>" +
                                        "<span>" + array[i]["gname"] + "</span>" +
                                        "<span>'" + array[i]["answer"] + "'</span>" +
                                "</li>");
                                graders++;
                        }
                }

                if(graders)
                {
                        $("#team-conflict-grader-list").prev().css("display", "inline-block");

                        $("#team-conflict-grader-list").prepend(
                        "<li class='grader-li'>" +
                                "<span>Name</span>" +
                                "<span>Answer</span>" +
                        "</li>"
                        );
                }

                if(admins)
                {
                        $("#team-conflict-admin-list").prev().css("display", "inline-block");

                        $("#team-conflict-admin-list").prepend(
                        "<li class='grader-li'>" +
                                "<span>Name</span>" +
                                "<span>Answer</span>" +
                        "</li>"
                        );
                }

		setTimeout(function() {
 		       $("#team-conflict-body .grader-li").each(function() {
                                $(this).click(function() {
                                        var self = this;
                                        var name = self.children[0].innerHTML;
                                        var answer = self.children[1].innerHTML;

                                        if(confirm("Are you sure you want to choose " + name + "'s answer of '" + answer + "'?"))
                                        {
                                                var request1 = $.ajax({
                                                        url: "/get_team_conflicts.php",
                                                        type: "post",
                                                        data: { TRID: self.dataset.trid, TCID: c.dataset.tcid }
                                                });

                                                request1.done(function(response, textStatus, jqXHR) {
        //                    alert(response);
			                            if(response == "error")
                                                                alert("There was an error recording your decision.");
                                                        else
                                                        {
                                                                alert("Your decision has been recorded");

                                                                $("#team-conflict-info").css("display", "block");
                                                                $("#team-conflict-body").css("display", "none");
                                                                $("#team-conflict-admin-list").empty();
                                                                $("#team-conflict-grader-list").empty();
                                                                if($(c).parent().children().length < 2)
                                                                        $(c).parent().remove();
                                                                else
                                                                        $(c).remove();
                                                        }
                                                });

                                                request1.fail(function(jqXHR, textStatus, errorThrown) {
                                                        alert("There was an error recording your decision.");
                                                });
                                        }
                                });
                        });

                        $("#team-conflict-input-save").off("click").click(function() {
                                var v = $("#team-conflict-input-answer").val();

                                var trid = 0;
                                $("#team-conflict-grader-list .grader-li").each(function() {
                                        if(this.dataset.trid)
                                        {
                                                trid = this.dataset.trid;
                                                return false;
                                        }
                                });

                                if(!trid)
                                {
                                        $("#team-conflict-admin-list .grader-li").each(function() {
                                                if(this.dataset.trid)
                                                {
                                                        trid = this.dataset.trid;
                                                        return false;
                                                }
                                        });
                                }

                                if(v !== "" && confirm("Are you sure you want to record '" + v + "' as the answer?"))
                                {
                                        var request1 = $.ajax({
                                               url: "/get_team_conflicts.php",
                                               type: "post",
                                               data: { TRID: trid, TCID: c.dataset.tcid, ranswer: v }
                                        });

                                        request1.done(function(response, textStatus, jqXHR) {
             //                                   alert(response);
                                                if(response == "error")
                                                        alert("There was an error recording your response.");
                                                else
                                                {
                                                        alert("Your response has been recorded!");

                                                        $("#team-conflict-info").css("display", "block");
                                                        $("#team-conflict-body").css("display", "none");
                                                        $("#team-conflict-admin-list").empty();
                                                        $("#team-conflict-grader-list").empty();
                                                        if($(c).parent().children().length < 2)
                                                                $(c).parent().remove();
                                                        else
                                                                $(c).remove();
                                                }
                                        });

                                        request1.fail(function(jqXHR, textStatus, errorThrown) {
                                                alert("There was an error recording your response.");
                                        });
                                }


                        });
                }, 50);
        });

	request.fail(function(jqXHR, textStatus, errorThrown) {

        });
}

function loadStandings()
{
	intervalFunc = loadStandings;

	if(request)
		request.abort();

	request = $.ajax({
		url: "/get_standings.php",
		type: "post"
	});

	request.done(function(response, textStatus, jqXHR) {
		console.log(response);

		if(response === "")
			return;
		else
		{
			var array = JSON.parse(response);

			$("#standings-regular-list").empty();
			$("#standings-label-regulars").html("Looks like there aren't any regulars that have been graded yet.");
			if(array["regulars"].length)
			{
				$("#standings-label-regulars").html("Top regulars");

				$("#standings-regular-list").append(
					"<li class='standings-li'>" +
                                                "<span>Rank</span>" +
                                                "<span>Student Name</span>" +
                                                "<span>Score</span>" +
                                        "</li>"
				);

				for(var i = 0; i < array["regulars"].length; i++)
				{
					$("#standings-regular-list").append(
						"<li class='standings-li'>" +
  							"<span>" + (i+1) + "</span>" +
							"<span>" + array["regulars"][i]["name"] + "</span>" +
							"<span>" + array["regulars"][i]["score"] + "</span>" +
						"</li>"
					);
				}
			}

			$("#standings-alternate-list").empty();
			$("#standings-label-alternates").html("Looks like there aren't any alternates that have been graded yet.");
                        if(array["alternates"].length)
                        {
				$("#standings-label-alternates").html("Top alternates");

                                $("#standings-alternate-list").append(
                                        "<li class='standings-li'>" +
                                                "<span>Rank</span>" +
                                                "<span>Student Name</span>" +
                                                "<span>Score</span>" +
                                        "</li>"
                                );

                                for(var i = 0; i < array["alternates"].length; i++)
                                {
                                        $("#standings-alternate-list").append(
                                                "<li class='standings-li'>" +
                                                        "<span>" + (i+1) + "</span>" +
                                                        "<span>" + array["alternates"][i]["name"] + "</span>" +
                                                        "<span>" + array["alternates"][i]["score"] + "</span>" +
                                                "</li>"
                                        );
                                }
                        }

			$("#standings-team-list").empty();
			$("#standings-label-schools").html("Looks like there aren't any schools that have been graded yet.");
			if(array["teams"].length)
                        {
				$("#standings-label-schools").html("Top schools");

                                $("#standings-team-list").append(
                                        "<li class='standings-li'>" +
                                                "<span>Rank</span>" +
                                                "<span>Team Name</span>" +
                                                "<span>Score</span>" +
                                        "</li>"
                                );

				for(var i = 0; i < array["teams"].length; i++)
				{
                	                $("#standings-team-list").append(
                        	                "<li class='standings-li'>" +
                                	                "<span>" + (i+1) + "</span>" +
                                        	        "<span>" + array["teams"][i]["team_name"] + "</span>" +
                                            		"<span>" + array["teams"][i]["score"] + "</span>" +
                                        	"</li>"
                                	);
				}
			}
		}
	});

	request.fail(function(jqXHR, textStatus, errorThrown) {
		
	});
}

function hideAll()
{
	$("#infocont .options-wrap").css("display", "none");
}

function init()
{
	$("#navbar-list li a").click(function() {
		$("#navbar-list li").removeClass("active");
		$(this).parent().addClass("active");

		hideAll();
		$("#" + $(this).data("describes")).css("display", "block");
	});

	$("#navbar-progress").click(loadProgress);
	$("#navbar-conflicts").click(loadConflicts);
	$("#navbar-team-conflicts").click(loadTeamConflicts);
	$("#navbar-standings").click(loadStandings);

	setInterval(function() { intervalFunc(); }, 2000);

	$(".select2").select2({
		minimumResultsForSearch: 6
	});

	loadProgress();
	$("#progress-cont").css("display", "block");

	$("#more-progress-toggle").click(function() { $(".more-progress").toggleClass("hidden"); });

	$("#filter_student").change(filterMoreProgress);
        $("#filter_round").change(filterMoreProgress);
        $("#filter_answer").change(filterMoreProgress);

	$("#filter_number_all").click(function() {
		$("#filter_number").html("0");
		$("#filter_number_enter").val("");

		filterMoreProgress();
	});

	$("#filter_number_enter").change(function() {
		var v = parseInt(this.value);

		if(isNaN(v))
			$("#filter_number").html("0");
		else
			$("#filter_number").html(v);

		filterMoreProgress();
	});

	$(".edit-opt-answer").click(function(e) {
		e.preventDefault();

		$(this.parentNode.parentNode.parentNode.parentNode.parentNode).find(".answer-normal").css("display", "none").parent().find(".answer-edit-answer").css("display", "block").parent().find(".answer-edit-parser").css("display", "none");
	});

	$(".edit-opt-parser").click(function(e) {
                e.preventDefault();

                $(this.parentNode.parentNode.parentNode.parentNode.parentNode).find(".answer-normal").css("display", "none").parent().find(".answer-edit-parser").css("display", "block").parent().find(".answer-edit-answer").css("display", "none");
        });

	$(".edit-answer-submit").click(function() {
		var info = this.parentNode.parentNode.parentNode;

		var av = $(this.parentNode).find("input").val();

		$.post("/change_answer.php", { scid: info.dataset.scid, sid: info.dataset.sid, round: info.dataset.rndid, pnum: info.dataset.pnum, answer: av }, function(response) {
			console.log(response);
			if(response == "error")
				alert("Whoops! There was an error");
			else
				alert("Your responses have been saved");
		});

		$(this.parentNode.parentNode).find(".answer-normal").css("display", "block").parent().find(".answer-edit-answer").css("display", "none");
	});

	$(".edit-parser-submit").click(function() {
                var info = this.parentNode.parentNode.parentNode;

                var av = $(this.parentNode).find(".select2").val();

                $.post("/change_parser_answer.php", { scid: info.dataset.scid, sid: info.dataset.sid, round: info.dataset.rndid, pnum: info.dataset.pnum, answer: av }, function(response) {
                        console.log(response);
                        if(response == "error")
                                alert("Whoops! There was an error");
                        else
                                alert("Your responses have been saved");
                });

                $(this.parentNode.parentNode).find(".answer-normal").css("display", "block").parent().find(".answer-edit-parser").css("display", "none");
        });
}

</script>

</head>


<body onload="init()">

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
			<li class="mnav-right"><a href="/register.php">New User</a></li>
			<li class="mnav-right"><a href="/grade.php">Grade Participants</a></li>
		</ul>
	</div>
</nav>
<div class="main">
	<div class="container ncont text-center">
		<?php if($comprow == 0): ?>
			<div class="jumbotron">
				<h3>Whoops! The current competition hasn't been set yet.</h3>
				<div class="btn-group" role="group">
					<a href="/create.php" class="btn btn-default">Add competition</a>
					<button class="btn btn-default">Select competition </button>
					<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
					<ul class="dropdown-menu slider-container">
                                                <?php if ($result == 0): ?>
                                                        <li class="nocomp">Looks like there aren't any competitions yet.</li>
                                                <?php else: ?>
                                                        <?php foreach($result as $row): ?>
                                                                <li class="slider-li" onclick="changeComp(<?php echo $row['CID']; ?>);">
                                                                	<p class="slider-text"><?php echo clean(getCompFullName($row)); ?></p>
                                                                        <button class="btn btn-primary slider-edit" onclick="redirectTo('/editcompetition.php?CID=' + '<?php echo $row['CID']; ?>');" id="editbtn<?php echo $row['CID']; ?>">Edit</button>
                                                                </li>
								<li class="divider slider-divider"></li>
                                                        <?php endforeach; ?>
                                                <?php endif; ?>
                                        </ul>
				</div>
			</div>
		<?php else: ?>
			<label class="curlabel">Current competition:</label>
			<div class="jumbotron">
				<h2 class="compname"><?php echo clean(getCompFullName($comprow)); ?></h2><br>
				<div class="btn-group" role="group">
					<a class="btn btn-default" href=<?php echo "/editcompetition.php?CID=" . $comprow["CID"]; ?>>Edit </a>
					<a class="btn btn-default" href="/create.php">Add </a>
					<button class="btn btn-default">Change</button>
					<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href=""><span class="caret"></span></a>
					<ul class="dropdown-menu slider-container">
                                                <?php if ($result == 0): ?>
                                                        <li class="nocomp">Looks like there aren't any competitions yet.</li>
                                                <?php else: ?>
                                                        <?php foreach($result as $row): ?>
                                                                <li class="slider-li" onclick="changeComp(<?php echo $row['CID']; ?>);">
                                                                        <p class="slider-text"><?php echo clean(getCompFullName($row)); ?></p>
                                                                        <div class="slider-edit"><a class="btn btn-primary" href="/editcompetition.php?CID=<?= $row['CID']; ?>" id="editbtn<?php echo $row['CID']; ?>">Edit</a></div>
                                                                </li>
                                                                <li class="divider slider-divider"></li>
                                                        <?php endforeach; ?>
                                                <?php endif; ?>
                                        </ul>
					<a class="btn btn-danger" href="/admin.php?setComp=0">Unselect</a>
				</div>
			</div>
		<?php endif; ?>

		<?php if($comprow !== 0): ?>
		<div class="info-wrapper">
			<div class="navbar navbar-default">
				<div class="container-fluid">
					<ul id="navbar-list" class="nav navbar-nav">
						<li class="active"><a href="#" id="navbar-progress" data-describes="progress-cont">Progress</a></li>
						<li><a href="#" id="navbar-conflicts" data-describes="conflicts-cont">Student Conflicts</a></li>
						<li><a href="#" id="navbar-team-conflicts" data-describes="team-conflicts-cont">Team Conflicts</a></li>
						<li><a href="#" id="navbar-standings" data-describes="standings-cont">Current Standings</a></li>
					</ul>
				</div>
			</div>
			<div id="infocont" class="container-fluid">
				<div class="options-wrap" id="standings-cont" style="overflow-y:auto;overflow-x:hidden;">
					<div class="row">
						<div class="col-xs-6" style="overflow: auto;">
							<label class="standings-label" id="standings-label-regulars"></label>
							<ul class="standings-list" id="standings-regular-list">
							</ul>
						</div>
						<div class="col-xs-6" style="overflow: auto;">
							<label class="standings-label" id="standings-label-schools"></label>
							<ul class="standings-list" id="standings-team-list">
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6" style="overflow: auto;">
							<label class="standings-label" id="standings-label-alternates"></label>
                                                        <ul class="standings-list" id="standings-alternate-list">
                                                        </ul>
						</div>
					</div>
				</div>
				<div class="options-wrap" id="conflicts-cont">
					<div class="row">
						<div class="col-xs-6" style="overflow: auto;">
							<ul id="conflicts-student-list">
							</ul>
						</div>
						<div class="col-xs-6">
							<div class="conflict-wrap">
								<div id="conflict-info">Click on a student to the left to see their grading conflicts, and click on a conflict to inspect and resolve it here.</div>
								<div id="conflict-body" style="display: none;">
									<div id="conflict-name" class="conflict-name"></div>
									<div id="conflict-problem" class="conflict-problem"></div>
									<p class="conflict-inst">Click on one of the answers submitted below to choose it as the final answer</p>
									<div class="graders-list-wrap">
										<label>Grader Responses:</label>
										<ul id="conflict-grader-list">
											<li class="grader-li">
                                                        	                                <span>Name</span>
                                                      	        	                	<span>Answer</span>
                               		                                                </li>
										</ul>
									</div>
									<div class="graders-list-wrap">
										<label>Admin Responses</label>
										<ul id="conflict-admin-list">
											<li class="grader-li">
												<span>Name</span>
												<span>Answer</span>
											</li>
										</ul>
									</div>
									<br>
									<p class="conflict-inst">Or enter a new answer here</p>
									<div class="conflict-input">
										<div class="input-group input-group-lg">
											<input id="conflict-input-answer" type="text" class="form-control" placeholder="Enter a new answer">
      											<span class="input-group-btn">
        											<button id="conflict-input-save" class="btn btn-default" type="button">Save</button>
      											</span>
    										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="options-wrap" id="team-conflicts-cont">
                                        <div class="row">
                                                <div class="col-xs-6" style="overflow: auto;">
                                                        <ul id="team-conflicts-student-list">
                                                        </ul>
                                                </div>
                                                <div class="col-xs-6">
                                                        <div class="conflict-wrap">
                                                                <div id="team-conflict-info">Click on a team to the left to see its grading conflicts, and click on a conflict to inspect and resolve it here.</div>
								<div id="team-conflict-body" style="display: none;">
                                                                        <div id="team-conflict-name" class="conflict-name"></div>
                                                                        <div id="team-conflict-problem" class="conflict-problem"></div>
                                                                        <p class="conflict-inst">Click on one of the answers submitted below to choose it as the final answer</p>
                                                                        <div class="graders-list-wrap">
                                                                                <label>Grader Responses:</label>
                                                                                <ul id="team-conflict-grader-list">
                                                                                        <li class="grader-li">
                                                                                                <span>Name</span>
                                                                                                <span>Answer</span>
                                                                                        </li>
                                                                                </ul>
                                                                        </div>
                                                                        <div class="graders-list-wrap">
                                                                                <label>Admin Responses</label>
                                                                                <ul id="team-conflict-admin-list">
                                                                                        <li class="grader-li">
                                                                                                <span>Name</span>
                                                                                                <span>Answer</span>
                                                                                        </li>
                                                                                </ul>
                                                                        </div>
                                                                        <br>
                                                                        <p class="conflict-inst">Or enter a new answer here</p>
                                                                        <div class="conflict-input">
                                                                                <div class="input-group input-group-lg">
                                                                                        <input id="team-conflict-input-answer" type="text" class="form-control" placeholder="Enter a new answer">
                                                                                        <span class="input-group-btn">
                                                                                                <button id="team-conflict-input-save" class="btn btn-default" type="button">Save</button>
                                                                                        </span>
                                                                                </div>
                                                                        </div>
                                                                </div>
							</div>
                                                </div>
                                        </div>
                                </div>
				<div class="options-wrap" id="progress-cont" style="overflow: auto; will-change:transform">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<div class="progress-label" style="font-size: 25px;text-align: center;">Total grading progress</div>
								<div id="progress-bars">
									<div class="more-progress-wrap">
										<div class="progress-wrap" style="margin-bottom: 0px">
											<div class="progress" style="height: 35px">
												<div class="progress-bar progress-bar-info" style="width: 0%;line-height: 35px;font-size:18px" id="progressbar-total">0%</div>
											</div>
											<button id="more-progress-toggle" type="button" class="progress-button btn btn-default"><span class="caret"></span></button>
										</div>
										<div class="more-progress hidden">
											<table class="more-progress-table">
												<thead id="more-progress-head">
													<tr>
														<th>
															<h3 class="filter-title">Round</h3>
															<select id="filter_round" class="select2 filter-select">
																<option value="0">All Rounds</option>
																<?php foreach($compstatus as $round): ?>
																	<option value="<?= $round['RNDID'] ?>"><?php echo clean($round["round_name"]); ?></option>
																<?php endforeach; ?>
															</select>
														</th>
														<th>
															<h3 class="filter-title">Problem #</h3>
															<div class="input-group" id="filter_problemnumber">
      																<span class="input-group-btn">
        																<button id="filter_number_all" class="btn btn-default" type="button">All</button>
      																</span>
      																<input id="filter_number_enter" type="text" class="form-control" placeholder="Number">
    															</div>
															<div id="filter_number" style="display:none;">0</div>
														</th>
														<th>
															<h3 class="filter-title" id="filter_student_title">Student/School</h3>
															<select id="filter_student" class="select2 filter-select">
																<option value="0">All</option>
																<optgroup label="Schools">
                                                                                                                                        <?php foreach($schools as $school): ?>
                                                                                                                                                <option value="s<?= $school['SCID'] ?>"><?php echo clean($school["team_name"]); ?></option>
                                                                                                                                        <?php endforeach; ?>
                                                                                                                                </optgroup>
																<optgroup label="Students">
																	<?php foreach($students as $student): ?>
																		<option value="<?= $student['SID'] ?>"><?php echo clean($student["first_name"] . " " . $student["last_name"]); ?></option>
																	<?php endforeach; ?>
																</optgroup>
															</select>
														</th>
														<th>
															<h3 class="filter-title">Answer</h3>
															<select id="filter_answer" class="select2 filter-select">
																<option value="0">All Answers</option>
																<option value="1">Wrong Answers</option>
																<option value="2">Right Answers</option>
																<option value="3">No answers yet</option>
															</select>
														</th>
													</tr>
												</thead>
												<tbody id="more-progress-list">
													<tr style="display: none;" id="no-progress-results"><td colspan="4">There are no results for that filter</td></tr>
													<?php foreach($schools as $school): ?>
                                                                                                                <?php foreach($compstatus as $round): ?>
                                                                                                                        <?php if($round["indiv"] == 0): ?>
                                                                                                                                <?php for($i = 1; $i <= $round["num_questions"]; $i++): ?>
                                                                                                                                        <tr id="s<?= $school['SCID'] . 'a' . $round['RNDID'] . 'a' . $i ?>" data-scid="<?= $school['SCID'] ?>" data-sid="0" data-rndid="<?= $round['RNDID'] ?>" data-pnum="<?= $i ?>" data-answer="3">
                                                                                                                                                <td><?php echo clean($round["round_name"]); ?></td>
                                                                                                                                                <td><?= $i ?></td>
                                                                                                                                                <td><b><?php echo clean($school["team_name"]); ?></b></td>
                                                                                                                                                <td class="panswer">
																			<div class="answer-normal">
																				<p class="noneyet">None yet</p>
																				<div class="btn-group">
																					<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																						Edit <span class="caret"></span>
																					</button>
																					<ul class="dropdown-menu">
							    															<li><a class="edit-opt-answer">Answer</a></li>
    																						<li><a class="edit-opt-parser">Parser Result</a></li>
  																					</ul>
																				</div>
																			</div>
																			<div class="answer-edit answer-edit-answer" style="display: none;">
																				<input type="text" class="form-control"></input>
																				<button class="btn btn-success edit-answer-submit">Save</button>
																			</div>
																			<div class="answer-edit answer-edit-parser" style="display: none;">
                                                                                                                                                                <div class="edit-select">
																					<select class="small-select" style="width:100%;">
																						<option value="1">Wrong</option>
																						<option value="2">Right</option>
																						<option value="3">None (delete answer)</option>
																					</select>
																				</div>
                                                                                                                                                                <button class="btn btn-success edit-parser-submit">Save</button>
                                                                                                                                                        </div>
																		</td>
																	</tr>
                                                                                                                                <?php endfor; ?>
                                                                                                                        <?php endif; ?>
                                                                                                                <?php endforeach; ?>
                                                                                                        <?php endforeach; ?>
													<?php foreach($students as $student): ?>
														<?php foreach($compstatus as $round): ?>
															<?php if($round["indiv"] == 1): ?>
																<?php for($i = 1; $i <= $round["num_questions"]; $i++): ?>
																	<tr id="<?= $student['SID'] . 'a' . $round['RNDID'] . 'a' . $i ?>" data-sid="<?= $student['SID'] ?>" data-rndid="<?= $round['RNDID'] ?>" data-pnum="<?= $i ?>" data-scid="<?= $student['SCID'] ?>" data-answer="3">
																		<td><?php echo clean($round["round_name"]); ?></td>
																		<td><?= $i ?></td>
																		<td><?php echo clean($student["first_name"] . " " . $student["last_name"]); ?></td>
																		<td class="panswer">
																			<div class="answer-normal">
                                                                                                                                                                <p class="noneyet">None yet</p>
                                                                                                                                                                <div class="btn-group">
                                                                                                                                                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                                                                                                Edit <span class="caret"></span>
                                                                                                                                                                        </button>
                                                                                                                                                                        <ul class="dropdown-menu">
                                                                                                                                                                                <li><a class="edit-opt-answer">Answer</a></li>
                                                                                                                                                                                <li><a class="edit-opt-parser">Parser Result</a></li>
                                                                                                                                                                        </ul>
                                                                                                                                                                </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="answer-edit answer-edit-answer" style="display: none;">
                                                                                                                                                                <input type="text" class="form-control"></input>
                                                                                                                                                                <button class="btn btn-success edit-answer-submit">Save</button>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="answer-edit answer-edit-parser" style="display: none;">
                                                                                                                                                                <div class="edit-select">
                                                                                                                                                                        <select class="small-select" style="width:100%;">
                                                                                                                                                                                <option value="1">Wrong</option>
                                                                                                                                                                                <option value="2">Right</option>
                                                                                                                                                                                <option value="3">None (delete answer)</option>
                                                                                                                                                                        </select>
                                                                                                                                                                </div>
                                                                                                                                                                <button class="btn btn-success edit-parser-submit">Save</button>
                                                                                                                                                        </div>
                                                                                                                                                </td>
																	</tr>
																<?php endfor; ?>
															<?php endif; ?>
														<?php endforeach; ?>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
									<?php if($compstatus === 0): ?>
										<div class="well">
											<p>Looks like there aren't any rounds in this competition type</p>
										</div>
									<?php else: ?>
										<?php foreach($compstatus as $round): ?>
											<div id="progressbar-<?= $round['RNDID'] ?>">
												<div class="progress-label"><?php echo clean($round["round_name"]); ?></div>
												<div class="progress">
                               	                                				       	<div class="progress-bar <?= $round['indiv'] == 1 ? 'progress-bar-warning' : 'progress-bar-success'?>" style="width: 0%">0%</div>
												</div>
											</div>
										<?php endforeach; ?>
                                                                	<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>

</body>


</html>
