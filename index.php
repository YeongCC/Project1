<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "foodtiger";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//if user click create buttom
if(isset($_POST['insert'])){
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $PhoneNo=$_POST['PhoneNo'];
    $Address=$_POST['Address'];
    $Password=$_POST['Password'];
    $Password2=$_POST['Password2'];

    $sql="insert into account values('$Name','$Email','$PhoneNo','$Address','$Password')";
    
    // Your validation code.
    if ($Password != $Password2) {
        echo "<script>alert('Your passwords do not match. Please type carefully.');</script>";
    }
    // Passwords match
    if ($Password == $Password2){ 
        $result=$conn->query($sql);
        echo "<script>alert('Congratulations,Sign Up Successful!! Try to Login Now!!!!!');</script>";
    }
    
}


    
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="nav-bar.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="aboutus.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
</head>
<script>
    // Get the modal
    var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    // Get the modal
    var modal = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<body>
    <header>        
        <!-- nav bar -->
        <nav class="navbar navbar-expand-md bg-warning navbar-dark fixed-top">
            <!-- Brand -->
            <a class="navbar-brand" href="index.html"><img src="image/logo 256x256.png" alt="logo" width="30" height="30" style="margin-left:30%;"></a>
          
            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar links -->
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 " id="collapsibleNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Foods</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign Up</a>
                    </li>
                </ul>
            </div>
          </nav>

            <!-- Login -->
            <div id="id01" class="modal">
            <form class="modal-content animate" action="/action_page.php" method="post">
              <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
                <div class="container1">
                  <h1>Login</h1>
                  <hr>
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                    
                <button type="submit" class="button2">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
                </div>

                <div class="container1" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
            </div>

            <!-- Sign Up -->
            <div id="id02" class="modal">
                <form class="modal-content animate" name="register" action="" method="POST"  style="margin-top:0%;">
                    <div class="imgcontainer">
                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                    </div>
    
                    <div class="container1" >
                        <h1>Sign Up</h1>
                        <p>Please fill in this form to create an account.</p>
                        <hr>
                        <label for="Username"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="Name" value="<?php if (isset($_GET['ID'])){echo $Name; }?>" required>

                        <label for="Email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="Email" value="<?php if (isset($_GET['ID'])){echo $Email; }?>" required>

                        <label for="PhoneNo"><b>Mobile Number</b></label>
                        <input type="text" placeholder="Enter Mobile Number" name="PhoneNo" value="<?php if (isset($_GET['ID'])){echo $PhoneNo; }?>" required>

                        <label for="Address"><b>Address</b></label>
                        <input type="text" placeholder="Enter Address" name="Address" value="<?php if (isset($_GET['ID'])){echo $Address; }?>" required>

                        <label for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="Password" id="Password" value="<?php if (isset($_GET['ID'])){echo $Password; }?>" required>

                        <label for="psw-repeat"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="Password2" id="Password2" value="<?php if (isset($_GET['ID'])){echo $Password2; }?>" required>


                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
                        <div class="clearfix">
                            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn2">Cancel</button>
                            <button type="submit" class="signupbtn" name="insert">Submit</button>
                          </div>
                    </div>
                </form>
                </div>
    </header>

    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="image/food.jpg" alt="food" width="1100" height="500">
            <div class="carousel-caption">
              <h1>FoodTiger</h1>
              <p class="p2">Hungry always Hungry</p>
            </div>   
          </div>
          <div class="carousel-item">
            <img src="image/food4.jpg" alt="food2" width="1100" height="500">
            <div class="carousel-caption">
              <h1>Quality Food</h1>
              <p class="p2">We deliver Quality Food and deliver On Time!</p>
            </div>   
          </div>
          <div class="carousel-item">
            <img src="image/food3.jpg" alt="food3" width="1100" height="500">
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

    <!-- Card -->
    <div class="container" ><h2>Our Foods</h2>
        <div class="card-deck" style="margin-top:5%;">
            <div class="card">
                <div class="inner">
                    <img class="card-img-top" src="image/malay food.jpg" alt="Malay Cuisine">
                </div>
              <div class="card-body">
                <h5 class="card-title">Malay</h5>
                <p class="card-text">Malay cuisine is the cooking tradition of ethnic Malays of Southeast Asia, residing in modern-day Malaysia, Indonesia , Singapore, Brunei and Southern Thailand. Malay cooking also makes plentiful use of lemongrass.</p>
                <a href="#" class="btn btn-warning text-white">Learn More</a>
              </div>
            </div>
            <div class="card">
                <div class="inner">
                    <img class="card-img-top" src="image/chinese food.jpg" alt="Chinese Cuisine">
                </div>
              <div class="card-body">
                <h5 class="card-title">Chinese</h5>
                <p class="card-text">Chinese cuisine is an important part of Chinese culture, which includes cuisine originating from the diverse regions of China, as well as from Overseas Chinese who have settled in other parts of the world.</p>
                <a href="#" class="btn btn-warning text-white">Learn More</a>
              </div>
            </div>
            <div class="card">
                <div class="inner">
                    <img class="card-img-top" src="image/western food.jpg" alt="Western Cuisine">
                </div>
              <div class="card-body">
                <h5 class="card-title">Western</h5>
                <p class="card-text">European or western cuisine is the cuisines of Europe and other Western countries, including the cuisines brought to other countries by European settlers and colonists. Sometimes the term "European". &nbsp;</p>
                <a href="#" class="btn btn-warning text-white">Learn More</a>
              </div>
            </div>
          </div>
    </div>
     
        <!-- Carousel 2 -->
      <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" style="margin-top:5%;">
          <div class="carousel-item active">
            <img src="image/food2.jpg" alt="food4" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="image/food5.jpg" alt="food5" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="image/food6.jpg" alt="food6" width="1100" height="500">
          </div>
        </div>
      </div>

      <!-- About Us -->
      <div class="container" style="margin-top:3%;"><h2>About Us</h2></div>
        <div class="container" style="text-align: left;">
            <div class="row">
            <div class="column-66">
                <h1 class="large-font" style="color:#FFBD00;"><b>We are FoodTiger.</b></h1>
                <p style="font-size:1.3em;">FoodTiger is a convenient online food ordering website. Customers can browse through the system and place order easily. "Bringing good food into your everyday. That's our mission.</p>
                <button class="button3">Read More</button>
            </div>
            <div class="column-33">
                <img src="image/logo 256x256.png" width="335" height="471">
            </div>
            </div>
        </div>

        <!-- How It Works -->
        <div class="container" style="margin-top:3%;margin-bottom: 3%;"><h2>Frequently Asked Questions(FAQ)</h2>
            <button class="collapsible">What are your opening hours?</button>
            <div class="content">
              <p class="p3">FoodTiger is open from 10am to 11pm from Monday to Sunday.</p>
            </div>
            <button class="collapsible">How can I pay for my order?</button>
            <div class="content">
              <p class="p3">We provide Credit/Debit Card. Once the payment is comfirmed, the order will be transmitted to the system. </p>
            </div>
            <button class="collapsible">How can I create an account at FoodTiger?</button>
            <div class="content">
            <p class="p3">Click on "Sign Up" at the top of the page. Then fill out all information in the "Sign Up" section and click the "Submit" button.</p>
            </div>
        </div>

    <!-- Footer -->
    <footer class="page-footer font-small pt-4" style="background-color: #FFBD00;">
        <!-- Footer Links -->
        <div class="container-fluid text-center text-md-left">
        <!-- Grid row -->
        <div class="row">
            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3" >
            <!-- Content -->
            <h5 class="text-uppercase" style="margin-left:5%;">Contact Us</h5>
            <h6 style="margin-left:5%;">FoodTiger</h6>
            <p style="margin-left:5%;">PTD 64888, Jalan Selatan Utama, km 15, 81300 Skudai, Johor</p>
            </div>
            <!-- Grid column -->
            <hr class="clearfix w-100 d-md-none pb-3">
            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
            <!-- Links -->
            <h5 class="text-uppercase">Our Service</h5>
            <ul class="list-unstyled">
                <li>
                <a class="a2" href="#!">Categories</a>
                </li>
                <li>
                <a class="a2" href="#!">Foods</a>
                </li>
                <li>
                <a class="a2" href="#!">Career</a>
                </li>
                <li>
                <a class="a2" href="#!">Support</a>
                </li>
            </ul>
            </div>
            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">
            <!-- Links -->
            <h5 class="text-uppercase">Social Media Links</h5>
    
            <ul class="list-unstyled">
                <li>
                <a class="a2" href="#!">Facebook</a>
                </li>
                <li>
                <a class="a2" href="#!">Instagram</a>
                </li>
                <li>
                <a class="a2" href="#!">Twitter</a>
                </li>
                <li>
                <a class="a2" href="#!">Whatsapp</a>
                </li>
            </ul>
    
            </div>
            <!-- Grid column -->
    
        </div>
        <!-- Grid row -->
    
        </div>
        <!-- Footer Links -->
    
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="background-color:#f5b400 ;">© 2020 Copyright:
        <a class="a2" href="index.html"> FoodTiger.com</a>
        </div>
        <!-- Copyright -->
    </footer>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight){
        content.style.maxHeight = null;
        } else {
        content.style.maxHeight = content.scrollHeight + "px";
        }
    });
    }
</script>
</body>
</html>