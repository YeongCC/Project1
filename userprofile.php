<?php  
include "database/connection.php";
session_start();  
if (isset($_SESSION['userEmail'])) {
	$Email = $_SESSION['userEmail'];
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
  if(!isset($_SESSION['userEmail']))
{
	header("location:index.php");
}
?>
<!DOCTYPE html>  
<html>  
 <head>  
 <title>FoodTiger - User Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/profile.css">
 </head>  
 <body>  
 <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>
    </header>
    <div class="imgcontainer">
      <img src="image/avatar6.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
    <div>
    <h2 style="text-align:center;">Profile</h2><hr>
    <div style="text-align:right;">
    <a class="btn btn-warning" href="editprofile.php" style="text-align:right;">Edit <i class='fas fa-edit'></i></a>
    </div>
    <div class="container" style="text-align:center;">
      <div class="row">
        <div class="col-sm-3">
        <h4 style="color:brown;">Username: </h4>
        </div>
        <div class="col-sm-9">
        <h4 style="font-weight: lighter;margin-right:40%"><?php echo $Name ?></h4>
        </div>   
      </div><br/>
      <div class="row">
        <div class="col-sm-3">
        <h4 style="color:brown;margin-left:60px">Email:</h4>
        </div>
        <div class="col-sm-9">
        <h4 style="font-weight: lighter;margin-right:22%"><?php echo $Email ?></h4>
        </div>   
      </div><br/>
      <div class="row">
        <div class="col-sm-3">
        <h4 style="color:brown;margin-left:10px">Phone Number:</h4>
        </div>
        <div class="col-sm-9">
        <h4 style="font-weight: lighter;margin-right:40%"><?php echo $PhoneNo ?></h4>
        </div>   
      </div><br/>
      <div class="row">
        <div class="col-sm-3">
        <h4 style="color:brown;margin-left:20px">Address:</h4>
        </div>
        <div class="col-sm-9">
        <h4 style="font-weight: lighter;margin-right:37%"><?php echo $Address ?></h4>
        </div>   
      </div>
    </div>  

      </div>
    </div> 
  
  </body>
    <footer style="margin-top:5%;">
        <?php 
          require "navandfooter/footer.php";
        ?>
    </footer>
</html>
