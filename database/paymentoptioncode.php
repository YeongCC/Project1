<?php
require 'connection.php';
session_start();
$Email = $_SESSION['userEmail'];
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
$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {


    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price =  $values["food_price"];
    $total = ($values["food_quantity"] * $values["food_price"]);
    $username=$_SESSION['userEmail'];
    $cust_id= $_SESSION['order_id'];
    $date_time=$_SESSION['time_date'];
    $order_id= $_SESSION['order_id'];
    $gtotal = $gtotal + $total;
     $query = "INSERT INTO orders (cust_id,foodname, price,  quantity, username,date_time) 
              VALUES ('$cust_id',' $foodname ',' $price ',' $quantity ',' $username ','$date_time')";
              $success = $conn->query($query);         
               echo "<script>window.location.href='../paypage/payment.php';</script>";
        
      if(!$success)
      { 
        ?>
        <div class="container">
          <div class="jumbotron">
            <h1>Something went wrong!</h1>
            <p>Try again later.</p>
          </div>
        </div>
        <?php
	}      
	
  }


        ?>