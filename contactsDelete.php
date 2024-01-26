<?php
	include('connection.php');
	$id = $_GET['id'];

	$delete = "Delete from contacts where ID = ".$id;
	$res = $conn->query($delete);

	if ($res){
		$_SESSION['status'] = "Delete Succesful";
		$_SESSION['status_code'] = "Succes";
		header("location: contacts.php");
	}
?>