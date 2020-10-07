<?php
include "../database/connection.php";
session_start();
if (isset($_GET['f_id'])) {
    $f_id = $_GET['f_id'];
    $sql = "select * from food where food.f_id='" . $f_id . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $nameFood = $row['nameFood'];
            $description = $row['description'];
            $imagefood = $row['imageFood'];
            $cart_id = $row['cart_id'];
            $price = $row['price'];
            $f_id = $row['f_id'];
        }
    }
}
if(!isset($_SESSION['userEmail']))
{
	header("location:../index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger - Food</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/nav-bar.css">
    <link rel="stylesheet" href="../css/aboutus.css">
    <link rel="stylesheet" href="../css/fooddetails.css">
    <link rel="stylesheet" href="../css/yel.css">
</head>

<body>
    <header>
        <?php
        include "navandfooter/nav.php";
        ?>
    </header>
    <div class="container" style="margin-top:8%;margin-bottom:3%;">
        <?php
        $sql = 'SELECT c_id,name FROM category';
        $sql = "SELECT * FROM food WHERE options = 'ENABLE' ORDER BY f_id";
        $connect = mysqli_connect("localhost", "root", "0612", "foodtiger");

        $query = "SELECT * FROM food ORDER BY f_id ASC";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_all($result)) {
        ?>
                <form method="post" action="../cart.php?action=add&id=<?php echo $f_id; ?>">
                    <div class="card">
                        <div class="row">

                            <aside class="col-sm-6 border-right">
                                <article class="gallery-wrap">
                                    <div class="img-big-wrap">
                                        <img src="image/<?php echo $imagefood; ?>" alt="<?php echo $nameFood; ?>" class="img-fluid" style="width:100%;height:70%;margin-top:100px;text-align:center;">
                                    </div> <!-- slider-product.// -->
                                </article> <!-- gallery-wrap .end// -->
                            </aside>
                            <aside class="col-sm-6">
                                <article class="card-body p-5">
                                    <h3 class="title mb-3"><?php echo $nameFood; ?></h3>

                                    <p class="price-detail-wrap">
                                        <span class="price h3 text-warning">
                                            <span class="currency">RM<?php echo $price; ?></span>
                                        </span>
                                    </p> <!-- price-detail-wrap .// -->
                                    <dl class="item-property">
                                        <dt>Description</dt>
                                        <dd>
                                            <p><?php echo  $description; ?></p>
                                        </dd>
                                    </dl>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <dl class="param param-inline">
                                                    <dt>Quantity: </dt>
                                                    <input type="number" min="1" max="25" name="quantity" class="form-control" value="1" data-decimals="0" />
                                            </dl> <!-- item-property .// -->
                                        </div> <!-- col.// -->
                                    </div> <!-- row.// -->
                                    <hr>
                                    <input name="hidden_name" value="<?php echo $nameFood; ?>" style="display: none;">
                                    <input name="hidden_price" value="<?php echo  $price; ?>" style="display: none;">
                                    <input name="hidden_c_id" value="<?php if (isset($_GET['f_id'])) {
                                                                            echo $cart_id;
                                                                        } ?>" style="display: none;">
                                    <?php
                                    if (isset($_SESSION['userEmail'])) { ?>
                                        <input type="submit" name="add" class="btn  btn-warning text-uppercase text-white" value="Add to Cart" style="width:auto;">
                                    <?php
                                    } else { ?>
                                       
                                        <a class="btn btn-lg btn-warning text-uppercase text-white" href="#"  data-target="#login" style="width:auto;" disabled>Add to Cart</a>
                                        <div style="margin-left: 40px;">Login in First</div>
                                    <?php
                                    } ?>
                                </article> <!-- card-body.// -->
                            </aside> <!-- col.// -->
                        </div> <!-- row.// -->
                    </div> <!-- card.// -->
            <?php
            }
        }
            ?>
                </form>


    </div>
    </div>
    <footer style="margin-top:5%;">
        <?php
        include "navandfooter/footer.php";
        ?>
    </footer>
</body>

</html>






<link rel="stylesheet" href="../dist/jquery.nice-number.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script src="../dist/jquery.nice-number.js"></script>
<script>
    $('input[type="number"]').niceNumber({
    });
</script>