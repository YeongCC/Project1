<?php
session_start();
require '../database/connection.php';
$generateid = uniqid();
$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {
    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price =  $values["food_price"];
    $total = ($values["food_quantity"] * $values["food_price"]);
    $gtotal = $gtotal + $total;
  }

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
    <link href="../css/style.css" rel="stylesheet">
    <script src="../js/confirm.js"></script>
    <script src="../js/cancel.js"></script>
    <script src="../js/card.js" charset="utf-8"></script>
</head>

<a href="payment.php"><button  class="btn btn-danger btn-block" onclick="return Cancel();">Cancel</button></a>
<form class="form-horizontal" role="form" name="form" action="onlinepaymentCode.php" method="POST">
<div class="container">
    <div class="row">
        <div class="jumbotron">
          <h1 class="text-center">Online Payment</h1>
          <p class="text-center">Enter your payment details below.</p>
          <h1 class="text-center">Grand Total: &#8377;<?php echo "$gtotal"; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="credit-card-div">
                <div class="panel panel-default">
                    <div class="panel-heading">
                 
                    <br>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5 class="text-muted">Name</h5>
                            </div>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">
                                <input type="text" name="Name" class="form-control" value="<?php echo $_SESSION['Name']; ?>"   />
                            </div>
                        </div>
                        <br>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5 class="text-muted">Phone Number</h5>
                            </div>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">
                                <input type="text" name="PhoneNo" class="form-control" value="<?php echo $_SESSION['PhoneNo']; ?>"   />
                            </div>
                        </div>
                        <br>
                           
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5 class="text-muted"> Credit Card Number</h5>
                            </div>
                            <div class="col-md-12 pad-adjust">
                                <input type="text" name="Card" id="Card"class="form-control"inputmode="numeric" autocomplete="cc-number" placeholder="0000-0000-0000-0000"   />
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font">Month</span>
                                <select name="Month">
                    <option value="01">January</option>
                    <option value="02">February </option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font">Year</span>
                                <select name="Year">
                    <option value="2019"> 2019</option>
                    <option value="2020"> 2020</option>
                    <option value="2021"> 2021</option>
                    <option value="2022"> 2022</option>
                    <option value="2023"> 2023</option>
                    <option value="2024"> 2024</option>
                    <option value="2025"> 2025</option>
                    <option value="2026"> 2026</option>
                    <option value="2027"> 2027</option>
                    <option value="2028"> 2028</option>
                    <option value="2029"> 2029</option>
                    <option value="2030"> 2030</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <span class="help-block text-muted small-font">CCV</span>
                                <input type="text" class="form-control " name="CCV" maxlength="3" placeholder="---" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3"><br>
                                <img src="../image/creditcard.png" class="img-rounded"/>
                            </div>
                        </div>

           
                        <br>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            </div>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">
                                <input type="text" name="Email" class="form-control" placeholder="Email"  value="<?php echo $_SESSION['Email']; ?>" style="display: none;"/>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            </div>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">
                                <input type="text" name="Address" class="form-control" placeholder=""  value="<?php echo $_SESSION['Address']; ?>" />
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            </div>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">
                                <input type="text" name="price" class="form-control" placeholder=""  value="<?php echo "$gtotal"; ?>" style="display: none;" style="display: none;"/>
                            </div>
                        </div>    
                        <input type="text" class="form-control" name="order_id"  value="<?php echo  $generateid; ?>" style="display: none;"/>  
                            <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                              <button  type="Pay"  name="Pay"class="btn btn-success btn-block" onclick="return Confirm();">PAY NOW</button>
                        </div>

                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>
</form>
<script>
    payform.cardNumberInput(document.getElementById('Card'));
    payform.expiryInput(document.getElementById('expiry'));
    payform.cvcInput(document.getElementById('CCV'));
    payform.numericInput(document.getElementById('numeric'));
  </script>
           </body>
</html>