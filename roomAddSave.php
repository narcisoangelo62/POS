
<?php
session_start();
	
	include('connection.php');

		$RoomNum = $_POST['Room_Number'];
        $slots = $_POST['Slots'];
        
        $valperbed = $_POST['ValPerBed'];
      	


$query = mysqli_query($conn,"SELECT * FROM room WHERE Room_Number = '$RoomNum'");

if(!empty($_POST['Room_Number']) ){



if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "Room Already Exists!";
    $_SESSION['status_code'] = "error";
	
	header("location: rooms.php");
}

else{


$add = "INSERT INTO `room`( `Room_Number`, `Slots`,`ValPerBed`)
	       VALUES ('$RoomNum','$slots','$valperbed')";
$res = $conn->query($add);



	if ($res){
		$_SESSION['status'] = "Room Added Succesfully";
        $_SESSION['status_code'] = "success";

	
		header("location: rooms.php"); 
	
}
}
}
else{
	header("location: rooms.php");
}
?>








