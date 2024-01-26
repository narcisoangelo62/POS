<?php
session_start();
	include('connection.php');
	$id = $_GET['id'];

	$delete = "Delete from occupants where ID = ".$id;
	$res = $conn->query($delete);

	if ($res){

		$deletionDate = date("Y-m-d"); // Get the current date
    	$insertDate = "UPDATE history SET Date_Left = '$deletionDate' WHERE ID = " . $id;
    	$conn->query($insertDate); // Insert the deletion date into the "deletion_date" column

		$_SESSION['status'] = "Delete Succesful";
        $_SESSION['status_code'] = "success";
		header("location: ".$_SERVER['HTTP_REFERER']);
		exit;
	}
?>