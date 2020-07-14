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

//if user click create buttom
if(isset($_POST['insert'])){
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $PhoneNo=$_POST['PhoneNo'];
    $Address=$_POST['Address'];
    $Password=$_POST['Password'];
    $Password2=$_POST['Password2'];

    $sql="insert into customer values('$Name','$Email','$PhoneNo','$Address','$Password')";
    
    // Your validation code.
    if ($Password != $Password2) {
        echo "<script>alert('Your passwords do not match. Please type carefully.');</script>";
    }
    // Passwords match
    if ($Password == $Password2){ 
        $result=$conn->query($sql);
        echo "<script>alert('Congratulations,Sign Up Successful!!!');window.location.assign('login.php');</script>";
    }
    
}


    
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Sign Up</title>
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
    <form name="register" action="register.php" method="POST">
    <h3 style="color: rgb(120,120,120)">Sign Up</h3>
    <label>
        <p class="label-txt">Username</p>
        <input type="text" class="input" name="Name" value="<?php if (isset($_GET['ID'])){echo $Name; }?>" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Email</p>
        <input type="text" class="input" name="Email" value="<?php if (isset($_GET['ID'])){echo $Email; }?>" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Mobile Number</p>
        <input type="text" class="input" name="PhoneNo" value="<?php if (isset($_GET['ID'])){echo $PhoneNo; }?>" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Address</p>
        <input type="text" class="input" name="Address" value="<?php if (isset($_GET['ID'])){echo $Address; }?>" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Password</p>
        <input type="password" class="input" name="Password" id="Password" value="<?php if (isset($_GET['ID'])){echo $Password; }?>" required>
        <div class="line-box">
        <div class="line"></div>
        </div>
    </label>
    <label>
        <p class="label-txt">Comfirm Password</p>
        <input type="password" class="input" name="Password2" id="Password2" value="<?php if (isset($_GET['ID'])){echo $Password2; }?>" required>
        <div class="line-box">
        <div class="line"></div>
        </div> 
    </label>
    <button type="submit" name="insert">Submit</button>
    <div style="margin-top:30px auto;text-align:center">Have an account? <a href="login.php">Login</a></div>
    </form>
</body>
</html>