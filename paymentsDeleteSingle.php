<?php
session_start();
	include('connection.php');
	$id = $_GET['id'];
	
	$update = "update payments p left join occupants o ON o.`Student_ID` = p.`Student_ID` SET o.`Status1` = 'Unpaid' WHERE p.ID =".$id;
	$ress = $conn->query($update);
	$delete = "Delete from payments where ID = ".$id;
	$res = $conn->query($delete);
	
	if ($res){
		$_SESSION['status'] = "Delete Succesful";
        $_SESSION['status_code'] = "success";
		header("location: payments.php");
		exit;
	}
?>