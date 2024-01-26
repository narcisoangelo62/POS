
<?php
session_start();
	include('connection.php');
		$student_id = $_POST['Student_ID'];
		$firstname = $_POST['First_Name'];
        $lastname = $_POST['Last_Name'];
        $roomNum = $_POST['Room_Number'];
        $age = $_POST['Age'];
        $phone = $_POST['Phone'];
        $course = $_POST['Course'];
        $address = $_POST['Address'];
        $yearlevel =$_POST['Year_Level'];
        $date = $_POST['Date_Added'];
        $semester = $_POST['Semester'];
        
        $query3 = mysqli_query($conn, "SELECT Slots FROM room WHERE Room_Number = '$roomNum'");
        $row1 = mysqli_fetch_array($query3);
        $maxOccupants = $row1['Slots'];
        
        // Count the number of occupants that are already added in the room
        $query4 = mysqli_query($conn, "SELECT COUNT(*) as OccupantsCount FROM occupants WHERE Room_Number = '$roomNum'");
        $row2 = mysqli_fetch_array($query4);
        $occupantsCount = $row2['OccupantsCount'];

        if ($occupantsCount >= $maxOccupants) {
            // The room is already full, show an error message
            $_SESSION['status'] = "The room is already full, cannot add more occupants!";
            $_SESSION['status_code'] = "error";
            header("location: occupants.php");
        } else {
$query = mysqli_query($conn,"SELECT * FROM occupants WHERE Student_ID = '$student_id'");

$msg = "";
 

if (isset($_POST['Save'])) {
 
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./img/" .$filename;
 
   
 



}





if (mysqli_num_rows($query)>0)

{

	$_SESSION['status'] = "Student ID already exists!";
    $_SESSION['status_code'] = "error";
	header("location: occupants.php");
}

else{


$add = "insert into occupants set Student_ID = '".$student_id."', First_Name = '".$firstname."', Last_Name = '".$lastname."' , Room_Number = '".$roomNum."', Age = '".$age."', Phone = '".$phone."', Course = '".$course."', Address = '".$address."',Date_Added = '".$date."', Semester = '".$semester."', Year_Level = '".$yearlevel."',Image = '".$filename."' " ;
$res = $conn->query($add);
$add2 = "insert into history set Student_ID = '".$student_id."', First_Name = '".$firstname."', Last_Name = '".$lastname."' , Room_Number = '".$roomNum."', Age = '".$age."', Phone = '".$phone."', Course = '".$course."', Address = '".$address."',Date_Added = '".$date."', Semester = '".$semester."', Year_Level = '".$yearlevel."',Image = '".$filename."' " ;
$res2 = $conn->query($add2);



	if ($res){

		$_SESSION['status'] = "Student Information Saved";
        $_SESSION['status_code'] = "success";
	
		header("location: occupants.php"); 
	
}
}


        }

?>








