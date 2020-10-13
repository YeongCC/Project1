<?php
require 'config/connection.php';
session_start();
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
if(!isset($_SESSION['userEmail-foodtiger']))
{
	header("location:../index.php");
}

$generateid = uniqid();
$gtotal = 0;
foreach ($_SESSION["cart"] as $keys => $values) {
  $foodname = $values["food_name"];
  $quantity = $values["food_quantity"];
  $price =  $values["food_price"];
  $total = ($values["food_quantity"] * $values["food_price"]);
  $tax = $total*0.1;
  $gtotal = $gtotal + $total + $tax;
}
if (isset($_SESSION['userEmail-foodtiger'])) {
  $Email = $_SESSION['userEmail-foodtiger'];
  $sql = "select * from customer where Email = '$Email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $_SESSION['Name'] = $row['Name'];
      $_SESSION['userEmail'] = $row['Email'];
      $_SESSION['PhoneNo'] = $row['PhoneNo'];
      $_SESSION['Address'] = $row['Address'];
      $_SESSION['Password'] = $row['Password'];
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
<!DOCTYPE html>
<html>

<head>
  <title>FoodTiger - Payment</title>
  <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/nav-bar.css">
  <link rel="stylesheet" href="../css/payCredit.css">
</head>

<body>
  <header>
    <?php
    require "navandfooter/nav.php";
    ?>
  </header>
  <div class="col-75" style="margin-top: 100px;">
    <div class="container">

      <div class="col-25">
        <div class="row">
          &nbsp;&nbsp;&nbsp;<h3 style="margin-top:20px;">Cash Payment</h3>
        </div>
        <form class="form-horizontal" role="form" action="cashCode.php" method="POST">
          <h3>Total Price: RM<?php echo "$gtotal"; ?></h3>
          <hr>
          <label for="Name">Name</label>
          <input type="text" id="Name" name="Name" value="<?php echo $_SESSION['Name']; ?>">
          <label for="PhoneNo">Contact Number</label>
          <input type="text" id="Name" name="PhoneNo" value="<?php echo $_SESSION['PhoneNo']; ?>">
          <label for="Address">Address</label>
          <input type="text" id="Address" name="Address" value="<?php echo $_SESSION['Address']; ?>">
      
          <div class="clearfix">
          <a href="payment.php" ><button type="button"class="cancelbtn2 "  >Cancel</button></a>
            <button type="submit" class="signupbtn" name="Pay">Continue to checkout</button>
          </div>
      </div>
    </div>
  
    <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['userEmail-foodtiger']; ?>" style="display: none;" />
    <input type="text" class="form-control" name="price" value="<?php echo $gtotal; ?>" style="display: none;" />
    <input type="text" class="form-control" name="order_id" value="<?php echo  $_SESSION['order_id']; ?>" style="display: none;" />
    <input type="text" class="form-control" name="payment_way" value="cash" style="display: none;" />
    <input type="text" class="form-control" name="status" value="unpaid" style="display: none;" />
    <input type="text" class="form-control" name="receive" value="no" style="display: none;" />
    <input type="text" class="form-control" name="time_date" value="<?php echo  $_SESSION['time_date']; ?>" style="display: none;" />
    </form>
  </div>



</body>

</html>