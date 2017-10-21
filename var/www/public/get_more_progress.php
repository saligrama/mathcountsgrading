<?php

    require(dirname(__FILE__) . "/../includes/functions.php");

    checkSession('admin');

    $conn = dbConnect_new();

    $result = dbQuery_new($conn, "SELECT * FROM competition;");
    if(empty($result))
        $result = 0;

    $comprow = getCurrentComp($conn);

    $compstatus = 0;

    $rounds = 0;
    $students = 0;
    $schools = 0;

    if(isset($_GET["setComp"]))
    {
        if($_GET["setComp"] == 0)
        {
            $comprow = 0;
            dbQuery_new($conn, "DELETE FROM current_competition;");
        }
        else
        {
            $cid = intval($_GET["setComp"]);

            $exists = dbQuery_new($conn, "SELECT * FROM competition WHERE CID=:cid;", ["cid" => $cid]);

            if(!empty($exists))
            {
                if($comprow == 0)
                        dbQuery_new($conn, "INSERT INTO current_competition SET CID=:cid", ["cid" => $cid]);
                else
                    dbQuery_new($conn, "UPDATE current_competition SET CID=:cid;", ["cid" => $cid]);

                $comprow = $cid;
            }
        }
    }

    if($comprow != 0)
    {
        $comprow = dbQuery_new($conn, "SELECT * FROM competition WHERE CID = :CID;", ["CID" => $comprow]);

        if (!empty($comprow))
        {
                $comprow = $comprow[0];

                $compstatus = dbQuery_new($conn, "SELECT * FROM round WHERE CTID=:ctid", ["ctid" => $comprow["CTID"]]);

                if(empty($compstatus))
                    $compstatus = 0;

                $students = dbQuery_new($conn, "SELECT mathlete_info.*, student_participants.type FROM mathlete_info INNER JOIN student_participants ON mathlete_info.SID = student_participants.SID WHERE student_participants.CID=:cid ORDER BY SCID", ["cid" => $comprow["CID"]]);

                $schools = dbQuery_new($conn, "SELECT * FROM school_info WHERE SCID IN (SELECT SCID FROM competition_participants WHERE CID=:cid)", ["cid" => $comprow["CID"]]);
        }
        else
        {
                $comprow = 0;
        }

    }
