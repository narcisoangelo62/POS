<?php
	
	$dbname = "group_3";
	$dbuser = "root";
	$dbpass = "";
	$dbhost = "localhost";

	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

	if(!$conn){
		echo $conn -> error;
		exit;
	}


	

?>