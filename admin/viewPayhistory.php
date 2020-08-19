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
session_start();
require('../database/connection.php');
require('../database/pdo.php');
require('../database/mysql.php');
$sql = 'SELECT * FROM payment';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
$results_per_page = 6;
$sql='SELECT * FROM payment';
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results/$results_per_page);
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$this_page_first_result = ($page-1)*$results_per_page;
$sql='SELECT * FROM payment LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);
?>
						
<div class="container">
    <div class="row">
    <p></p>
    <h1> &nbsp;&nbsp;&nbsp;&nbsp;Payment List</h1> 
    <h1 style=" text-align: right;"><a href="view.php"  >Back</a></h1> 
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Food list</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table  table-bordered table-list">
                  <thead>
                    <tr>
                        <th>Num</th>
                        <th>Order Number</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Price</th>      
                        <th>Receive</th>   
                        <th>Status</th>
                        <th>Time & Date</th>      
                    </tr> 
                  </thead>
                  <tbody>
                          <tr>
                          <?php 
                   while($row = mysqli_fetch_array($result)) {   
                          ?>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['order_id'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['Name'];?></td>
                            <td><?php echo $row['PhoneNo'];?></td>
                            <td><?php echo $row['Address'];?></td>
                            <td><?php echo $row['price'];?></td>
                            <td><?php echo $row['receive'];?></td>
                            <td><?php echo $row['status'];?></td>
                            <td><?php echo $row['time_date'];?></td>
                        </tr>
                          <?php
                            }
                          ?>
                        </tbody>
                </table>        
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">  
                      <?php
                      for ($page=1;$page<=$number_of_pages;$page++) {
                        echo ' <li><a href="viewPayhistory.php?page=' . $page . '">' . $page . '</a> </li> ';}
                        ?>                
                    </ul>
                  </div>
                </div>
              </div>
</div></div></div>

</html>