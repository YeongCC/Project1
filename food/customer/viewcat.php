<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">	
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="../../css/main.css" rel="stylesheet"> 
    
</head>
<?php
require '../../database/connection.php';
require '../../database/mysql.php';
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
    $search=" and name like '%".$_REQUEST['search']."%'or description like '%".$_REQUEST['search']."%'";
}
$sql="select c_id,name,description,image from category where category_exixts='exixts'".$search." LIMIT ".$page1.", 6";
$result=$conn->query($sql); 
?>
   <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
            <form role="Form" action="viewcat.php" method="POST" charset="UTF-8">
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="search" name="search" placeholder="Search..." required/>
                        <span class="input-group-btn">
                            <button class="btn btn-dark" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                        </span>
                    </div>
                </div>
                <a href="viewfood.php" class="btn  button" >Food</a>
                <a href="../../payment&orderSystem/viewcart.php" class="btn  button" >Cart</a>             
                <a href="userpage.php" class="btn  button" >Return Main Page</a>
            </form>
        
        </div>

<div class="col-md-8">
                    <div class="card">
                   
                            <div class="row">

<?php
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
?>
      <div class="col-sm-4">
                   <div class="card h-100">
        <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['name'];?></h5>
                                        <a href="viewfood.php?category=<?php echo $row['c_id'];?>"><img src="../../image/<?php echo $row['image'];?>"  class="img-fluid"  style="width:300px; height:300px;object-fit: contain;"></a>
									<div class="card-heading"><?php echo $row['description'];?></div>     
        </div>
                   </div>
      </div>


<?php
}}
?>
                             </div>     
                            </div>
                            </div>
<?php
  $result = $conn->query("SELECT * FROM category where category_exixts='exixts'");
  $count = $result->num_rows;      
  $a = $count / 9;
  $a = ceil($a);
?>
                            <ul class="pagination pagination-lg"> 
<?php
for ($i = 1; $i <= $a; $i++) {?>
  <li class="page-item"><a class="page-link" href="viewcat.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li> 
<?php
}
?>
                            </ul>
</html>