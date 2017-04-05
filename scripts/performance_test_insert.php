#!/usr/bin/env php
<?php

    require(dirname(__FILE__) . "/../var/www/includes/functions.php");

    $NUM_SCHOOLS_IMLEM_TEST = 10;
    $NUM_STUDENTS_IMLEM_TEST = 20;

    $conn = dbConnect_new();

    for ($i = 0; $i < $NUM_SCHOOLS_IMLEM_TEST; $i++) {
        dbQuery_new($conn, "INSERT INTO SCHOOL_INFO SET
            team_name = :autogen_teamname,
            town = :autogen_town,
            coach = :autogen_coach,
            address = :autogen_address,
            contact_email = :autogen_email", [
                "autogen_teamname" => "SCHOOL 000" . $i,
                "autogen_town" => "TOWN 000" . $i,
                "autogen_coach" => "COACH 000" . $i,
                "autogen_address" => "000" . $i . " FOO LANE, 000" . $i . ", MA 0000" .$i,
                "autogen_email" => "000" . $i . "@000" . $i . ".org",
            ]
        );
        for ($j = 0; j < $NUM_STUDENTS_IMLEM_TEST; $j++) {
            dbQuery_new($conn, "INSERT INTO MATHLETE_INFO SET
                SCID = :autogen_scid,
                last_name = :autogen_lastname,
                first_name = :autogen_firstname,
                gender = :autogen_gender", [
                    "autogen_scid" => 744 + $i,
                    "autogen_lastname" => "000" . $i,
                    "autogen_firstname" => "000" . $j,
                    "autogen_gender" = autogen_gender($j),
                ]
            );
        }
    }

    function autogen_gender($num)
    {
        switch ($num % 3) {
            case 0:
                return "Male";
                break;
            case 1:
                return "Female";
                break;
            case 2:
                return "Other";
                break;
        }
    }

?>
