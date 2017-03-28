<!DOCTYPE html>

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="./bootstrap/dist/css/bootstrap-theme.css">
<script src="./bootstrap/dist/js/bootstrap.js"></script>

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

.progress {
	margin-bottom: 30px;
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

		$(data).each(function() {
			var p = Math.round(parseFloat(this.status) * 100);
			$("#progressbar-" + this.RNDID + " .progress-bar").css("width", p + "%").html(p + "%");

			avg += p / data.length;
		});

		avg = Math.round(avg);

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
	});

	request.fail(function(jqXHR, textStatus, errorThrown) {

        });
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
								console.log(response);
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
                                            		"<span>" + array["teams"][i]["team_raw"] + "</span>" +
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
	$("#navbar-list li a").each(function() {
		$(this).click(function() {
			$("#navbar-list li").removeClass("active");
			$(this).parent().addClass("active");

			hideAll();
			$("#" + $(this).data("describes")).css("display", "block");
		});
	});

	$("#navbar-progress").click(loadProgress);
	$("#navbar-conflicts").click(loadConflicts);
	$("#navbar-team-conflicts").click(loadTeamConflicts);
	$("#navbar-standings").click(loadStandings);

	setInterval(function() { intervalFunc(); }, 2000);

	loadProgress();
	$("#progress-cont").css("display", "block");
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
			<li class="mnav-right"><a href="/editprofile.php">Edit Profile</a></li>
			<li class="mnav-right"><a href="/register.php">New User</a></li>
			<li class="mnav-right"><a href="/grader.php">Grade Participants</a></li>
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
				<div class="options-wrap" id="progress-cont" style="overflow: auto;">
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<div class="progress-label" style="font-size: 25px;text-align: center;">Total grading progress</div>
								<div id="progress-bars">
									<div class="progress" style="height: 35px">
										<div class="progress-bar progress-bar-info" style="width: 0%;line-height: 35px;font-size:18px" id="progressbar-total">0%</div>
									</div>
									<?php if($compstatus === 0): ?>
										<div class="well">
											<p>Looks like there aren't any round in this competition type</p>
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
