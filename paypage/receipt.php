<?php
session_start();
require 'config/connection.php';
if (isset($_SESSION['userEmail-foodtiger'])) {
	$Email = $_SESSION['userEmail-foodtiger'];
	$query = "SELECT * FROM customer WHERE Email = '$Email'" ; 
	$result= mysqli_query($conn , $query) or die (mysqli_error($conn));
	if (mysqli_num_rows($result) > 0 ) {
		$row = mysqli_fetch_array($result);
		$userid = $row['cus_id'];
		$Email = $row['Email'];
		$Name = $row['Name'];
    $PhoneNo = $row['PhoneNo'];
    $Address = $row['Address'];

  }}
if(!isset($_SESSION['userEmail-foodtiger']))
{
	header("location:../index.php");
}
unset($_SESSION["cart"]);
$Email = $_SESSION['userEmail-foodtiger'];
$sql = "select * from payment where email = '$Email' ";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
     $_SESSION['id']=$row['id'];
     $_SESSION['order_id']=$row['order_id'];
     $_SESSION['email']=$row['email'];
     $_SESSION['Name_foodtiger']=$row['Name'];
     $_SESSION['PhoneNo']=$row['PhoneNo'];
     $_SESSION['Address']=$row['Address'];
     $_SESSION['price']=$row['price'];
     $_SESSION['time_date']=$row['time_date'];
     
}
}else{
  $_SESSION['id']='';
  $_SESSION['order_id']='';
  $_SESSION['email']='';
  $_SESSION['Name']='';
  $_SESSION['PhoneNo']='';
  $_SESSION['Address']='';
  $_SESSION['price']='';
  $_SESSION['time_date']='';
}

  ?>
<!DOCTYPE html>
<html>
<head>
    <title>FoodTiger - Receipt</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <script src="js/confirm.js"></script>
    <script src="js/cancel.js"></script>
</head>
<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>
<form>
  <div class="container" style="text-align:center;margin-top:100px;">
    <img src="../image/done.png" alt="done" style="width:150px;height:150px;">
    <h3 style="margin-top:50px">Order Successfull</h3>
    <h4 style="margin-top:50px">You order number is <?php echo  $_SESSION['order_id']?>. Please wait your order arrive.</h4>
    <hr>
  </div>
  <div class="container" style="margin-top:1%;">
            <div class="row">
              <div class="column-33" style="text-align:left;width: 50%;padding: 20px;">
                <h4>Account  Detail</h4><br/>
                <h5>Name: <?php echo  $_SESSION['Name_foodtiger']?></h5><br/>
                <h5>Phone Number: <?php echo  $_SESSION['PhoneNo']?></h5><br/>
                <h5>Address: <?php echo  $_SESSION['Address']?></h5>
              </div>
              <div class="column-66" style="text-align:right;width: 50%;padding: 20px;">
                <h4>Order Detail</h4><br/>
                <h5>Order ID: <?php echo  $_SESSION['order_id']?></h5><br/>
                <h5>Time: <?php echo  $_SESSION['time_date']?></h5><br/>
                <h5>Price: RM<?php echo  $_SESSION['price']?></h5>
              </div>
            </div>
            <hr style="margin-top:3%;">
            <div style="text-align: center;">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">Leave</button>
            </div>
    </div>
</form>
</body>
</html>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Feedback?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
          <h5>Give us your feedback and suggestion now!</h5><br/>
          </div>
          <div class="form-group" style="text-align: center;">
           <img style="width: 100px;height:100px;" src="../image/logo Mad.png">
           <img style="width: 100px;height:100px;"src="../image/nor.png">
           <img style="width: 100px;height:100px;"src="../image/logo 256x256.png">
         
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <a href="../index.php" class="btn btn-danger mt-2">Nope</a>
        <a href="feedback.php" class="btn btn-warning mt-2">Go Feedback</a> 
      </div>
 
</div>
</div>
</div>