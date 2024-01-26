<?php

session_start();
	include('connection.php');
	$id = $_POST['hiddenID'];
	$student_id = $_POST['Student_ID'];
	$numViolations = $_POST['Number_Violations'];
	


$query = mysqli_query($conn,"SELECT * FROM violators WHERE Student_ID = '$student_id' AND Number_Violations = '$numViolations'  ");






if (mysqli_num_rows($query)>0)

{

	
	header("location: violators.php");
}
else{

	

	$update = "Update violators set Number_Violations = '".$numViolations."' where id = ".$id;
	
	$res = $conn->query($update);

	if ($res){
		$_SESSION['status'] = "Edit Succesful";
        $_SESSION['status_code'] = "success";
		header("location: violators.php");
	}

}
?>