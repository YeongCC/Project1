<?php
include "../database/connection.php";
include "updateCodeC.php";
session_start();

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
    <link href="../css/main.css" rel="stylesheet"> 
    <script src="../js/confirmUpdate.js"></script>
</head>
<script>
    $(document).ready(function(){

    $('.input').focus(function(){
    $(this).parent().find(".label-txt").addClass('label-active');
    });

    $(".input").focusout(function(){
    if ($(this).val() == '') {
        $(this).parent().find(".label-txt").removeClass('label-active');
    };
    });
    });

</script>
<a href="../customer/test.php"><button  class="btn btn-danger btn-block" >Cancel</button></a>
    <form name="" action="updateCodeC.php" method="POST">
    <h3 style="color: rgb(120,120,120)">Sign Up</h3>
    <label>
        <p class="label-txt">Username</p>
        <input type="text" class="input" name="Name" value="<?php echo $_SESSION['Name'];?>" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Email</p>
        <input type="text" class="input" name="Email" value="<?php echo  $_SESSION['Email']?>" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Mobile Number</p>
        <input type="text" class="input" name="PhoneNo" value="<?php echo  $_SESSION['PhoneNo']; ?>" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Address</p>
        <input type="text" class="input" name="Address" value="<?php echo  $_SESSION['Address']; ?>" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Password</p>
        <input type="password" class="input" name="Password" id="Password" value="" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
  
    <button type="submit" name="update" onclick="return ConfirmUpdate();">Update</button>
   
    </form>
</html>