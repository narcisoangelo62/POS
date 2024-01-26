
<?php
session_start();
	include('connection.php');

		$student_id = $_POST['Student_ID'];
		$firstname = $_POST['First_Name'];
        $lastname = $_POST['Last_Name'];
        $phone = $_POST['Phone'];
        $address = $_POST['Address'];


$query = mysqli_query($conn,"SELECT * FROM occupants WHERE Student_ID = '$student_id'");





if (mysqli_num_rows($query)>0)

{

$add = "insert into contacts set Student_ID = '".$student_id."', First_Name = '".$firstname."', Last_Name = '".$lastname."',  Phone = '".$phone."', Address = '".$address."' " ;
$res = $conn->query($add);

if ($res){

		$_SESSION['status'] = "Contact Information Saved";
        $_SESSION['status_code'] = "success";

	
		header("location: contacts.php"); 
	
}


}

else{

$_SESSION['status'] = "Student ID does not exist";
$_SESSION['status_code'] = "error";
header("location: contacts.php"); 


}


?>








