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
    <link href="../../js/replace.css" rel="stylesheet"> 
</head>
<?php
session_start();
require '../../database/connection.php';
if(isset($_GET['f_id'])){
    $f_id=$_GET['f_id'];
 $sql="select * from food left join category on food.cart_id=category.c_id where food.f_id='".$f_id."'";
    $result=$conn->query($sql);
    if($result->num_rows >0){
        while($row = $result -> fetch_assoc()){     
            $nameFood=$row['nameFood'];
            $description=$row['description'];
            $imagefood=$row['imageFood'];
            $cart_id=$row['cart_id'];
            $price=$row['price'];
            $f_id=$row['f_id'];
        }
}

}
?>
   <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
            <form role="Form" action="viewfood.php" method="POST" charset="UTF-8">
                <div class="form-group">
                    <div class="input-group">
                        <input class="form-control" type="search" name="search" placeholder="Search..." required/>
                        <span class="input-group-btn">
                            <button class="btn btn-dark" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>Search</button>
                        </span>
                    </div>
                </div>        
                <a href="viewcat.php" class="btn  button" >Category</a>
                <a href="viewfood.php" class="btn  button" >Food</a>
                <a href="../../payment&orderSystem/viewcart.php" class="btn  button" >Cart</a>
                <a href="userpage.php" class="btn  button" >Return Main Page</a>
            </form>
        
        </div>
        <?php 
$sql = 'SELECT c_id,name FROM category';
$sql = "SELECT * FROM food WHERE options = 'ENABLE' ORDER BY f_id";
$connect = mysqli_connect("localhost", "root", "", "foodtiger");

$query = "SELECT * FROM food ORDER BY f_id ASC";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_all($result))
    {
				?>

<div class="col-md-12">
            <div class="card border-0">
            <form method="post" action="../../payment&orderSystem/viewcart.php?action=add&id=<?php echo $f_id; ?>">                
                <div class="row">
                        <div class="col-sm-6" style="margin-left:5%;"> 
                            <img src="../../image/<?php echo $imagefood;?>" alt="<?php echo $nameFood;?>" class="img-fluid">
                        </div>

                        <div class="col-sm-5">
                            <div class="card h-100 border-3">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $nameFood;?></h5>
                                    
                                        <p><?php echo  $description;?> </p>
                                        <p>RM<?php echo  $price;?> </p>
                                        <h5 class="text-info">Quantity: <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
                                        <input  name="hidden_name" value="<?php echo $nameFood; ?>" style="display: none;">
                                        <input  name="hidden_price" value="<?php echo  $price; ?>" style="display: none;">
                                        <input name="hidden_c_id" value="<?php if (isset($_GET['f_id'])){echo $cart_id; }?>" style="display: none;">
                                        <input type="submit" name="add" style="margin-top:5px;" class="btn btn-danger btn-xs" value="Add to Cart" >
                                       
                                        </div>
                                        <div>
                                      
                                        </div>
                                      </div>
                            </div>
                        </div>     
            </form> 
                    </div>


        
			<?php
					}
				}
			?>





</html>