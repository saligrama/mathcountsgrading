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

<title>Edit answer key</title>

<style>

.main {
	max-width: 1500px;
	padding: 10px 30px;
}

.title {
	max-width: 550px;
	margin: 20px auto;
}

.title label {
	font-size: 19px;
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

function checkSubmit()
{
        var mes = "Are you sure you want to record these answers?";

        for(i = 1; i <= 48; i++)
        {
                var e = document.getElementById(i + "question");

		if(e.value === "")
		{
			mes = "Some problems were left blank. Are you sure you want to continue and save your changes?";
			break;
		}
	}

        return confirm(mes);
}

function loadRound(id)
{
	$.post("/get_answers.php", { round: id, CID: <?php echo clean($_GET["CID"]); ?> }, function(data) {
		//console.log(data);

		var brk = data.indexOf("\n");

		//console.log(brk);

		var answers = JSON.parse(data.substr(0, brk));

		console.log(answers);

		var html = data.substr(brk + 1);

		$("#answers-cont").html(html);

		setTimeout(function() {
			$(answers.answers).each(function() {
				console.log(this.answer);
				$("#" + this.problem_number + "answer").val(this.answer);
			});
		}, 50);
	});
}

function loadSelectedRound()
{
	loadRound($("#roundlist").val());
}

function init()
{
	$(".js-select").select2();

	loadSelectedRound();

	$("#roundlist").change(loadSelectedRound);
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
                </ul>
        </div>
</nav>
<div class="container-fluid main">
        <div class="row text-center">
		<form id="answers" method="post" action="">
			<input type="hidden" name="CID" value="<?php echo clean($_GET['CID']); ?>"></input>
                </form>
		<div class="col-md-4">
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                        <h4>Choose a round</h4>
                                </div>
                                <div class="panel-body">
                                        <div class="row">
                                                <div class="form-group col-xs-12">
                                                        <p class="roundname">Competition type: <?php echo clean($typerow["type_name"]); ?></b>':</p>
                                                        <select form="answers" name="round" class="form-control js-select" id="roundlist">
                                                                <?php foreach($roundrows as $row): ?>
                                                                        <option value=<?= $row['RNDID']?>> <?php echo clean($row["round_name"]); ?></option>
                                                                <?php endforeach; ?>
								<option value="0" style="display: none;"></option>
                                                        </select>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
		<div id="answers-cont"></div>
	</div>
</div>

</body>

</html>
