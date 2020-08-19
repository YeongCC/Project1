<?php  
include "../database/connection.php";
session_start();  

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
  <style>  
  body  
  {  
   margin:0;  
   padding:0;  
   background-color:#f1f1f1;  
  }  
        .box  
        {  
   width:500px;  
   padding:20px;  
   background-color:#fff;  
  }  
  </style>  
 </head>  
 <body>  
  <div class="container box">  
   <h3 align="center">Welcome - <?php echo $_SESSION["Email"]; ?></h3>
   <br />
   <h2>Name : <?php echo $_SESSION['Name']; ?></h2><br />
   <h2>Phone Number : <?php echo $_SESSION['PhoneNo']; ?></h2><br />
   <h2>Adsress : <?php echo $_SESSION['Address']; ?></h2><br />
   <p><a href="blogpage.php">Blog</a></p>
   <p><a href="feedbackpage.php">Feedback</a></p>
   <p><a href="../food/customer/userpage.php">Food Area</a></p>
   <p><a href="../index/profile.php">Edit Profile</a></p>
   <p><a href="paymenthistory.php">Payment history</a></p>
   <p><a href="../index/lognout.php"  onclick="return confirm('Are you sure?')">Logout</a></p>
  </div>  
 </body>  
</html>
 