<?php

require(dirname(__FILE__) . "/constants.php");
require(dirname(__FILE__) . "/../lib/MCGExpression/MCGExpression/main.php");


function updateCompStatus($conn, $cid)
{
	$snum = dbQuery_new($conn, "SELECT COUNT(*) AS val FROM student_participants WHERE CID=:cid", ["cid" => $cid]);
	$snum = $snum[0]["val"];

	$scnum = dbQuery_new($conn, "SELECT COUNT(*) AS val FROM competition_participants WHERE CID=:cid", ["cid" => $cid]);
	$scnum = $scnum[0]["val"];


	$target1 = dbQuery_new($conn, "SELECT COUNT(*) AS val FROM student_answers WHERE CID=:cid AND problem_type='target1'", ["cid" => $cid]);
	$target1 = $target1[0]["val"] / ($snum * 2);

	$target2 = dbQuery_new($conn, "SELECT COUNT(*) AS val FROM student_answers WHERE CID=:cid AND problem_type='target2'", ["cid" => $cid]);
        $target2 = $target2[0]["val"] / ($snum * 2);

	$target3 = dbQuery_new($conn, "SELECT COUNT(*) AS val FROM student_answers WHERE CID=:cid AND problem_type='target3'", ["cid" => $cid]);
        $target3 = $target3[0]["val"] / ($snum * 2);

	$target4 = dbQuery_new($conn, "SELECT COUNT(*) AS val FROM student_answers WHERE CID=:cid AND problem_type='target4'", ["cid" => $cid]);
        $target4 = $target4[0]["val"] / ($snum * 2);

	$sprint = dbQuery_new($conn, "SELECT COUNT(*) AS val FROM student_answers WHERE CID=:cid AND problem_type='sprint'", ["cid" => $cid]);
        $sprint = $sprint[0]["val"] / ($snum * 30);

	$team = dbQuery_new($conn, "SELECT COUNT(*) AS val FROM team_answers WHERE CID=:cid AND problem_type='team'", ["cid" => $cid]);
        $team = $team[0]["val"] / ($scnum * 10);


	dbQuery_new($conn, "UPDATE competition SET status_sprint=:sprint, status_target1=:target1, status_target2=:target2, status_target3=:target3, status_target4=:target4, status_team=:team WHERE CID=:cid", [
			"sprint" => $sprint,
			"target1" => $target1,
			"target2" => $target2,
			"target3" => $target3,
			"target4" => $target4,
			"team" => $team,
			"cid" => $cid
	]);
}

function updateStudentScore($conn, $SID, $cid, $round)
{
	$sinfo = dbQuery_new($conn, "SELECT SID FROM mathlete_info WHERE SID=:sid", ["sid" => $SID]);
	if(empty($sinfo))
		return;

	$raw = dbQuery_new($conn, "SELECT SUM(points) FROM student_answers WHERE CID=:cid AND SID=:sid AND problem_type=:type", ["cid" => $cid, "sid" => $SID, "type" => $round]);
	if(empty($raw))
		$raw = 0;
	else
		$raw = $raw[0]["SUM(points)"];

	$arr = [
		"cid" => $cid,
		"sid" => $SID,
		"raw" => $raw,
	];

	$exists = dbQuery_new($conn, "SELECT SID FROM student_cleaner WHERE CID=:cid AND SID=:sid", ["cid" => $cid, "sid" => $SID]);
	if(empty($exists))
		dbQuery_new($conn, "INSERT INTO student_cleaner SET CID=:cid, SID=:sid, " . $round . "_raw=:raw", $arr);
	else
		dbQuery_new($conn, "UPDATE student_cleaner SET " . $round . "_raw=:raw WHERE CID=:cid AND SID=:sid", $arr);
}

function updateTeamScore($conn, $SCID, $cid)
{
        $sinfo = dbQuery_new($conn, "SELECT SCID FROM school_info WHERE SCID=:scid", ["scid" => $SCID]);
        if(empty($sinfo))
                return;

        $raw = dbQuery_new($conn, "SELECT SUM(points) FROM team_answers WHERE CID=:cid AND SCID=:scid AND problem_type='team'", ["cid" => $cid, "scid" => $SCID]);
        if(empty($raw))
                $raw = 0;
        else
                $raw = $raw[0]["SUM(points)"];

	$avg = dbQuery_new($conn, "SELECT AVG(sprint_raw + target1_raw + target2_raw + target3_raw + target4_raw) AS score FROM student_cleaner WHERE CID=:cid AND SID IN (SELECT SID FROM mathlete_info WHERE SCID=:scid) AND SID IN (SELECT SID FROM student_participants WHERE CID=:cid2 AND type='regular')", ["cid" => $cid, "cid2" => $cid, "scid" => $SCID]);
	if(empty($avg))
		$avg = 0;
	else
		$avg = $avg[0]["score"];

	$arr = [
                "cid" => $cid,
                "scid" => $SCID,
                "raw" => ($raw + $avg)
        ];

        $exists = dbQuery_new($conn, "SELECT SCID FROM team_cleaner WHERE CID=:cid AND SCID=:scid", ["cid" => $cid, "scid" => $SCID]);
        if(empty($exists))
                dbQuery_new($conn, "INSERT INTO team_cleaner SET CID=:cid, SCID=:scid, team_raw=:raw", $arr);
        else
                dbQuery_new($conn, "UPDATE team_cleaner SET team_raw=:raw WHERE CID=:cid AND SCID=:scid", $arr);
}


