<?php

    require("../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    $eventrows = dbQuery_new($conn, "SELECT * FROM competition");

    render("info_form.php", ["eventrows" => $eventrows]);

?>