?>
<?php if($schools !== 0 && $compstatus !== 0 && $students !== 0): ?>
                                                                                                        <tr id="no-progress-results"><td colspan="4">There are no results for that filter</td></tr>
                                                                                                        <?php foreach($schools as $school): ?>
                                                                                                                <?php foreach($compstatus as $round): ?>
                                                                                                                        <?php if($round["indiv"] == 0): ?>
                                                                                                                                <?php for($i = 1; $i <= $round["num_questions"]; $i++): ?>
                                                                                                                                        <tr class="more-progress-tr" id="s<?= $school['SCID'] . 'a' . $round['RNDID'] . 'a' . $i ?>" data-scid="<?= $school['SCID'] ?>" data-sid="0" data-rndid="<?= $round['RNDID'] ?>" data-pnum="<?= $i ?>" data-answer="3">
                                                                                                                                                <td><?php echo clean($round["round_name"]); ?></td>
                                                                                                                                                <td><?= $i ?></td>
                                                                                                                                                <td><b><?php echo clean($school["team_name"]); ?></b></td>
                                                                                                                                                <td class="panswer">
                                                                                                                                                        <div class="answer-normal">
                                                                                                                                                                <p class="noneyet">None yet</p>
                                                                                                                                                                <div class="btn-group">
                                                                                                                                                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                                                                                                Edit <span class="caret"></span>
                                                                                                                                                                        </button>
                                                                                                                                                                        <ul class="dropdown-menu">
                                                                                                                                                                                <li><a class="edit-opt-answer">Answer</a></li>
                                                                                                                                                                                <li><a class="edit-opt-parser">Parser Result</a></li>
                                                                                                                                                                        </ul>
                                                                                                                                                                </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="answer-edit answer-edit-answer" style="display: none;">
                                                                                                                                                                <input type="text" class="form-control"></input>
                                                                                                                                                                <button class="btn btn-success edit-answer-submit">Save</button>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="answer-edit answer-edit-parser" style="display: none;">
                                                                                                                                                                <div class="edit-select">
                                                                                                                                                                        <select class="small-select" style="width:100%;">
                                                                                                                                                                                <option value="1">Wrong</option>
                                                                                                                                                                                <option value="2">Right</option>
                                                                                                                                                                                <option value="3">None (delete answer)</option>
                                                                                                                                                                        </select>
                                                                                                                                                                </div>
                                                                                                                                                                <button class="btn btn-success edit-parser-submit">Save</button>
                                                                                                                                                        </div>
                                                                                                                                                </td>
                                                                                                                                        </tr>
                                                                                                                                <?php endfor; ?>
                                                                                                                        <?php endif; ?>
                                                                                                                <?php endforeach; ?>
                                                                                                        <?php endforeach; ?>
                                                                                                        <?php foreach($students as $student): ?>
                                                                                                                <?php foreach($compstatus as $round): ?>
                                                                                                                        <?php if($round["indiv"] == 1): ?>
                                                                                                                                <?php for($i = 1; $i <= $round["num_questions"]; $i++): ?>
                                                                                                                                        <tr class="more-progress-tr" id="<?= $student['SID'] . 'a' . $round['RNDID'] . 'a' . $i ?>" data-sid="<?= $student['SID'] ?>" data-rndid="<?= $round['RNDID'] ?>" data-pnum="<?= $i ?>" data-scid="<?= $student['SCID'] ?>" data-answer="3">
                                                                                                                                                <td><?php echo clean($round["round_name"]); ?></td>
                                                                                                                                                <td><?= $i ?></td>
                                                                                                                                                <td><?php echo clean($student["first_name"] . " " . $student["last_name"]); ?></td>
                                                                                                                                                <td class="panswer">
                                                                                                                                                        <div class="answer-normal">
                                                                                                                                                                <p class="noneyet">None yet</p>
                                                                                                                                                                <div class="btn-group">
                                                                                                                                                                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                                                                                                Edit <span class="caret"></span>
                                                                                                                                                                        </button>
                                                                                                                                                                        <ul class="dropdown-menu">
                                                                                                                                                                                <li><a class="edit-opt-answer">Answer</a></li>
                                                                                                                                                                                <li><a class="edit-opt-parser">Parser Result</a></li>
                                                                                                                                                                        </ul>
                                                                                                                                                                </div>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="answer-edit answer-edit-answer" style="display: none;">
                                                                                                                                                                <input type="text" class="form-control"></input>
                                                                                                                                                                <button class="btn btn-success edit-answer-submit">Save</button>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="answer-edit answer-edit-parser" style="display: none;">
                                                                                                                                                                <div class="edit-select">
                                                                                                                                                                        <select class="small-select" style="width:100%;">
                                                                                                                                                                                <option value="1">Wrong</option>
                                                                                                                                                                                <option value="2">Right</option>
                                                                                                                                                                                <option value="3">None (delete answer)</option>
                                                                                                                                                                        </select>
                                                                                                                                                                </div>
                                                                                                                                                                <button class="btn btn-success edit-parser-submit">Save</button>
                                                                                                                                                        </div>
                                                                                                                                                </td>
                                                                                                                                        </tr>
                                                                                                                                <?php endfor; ?>
                                                                                                                        <?php endif; ?>
                                                                                                                <?php endforeach; ?>
                                                                                                        <?php endforeach; ?>
                                                                                                        <tr id="more-progress-show">
                                                                                                                <td colspan="4">Show more</td>
                                                                                                        </tr>
<?php endif; ?>
