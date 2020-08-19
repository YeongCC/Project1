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
require '../../database/pdo.php';
$sql = 'SELECT * FROM category';
session_start();
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);		
$result=$conn->query($sql); //run SQL
if(isset($_POST['search'])){
    $keyword=$_POST['search'];
}        
$search="";
if(isset($_POST['search'])){
$search=" where nameFood like '%".$keyword."%'or description like '%".$keyword."%'or price like '%".$keyword."%'";
}
if(isset($_GET['category'])){
$cart_id=$_GET['category'];
$search=" where cart_id='".$cart_id."'";
}
?>
   <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
            <form role="Form" action="viewfood.php" method="POST">
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="search" name="search" placeholder="Search..." required/>
                        <span class="input-group-btn">
                            <button class="btn btn-dark" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                        </span>
                    </div>
                </div>
                <a href="userpage.php" class="btn  button" >Return Main Page</a>
                <a href="viewcat.php" class="btn  button" >Category</a>
                <a href="../../payment&orderSystem/viewcart.php" class="btn  button" >Cart</a>
            </form>
        
        </div>
 <div class="col-md-8">
                    <div class="card">
                   
                            <div class="row">
                                <?php
                            $sql="select * from food".$search;
                            $result=$conn->query($sql);
                            if($result->num_rows >0){
                                while($row = $result -> fetch_assoc()){     
                                
							   ?>
                              
                                <div class="col-sm-4">
                                    <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['nameFood'];?></h5>
                                        <a href="viewproductdetail.php?f_id=<?php echo $row['f_id'];; ?>"><img src="../../image/<?php echo $row['imageFood'];?>"  class="img-fluid"  style="width:300px; height:300px;object-fit: contain;"></a>
                                        <div class="card-heading"><?php echo $row['description'];?></div>     
                                        <div class="card-heading">RM<?php echo $row['price'];?></div>   
                                    </div>
                                    </div>
                                </div>
                                <?php
                                                 } 
                                            }
                                ?>
                            </div>     
                            </div>   
                            </div>  
</html>