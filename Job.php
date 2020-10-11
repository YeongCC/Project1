<!DOCTYPE html>
<html>

<head>
  <title>Rider - Delivery Jobs</title>
  <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/nav-bar.css">
  <link rel="stylesheet" href="css/aboutus.css">

</head>


<body>
  <div class="in1">
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/food.jpg" alt="food" width="100%" height="100%">
          <div class="carousel-caption">
            <h1>FoodTiger</h1>
            <p class="p2">Hungry always Hungry</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="image/food4.jpg" alt="food2" width="100%" height="100%">
          <div class="carousel-caption">
            <h1>Quality Food</h1>
            <p class="p2">We deliver Quality Food and deliver On Time!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="image/food3.jpg" alt="food3" width="100%" height="100%">
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
    <!-- About Us -->
    <div style="text-align:center;margin-top:3%;">
      <b style="font-style: italic;font-size:3em;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji"">Become a foodtiger</b>
         <h1 style="font-style: italic;font-size:5em;">Rider</h1>
         <?php
  require "requestJob.php";
  ?>
      <!-- First -->
      <div class="container" style="margin-top: 3%;">
        <div class="row">
          <div class="column-66" style="text-align: left;">
            <h1 class="large-font" style="color:#FFBD00;"><b>Explore your city.</b></h1>
            <p style="font-size:1.3em;">Drive around and become a trip advisor to your friends. You'll see something new everyday.</p>
          </div>
          <div class="column-33" style="margin-top: 1%;">
            <img src="image/logo + font_4.png" alt="Logo" width="335" height="471">
          </div>
        </div>
      </div>

      <!-- Clarity Section -->
      <div class="container1" style="background-color:#f1f1f1;margin-top:3%;">
        <div class="container">
          <div class="row">
            <div class="column-33">
              <img src="image/aboutpicture.jpg" alt="Jobs" width="335" height="471">
            </div>
            <div class="column-66" style="text-align: left;">
              <h1 class="large-font" style="color:#FFBD00;"><b>Tips?</b></h1>
              <p style="font-size:1.3em;"> Earn up to RM12 per hour. The tips go straight in your pocket.</p>
            </div>
          </div>
        </div>
      </div>

  

    </div>
  </div>
</body>


</html>