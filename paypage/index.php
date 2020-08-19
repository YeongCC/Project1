<!DOCTYPE html>

<?php
session_start();
require 'database/connection.php';
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
  if(isset($_SESSION['userEmail'])){
    $Email=$_SESSION['userEmail'];
    $sql="select * from customer where email = '$Email'";
    $result=$conn->query($sql);
     if($result->num_rows>0){
         while($row=$result->fetch_assoc()){
            $_SESSION['Name']=$row['Name'];
            $_SESSION['userEmail']=$row['Email'];
            $_SESSION['PhoneNo']=$row['PhoneNo'];
            $_SESSION['Address']=$row['Address'];
            $_SESSION['Password']=$row['Password'];
            
      }
    }
 }
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
     <form class="needs-validation" action="charge.php" method="post" id="payment-form">
       <div class="row">
         <div class="col-md-6 mb-3">
           <label for="firstName">Name</label>
           <input type="text" name="Name" class="form-control mb-3 StripeElement StripeElement--empty" value="<?php echo $_SESSION['Name']; ?>" required>

         </div>
         <div class="col-md-6 mb-3">
           <label for="lastName">Phone number</label>
           <input type="text" name="PhoneNo" class="form-control mb-3 " value="<?php echo $_SESSION['PhoneNo']; ?>" required>
         </div>
       </div>

       
       <div class="mb-3">
         <label for="username">Address</label>
         <div class="input-group">
           <div class="input-group-prepend">
            
           </div>
           <input type="text" name="Address" class="form-control " placeholder="Address"  value="<?php echo $_SESSION['Address']; ?>">             
         </div>
       </div>
   <input type="text" name="payment_way" class="form-control mb-3 StripeElement StripeElement--empty" style="display: none;" value="card">    
   <input type="text" name="status" class="form-control mb-3 StripeElement StripeElement--empty"  style="display: none;" value="paid">   
   <input type="email" name="email" class="form-control StripeElement StripeElement--empty" placeholder="Email"  value="<?php echo $_SESSION['Email']; ?>" style="display: none;"/>
   <input type="text" name="price" class="form-control" placeholder=""  value="<?php echo "$gtotal"; ?>"  style="display: none;"/> 
   <input type="text" class="form-control" name="order_id" value="<?php echo  $_SESSION['order_id']; ?>" style="display: none;" />
   <input type="text" class="form-control" name="time_date" value="<?php echo  $_SESSION['time_date']; ?>"  style="display: none;"/>
   <input type="text" class="form-control" name="receive" value="no" style="display: none;" />
       <hr class="mb-4">
       <label for="CreditNum">Credit card number</label>
         <div id="card-element" class="form-control"> 

         </div>
         <div id="card-errors" role="alert" >
         </div>     
          <button>Submit</button>

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
