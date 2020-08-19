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
    <script src="../js/confirm.js"></script>
    <script src="../js/cancel.js"></script>
</head>

<a href="payment.php"><button  class="btn btn-danger btn-block" onclick="return Cancel();">Cancel</button></a>
<form class="form-horizontal" role="form" action="cashCode.php" method="POST">
<div class="container">
    <div class="row">
        <div class="jumbotron">
          <h1 class="text-center">Online Payment</h1>
          <p class="text-center">Enter your payment details below.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="credit-card-div">
                <div class="panel panel-default">
                    <div class="panel-heading">
                   
                    <h1 class="text-center">Grand Total: &#8377;<?php echo "$gtotal"; ?></h1>
                    <br>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5 class="text-muted">Name</h5>
                            </div>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">
                                <input type="text" class="form-control" name="Name" value="<?php echo $_SESSION['Name']; ?>"  />
                            </div>
                        </div>
                        <br>
                        <br>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                                <h5 class="text-muted">Phone Number</h5>
                            </div>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">
                                <input type="text" class="form-control" name="PhoneNo" value="<?php echo $_SESSION['PhoneNo']; ?>"  />
                            </div>
                        </div>
                        <br>
                        <br>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            </div>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">
                                <input type="text" class="form-control" name="Email" value="<?php echo $_SESSION['Email']; ?>"  style="display: none;"/>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            </div>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">
                            <h5 class="text-muted">Adress</h5>
                                <input type="text" class="form-control" name="Address" value="<?php echo $_SESSION['Address']; ?>" />
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            </div>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">
                                <input type="text" class="form-control" name="price" placeholder="Email" value="<?php echo $gtotal; ?>" style="display: none;"/>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            </div>
                        <div class="row ">
                            <div class="col-md-12 pad-adjust">
                                <input type="text" class="form-control" name="order_id"  value="<?php echo  $generateid; ?>" style="display: none;"/>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                          
                            <div class="col-md-12 pad-adjust">
                                <input type="text" name="Card" class="form-control" style="display: none;"  value="-"/>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-3 col-sm-3 col-xs-3">                              
                                <input type="text" class="form-control" name="Month" style="display: none;" value="-"/>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">                  
                                <input type="text" class="form-control" name="Year"style="display: none;" value="-"/>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">                        
                                <input type="text" class="form-control" name="CCV" style="display: none;" value="-"/>
                            </div>
                        </div>
                        <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                              <button  type="Pay"  name="Pay"class="btn btn-info btn-block" onclick="return Confirm();">PAY NOW</button>	
                            </div> 
                         
                            <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                         
                            </div>
                        </div>

                    </div>
                </div>
            </div>
          
        </div>
    </div>
</div>
</form>




           </body>
</html>