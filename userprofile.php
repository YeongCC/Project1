<?php  
include "database/connection.php";

session_start();  
if(isset($_SESSION['Email'])){
    $Email=$_SESSION['Email'];
    $sql="select * from customer where Email = '$Email'";
    $result=$conn->query($sql);
     if($result->num_rows>0){
         while($row=$result->fetch_assoc()){
            $_SESSION['Name']=$row['Name'];
            $_SESSION['Email']=$row['Email'];
            $_SESSION['PhoneNo']=$row['PhoneNo'];
            $_SESSION['Address']=$row['Address'];
            $_SESSION['Password']=$row['Password'];
            
      }
    }
 }
?>  
<html>  
 <head>  
 <title>FoodTiger - User Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/profile.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
 </head>  
 <script>
function logout() {
  alert("Log Out Successful!!!!!");
}
</script>
 <body>  
 <header>        
        <!-- nav bar -->
        <nav class="navbar navbar-expand-md bg-warning navbar-dark fixed-top">
            <!-- Brand -->
            <a class="navbar-brand" href="index.html"><img src="image/logo 256x256.png" alt="logo" width="30" height="30" style="margin-left:30%;"></a>
          
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 " id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="category.php">Categories</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="food.php">Foods</a>
                    </li>
                    <?php
                    if (isset($_SESSION['Name'])) { ?>
                       <li class="nav-item active"><a href="userprofile.php" href="#" class="nav-link">Hi, <?php echo $_SESSION['Name']?></a></li>
                      <li class="nav-item active"><a class="nav-link" href="lognout.php" style="width:auto;" onclick="logout()">Logout</a></li>
                     </li>
                     <?php
                     } else { ?>
                       <li class='nav-item active'><a class='nav-link' href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</a></li>
                       <li class="nav-item active"><a class="nav-link" href="#" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign Up</a></li>
                     </li> <?php
                     } 
                    ?>
                </ul>
            </div>
          </nav>
          <!-- Login -->
          <div id="id01" class="modal">
            <form class="modal-content animate" action="database/logincode.php" method="post">
              <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
                <div class="container1">
                  <h1>Login</h1>
                  <hr>
                <label for="Email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="Email" id="Email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="Password" required>
                    
                <button type="submit" class="button2" name="login" id="login">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                </div>

                <div class="container1" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
            </div>


            <!-- Sign Up -->
            <div id="id02" class="modal">
                <form class="modal-content animate" name="register" action="database/registercode.php" method="POST"  style="margin-top:0%;">
                    <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                    </div>
    
                    <div class="container1" >
                        <h1>Sign Up</h1>
                        <p>Please fill in this form to create an account.</p>
                        <hr>
                        <label for="Username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="Name" value="<?php if (isset($_GET['ID'])){echo $Name; }?>" required>

                        <label for="Email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="Email" value="<?php if (isset($_GET['ID'])){echo $Email; }?>" required>

                        <label for="PhoneNo"><b>Mobile Number</b></label>
                        <input type="text" placeholder="Enter Mobile Number" name="PhoneNo" value="<?php if (isset($_GET['ID'])){echo $PhoneNo; }?>" required>

                        <label for="Address"><b>Address</b></label>
                        <input type="text" placeholder="Enter Address" name="Address" value="<?php if (isset($_GET['ID'])){echo $Address; }?>" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="Password" id="Password" value="<?php if (isset($_GET['ID'])){echo $Password; }?>" required>

                        <label for="psw-repeat"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="Password2" id="Password2" value="<?php if (isset($_GET['ID'])){echo $Password2; }?>" required>


                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
                        <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn2">Cancel</button>
                            <button type="submit" class="signupbtn" name="insert">Submit</button>
                          </div>
                    </div>
                </form>
                </div>           
    </header>
    <div class="imgcontainer">
      <img src="image/avatar6.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    <h2>Profile</h2><hr>
      <label for="Name"><b>Username</b></label>
      <input type="text" value="<?php echo $_SESSION['Name']; ?>" readonly>
      <label for="Email"><b>Email</b></label>
      <input type="text" value="<?php echo $_SESSION['Email']; ?>" readonly>
      <label for="PhoneNo"><b>Phone Number</b></label>
      <input type="text" value="<?php echo $_SESSION['PhoneNo']; ?>" readonly>
      <label for="Address"><b>Address</b></label>
      <input type="text" value="<?php echo $_SESSION['Address']; ?>" readonly>  
      <p><a href="blogpage.php">Blog</a></p>
      <p><a href="feedbackpage.php">Feedback</a></p>
      <p><a href="../food/customer/userpage.php">Food Area</a></p>
    </div>
     
 </body>
                  
  
 
</html>
 