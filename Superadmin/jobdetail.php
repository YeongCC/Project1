<?php  
session_start();
require('../database/pdo.php');

$sql = 'SELECT id,order_id,Name,PhoneNo,Address,price,time_date,status,receive FROM payment';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id'])){
	$id=$_GET['id']; 
	$sql="select * from requestjob where id ='$id'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
            $_SESSION['id'] = $row['id'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['lastName'] = $row['lastName'];
            $_SESSION['PhoneNo'] = $row['PhoneNo'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['years'] = $row['years'];
            $_SESSION['language'] = $row['language'];
            $_SESSION['citizen'] = $row['citizen'];
            $_SESSION['validDriverLicense'] = $row['validDriverLicense'];
            $_SESSION['vehicle'] = $row['vehicle'];
            $_SESSION['City'] = $row['City'];
            $_SESSION['time_date'] = $row['time_date'];
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 </head>  
 <body>  
 <div class="container">
    <div class="row">
    <p></p>
    <h1> &nbsp;&nbsp;&nbsp;&nbsp;Order Detail</h1> 
  
 <div class="container">    
 <div id="signupbox" style=" margin-top:20px" class="mainbox col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Order Detail</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-18px"><a href="requestJob.php" >Cancel</a></div>
                        </div>  
                        <div class="panel-body" >
                          
                                
                                <div class="form-group">
                                    <label for="Name" class="col-md-3 control-label">Name :</label>
                                    <div class="col-md-9">
                                    <h5>&nbsp;&nbsp;&nbsp;<?php echo  $_SESSION['firstName']; ?> <?php echo  $_SESSION['lastName']; ?></h5>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="Address" class="col-md-3 control-label">Email :</label>
                                    <div class="col-md-9">
                                     <h5>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['Email']; ?></h5>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Contact Number" class="col-md-3 control-label">Phone Number :</label>
                                    <div class="col-md-9">
                                     <h5>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['PhoneNo']; ?></h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Price" class="col-md-3 control-label">18 years above or below :</label>
                                    <div class="col-md-9">
                                     <h5>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['years']; ?></h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Price" class="col-md-3 control-label">Language :</label>
                                    <div class="col-md-9">
                                     <h5>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['language']; ?></h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Price" class="col-md-3 control-label">Malaysian Citizen :</label>
                                    <div class="col-md-9">
                                     <h5>&nbsp;&nbsp;&nbsp;<?php echo  $_SESSION['citizen']; ?></h5>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Price" class="col-md-3 control-label">Driver's License :</label>
                                    <div class="col-md-9">
                                     <h5>&nbsp;&nbsp;&nbsp;<?php echo  $_SESSION['validDriverLicense']; ?></h5>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Price" class="col-md-3 control-label">City :</label>
                                    <div class="col-md-9">
                                     <h5>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['City']; ?></h5>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Price" class="col-md-3 control-label">Vehicle :</label>
                                    <div class="col-md-9">
                                     <h5>&nbsp;&nbsp;&nbsp;<?php echo  $_SESSION['vehicle']; ?></h5>
                                    </div>
                                </div>
 
      

                               
                                <div class="form-group">                                       
                                    <div class="col-md-offset-3 col-md-6">
                                    <button  type="submit"  name="reject" id="<?php echo $id; ?>" class="btn btn-danger rejectbut" >Reject</button>
                                    
                                    <button  type="submit"  name="update" id="<?php echo $id; ?>"class="btn btn-info updatebut" >Approve</button>

                                    </div>
                                </div>
                                </div>
                                
                         </div>
         </div> 
         </div>          
         </div> 
         </div>          
         </div> 
  </body>
</html>
<script>
$(document).on('click', '.updatebut', function(){
		var update_id = $(this).attr('id');
		if(confirm("Are you sure you want to reject?"))
		{
			$.ajax({
				url:"../database/updateJob.php",
				method:"POST",
				data:{update_id:update_id},
				success:function(data)
				{
                    window.location = "addDeliveryMan.php";
				}
			})
		}
	});

    $(document).on('click', '.rejectbut', function(){
		var reject_id = $(this).attr('id');
		if(confirm("Are you sure you want to approve?"))
		{
			$.ajax({
				url:"../database/updateJob.php",
				method:"POST",
				data:{reject_id:reject_id},
				success:function(data)
				{
                    window.location = "requestJob.php";
				}
			})
		}
	});
</script>

