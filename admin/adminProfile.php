<?php  
include "../database/connection.php";
session_start();  
if (isset($_SESSION['adminEmail'])) {
    $Email = $_SESSION['adminEmail'];
    $Name  =  $_SESSION['adminName'];
	$query = "SELECT * FROM admin WHERE Email = '$Email'" ; 
	$result= mysqli_query($conn , $query) or die (mysqli_error($conn));
	if (mysqli_num_rows($result) > 0 ) {
		$row = mysqli_fetch_array($result);
		$Email = $row['Email'];
        $Name = $row['Name'];
        $Position = $row['Position'];

	}}
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 </head>  
 <body>  
 <div class="container">
    <div class="row">
    <p></p>
    <h1> &nbsp;&nbsp;&nbsp;&nbsp;Admin Profile</h1> 
    <h1 style=" text-align: right;"><a href="adminhome.php"  >Back</a></h1> 
 <div class="container">    
 <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Profile</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-18px"><a href="editprofile.php" >Edit</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form"  >
                                
                                <div class="form-group">
                                    <label for="Name" class="col-md-3 control-label">Email :</label>
                                    <div class="col-md-9">
                                    <h5>&nbsp;&nbsp;&nbsp;<?php echo $Email; ?></h5>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="Email" class="col-md-3 control-label">Username :</label>
                                    <div class="col-md-9">
                                     <h5>&nbsp;&nbsp;&nbsp;<?php echo $Name; ?></h5>
                                    </div>
                                </div>
                             
                                <div class="form-group">
                                    <label for="Position" class="col-md-3 control-label">Position :</label>
                                    <div class="col-md-9;">
                                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $Position; ?></h5>
                                    </div>
                                </div>
                            </form>
                         </div>
         </div> 
         </div>          
         </div> 
         </div>          
         </div> 
  </body>
</html>


