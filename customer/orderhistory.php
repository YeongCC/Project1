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
    <link href="../../css/food.css" rel="stylesheet"> 
    <script src="../js/delete.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="../css/table.css" rel='stylesheet' type='text/css'>
</head>
<?php
session_start();
require('../database/connection.php');
require('../database/pdo.php');
$Email = $_SESSION['Email'];
?>
						
<div class="container">
    <div class="row">
    <p></p>
    <h1> &nbsp;&nbsp;&nbsp;&nbsp;View Card Payment History</h1> 
    <h1 style=" text-align: right;"><a href="test.php"  >Back</a></h1> 
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Food list</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th>Order Number</th>
                        <th>Food name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                    </tr> 
                  </thead>
                  <tbody>
                  <?php
                 $currentuser = $_SESSION['Email'];

$query = "SELECT * FROM orders WHERE username= '$currentuser' ORDER BY date_time DESC";
$run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($run_query) > 0) {
while ($row = mysqli_fetch_array($run_query)) {
    $order_id = $row['order_id'];
    $foodname = $row['foodname'];
    $price = $row['price'];
    $quantity = $row['quantity'];
    $username = $row['username'];
    $status = $row['status'];
    $date_time = $row['date_time'];
  

    echo "<tr>";
    echo "<td align='center'><a class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure you want to delete this order history?')\" href='?del=$order_id'><span class='new badge' data-badge-caption='' ><em class='fa fa-trash'></em></span></a></td>";
    echo "<td>$order_id</td>";
    echo "<td>$foodname</td>";
    echo "<td>$price</td>";
    echo "<td>$quantity</td>";
    echo "<td>$status</td>";
    echo "</tr>";

}
}
else {
    echo "<script>alert('No any history yet! Start Order now');
          </script>";
}
?>
                     
                      </tbody>
                </table>        
              </div>
<?php
 $conn = mysqli_connect("localhost","root","","foodtiger" ) or die ("error" . mysqli_error($conn));
 if (isset($_GET['del'])) {
     $id_del = mysqli_real_escape_string($conn, $_GET['del']);
     $Email = $_SESSION['Email'];
     $del_query = "DELETE FROM orders WHERE order_id='$id_del' AND username = '$Email' ";
     $run_del_query = mysqli_query($conn, $del_query) or die (mysqli_error($conn));
     if (mysqli_affected_rows($conn) > 0) {
         echo "<script>alert('Order history deleted successfully');
         window.location.href='orderhistory.php';</script>";
     }
     else {
      echo "<script>alert('error occured.try again!');</script>";   
     }
     }
?>    
            








</html>