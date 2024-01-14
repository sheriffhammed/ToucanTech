<?php
	header("Access-Control-Allow-Origin: *");
	require_once 'db.php';
	$executionStartTime = microtime(true);
	$db = connect();
	$inputValue = $_REQUEST['searchName'];
	$sql = "SELECT distinct p.FirstName, p.SurName, e.EmailAddress FROM `emails` e join profiles p on p.UserRefID = e.UserRefID WHERE p.FirstName like '%$inputValue%'";
	$profilesQuery = $db->query($sql);
	//Return all records
	$profiles = $profilesQuery->fetchAll(PDO::FETCH_ASSOC);	
	if($profiles){
		$output = [
			'status' => 200,
			'message' => 'Profiles Retreived Successfully',
			'data' => $profiles
		];
		echo json_encode($output);
		return;
	}
	echo json_encode($output); 

?>

	

	