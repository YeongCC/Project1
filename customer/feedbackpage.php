<?php 
	session_start();
	if(isset($_SESSION['Email']))
	{
		include "../database/connection.php"; 	
		$sql="SELECT * FROM `feedback`";
        $query = mysqli_query($conn,$sql);
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
    <link href="../css/blog.css" rel="stylesheet"> 


</head>
<body class="agileits_w3layouts">
    <h1 >Feedback Form</h1>
    <div class="w3layouts_main wrap">
	  <h3>Please help us to serve you better by taking a couple of minutes. </h3>
	    <form action="feedback.php" method="post" >
		  <h2>How the Food taste ?</h2>
			 <ul class="agile_info_select">
				 <li><input type="radio" name="feedback" value="excellent" id="excellent" required> 
				 	  <label for="excellent">excellent</label>
				      <div class="check w3"></div>
				 </li>
				 <li><input type="radio" name="feedback" value="good" id="good"> 
					  <label for="good"> good</label>
				      <div class="check w3ls"></div>
				 </li>
				 <li><input type="radio" name="feedback" value="neutral" id="neutral">
					 <label for="neutral">neutral</label>
				     <div class="check wthree"></div>
				 </li>
				 <li><input type="radio" name="feedback" value="poor" id="poor"> 
					  <label for="poor">poor</label>
				      <div class="check w3_agileits"></div>
				 </li>
			 </ul>	  
			<h2>If you have specific feedback, please write to us...</h2>
			<textarea placeholder="Additional comments" class="w3l_summary" name="suggestions" required=""></textarea>
			<input type="Name" placeholder="Your Name (optional)" name="Name"  style="display: none;"/>
			<input type="Email" placeholder="Your Email (optional)" name="Email" style="display: none;"/>
			<input type="PhoneNo" placeholder="Your Number (optional)" name="PhoneNo"  style="display: none;"/><br>
			<center><input type="submit" value="submit" class="agileinfo" /></center>
	
			<p><a href="test.php"  >Back</a></p>
	  </form>
	</div>

</body>
</html>
<?php
	}
	else
	{
		header('location:../index/login.php');
	}
?>
