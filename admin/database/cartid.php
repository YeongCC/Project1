<?php 
require 'connection.php';
session_start();
if(isset($_POST['insert'])) {
   
$order_id = $_POST['order_id'];
$email = $_SESSION['userEmail'];

$sql="INSERT INTO `cus_order`(`custorder_id`, `order_id`, `email`) VALUES ('','$order_id','$email')";
$query = mysqli_query($conn,$sql );
   echo "<script>alert('Congratulations,Insert Succesful!!!'); window.location.assign('paymentoptioncode.php');</script>";
      
  } else {
      echo "<script>alert('Invalid !'); window.location.assign('cart.php');</script>";
  }
?>

