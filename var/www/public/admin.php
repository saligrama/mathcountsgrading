<?php

    require("../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect();

    $result = dbQuery($conn, "SELECT * FROM competition");

    render("admin_form.php", ["result" => $result]);

?>

