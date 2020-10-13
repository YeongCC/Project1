<!DOCTYPE html>

<?php

require 'config/connection.php';
session_start();
if(!isset($_SESSION['userEmail-foodtiger']))
{
	header("location:../index.php");
}

$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {
    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price =  $values["food_price"];
    $total = ($values["food_quantity"] * $values["food_price"]);
    $tax = $total*0.1;
    $gtotal = $gtotal + $total + $tax;
  
  }
  if(isset($_SESSION['userEmail-foodtiger'])){
    $Email=$_SESSION['userEmail-foodtiger'];
    $sql="select * from customer where email = '$Email'";
    $result=$conn->query($sql);
     if($result->num_rows>0){
         while($row=$result->fetch_assoc()){
            $Name_foodtiger=$row['Name'];
            $userEmail_foodtiger=$row['Email'];
            $PhoneNo=$row['PhoneNo'];
            $Address=$row['Address'];
            $Password=$row['Password'];
            
      }
    }
 }
 $sql = "select * from cus_order where email = '$Email' ";
 $result=$conn->query($sql);
 if($result->num_rows>0){
   while($row=$result->fetch_assoc()){
      $_SESSION['order_id']=$row['order_id'];
 }
 }else{
   $_SESSION['order_id']='';
 }
 
  ?>
<html lang="en">
<head>
    <title>FoodTiger - Payment</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/nav-bar.css">
    <link rel="stylesheet" href="../css/payCredit.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>   
    <div class="container">
   
   <div>
   <h3 style="margin-top:100px;">Credit/Debit Card Payment</h3>
     <h3>Total Price: RM<?php echo "$gtotal"; ?></h3> <hr>
     <div class="icon-container">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         <i class="fa fa-cc-visa" style="color:navy;"></i>
         <i class="fa fa-cc-amex" style="color:blue;"></i>
         <i class="fa fa-cc-mastercard" style="color:red;"></i>
         <i class="fa fa-cc-discover" style="color:orange;"></i>
       </div>
     <form class="needs-validation" action="paypal/charge.php" method="post" id="payment-form">
       <div class="row">
         <div class="col-md-6 mb-3">
           <label for="firstName">Name</label>
           <input type="text" name="Name" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php echo $Name_foodtiger; ?>" required>

         </div>
         <div class="col-md-6 mb-3">
           <label for="lastName">Phone number</label>
           <input type="text" name="PhoneNo" class="form-control mb-3 " value="<?php echo $PhoneNo; ?>" required>
         </div>
       </div>

       
       <div class="mb-3">
         <label for="username">Address</label>
         <div class="input-group">
           <div class="input-group-prepend">
            
           </div>
           <input type="text" name="Address" class="form-control " placeholder="Address"  value="<?php echo $Address; ?>">             
         </div>
       </div>

   <input type="email" name="email" class="form-control StripeElement StripeElement--empty" placeholder="Email"  value="<?php echo $userEmail_foodtiger; ?>" style="display: none;"/>
   <input type="text" name="amount" class="form-control" placeholder=""  value="<?php echo "$gtotal"; ?>"  style="display: none;"/> 
   <input type="text" class="form-control" name="order_id" value="<?php echo  $_SESSION['order_id']; ?>" style="display: none;" />


       <hr class="mb-4">
   
          <button type="submit" name="submit" class="btn btn-warning">Submit</button>

     </form>
   </div>


 <footer class=" text-center text-small">
   <ul class="list-inline">      
     <li class="list-inline-item"><a href="payment.php">Cancel</a></li>
   </ul>
 </footer>
</div>
   

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://js.stripe.com/v3/"></script>
    <script src="./js/charge.js"></script>
 
  
  </body>
</html>
