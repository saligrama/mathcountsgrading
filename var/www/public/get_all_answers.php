<?php

require("../includes/functions.php");

checkSession("grader");

$conn = dbConnect_new();

$uid = $_SESSION["UID"];
$cid = getCurrentComp($conn);

$answers = dbQuery_new($conn, "SELECT * FROM grader_responses WHERE CID=:cid AND UID=:uid AND RNDID IN (SELECT RNDID FROM round WHERE CTID IN (SELECT CTID FROM competition WHERE CID=:cid2)) ORDER BY SID, RNDID, problem_number", ["uid" => $uid, "cid" => $cid, "cid2" => $cid]);
$team_answers = dbQuery_new($conn, "SELECT * FROM grader_responses_team WHERE CID=:cid AND UID=:uid AND RNDID IN (SELECT RNDID FROM round WHERE CTID IN (SELECT CTID FROM competition WHERE CID=:cid2)) ORDER BY SCID, RNDID, problem_number", ["uid" => $uid, "cid" => $cid, "cid2" => $cid]);

$parts = dbQuery_new($conn, "SELECT type, SID FROM student_participants WHERE CID=:cid", ["cid" => $cid]);

$schools = dbQuery_new($conn, "SELECT SCID FROM competition_participants WHERE CID=:cid", ["cid" => $cid]);

$roundrows = dbQuery_new($conn, "SELECT * FROM round WHERE CTID IN (SELECT CTID FROM competition WHERE CID=:cid);", ["cid" => $cid]);

$overrides = dbQuery_new($conn, "SELECT * FROM regular_overrides WHERE CID=:cid", ["cid" => $cid]);

echo json_encode(["answers" => $answers, "team_answers" => $team_answers, "parts" => $parts, "schools" => $schools, "rounds" => $roundrows, "overrides" => $overrides]);

?>
