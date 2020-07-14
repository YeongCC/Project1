<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "foodtiger";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_POST)
   {
       $Email = $_POST['Email'];
       $Password = $_POST['Password'];
       
       $sql = "SELECT * FROM `customer` where Email = '".$Email."' and Password = '".$Password."' ";
       $query =  mysqli_query($conn, $sql);
       if(mysqli_num_rows($query)>0)
       {
           $row = mysqli_fetch_assoc($query);
           session_start();
           $_SESSION['Email'] = $row['Email'];
           header('Location: userprofile.php');
       }
       else
       {
           echo "<script> alert('Invalid Email or Password.'); </script>";
       }
   }

?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">	
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/main.css" rel="stylesheet">
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
<body>
    <form name="form" method="POST">
    <h3 style="color: rgb(120,120,120)">Login</h3>
    <label>
        <p class="label-txt">Email</p>
        <input type="text" class="input" name="Email" value="" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Password</p>
        <input type="password" class="input" name="Password"  value="" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
  
    <button type="submit" name="login" value="Sign In">Login</button>
    
    <div style="margin-top:30px auto;text-align:center">Have an account? <a href="register.php">Register</a></div>
    </form>
</body>
</html>