<?php

require(dirname(__FILE__) . "/../includes/functions.php");

checkSession('admin');

$conn = dbConnect_new();

$cid = getCurrentComp($conn);
if($cid !== 0)
{
	$data = dbQuery_new($conn, "SELECT status, RNDID FROM competition_status WHERE CID=:cid", ["cid" => $cid]);
	if(!empty($data))
		echo json_encode($data);
}

?>
