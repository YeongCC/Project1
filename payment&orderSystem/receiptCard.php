<?php
session_start();
require '../database/connection.php';
unset($_SESSION["cart"]);
$Email = $_SESSION['Email'];
$sql = "select * from payment where Email = '$Email' ";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
     $_SESSION['id']=$row['id'];
     $_SESSION['order_id']=$row['order_id'];
     $_SESSION['Email']=$row['Email'];
     $_SESSION['Name']=$row['Name'];
     $_SESSION['PhoneNo']=$row['PhoneNo'];
     $_SESSION['Address']=$row['Address'];
     $_SESSION['price']=$row['price'];
     $_SESSION['Card']=$row['Card'];
     $_SESSION['Month']=$row['Month'];
     $_SESSION['Year']=$row['Year'];
     $_SESSION['CCV']=$row['CCV'];
     $_SESSION['time_date']=$row['time_date'];
     
}
}else{
  $_SESSION['id']='';
  $_SESSION['order_id']='';
  $_SESSION['Email']='';
  $_SESSION['Name']='';
  $_SESSION['PhoneNo']='';
  $_SESSION['Address']='';
  $_SESSION['price']='';
  $_SESSION['Card']='';
  $_SESSION['Month']='';
  $_SESSION['Year']='';
  $_SESSION['CCV']='';
  $_SESSION['time_date']='';
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
<body>
<a href="../food/customer/viewcat.php"><button  class="btn btn-primary btn-block" >Continue Shopping</button></a>
<form>

You order number is <?php echo  $_SESSION['order_id']?>.It done at <?php echo $_SESSION['time_date'];?>. Please wait your order arrive.


</form>
</body>
</html>