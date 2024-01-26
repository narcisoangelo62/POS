<?php
session_start();
	include('connection.php');
	$id = $_GET['id'];

	$delete = "Delete from violators where ID = ".$id;
	$res = $conn->query($delete);

	if ($res){
		$_SESSION['status'] = "Delete Succesful";
        $_SESSION['status_code'] = "success";
		header("location: violators.php");
		exit;
	}
?>