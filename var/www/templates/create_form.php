<!DOCTYPE html>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


    <head>
        <title><?= $title ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </head>

    <body>
	<form id="schools" action="create.php" method="GET"/>
        	<input type="date" name="competition_date">
        	<p>Schools to include</p>
        	<?php while($row = mysqli_fetch_assoc($result)): ?>
            		<input type="checkbox" value=<?= $row["SCID"] ?>><?= $row["team_name"] ?>
            		<a href=<?php echo "/editschool.php?SCID=" . $row["SCID"]; ?>>Edit</a><br>
        	<?php endwhile ?>
        <input type="submit" value="Go">

    </body>

</html>

