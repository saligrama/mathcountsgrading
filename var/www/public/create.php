<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    if ($_SESSION["REQUEST_METHOD"] == "POST") {

        if (isset($_POST["go"])) {

            $schools = [];

            $conn = dbConnect();

            $scids = dbQuery($conn, "SELECT SCID FROM school_info");

            while ($row = mysqli_fetch_assoc($scids)) {

                if (isset($_POST[$row["SCID"]]))
                    array_push($schools, $row["SCID"]);

            }


            $compname = mysqli_real_escape_string($conn, $_POST["compname"]);
            $comptype = $_POST["comptype"]
        }

    }

    else {

        require("../includes/functions.php");

        checkSession('admin');

        $conn = dbConnect();

        $result = mysqli_query($conn, "SELECT * FROM school_info");b

        render("create_form.php", ["title" => "Create competition", "result" => $result]);

    }


?>
