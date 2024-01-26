<?php

session_start();
	include('connection.php');
	$id = $_POST['hiddenID'];
	$RoomNum = $_POST['Room_Number'];
	$slots = $_POST['Slots'];
	
	$valperbed = $_POST['ValPerBed'];
	


$query = mysqli_query($conn,"SELECT * FROM room WHERE Room_Number = '$RoomNum' AND Slots = '$slots'  AND ValPerBed = '$valperbed' ");

if (mysqli_num_rows($query)>0)

{
	$_SESSION['status'] = "Room Already Exists!";
    $_SESSION['status_code'] = "error";
	
	header("location: rooms.php");
}
else{

	$update = "Update room set Room_Number = '".$RoomNum."', Slots = '".$slots."', ValPerBed = '".$valperbed."' where Room_Number = ".$id;
	
	$res = $conn->query($update);

	if ($res){
		$_SESSION['status'] = "Edit Succesful";
        $_SESSION['status_code'] = "success";
		header("location: rooms.php");
	}

}
?>