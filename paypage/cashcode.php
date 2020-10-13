<?php    
    include "config/connection.php";
    include "config/pdo.php";
    session_start();
    if(isset($_POST['Pay'])) {
      $id = '-';
      $order_id = $_POST['order_id'];
      $email = $_SESSION['userEmail'];
      $Name = $_POST['Name'];
      $Address = $_POST['Address'];
      $PhoneNo = $_POST['PhoneNo'];
      $price=$_POST['price'];
      $payment_way = $_POST['payment_way'];
      $status = $_POST['status'];
      $receive = $_POST['receive'];
      $time_date = $_POST['time_date'];


   
   $sql = "INSERT into payment(id,order_id, email, Name, PhoneNo, Address,price,time_date,payment_way,status,receive)values('$id','$order_id', '$email', '$Name', '$PhoneNo', '$Address','$price','$time_date','$payment_way','$status','$receive')";
   $result=$conn->query($sql);
   echo "<script>window.location.assign('doneCash.php');</script>";
}
