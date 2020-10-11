<?php
require 'database/connection.php';
session_start();
$Email=$_SESSION['userEmail-foodtiger'];
$sql = "select * from cus_order where email = '$Email' ";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
     $_SESSION['custorder_id']=$row['custorder_id'];
     $_SESSION['order_id']=$row['order_id'];
     $_SESSION['email']=$row['email'];
     $_SESSION['time_date']=$row['time_date'];
     
}
}else{
  $_SESSION['custorder_id']='';
  $_SESSION['order_id']='';
  $_SESSION['email']='';
  $_SESSION['time_date']='';
}
$sql = "UPDATE cus_order 
SET status = 'done' 
WHERE order_id = '".$_SESSION['order_id']."'";
$result=$conn->query($sql);
echo "<script>alert('Thank you for Ordering at FoodTiger! The ordering process is now complete.');window.location.assign('success.php');</script>";

?>