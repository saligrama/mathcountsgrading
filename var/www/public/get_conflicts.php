<?php

require(dirname(__FILE__) . "/../includes/functions.php");

checkSession('admin');

$conn = dbConnect_new();

$cid = dbQuery_new($conn, "SELECT * FROM current_competition");
if(!empty($cid))
{
	$cid = $cid[0]["CID"];

	$result = dbQuery_new($conn, "SELECT COID, SID, problem_number, problem_type FROM grading_conflicts WHERE CID=:cid", ["cid" => $cid]);

	if(!empty($result))
	{
		$array = [];
		$indices = [];
		$sids = [];

		for($i = 0; $i < count($result); $i++)
		{
			$name = dbQuery_new($conn, "SELECT first_name, last_name FROM mathlete_info WHERE SID=:sid", ["sid" => $result[$i]["SID"]]);
			if(empty($name))
				exit;
			else
				$name = $name[0];

			$idx = array_search($result[$i]["SID"], $sids);
			if($idx === FALSE)
			{
				array_push($sids, $result[$i]["SID"]);

				array_push($array, [
					"SID" => $result[$i]["SID"],
					"name" => getStudentFullName($name),
					"conflicts" => [[
						"COID" => $result[$i]["COID"],
						"pn" => $result[$i]["problem_number"],
						"round" => $result[$i]["problem_type"]
					]]
				]);

				end($array);
				$indices[$result[$i]["SID"]] = key($array);
			}
			else
			{
				array_push($array[$indices[$sids[$idx]]]["conflicts"], [
					"COID" => $result[$i]["COID"],
					"pn" => $result[$i]["problem_number"],
					"round" => $result[$i]["problem_type"]
				]);
			}
		}

		echo json_encode($array);
	}
}

?>
