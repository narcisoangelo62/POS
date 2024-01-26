<?php

session_start();
	include('connection.php');
	$id = $_POST['hiddenID'];
	$student_id = $_POST['Student_ID'];
	$firstname = $_POST['First_Name'];
	$lastname = $_POST['Last_Name'];
	$roomNum = $_POST['Room_Number'];
	$Age = $_POST['Age'];
	$Address = $_POST['Address'];
	$Phone = $_POST['Phone'];
	$Course = $_POST['Course'];
	$Year_Level = $_POST['Year_Level'];


$query = mysqli_query($conn,"SELECT * FROM occupants WHERE Student_ID = '$student_id' AND First_Name = '$firstname' AND Last_Name = '$lastname' AND Age = '$Age' AND Address = '$Address' AND Phone = '$Phone' AND Course = '$Course' AND Year_Level = '$Year_Level' AND Room_Number = '$roomNum' ");






if (mysqli_num_rows($query)>0)

{

	
	header("location: occupants.php");
}
else{

	

	$update = "Update occupants set Student_ID = '".$student_id."', First_Name = '".$firstname."', Last_Name = '".$lastname."', Room_Number = '".$roomNum."', Age = '".$Age."', Address = '".$Address."', Phone = '".$Phone."', Course = '".$Course."', Year_Level = '".$Year_Level."'  where id = ".$id;
	
	$res = $conn->query($update);

	if ($res){
		$_SESSION['status'] = "Edit Succesful";
        $_SESSION['status_code'] = "success";
		header("location: occupants.php");
	}

}
?>