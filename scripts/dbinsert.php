#!/usr/bin/env php
<?php

    function insert($st, $csv) {

        try {
            $db = new PDO('mysql:dbname=mathcountsgrading;host=localhost', 'root', 'root');
        } catch (Exception $exception) {
            echo "Error while connecting to database.";
            break;
        }

        echo "Connected!";

        $d = fopen($csv, "r");

        while (!feof($d)) {

            $row = fgetcsv($d, 0, ",");

            if ((empty($row[0]) && !isset($row[1])))
                continue;

            $statement = $db->prepare($st);

            switch($csv) {

                case "competition_answers.csv":
                    $statement->execute([$row[0],$row[1],$row[2],$row[3],$row[4],$row[5]]);
                    break;
                case "competition.csv":
                    $statement->execute([$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]]);
                    break;
                case "competition_participants.csv":
                    $statement->execute([$row[0],$row[1]]);
                    break;
                case "mathlete_info.csv":
                    $statement->execute([$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]]);
                    break;
                case "school_info.csv":
                    $statement->execute([$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]]);
                    break;
                case "student_answers.csv":
                    $statement->execute([$row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6]]);
                    break;
                case "team_answers.csv":
                    $statement->execute([$row[0],$row[1],$row[2],$row[3],$row[4]]);
                    break;
                case "user.csv":
                    $statement->execute([$row[1],$row[2],$row[3],password_hash($row[4], PASSWORD_DEFAULT)]);
                    break;

            }
        }

    }

    $data = $argv[1];

    if (!file_exists($data))
        echo "Error: '" . $data . "' does not exist.\n";
    elseif (!is_readable($data))
        echo "Error: '" . $data . "' is not readable.\n";

    else {

        switch($data) {

            case "competition_answers.csv":
                insert("INSERT INTO competition_answers SET CID=?,problem_type=?,problem_number=?,answer=?,has_multiple_values=?,tie_index=?", $data);
                break;
            case "competition.csv":
                insert("INSERT INTO competition SET competition_date=?,competition_type=?,status_sprint=?,status_target1=?,status_target2=?,status_target3=?,status_target4=?,status_team=?", $data);
                break;
            case "competition_participants.csv":
                insert("INSERT INTO competition_participants SET CID=?,SCID=?", $data);
                break;
            case "mathlete_info.csv":
                insert("INSERT INTO mathlete_info SET SCID=?,CID=?,last_name=?,first_name=?,nickname=?,gender=?,is_team=?", $data);
                break;
            case "school_info.csv":
                insert("INSERT INTO school_info SET team_name=?,town=?,coach=?,address=?,contact_email=?,first_year=?,ly_rank=?,ly_score=?", $data);
                break;
            case "student_answers.csv":
                insert("INSERT INTO student_answers SET CID=?,SID=?,GID=?,problem_number=?,problem_type=?,answer=?,points=?")
            case "team_answers.csv":
                insert("INSERT INTO team_answers SET CID=?,SCID=?,GID=?,problem_number=?,team_answer=?", $data);
                break;
            case "user.csv":
                insert("INSERT INTO user SET last_name=?,first_name=?,email=?,password=?", $data);
                break;

        }

    }

?>
