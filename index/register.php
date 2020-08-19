<?php
include "../database/connection.php";
include "registercode.php";
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

    <form name="register" action="register.php" method="POST">
    <h3 style="color: rgb(120,120,120)">Sign Up</h3>
    <label>
        <p class="label-txt">Username</p>
        <input type="text" class="input" name="Name" value="" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Email</p>
        <input type="text" class="input" name="Email" value="" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Mobile Number</p>
        <input type="text" class="input" name="PhoneNo" value="" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Address</p>
        <input type="text" class="input" name="Address" value="" required>
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
    <label>
        <p class="label-txt">Comfirm Password</p>
        <input type="password" class="input" name="Password2" id="Password2" value="" required>
        <div class="line-box">
        <div class="line"></div>
        </div> 
    </label>
    <button type="submit" name="insert">Submit</button>
    <div style="margin-top:30px auto;text-align:center">Have an account? <a href="login.php">Login</a></div>
    </form>
</html>