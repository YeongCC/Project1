<?php  
session_start();
require('../database/pdo.php');

$sql = 'SELECT id,order_id,Name,PhoneNo,Address,price,time_date,status,receive FROM payment';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id'])){
	$id=$_GET['id']; 
	$sql="select * from payment where id ='$id'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
            $id = $row['id'];
            $order_id = $row['order_id'];
            $email = $row['email'];
            $Name = $row['Name'];
            $PhoneNo = $row['PhoneNo'];
            $Address = $row['Address'];
            $payment_way = $row['payment_way'];
            $price = $row['price'];
            $time_date = $row['time_date'];
            $status = $row['status'];
            $receive = $row['receive'];
		}
	}
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 </head>  
 <body>  
 <div class="container">
    <div class="row">
    <p></p>
    <h1> &nbsp;&nbsp;&nbsp;&nbsp;Order Detail</h1> 
  
 <div class="container">    
 <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Order Detail</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-18px"><a href="delivery.php" >Cancel</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form  class="form-horizontal" role="form" action="updatedelivery.php" method="POST">
                                
                                <div class="form-group">
                                    <label for="Name" class="col-md-3 control-label">Name :</label>
                                    <div class="col-md-9">
                                    <h5>&nbsp;&nbsp;&nbsp;<?php if (isset($_GET['id'])){echo $Name; }?></h5>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="Address" class="col-md-3 control-label">Address :</label>
                                    <div class="col-md-9">
                                     <h5>&nbsp;&nbsp;&nbsp;<?php if (isset($_GET['id'])){echo $Address; }?></h5>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Contact Number" class="col-md-3 control-label">Phone :</label>
                                    <div class="col-md-9">
                                     <h5>&nbsp;&nbsp;&nbsp;<?php if (isset($_GET['id'])){echo $PhoneNo; }?></h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Price" class="col-md-3 control-label">Price :</label>
                                    <div class="col-md-9">
                                     <h5>&nbsp;&nbsp;&nbsp;<?php if (isset($_GET['id'])){echo $price; }?></h5>
                                    </div>
                                </div>
                            
 
                                <input name="id" type="text"  value="<?php if (isset($_GET['id'])){echo $id; }?>" style="display: none;">         
                                <input name="order_id" type="text"  value="<?php if (isset($_GET['id'])){echo $order_id; }?>" style="display: none;" >   
                                <input name="email" type="text"  value="<?php if (isset($_GET['id'])){echo $email; }?>"  style="display: none;">  
                                <input name="Name" type="text"  value="<?php if (isset($_GET['id'])){echo $Name; }?>"  style="display: none;">   
                                <input name="PhoneNo" type="text"  value="<?php if (isset($_GET['id'])){echo $PhoneNo; }?>"  style="display: none;">  
                                <input name="Address" type="text"  value="<?php if (isset($_GET['id'])){echo $Address; }?>"  style="display: none;">   
                                <input name="price" type="text"  value="<?php if (isset($_GET['id'])){echo $price; }?>"  style="display: none;">  
                                <input name="payment_way" type="text"  value="<?php if (isset($_GET['id'])){echo $payment_way; }?>"  style="display: none;"> 
                                <input name="time_date" type="text"  value="<?php if (isset($_GET['id'])){echo $time_date; }?>"  style="display: none;">  
                                <input name="status" type="text"  value="paid"  style="display: none;">  
                                <input name="receive" type="text"  value="yes"  style="display: none;">  
                                <div class="form-group">                                       
                                    <div class="col-md-offset-3 col-md-6">
                                        <button  type="submit"  name="update"class="btn btn-info btn-block" >Finish</button>
                                    </div>
                                </div>
                                </div>
                            </form>
                         </div>
         </div> 
         </div>          
         </div> 
         </div>          
         </div> 
  </body>
</html>


