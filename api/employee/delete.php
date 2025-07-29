<?php

	include ('../connection.php');

	$id = $_GET['id'];

	$query = "DELETE FROM `employee` WHERE id = $id";

	$data = mysqli_query($conn, $query);
	
	$response = array();
	
	if (mysqli_affected_rows($conn)) {

		$response['deleted'] = true;

		echo json_encode($response);

	} else {

		$response['deleted'] = false;

		echo json_encode($response);
		
	}

?>
