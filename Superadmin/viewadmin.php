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
$search="";
if(isset($_REQUEST['search'])){
    $search=" and Name like '%".$_REQUEST['search']."%'or Email like '%".$_REQUEST['search']."%'or Position like '%".$_REQUEST['search']."%'";
}
$sql="select ad_id,Name,Email,Position from admin where Position='Admin' or Position='Deliver Man'".$search." LIMIT ".$page1.", 6";
$result=$conn->query($sql); 
?>
						
<div class="container">
    <div class="row">
    <p></p>
    <h1> &nbsp;&nbsp;&nbsp;&nbsp;View Worker Account</h1> 
    <h1 style=" text-align: right;"><a href="adminpage.php"  >Back</a></h1> 
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Worker account list</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                  </div>
                </div>
              </div>
              <div class="panel-body">
    
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th>Email</th>
                        <th>Name</th>          
                        <th>Position</th> 
                    </tr> 
                  </thead>
                  <tbody>
                  <?php
         if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) { 
					?> 
                          <tr>
      
                            <td align="center">
                            <a class="btn btn-default" href ="updateAdminPosition.php? ad_id=<?php echo $row['ad_id'];?>"><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger" href="editAdmin.php?Email=<?php echo $row['Email']; ?>" onclick="return confirm('Sure Want Delete?')"><span class="new badge" ><em class="fa fa-trash"></em></span></a>
                            </td>
                            <td><?php echo $row['Email'];?></td>
                            <td><?php echo $row['Name'];?></td>
                            <td><?php echo $row['Position'];?></td>
                          </tr>
                          <?php
              }  } else{ echo "<tr><td class='text-center' colspan='7' >No account please Create one  </td></tr>"; }
            
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
        $result = $conn->query("SELECT * FROM admin where Position='Admin' or 'Deliver Man'");
        $count = $result->num_rows;      
        $a = $count / 9;
        $a = ceil($a);
        ?>
                    <ul class="pagination hidden-xs pull-right">  
                    <?php
          for ($i = 1; $i <= $a; $i++) {?>
            <li class="page-item"><a class="page-link" href="viewadmin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> 
          <?php
          }
          ?>            
                    </ul>
                  </div>
                </div>
              </div>
</div></div></div>



</html>