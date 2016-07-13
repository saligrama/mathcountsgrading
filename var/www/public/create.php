<?php
    require("../includes/functions.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["go"])) {

            $conn = dbConnect();
    }
    else {

        checkSession('admin');

        $conn = dbConnect();

        $result = dbQuery($conn, "SELECT * FROM school_info;");

        render("create_form.php", ["title" => "Create competition", "result" => $result]);

    }


?>
