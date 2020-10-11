<?php
include "../database/connection.php";
session_start();  
require '../database/pdo.php';
$sql = 'SELECT * FROM food';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
$results_per_page = 6;
$sql='SELECT * FROM food';
$result = mysqli_query($conn, $sql);
$number_of_results = mysqli_num_rows($result);
$number_of_pages = ceil($number_of_results/$results_per_page);
if (!isset($_GET['page'])) {
  $page = 1;
} else {
  $page = $_GET['page'];
}
$this_page_first_result = ($page-1)*$results_per_page;
$sql='SELECT * FROM food LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
$result = mysqli_query($conn, $sql);              
?>
<!DOCTYPE html>
<html>

<head>
  <title>FoodTiger - Foods</title>
  <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/nav-bar.css">
  <link rel="stylesheet" href="../css/index.css">

</head>

<body>
  <header>
    <?php 
          require "navandfooter/nav.php";
        ?>
  </header>
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
          <img src="../image/food.jpg" alt="food" width="1100" height="500">
          <div class="carousel-caption">
            <h1>FoodTiger</h1>
            <p class="p2">Hungry always Hungry</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../image/food4.jpg" alt="food2" width="1100" height="500">
          <div class="carousel-caption">
            <h1>Quality Food</h1>
            <p class="p2">We deliver Quality Food and deliver On Time!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../image/food3.jpg" alt="food3" width="1100" height="500">
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

    <div class="container" style="margin-top:3%;">
      <h2>Foods</h2>
      <form style="margin-top:3%;" action="food.php" method="POST">
        <input type="text" name="search" placeholder="Search..." id="search">
      </form>
    </div>
    <div class="col-md-8 mx-auto" style="margin-top:1%;margin-bottom:3%;">
      <div class="row">
        <?php
            if(isset($_SESSION['userEmail-foodtiger']))
            {
               while($row = mysqli_fetch_array($result)) {     
            ?>
        <div class="col-sm-4 " style="margin-top:20px;">
          <div class="card h-100">
            <div class="card-body">
              <div class="inner" style="text-align:center">
                <a href="fooddetails.php?f_id=<?php echo $row['f_id']; ?>"><img
                    src="image/<?php echo $row['imageFood'];?>" class="img-fluid"
                    style="width:400px; height:300px;object-fit: contain;"></a>
              </div>
              <h5 class="card-title"><?php echo $row['nameFood'];?></h5>
              <hr>
              <div class="card-heading"><?php echo $row['description'];?></div>
              <div class="card-heading">
                <h5>RM<?php echo $row['price'];?></h5>
              </div>
            </div>
          </div>
        </div>
        <?php
                } 
            ?>
      </div>
      <ul class="pagination pagination-lg">
        <?php
                      for ($page=1;$page<=$number_of_pages;$page++) {
                        echo ' <li class="page-item"><a class="page-link" href="foodpage.php?page=' . $page . '">' . $page . '</a> </li> ';}
                          }else{ 
                            while($row = mysqli_fetch_array($result)) {     
                            ?>
        <div class="col-sm-4 " style="margin-top:20px;">
          <div class="card h-100">
            <div class="card-body">
              <div class="inner" style="text-align:center">
                <a href="#" data-toggle="modal" data-target="#login_form"><img
                    src="image/<?php echo $row['imageFood'];?>" class="img-fluid"
                    style="width:400px; height:300px;object-fit: contain;"></a>
              </div>
              <h5 class="card-title"><?php echo $row['nameFood'];?></h5>
              <hr>
              <div class="card-heading"><?php echo $row['description'];?></div>
              <div class="card-heading">
                <h5>RM<?php echo $row['price'];?></h5>
              </div>
            </div>
          </div>
        </div>
        <?php
                } 
            ?>
    </div>
    <ul class="pagination pagination-lg">
      <?php
                      for ($page=1;$page<=$number_of_pages;$page++) {
                        echo ' <li class="page-item"><a class="page-link" href="foodpage.php?page=' . $page . '">' . $page . '</a> </li> ';}
                         }   
                        ?>
    </ul>
  </div>
  </div>

  <footer style="margin-top:5%;">
    <?php 
          require "navandfooter/footer.php";
        ?>
  </footer>
