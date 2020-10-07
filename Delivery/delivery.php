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
    <link href="../../css/food.css" rel="stylesheet"> 
    <script src="../js/delete.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="../css/table.css" rel='stylesheet' type='text/css'>
</head>

<?php
include "../database/connection.php";
session_start();  
$page = @$_GET['page'];			
if($page == 0 || $page == 1){
    $page1 = 0;	
}
else {
    $page1 = ($page * 6) - 6;	
}

$sql="select id,order_id,email,Name,PhoneNo,Address,price,time_date,payment_way,status,receive from payment where status='unpaid' or receive='no' LIMIT ".$page1.", 6";
$result=$conn->query($sql); 
?>
						
<div class="container">
    <div class="row">
    <p></p>
    <h1> &nbsp;&nbsp;&nbsp;&nbsp;View Order list</h1> 
    <h1 style=" text-align: right;"><a href="adminhome.php"  >Back</a></h1> 
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Order list</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                  </div>
                </div>
              </div>
              <div class="panel-body">
    
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th>Name</th>          
                        <th>Address</th> 
                        <th>Contact Number</th>
                    </tr> 
                  </thead>
                  <tbody>
                  <?php
         if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
					?> 
                          <tr>
      
                            <td><a class="btn btn-default" href ="deliverydetail.php? id=<?php echo $row['id'];?>"><?php echo $row['Name'];?></a></td>
                            <td><?php echo $row['Address'];?></td>
                            <td><?php echo $row['PhoneNo'];?></td>
                          </tr>
                          <?php
              } 
             } else{ echo "<tr><td class='text-center' colspan='7' >No order for now  </td></tr>";}
              ?>  
                        </tbody>
                </table>        
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">
                  </div>
                  <div class="col col-xs-8">
                  <?php
        $result = $conn->query("SELECT * FROM payment where status='unpaid'or receive='no'");
        $count = $result->num_rows;      
        $a = $count / 9;
        $a = ceil($a);
        ?>
                    <ul class="pagination hidden-xs pull-right">  
                    <?php
          for ($i = 1; $i <= $a; $i++) {?>
            <li class="page-item"><a class="page-link" href="delivery.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> 
          <?php
          }
          ?>            
                    </ul>
                  </div>
                </div>
              </div>
</div></div></div>

          
             



</html>