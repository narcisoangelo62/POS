<?php
session_start();
	include('connection.php');

		$student_id = $_POST['Student_ID'];
		$firstname = $_POST['First_Name'];	
		$lastname = $_POST['Last_Name'];
       	
       	$datepaid = $_POST['Date_Paid'];

$query = mysqli_query($conn,"SELECT * FROM occupants  WHERE Student_ID = '$student_id' ");

$query2 = mysqli_query($conn,"select * from payments WHERE Student_ID = '$student_id'");


if (mysqli_num_rows($query2)>0){
	$_SESSION['status'] = "Record already exist!";
    $_SESSION['status_code'] = "error";
    header("location: payments.php"); 

}

else{


if (mysqli_num_rows($query)>0)

{
	

$add = "insert into payments set Student_ID = '".$student_id."',  Date_Paid = '".$datepaid."' , First_Name = '".$firstname."', Last_Name = '".$lastname."'" ;
$res = $conn->query($add);
$update = "update occupants set Status1 = 'Paid' where Student_ID = '".$student_id."'";
$resss = $conn->query($update);




if ($res){
		$_SESSION['status'] = "Payment Added Succesfully";
        $_SESSION['status_code'] = "success";

	
		header("location: payments.php"); 
	
}

$addd = "insert into payment_history set Student_ID = '".$student_id."',  Date_Paid = '".$datepaid."' ,First_Name = '".$firstname."', Last_Name = '".$lastname."'" ; " ;
$ress = $conn->query($addd);

if ($ress){
		

		header("location: payments.php"); 
	
}



}

else{
	$_SESSION['status'] = "Student ID doesn't exist!";
    $_SESSION['status_code'] = "error";
    header("location: payments.php"); 

	
}

}



?>