</body>

</html>

<div class="modal fade" id="login_form" role="dialog" method="post">
  <div class="modal-dialog  modal-lg">
    <div class="modal-content animate">
      <div class="imgcontainer">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="container1">
        <h1>Login</h1>

        <hr>
        <label for="Email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="Email" id="Email">

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="Password" id="Password">


        <button type="submit" name="login_button" class="button2" id="login_button"
          class="btn btn-warning">Login</button>
        <span id="notFound" style="color:red;display:none">Account Not Found</span>
        <span id="wrong" style="color:red;display:none">Password is wrong</span>
        <span id="please" style="color:red;display:none">Fields are required</span>

      </div>

      <div class="container1" style="background-color:#f1f1f1">
        <span class="psw">No Account??<a href="#" data-toggle="modal" data-target="#signUp">Register</a></span>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="signUp" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <form class="modal-content animate" id="register_form" name="form1" method="post">
      <div class="imgcontainer">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="container1">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>


        <label for="Username">Username:</label>
        <input type="text" class="form-control" id="name" placeholder="Name" name="name" minlength="4" maxlength="8">
        <span id="nameLen" style="color:red;display:none">The Username field needs to be at least 2 characters</span>
        <span id="namefield" style="color:red;display:none">Fields are required</span>

        <label for="Email">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
        <span id="exists" style="color:red;display:none">Account Exixts</span>
        <span id="emailformat" style="color:red;display:none">Valid Email Format</span>
        <span id="emailfield" style="color:red;display:none">Fields are required</span>

        <label for="Phone">Phone:</label>
        <input type="text" class="form-control" id="phoneNO" placeholder="Phone" name="phoneNO">
        <span id="phonLen" style="color:red;display:none">The Phone Number field needs to be at least 10
          characters</span>
        <span id="phonefield" style="color:red;display:none">Fields are required</span>

        <label for="Address">Address:</label>
        <input type="text" class="form-control" id="address" placeholder="address" name="address">
        <span id="adressfield" style="color:red;display:none">Fields are required</span>

        <label for="Password">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        <span id="match" style="color:red;display:none">Password is not match</span>
        <span id="passwordLen" style="color:red;display:none">The Password field needs to be at least 6
          characters</span>
        <span id="pass1field" style="color:red;display:none">Fields are required</span>


        <label for="Repeat Password">Repeat Password:</label>
        <input type="password" class="form-control" id="password2" placeholder="Password" name="password2">
        <span id="pass2field" style="color:red;display:none">Fields are required</span>



        <p>By creating an account you agree to our <a href="term.php" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
          <button type="button" data-dismiss="modal" class="cancelbtn2 ">Cancel</button>
          <input type="button" name="save" class="signupbtn" value="Register" id="register_button">
        </div>

      </div>
  </div>
  </form>
</div>
</div>


