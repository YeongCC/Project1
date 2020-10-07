<?php
 include "connection.php";
 if(isset($_POST['insertbut'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $PhoneNo = $_POST['PhoneNo'];
    $Email = $_POST['Email'];
    $years = $_POST['years'];
    $language = $_POST['language'];
    $citizen = $_POST['citizen'];
    $validDriverLicense = $_POST['validDriverLicense'];
    $vehicle = $_POST['vehicle'];
    $City = $_POST['City'];

	$sql="INSERT INTO `requestjob`(`id`, `firstName`, `lastName`, `PhoneNo`, `Email`, `years`, `language`, `citizen`, `validDriverLicense`, `vehicle`, `City`,`status`) VALUES ('-','$firstName','$lastName','$PhoneNo ','$Email','$years',' $language','$citizen','$validDriverLicense','$vehicle','$City','have not approve')";
    $query = mysqli_query($conn,$sql );
	echo "<script>alert('Send succesful'); window.location.assign('../applyfinish.php');</script>";
    	
    } else {
		echo "<script>alert('Invalid !'); window.location.assign('../requestJob.php');</script>";
    }