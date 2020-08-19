<?php
 include "../database/connection.php";
 include "../database/pdo.php";
 if(isset($_POST['update'])){
    $ad_id=$_POST['ad_id'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password=$_POST['Password'];
    $Position = $_POST['Position'];

  $sql="update admin set Name='$Name',Email='$Email',Password='$Password',Position='$Position' where ad_id='$ad_id'";
	$result=$conn->query($sql);
 	echo "<script>alert('Congratulations,Update Succesful!!!');window.location.assign('viewadmin.php');</script>";
}