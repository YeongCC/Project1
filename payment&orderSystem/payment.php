<?php
session_start();
require '../database/connection.php';
if(isset($_SESSION['Email'])){
  $Email=$_SESSION['Email'];
  $sql="select * from customer where Email = '$Email'";
  $result=$conn->query($sql);
   if($result->num_rows>0){
       while($row=$result->fetch_assoc()){
          $_SESSION['Name']=$row['Name'];
          $_SESSION['Email']=$row['Email'];
          $_SESSION['PhoneNo']=$row['PhoneNo'];
          $_SESSION['Address']=$row['Address'];
          $_SESSION['Password']=$row['Password'];        
    }
  }
}
?>

<html>

<head>
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">	
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="../css/main.css" rel="stylesheet"> 
    <script src="../js/cancel.js"></script>
</head>

  <body>
        <div class="container">
          <div class="jumbotron">
            <h1>Choose your payment option</h1>
          </div>
        </div>
        <br>



<br>

<h1 class="text-center">
  <a href="payOnline.php"><button class="btn btn-success"><span class="glyphicon glyphicon-credit-card"></span> Pay Online</button></a>
  <a href="payCash.php"><button class="btn btn-success"><span class="glyphicon glyphicon-"></span> Cash On Delivery</button></a>
  <a href="Cancel.php"><button class="btn btn-success" name="delete" onclick="return Confirm();"><span class="glyphicon glyphicon-"></span> Cancel Paying</button></a>
</h1>
    


<br><br><br><br><br><br>
        </body>
</html>