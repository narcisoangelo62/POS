<?php
session_start();
	include('connection.php');
	$id = $_GET['id'];

	$delete = "Delete from payment_History";
	$res = $conn->query($delete);

	if ($res){
		$_SESSION['status'] = "Payment History Deleted";
        $_SESSION['status_code'] = "success";
		header("location: paymentHistory.php");
		exit;
	}
?>