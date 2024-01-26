<?php
session_start();
	include('connection.php');
	$id = $_GET['id'];

	$delete = "Delete from history";
	$res = $conn->query($delete);

	if ($res){
		$_SESSION['status'] = "Occupant History Deleted";
        $_SESSION['status_code'] = "success";
		header("location: occupantHistory.php");
		exit;
	}
?>