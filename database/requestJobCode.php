<?php
$servername = "localhost";
$username = "root";
$password = "0612";
$db="foodtiger";
$conn = mysqli_connect($servername, $username, $password,$db);
 if($_POST['type']==1) {
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
    $duplicate=mysqli_query($conn,"select * from admin where Email='$Email'");
		if (mysqli_num_rows($duplicate)>0)
		{
			echo json_encode(array("statusCode"=>201));
		}
		else{
	$sql="INSERT INTO `requestjob`(`id`, `firstName`, `lastName`, `PhoneNo`, `Email`, `years`, `language`, `citizen`, `validDriverLicense`, `vehicle`, `City`,`status`) VALUES ('-','$firstName','$lastName','$PhoneNo ','$Email','$years',' $language','$citizen','$validDriverLicense','$vehicle','$City','have not approve')";
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