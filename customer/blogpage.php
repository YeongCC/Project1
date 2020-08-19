<?php 
	session_start();
	if(isset($_SESSION['Email']))
	{
		include "../database/connection.php"; 	
		$sql="SELECT * FROM `blog`";
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

<div class="container">
  <center><h2>Welcome <span style="color:#dd7ff3;"><?php echo $_SESSION['Name']; ?> !</span></h2>
 
	<label>Join the chat</label>
  </center></br>
  <div class="display-chat">
<?php
	if(mysqli_num_rows($query)>0)
	{
		while($row= mysqli_fetch_assoc($query))	
		{
?>
		<div class="message">
			<p>
				<span><?php echo $row['Name']; ?> :</span>
				<?php echo $row['message']; ?>
			</p>
        </div>
<?php
		}
	}
	else
	{
?>
	<div class="message">
			<p>
				No previous chat available.
			</p>
    </div>
<?php
	} 
?>

  </div>



<form class="form-horizontal" method="post" action="blog.php">
    <div class="form-group">
      <div class="col-sm-10">          
        <textarea name="msg" class="form-control" placeholder="Type your message here..."></textarea>
      </div>
	     </div>      
      <div class="col-sm-2">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
      <div class="col-sm-2">
  <p><a href="test.php"  >Back</a></p>
  <p><a href="../index/lognout.php"  onclick="return confirm('Are you sure?')">Logout</a></p>
      </div>
  </form>
</html>
<?php
	}
	else
	{
		header('location:../index/login.php');
	}
?>