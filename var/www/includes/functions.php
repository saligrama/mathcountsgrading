<?php

require(dirname(__FILE__) . "/constants.php");
require(dirname(__FILE__) . "/../lib/vendor/autoload.php");

use MathParser\StdMathParser;


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

    echo "<div class='alert alert-danger col-sm-offset-$offset col-sm-$width' role='alert'>";
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

function endLoginSession() {

    if(isset($_SESSION['type']))
    	unset($_SESSION['type']);

    if(isset($_SESSION['starttime']))
        unset($_SESSION['starttime']);

    if(isset($_SESSION['UID']))
    	unset($_SESSION['UID']);

    if(session_id()) {
	if (ini_get("session.use_cookies")) {
     	    $params = session_get_cookie_params();
        	setcookie(session_name(), '', time() - 42000,
            	$params["path"], $params["domain"],
            	$params["secure"], $params["httponly"]
            );
    	}
	session_destroy();
    }

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
function dbQuery_new($conn, $query, $values = NULL) {

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

function exprParse($expr) {

    function parseArray(&$tokenizedArray) {

        $result = [];

        while (($ch = array_shift($tokenizedArray)) !== null) {

            if ($ch === ')')
                break;

            $result[] = $ch === '(' ? parseArray($tokenizedArray) : $ch;

        }
        if (count($result) < 2)
            return reset($result);

        $result[] = array_splice($result, -2, 1)[0];
        return $result;

    }

    $parser = new StdMathParser();

    $tokenizedArray = preg_split("/([()])/", $parser->parse($expr), 0, PREG_SPLIT_DELIM_CAPTURE + PREG_SPLIT_NO_EMPTY);
    return parseArray($tokenizedArray);

}

?>
