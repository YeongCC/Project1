<?php
 include "../database/connection.php";
 include "../database/pdo.php";
 if(isset($_POST['update'])){
    $id = $_POST['id'];
    $order_id = $_POST['order_id'];
    $email = $_POST['email'];
    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $PhoneNo = $_POST['PhoneNo'];
    $price=$_POST['price'];
    $time_date=$_POST['time_date'];
    $payment_way = $_POST['payment_way'];
    $status = $_POST['status'];
    $receive = $_POST['receive'];

  $sql="update payment set order_id='$order_id',email='$email',Name='$Name',Address='$Address',PhoneNo='$PhoneNo',price='$price',time_date='$time_date',payment_way='$payment_way',status='$status',receive='$receive' where id='$id'";
	$result=$conn->query($sql);
 	echo "<script>window.location.assign('delivery.php');</script>";
}

