<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    $result = dbQuery_new($conn, "SELECT * FROM competition;");
    $namerows = dbQuery_new($conn, "SELECT first_name, last_name, email FROM user WHERE UID = :UID;", ["UID" => $_SESSION["UID"]]);

    render("admin_form.php", ["result" => $result, "fullname" => getFullName($namerows)]);

?>
