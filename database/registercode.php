<?php
$servername = "localhost";
$username = "root";
$password = "0612";
$db="foodtiger";
$conn = mysqli_connect($servername, $username, $password,$db);

	session_start();
	if($_POST['type']==1){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$phoneNO=$_POST['phoneNO'];
		$address=$_POST['address'];
		$password=$_POST['password'];
		
		$duplicate=mysqli_query($conn,"select * from customer where Email='$email'");
		if (mysqli_num_rows($duplicate)>0)
		{
			echo json_encode(array("statusCode"=>201));
		}
		else{
			$sql = "INSERT INTO `customer`(  `Name`, `Email`, `PhoneNo`, `Address`, `Password`) 
			VALUES ('$name','$email','$phoneNO','$address', '$password')";
			if (mysqli_query($conn, $sql)) {
				echo json_encode(array("statusCode"=>200));
				
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
		}
		mysqli_close($conn);
    }
    
    
	
?>