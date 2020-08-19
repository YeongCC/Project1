<?php
session_start();
require('database/connection.php');
require('database/pdo.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
</head>

<body>
    <header>        
        <?php 
          require "navandfooter/nav.php";
        ?>        
    </header>

    <div class="container" style="margin-top:100px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>View Card Payment History</h1> 
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
               
                  <div class="col col-xs-6 text-right">
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table">
                  <thead class="table-warning">
                    <tr>
                        <th>Order Number</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Price</th>     
                 
                    </tr> 
                  </thead>
                  <tbody>
                  <?php
                 $currentuser = $_SESSION['userEmail'];

                $query = "SELECT * FROM payment WHERE email= '$currentuser' ORDER BY time_date DESC";
                $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
                if (mysqli_num_rows($run_query) > 0) {
                while ($row = mysqli_fetch_array($run_query)) {
                    $order_id = $row['order_id'];
                    $Name = $row['Name'];
                    $PhoneNo = $row['PhoneNo'];
                    $Address = $row['Address'];
                    $price = $row['price'];

  
?>
                  <tr>
                  <td><a href ="orderdetail.php?order_id=<?php echo $row['order_id'];?>"><button type="button" class="btn btn-warning" ><?php echo $row['order_id'];?></button></a></td>
                  <td><?php echo $row['Name'];?></td>
                  <td><?php echo $row['PhoneNo'];?></td>
                  <td><?php echo $row['Address'];?></td>
                  <td>RM <?php echo $row['price'];?></td>
        
                  </tr>


<?php
                }
                }
                else {
                    echo "<script>alert('No any history yet! Start Order now');
                        </script>";
                }
                ?>
                     
                      </tbody>
                </table>        
              </div> 
                   </div>
                   </div>
                   </div>
                   </div>
</body>
</html>

