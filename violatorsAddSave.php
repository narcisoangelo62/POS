
<?php
session_start();
	include('connection.php');

		$student_id = $_POST['Student_ID'];
		$numViolation = $_POST['Number_Violations'];
        

$query = mysqli_query($conn,"SELECT * FROM violators WHERE Student_ID = '$student_id'");


$query2 = mysqli_query($conn,"SELECT * FROM occupants WHERE Student_ID = '$student_id'");
if (mysqli_num_rows($query2)>0){



if (mysqli_num_rows($query)>0)

{
	$_SESSION['status'] = "Record already exists";
        $_SESSION['status_code'] = "error";
	header("location: violators.php");
	exit();

	
}

else{

	$add = "insert into violators set Student_ID = '".$student_id."', Number_Violations = '".$numViolation."'  " ;
	$res = $conn->query($add);



	if ($res) {

		$_SESSION['status'] = "Student Information Saved";
        $_SESSION['status_code'] = "success";
		header("location: violators.php"); 
		exit();
	
}



}
}
else {
	$_SESSION['status'] = "Student ID doesn't exist!";
        $_SESSION['status_code'] = "error";
	header("location: violators.php");
	exit();
}



?>









