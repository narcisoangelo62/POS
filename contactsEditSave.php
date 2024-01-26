<?php

session_start();
	include('connection.php');
	$id = $_POST['hiddenID'];
	$student_id = $_POST['Student_ID'];
	$firstname = $_POST['First_Name'];
	$lastname = $_POST['Last_Name'];
	
	$Address = $_POST['Address'];
	$Phone = $_POST['Phone'];
	



$query = mysqli_query($conn,"SELECT * FROM contacts WHERE Student_ID = '$student_id' AND First_Name = '$firstname' AND Last_Name = '$lastname' AND Address = '$Address' AND Phone = '$Phone'");






if (mysqli_num_rows($query)>0)

{

	
	header("location: contacts.php");
}
else{

	

	$update = "Update contacts set  First_Name = '".$firstname."', Last_Name = '".$lastname."', Address = '".$Address."', Phone = '".$Phone."'   where id = ".$id;
	
	$res = $conn->query($update);

	if ($res){
		$_SESSION['status'] = "Edit Successful";
        $_SESSION['status_code'] = "success";
		header("location: contacts.php");
	}

}
?>