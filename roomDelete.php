<?php
session_start();
	include('connection.php');
	$id = $_GET['id'];

if ($_SESSION['type'] == '1') { 
	$delete = "Delete from room where Room_Number = ".$id;
	$res = $conn->query($delete);

	if ($res){
		$_SESSION['status'] = "Deleted";
		$_SESSION['status_code'] = "success";
		header("location: rooms.php");
	}
	
}
else{
	$_SESSION['status'] = "Not allowed";
    $_SESSION['status_code'] = "error";
	header("location: rooms.php");
}


?>