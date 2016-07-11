<?php

    require("../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect();

    $eventrows = dbQuery($conn, "SELECT * FROM competition");

    render("info_form.php", ["eventrows" => $eventrows]);

?>

