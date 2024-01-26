<?php
session_start();
	include('connection.php');
	$id = $_GET['id'];

	$delete = "Delete from payments";
	$res = $conn->query($delete);
	$update = "update occupants set Status1 = 'Unpaid'";
	$ress = $conn->query($update);
	if ($res){
		$_SESSION['status'] = "Delete Succesful";
        $_SESSION['status_code'] = "success";
		header("location: payments.php");
		exit;
	}
?>