<script>
  $(document).ready(function () {
    $('#register_button').on('click', function () {

      var name = $('#name').val();
      var email = $('#email').val();
      var phoneNO = $('#phoneNO').val();
      var address = $('#address').val();
      var password = $('#password').val();
      var password2 = $('#password2').val();
      var min = 2;
      var max = 50;
      var mail = /^([a-zA-Z0-9-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var passmin = 5;
      var passmax = 30;
      var phmin = 9;
      var phmax = 13;
      let namefield = document.querySelector('#namefield');
      let emailfield = document.querySelector('#emailfield');
      let phonefield = document.querySelector('#phonefield');
      let adressfield = document.querySelector('#adressfield');
      let pass1field = document.querySelector('#pass1field');
      let pass2field = document.querySelector('#pass2field');
      let match = document.querySelector('#match');
      let exists = document.querySelector('#exists');
      let nameLen = document.querySelector('#nameLen');
      let emailformat = document.querySelector('#emailformat');
      let passwordLen = document.querySelector('#passwordLen');
      let phonLen = document.querySelector('#phonLen');
      if (name != "") {
        if (email != "") {
          if (phoneNO != "") {
            if (address != "") {
              if (password != "") {
                if (password2 != "") {
                  if (password == password2) {
                    if (name.length > min && name.length < max) {
                      if (mail.test(email)) {
                        if (phoneNO.length > phmin && password.length < phmax) {
                          if (password.length > passmin && password.length < passmax) {

                            $.ajax({
                              url: "../database/registercode.php",
                              type: "POST",
                              data: {
                                type: 1,
                                name: name,
                                email: email,
                                phoneNO: phoneNO,
                                address: address,
                                password: password
                              },
                              cache: false,
                              success: function (dataResult) {
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                  alert('Registration Successful');
                                  window.location = "foodpage.php";
                                } else if (dataResult.statusCode == 201) {
                                  exists.style.display = "block";
                                  passwordLen.style.display = "none";
                                  phonLen.style.display = "none";
                                  emailformat.style.display = "none";
                                  nameLen.style.display = "none";
                                  match.style.display = "none";
                                  namefield.style.display = "none";
                                  emailfield.style.display = "none";
                                  phonefield.style.display = "none";
                                  adressfield.style.display = "none";
                                  pass1field.style.display = "none";
                                  pass2field.style.display = "none";
                                  event.preventDefault();
                                }

                              }
                            });
                          } else {
                            exists.style.display = "none";
                            passwordLen.style.display = "block";
                            phonLen.style.display = "none";
                            emailformat.style.display = "none";
                            nameLen.style.display = "none";
                            match.style.display = "none";
                            namefield.style.display = "none";
                            emailfield.style.display = "none";
                            phonefield.style.display = "none";
                            adressfield.style.display = "none";
                            pass1field.style.display = "none";
                            pass2field.style.display = "none";
                            event.preventDefault();
                          }
                        } else {
                          exists.style.display = "none";
                          passwordLen.style.display = "none";
                          phonLen.style.display = "block";
                          emailformat.style.display = "none";
                          nameLen.style.display = "none";
                          match.style.display = "none";
                          namefield.style.display = "none";
                          emailfield.style.display = "none";
                          phonefield.style.display = "none";
                          adressfield.style.display = "none";
                          pass1field.style.display = "none";
                          pass2field.style.display = "none";
                          event.preventDefault();
                        }
                      } else {
                        exists.style.display = "none";
                        passwordLen.style.display = "none";
                        phonLen.style.display = "none";
                        emailformat.style.display = "block";
                        nameLen.style.display = "none";
                        match.style.display = "none";
                        namefield.style.display = "none";
                        emailfield.style.display = "none";
                        phonefield.style.display = "none";
                        adressfield.style.display = "none";
                        pass1field.style.display = "none";
                        pass2field.style.display = "none";
                        event.preventDefault();
                      }
                    } else {
                      exists.style.display = "none";
                      passwordLen.style.display = "none";
                      phonLen.style.display = "none";
                      emailformat.style.display = "none";
                      nameLen.style.display = "block";
                      match.style.display = "none";
                      namefield.style.display = "none";
                      emailfield.style.display = "none";
                      phonefield.style.display = "none";
                      adressfield.style.display = "none";
                      pass1field.style.display = "none";
                      pass2field.style.display = "none";
                      event.preventDefault();
                    }
                  } else {
                    exists.style.display = "none";
                    passwordLen.style.display = "none";
                    phonLen.style.display = "none";
                    emailformat.style.display = "none";
                    nameLen.style.display = "none";
                    match.style.display = "block";
                    namefield.style.display = "none";
                    emailfield.style.display = "none";
                    phonefield.style.display = "none";
                    adressfield.style.display = "none";
                    pass1field.style.display = "none";
                    pass2field.style.display = "none";
                    event.preventDefault();
                  }

                } else {
                  exists.style.display = "none";
                  passwordLen.style.display = "none";
                  phonLen.style.display = "none";
                  emailformat.style.display = "none";
                  nameLen.style.display = "none";
                  match.style.display = "none";
                  namefield.style.display = "none";
                  emailfield.style.display = "none";
                  phonefield.style.display = "none";
                  adressfield.style.display = "none";
                  pass1field.style.display = "none";
                  pass2field.style.display = "block";
                  event.preventDefault();
                }
              } else {
                exists.style.display = "none";
                passwordLen.style.display = "none";
                phonLen.style.display = "none";
                emailformat.style.display = "none";
                nameLen.style.display = "none";
                match.style.display = "none";
                namefield.style.display = "none";
                emailfield.style.display = "none";
                phonefield.style.display = "none";
                adressfield.style.display = "none";
                pass1field.style.display = "block";
                pass2field.style.display = "none";
                event.preventDefault();
              }
            } else {
              exists.style.display = "none";
              passwordLen.style.display = "none";
              phonLen.style.display = "none";
              emailformat.style.display = "none";
              nameLen.style.display = "none";
              match.style.display = "none";
              namefield.style.display = "none";
              emailfield.style.display = "none";
              phonefield.style.display = "none";
              adressfield.style.display = "block";
              pass1field.style.display = "none";
              pass2field.style.display = "none";
              event.preventDefault();
            }
          } else {
            exists.style.display = "none";
            passwordLen.style.display = "none";
            phonLen.style.display = "none";
            emailformat.style.display = "none";
            nameLen.style.display = "none";
            match.style.display = "none";
            namefield.style.display = "none";
            emailfield.style.display = "none";
            phonefield.style.display = "block";
            adressfield.style.display = "none";
            pass1field.style.display = "none";
            pass2field.style.display = "none";
            event.preventDefault();
          }
        } else {
          exists.style.display = "none";
          passwordLen.style.display = "none";
          phonLen.style.display = "none";
          emailformat.style.display = "none";
          nameLen.style.display = "none";
          match.style.display = "none";
          namefield.style.display = "none";
          emailfield.style.display = "block";
          phonefield.style.display = "none";
          adressfield.style.display = "none";
          pass1field.style.display = "none";
          pass2field.style.display = "none";
          event.preventDefault();
        }
      } else {
        exists.style.display = "none";
        passwordLen.style.display = "none";
        phonLen.style.display = "none";
        emailformat.style.display = "none";
        nameLen.style.display = "none";
        match.style.display = "none";
        namefield.style.display = "block";
        emailfield.style.display = "none";
        phonefield.style.display = "none";
        adressfield.style.display = "none";
        pass1field.style.display = "none";
        pass2field.style.display = "none";
        event.preventDefault();
      }
    });


    $('#login_button').click(function () {

      var login = $('#login_button').val();
      var Email = $('#Email').val();
      var Password = $('#Password').val();
      if (Email == '' || Password == '') {
        please.style.display = "block";
        event.preventDefault();
      } else {
        let please = document.querySelector('#please');
        let notFound = document.querySelector('#notFound');
        let wrong = document.querySelector('#wrong');

        $.post("../database/logincode.php", {
          login: login,
          Email: Email,
          Password: Password
        }).done(function (data) {

          //alert(data);  
          if (data == 'wrong') {
            please.style.display = "none";
            wrong.style.display = "block";
            notFound.style.display = "none";
            event.preventDefault();
          } else if (data == 'notFound') {
            please.style.display = "none";
            wrong.style.display = "none";
            notFound.style.display = "block";
            event.preventDefault();
          } else {
            window.history.go(0);
          }
        });
      };
    });

  });
</script>