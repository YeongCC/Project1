<?php
session_start();
if(!isset($_SESSION['userEmail-foodtiger']))
{
	header("location:index.php");
}
require('database/connection.php');
require('database/pdo.php');
$Email = $_SESSION['Email'];
require('database/mysql.php');
$sql = 'SELECT orders.cust_id, orders.foodname,orders.price,orders.quantity, payment.order_id FROM orders LEFT JOIN cus_order ON orders.cust_id = cus_order.custorder_id LEFT JOIN payment ON cus_order.order_id = payment.order_id';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
if(isset($_GET['order_id'])){
	$order_id=$_GET['order_id']; 
	$sql="select * from payment where order_id ='$order_id'";
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
    <title>FoodTiger-Order-Detail</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
</head>

<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>

    <div class="container" style="margin-top:100px;">
    <div class="row">
    <div class="col-md-12 col-md-offset-1">
            <h1>View Orders</h1> 
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
               
                  <div class="col col-xs-6 text-right">
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table ">
                  <thead class="table-warning">
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Address</th> 
                        <th>Payment Way</th>  
                        <th>Status</th>  
                        <th>Receive</th>  
                        <th>Time & Date</th>   
                    </tr> 
                  </thead>
                  <tbody>
                  <tr>
                  <td><?php echo $Name; ?></a></td>
                  <td><?php echo $PhoneNo; ?></td>
                  <td><?php echo $Address; ?></td>
                  <td><?php echo $payment_way; ?></td>
                  <td><?php echo $status; ?></td>
                  <td><?php echo $receive; ?></td>
                  <td><?php echo $time_date; ?></td>
                  </tr>
                  <tr><td class='text-left' colspan='3' >Food</td>
                      <td class='text-left' colspan='3' >Quatity</td>
                      <td class='text-right' colspan='3' >Price</td>
                  </tr>
           
                  <?php
                  $sql = 'SELECT * FROM orders';

                  $query  = $pdoconn->prepare($sql);
                  $query->execute();
                  $arr_all = $query->fetchAll(PDO::FETCH_ASSOC);		
                  $result=$conn->query($sql); //run SQL
                  if(isset($_POST['search'])){
                    $keyword=$_POST['search'];
                  }        
                  $search="";
                  
                  if(isset($_GET['order_id'])){
                    $cust_id=$_GET['order_id'];
                    $search=" where cust_id='".$cust_id."'";
                    }
                $sql="select * from orders".$search;
                $result=$conn->query($sql);
                if($result->num_rows >0){
                    while($row = $result -> fetch_assoc()){       
            ?>  
                        <tr><td class='text-left' colspan='3' ><?php echo $row['foodname'];?> </td>
                             <td class='text-left' colspan='3' ><?php echo $row['quantity'];?> </td>
                             <td class='text-right' colspan='3' >RM<?php echo $row['price'];?> </td>
                        </tr>
            <?php
                } 
            }?>
          <tr>
      <td class='text-right' colspan='14' >RM<?php if (isset($_GET['order_id'])){echo $price; }?> </td>
          </tr>           
                      </tbody>
                </table>  
                <div style="text-align: center;"><a href="paymenthistory.php"><button type="button" class="btn btn-warning" >Leave</button></a></div>      
              </div> 
                   </div>
                   </div>
              </div>
              </div>
          
</body>
</html>

