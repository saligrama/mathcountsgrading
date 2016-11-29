<?php

require(dirname(__FILE__) . "/../includes/functions.php");

checkSession('admin');

$conn = dbConnect_new();

$cid = getCurrentComp($conn);
if($cid !== 0)
{
	$data = dbQuery_new($conn, "SELECT status_sprint, status_target1, status_target2, status_target3, status_target4, status_team FROM competition WHERE CID=:cid", ["cid" => $cid]);
	if(!empty($data))
		echo json_encode($data[0]);
}

?>
