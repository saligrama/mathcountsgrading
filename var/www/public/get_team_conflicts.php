<?php

require(dirname(__FILE__) . "/../includes/functions.php");

checkSession('admin');

$conn = dbConnect_new();

$cid = dbQuery_new($conn, "SELECT * FROM current_competition");
if(!empty($cid))
{
	$cid = $cid[0]["CID"];

	$result = dbQuery_new($conn, "SELECT TCID, SCID, problem_number FROM grading_conflicts_team WHERE CID=:cid", ["cid" => $cid]);

	if(!empty($result))
	{
		$array = [];
		$indices = [];
		$scids = [];

		for($i = 0; $i < count($result); $i++)
		{
			$name = dbQuery_new($conn, "SELECT team_name FROM school_info WHERE SCID=:scid", ["scid" => $result[$i]["SCID"]]);
			if(empty($name))
				exit;
			else
				$name = $name[0];

			$idx = array_search($result[$i]["SCID"], $scids);
			if($idx === FALSE)
			{
				array_push($scids, $result[$i]["SCID"]);

				array_push($array, [
					"SCID" => $result[$i]["SCID"],
					"name" => $name["team_name"],
					"conflicts" => [[
						"TCID" => $result[$i]["TCID"],
						"pn" => $result[$i]["problem_number"]
					]]
				]);

				end($array);
				$indices[$result[$i]["SCID"]] = key($array);
			}
			else
			{
				array_push($array[$indices[$scids[$idx]]]["conflicts"], [
					"TCID" => $result[$i]["TCID"],
					"pn" => $result[$i]["problem_number"]
				]);
			}
		}

		echo json_encode($array);
	}
}

?>
