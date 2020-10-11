<?php
include "database/connection.php";
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
  session_start();  
if(!isset($_SESSION['userEmail-foodtiger']))
{
	header("location:../index.php");
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>FoodTiger</title>
  <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>


</head>

<body>
  <header>
    <?php 
          require "navandfooter/nav.php";
        ?>
  </header>
  <div class="container" style="text-align:center">
    <div class="jumbotron" style="margin-top:5%;">
      <h1>Choose your Payment Option</h1>
    </div>
    <div class="row">
      <div class="col-md-2 col-lg-2 col-sm-2"></div>
      <div class="col-md-4 col-lg-4 col-sm-4  ">
        <label style="width:100%;">
          <a href="#" class="img-fluid " style="text-decoration:none;color:black;  " onclick="select();" id="pic">
            <div class="panel panel-default card-input card card-body bg-light">
              <img src=../image/images.png alt="CreditImage" onclick="paypal();">
              <hr>
              <div class="panel-heading "   >
                <h5>Credit Card/Debit Card</h5>
              </div>
            </div>
          </a>
        </label>
      </div>

      <div class="col-md-4 col-lg-4 col-sm-4">
        <label style="width:100%;">
          <a href="payCash.php" class="img-fluid" style="text-decoration:none;color:black;">
            <div class="panel panel-default card-input card card-body bg-light">
              <img src=../image/cashondelivery.png alt="CashImage">
              <hr>
              <div class="panel-heading">
                <h5>Cash on Delivery</h5>
              </div>
            </div>
          </a>
        </label>
      </div>
      <div class="col-md-2 col-lg-2 col-sm-2"></div>
      <div class="col-md-8 col-lg-8 col-sm-8  " style="display: none;" id="select">
        <div>
         
          <div style="float: left;display: none;" id="stripe">
            <a href="index.php" class="img-fluid " style="text-decoration:none;color:black;">
              <img src=../image/stripe.png alt="CreditImage" class="">
            </a>
          </div>
          <div style="float: right;display: none;" id="paypal">
          <button type="button" class="close" onclick="closeall()" data-dismiss="modal">&times;</button>
            <a href="paypal/index.php" class="img-fluid " style="text-decoration:none;color:black;">
              <img src=../image/paypal.png alt="CreditImage" class="">
            </a>
          </div>
        </div>
      </div>




    </div>
  </div>



</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>


  function closeall() {
    document.getElementById("select").style.display = "none";
    document.getElementById("pic").style.display = "block";
    document.getElementById("stripe").style.display = "none";
    document.getElementById("paypal").style.display = "none";
  }

  function select() {
    document.getElementById("select").style.display = "block";
    document.getElementById("pic").style.display = "block";
    document.getElementById("stripe").style.display = "block";
    document.getElementById("paypal").style.display = "block";
  }


</script>