function compareAnswers($in1, $in2)
{
	$a = "$in1";//strtoupper(removeWhitespace("$in1"));
	$b = "$in2";//strtoupper(removeWhitespace("$in2"));

//	echo "$a    $b<br>";

	if(sempty($a) && sempty($b))
		return 1;
	else if(sempty($a) || sempty($b))
		return 0;

	$e1_tok = tokenize($a);
	$e2_tok = tokenize($b);

	$result = 0;
	try {
		$result = compare(
				shunting_yard($e1_tok[0], $e1_tok[1]),
				shunting_yard($e2_tok[0], $e2_tok[1])
			);

		return $result;
	}
	catch(Exception $e) {
		return 0;
	}
}

function removeWhitespace($str)
{
	return preg_replace('/\s/', '', preg_replace('~\x{00a0}~siu', '', $str));
}

function getCurrentComp($conn)
{
	$currentcomp = dbQuery_new($conn, "SELECT * FROM current_competition");
        if(empty($currentcomp))
                $currentcomp = 0;
        else {
                $currentcomp = $currentcomp[0]["CID"];

                $exists = dbQuery_new($conn, "SELECT * FROM competition WHERE CID = :cid", ["cid" => $currentcomp]);
                if(empty($exists))
                        $currentcomp = 0;
        }

	return $currentcomp;
}

function getProblemSolution($solutionrows, $number, $type)
{
        if(empty($solutionrows))
                return "";

        foreach($solutionrows as $row)
                if($row["problem_number"] == $number && $row["problem_type"] == $type)
                        return $row["answer"];

        return "";
}

function sempty($str)
{
	return (empty($str) && ($str !== "0"));
}

function render($template, $values = []) {

    // if template exists, render it
    if (file_exists("../templates/$template")) {
        // extract variables into local scope
        extract($values);

        // render template
        require("../templates/$template");

    }

    // else err
    else
        trigger_error("Invalid template: $template", E_USER_ERROR);

}

function popupAlert($err) {

    echo '<script type="text/javascript">alert("' . $err . '");</script>';

}

function inlineAlert($offset, $width, $err) {

    echo "<div class='alert alert-danger alert-dismissable col-sm-offset-$offset col-sm-$width' role='alert'>";
    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    echo '<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>';
    echo '<span class="sr-only">Error:</span>';
    echo $err;
    echo '</div>';

}

function dieError($err) {

    popupAlert($err);
    exit;

}

function redirectTo($url) {

    echo "<script type='text/javascript'>window.location.replace('$url');</script>";
    exit;

}

function internalErrorRedirect($url)
{
	popupAlert("Whoopsie! There was an internal error. Please try again");
	redirectTo($url);
}

function endLoginSession() {

    if(!session_id())
	session_start();

    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
}

function checkSession($type) {
    if(!session_id())
        session_start();

    if(isset($_SESSION['UID'])) {

        if(time() - $_SESSION['starttime'] > MAX_SESSION_TIME) {

            endLoginSession();

            popupAlert('The session has expired. Please press ok to log back in');

            redirectTo('login.php');

        }

        if($_SESSION['type'] != $type && $_SESSION['type'] == 'grader')
            redirectTo('grader.php');

    }
    else
        redirectTo('login.php');

    $_SESSION['starttime'] = time();

}

function dbConnect_new() {

    $dsn = "mysql:host=" . MYSQL_HOSTNAME . ";dbname=" . MYSQL_DBNAME . ";charset=utf8";

    $opts = [

        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_ERRMODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,

    ];

    $conn = new PDO($dsn, MYSQL_USERNAME, MYSQL_PASSWORD, $opts);
    return $conn;

}

function dbQuery_new($conn, $query, $values = array()) {

    if (isset($values)) {

        $stmt = $conn->prepare($query);
        $stmt->execute($values);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    else {

        $stmt = $conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}

function exprCompare($expr1, $expr2) {

    $e1 = tokenize($expr1);
    $e2 = tokenize($expr2);

    return compare(shunting_yard($e1[0], $e1[1]), shunting_yard($e1[0], $e1[1]));

}

function getFullName($conn)
{
    if(!session_id())
	session_start();

    if(!isset($_SESSION["UID"]))
	return 0;

    $namerows = dbQuery_new($conn, "SELECT first_name, last_name, email FROM user WHERE UID = :UID;", ["UID" => $_SESSION["UID"]]);
    if(empty($namerows)) {
	popupAlert("Whoops! There was an interal error. Please press ok to log back in.");
	endLoginSession();
	redirectTo("/login.php");
	return 1;
    }

    $fullname = "";

    $name = $namerows[0];

    if(sempty($name["first_name"])) {
        if(sempty($name["last_name"]))
            $fullname = $name["email"];
        else
            $fullname = $name["last_name"];
    }
    else {
        if(sempty($name["last_name"]))
            $fullname = $name["first_name"];
        else
            $fullname = $name["first_name"] . " " . $name["last_name"];
    }

    return $fullname;
}

function getCompFullName($comprow)
{
	if(sempty($comprow["competition_name"]))
		return $comprow["competition_date"];
	else
		return $comprow["competition_name"] . " (" . $comprow["competition_date"] . ")";
}

function getStudentFullName($row)
{
	if(sempty($row["first_name"])) {
		if(sempty($row["last_name"]))
			return "No name";
		else
			return $row["last_name"];
	}
	else {
		if(sempty($row["last_name"]))
			return $row["first_name"];
		else
			return $row["first_name"] . " " . $row["last_name"];
	}
}

function clean($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function studentSort($a, $b)
{
        $na = strtolower(getStudentFullName($a));
        $nb = strtolower(getStudentFullName($b));

	if($na == $nb)
		return 0;

	return $na > $nb ? 1 : -1;
}

function schoolSort($a, $b)
{
        $na = strtolower($a["team_name"]);
        $nb = strtolower($b["team_name"]);

        if($na == $nb)
                return 0;

        return $na > $nb ? 1 : -1;
}

?>
