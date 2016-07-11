<!DOCTYPE html>


<head>
<title>Welcome</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<body>
<div class="main">
        <form id="schoolinfo" action="#" method="POST">
		<?php while ($row = mysqli_fetch_assoc($result)): $team_name = $row["team_name"]; $town = $row["town"]; $address = $row["address"]; $coach = $row["coach"]; $email = $row["contact_email"]; $firstyear = $row["first_year"]; $scid = $row["SCID"]; ?>
                	<input type="text" name="teamname" placeholder="School Name" value=<?= "'$team_name'" ?>><br>
               		<input type="text" name="town" placeholder="Town" value=<?= "'$town'" ?>><br>
			<input type="text" name="address" placeholder="School Address" value=<?= "'$address'" ?>><br>
                	<input type="text" name="coach" placeholder="Coach Name" value=<?= "'$coach'" ?>><br>
                	<input type="email" name="email" placeholder="Contact Email" value=<?= "'$email'" ?>><br>
                	<input type="checkbox" name="firstyear" <?php echo ($firstyear == 1 ? "checked" : ""); ?>>First Year?<br>
			<input type="hidden" name="scid" value=<?= $scid ?>><br>
			<input type="submit" value="Finalize changes" name="finalize">
		<?php endwhile ?>
        </form>
</div>
</body>

</html>
