<?php

session_start(); 

$servername = "localhost";
$username = "root";
$password = "0612";
$db="foodtiger";
$conn = mysqli_connect($servername, $username, $password,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$limit = 4;
$sql = "SELECT COUNT(id) FROM blog";  
$rs_result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($rs_result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit); 
?>
<!DOCTYPE html>
<html>

<head>
  <title>FoodTiger</title>
  <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/nav-bar.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/aboutus.css">
  <link rel="stylesheet" href="../css/blog.css">
</head>

<body>
  <header>
    <div>
      <?php
      require "navandfooter/nav.php";
      ?>
    </div>

  </header>
  <div class="in1 ">
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../image/food.jpg" alt="food" width="100%" height="100%">
          <div class="carousel-caption">
            <h1>FoodTiger</h1>
            <p class="p2">Hungry always Hungry</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../image/food4.jpg" alt="food2" width="100%" height="100%">
          <div class="carousel-caption">
            <h1>Quality Food</h1>
            <p class="p2">We deliver Quality Food and deliver On Time!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../image/food3.jpg" alt="food3" width="100%" height="100%">
          <div class="carousel-caption">
            <h1>Best Customer Service</h1>
            <p class="p2">We deliver Best Customer Service and Support!</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
    <!-- ///////////////////////////////////////////////////////////////////// -->
    <div class="blog-wrap" style="margin-bottom:-125px">
      <div class="container">
        <div class="row">
          <div class="col-md-9 blog-left">
            <div class="blog-post">

              <p class="blog-post-meta">All events</p>
              <hr>

              <div id="target-content">Wait ... Loading...</div>

            </div>

            <div class="col col-xs-8">
              <ul class="pagination" style="float: right;margin-top:10px">
                <?php 
					if(!empty($total_pages)){
						for($i=1; $i<=$total_pages; $i++){
								if($i == 1){
									?>
                <li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);"
                    data-id="<?php echo $i;?>" class="page-link"><?php echo $i;?></a></li>

                <?php 
								}
								else{
									?>
                <li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link"
                    data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
                <?php
								}
						}
					}
								?>
              </ul>
            </div>
          </div>



          <div class="col-md-3 blog-right">

            <div class="widget widget-categories">
              <div class="widget-title">
                <h3>Categories</h3>
              </div>
              <?php
               $query = "SELECT * FROM category limit 5";
               $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
               if (mysqli_num_rows($run_query) > 0) {
               while ($row = mysqli_fetch_array($run_query)) {
                   $c_id = $row['c_id'];
                   $name = $row['name'];
					?>
              <ul class="cat-list">
                <li>
                  <a href="food.php?category=<?php echo $row['c_id'];?>"><i
                      class="fas fa-chevron-right"></i><?php echo $row['name'];?></a>
                </li>
              </ul>
              <?php
              } 
         }
              ?>
              <div class="widget-title">
                <h3>Read More</h3>
              </div>
              <?php
               $query = "SELECT * FROM blog limit 3";
               $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
               if (mysqli_num_rows($run_query) > 0) {
               while ($row = mysqli_fetch_array($run_query)) {
                   $id = $row['id'];
                   $title = $row['title'];
					?>
              <ul class="cat-list">
                <li>
                  <a href="blogDetail.php?id=<?php echo $row['id'];?>"><i
                      class="fas fa-chevron-right"></i><?php echo $row['title'];?></a>
                </li>
              </ul>
              <?php
              } 
         }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- ////////////////////////////////////////////////////////////////////// -->
  <!-- Carousel 2 -->
  <div id="demo" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" style="margin-top:5%;">
      <div class="carousel-item active">
        <img src="../image/food2.jpg" alt="food4" width="100%" height="100%">
      </div>
      <div class="carousel-item">
        <img src="../image/food5.jpg" alt="food5" width="100%" height="100%">
      </div>
      <div class="carousel-item">
        <img src="../image/food6.jpg" alt="food6" width="100%" height="100%">
      </div>
    </div>
  </div>

  <!-- About Us  -->
  <div class="container" style="margin-top:3%;">
    <h2>About Us</h2>
  </div>
  <div class="container" style="text-align: left;">
    <div class="row">
      <div class="column-66">
        <h1 class="large-font" style="color:#FFBD00;"><b>We are FoodTiger.</b></h1>
        <p style="font-size:1.3em;">FoodTiger is a convenient online food ordering website. Customers can browse through
          the system and place order easily. "Bringing good food into your everyday. That's our mission.</p>
        <a class="abutton" href="../aboutus.php"><button class="button3">Read More</button></a>
      </div>
      <div class="column-33">
        <img src="../image/logo 256x256.png" width="335" height="471">
      </div>
    </div>
  </div>

  <!-- How It Works -->
  <div class="container" style="margin-top:3%;margin-bottom: 3%;">
    <h2>Frequently Asked Questions(FAQ)</h2>
    <button class="collapsible">What are your opening hours?</button>
    <div class="content">
      <p class="p3">FoodTiger is open from 10am to 11pm from Monday to Sunday.</p>
    </div>
    <button class="collapsible">How can I pay for my order?</button>
    <div class="content">
      <p class="p3">We provide Credit/Debit Card and Cash on Delivery. Once the payment is comfirmed, the order will be
        transmitted to the system. </p>
    </div>
    <button class="collapsible">How can I create an account at FoodTiger?</button>
    <div class="content">
      <p class="p3">Click on "Sign Up" at the top of the page. Then fill out all information in the "Sign Up" section
        and click the "Submit" button.</p>
    </div>
  </div>
  </div>

  </div>
  <footer>
    <?php
    require "navandfooter/footer.php";
    ?>
  </footer>

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function () {
      this.classList.toggle("active");
      var content = this.nextElementSibling;
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
      };
    });
  };
  $(document).ready(function () {
    $("#target-content").load("../database/blogpagination.php?page=1");
    $(".page-link").click(function () {
      var id = $(this).attr("data-id");
      var select_id = $(this).parent().attr("id");
      $.ajax({
        url: "../database/blogpagination.php",
        type: "GET",
        data: {
          page: id
        },
        cache: false,
        success: function (dataResult) {
          $("#target-content").html(dataResult);
          $(".pageitem").removeClass("active");
          $("#" + select_id).addClass("active");

        }
      });
    });
  });
</script>