<?php
include "../database/connection.php";
session_start();  
if(isset($_SESSION['userEmail-foodtiger'])){
    $Email=$_SESSION['userEmail'];
 }

?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Cart</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/nav-bar.css">
    <link rel="stylesheet" href="../css/aboutus.css">
    <script src="../js/empty.js"></script>
    
</head>

<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>

  <div class="container">
      <div class="jumbotron" style="margin-top:5%;">
        <h1>Your Shopping Cart</h1>
        <p>Looks tasty...!!!</p>
      </div>
      
    </div>
    <div class="container-fluid">
      <div class="table-responsive"  >
        <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th width="5%">Action</th>
              <th width="5%"></th>
              <th width="40%">Food Name</th>
              <th width="10%">Quantity</th>
              <th width="28%">Price Details</th>
              <th width="10%">Order Total</th>
            </tr>
          </thead>
<?php
 $currentuser = $_SESSION['userEmail-foodtiger'];

 $query = "SELECT cus_order.*,orders.* FROM cus_order LEFT JOIN orders ON cus_order.order_id = orders.cust_id where status='have not' AND email ='$currentuser' ORDER BY time_date DESC";
 $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
 if (mysqli_num_rows($run_query) > 0) {
 while ($row = mysqli_fetch_array($run_query)) {
   
     $order_id = $row['order_id'];
     $status = $row['status'];
     $foodname = $row['foodname'];
     $price = $row['price'];
     $quantity = $row['quantity'];
        $total = 0;
?>
<tr>
<td><a href="../database/cartcode.php?action=delete&id=<?php echo $keys; ?>"><button class="btn btn-danger" style="font-size:0.8em" onclick="return confirm('Are you sure want to delete?')"> Remove</button></a></td>      
            <td><a href="UpdateCartpage.php?id=<?php echo $keys; ?>"><button class="btn btn-warning" style="font-size:0.8em"> Edit</button></a></td>
            <td><?php echo $foodname; ?></td>
            <td><?php echo $quantity ?></td>
            <td>RM <?php echo $price; ?></td>
            <td>RM <?php echo number_format($quantity * $price, 2); ?></td>    
          </tr>

<?php
    $total = $total + ($row["quantity"] * $row["price"]);
    $tax = $total*0.1;
    $total2 = $total + $tax;
    $foodname;
    $price;
    $quantity;
 }}
?>
   <tr>
            <td colspan="4" ></td>
            <td >Service Tax (10%)</td>
            <td>RM <?php echo $total*0.1; ?></td>
          </tr>
          <tr>
            <td colspan="4" ></td>
            <td style="font-weight:bold;">Total</td>
            <td style="font-weight:bold;">RM <?php echo number_format($total2, 2); ?></td>
          </tr>
        </table>
       
  
            <a href="../paypage/payment.php"><button  type="submit"  name="insert"class="btn btn-success pull-right">Checkout</button></a>
      
        <a href="../database/cartcode.php?action=empty"><button class="btn btn-danger" onclick="return confirm('Are you sure want to empty cart?')"><span class="glyphicon glyphicon-trash"></span> Empty Cart</button></a>
        <a href="foodpage.php"><button class="btn btn-primary">Continue Shopping</button></a>  


      </div>
    </div>
   
    </body>
</html>

