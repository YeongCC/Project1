<?php
include "connection.php";
session_start();
		$from_user=$_POST['from_user'];
		$to_user=$_POST['to_user'];
		$message=$_POST['message'];
		$sql = "INSERT INTO `chat`( `to_user`, `from_user`, `message`, `status`) 
		VALUES ('$to_user','$from_user','$message','1')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode"=>200));
		} 
		else {
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($conn);


?>