<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<header>
  <nav class="navbar navbar-expand-md  navbar-dark fixed-top"
    style="background-image: linear-gradient( 109.6deg,  rgba(255,207,84,1) 11.2%, rgba(255,158,27,1) 91.1% );">
    <a class="navbar-brand" href="../index.php"><img src="../image/logo 256x256.png" alt="logo" width="30" height="30"
        style="margin-left:30%; display: block;max-width: 100%;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 " id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="category.php">Categories</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="foodpage.php">Foods</a>
        </li>
        <?php if (isset($_SESSION['userEmail-foodtiger'])) { 
           ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" data-toggle="dropdown">
            <?php echo $_SESSION['Name'] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../userprofile.php">Profile</a>
            <a class="dropdown-item" href="cart.php">Cart</a>
            <a class="dropdown-item" href="../paymenthistory.php">Payment History</a>
          </div>
        </li>
        <li class="nav-item active"><a class="nav-link" href="../database/lognoutcode.php" style="width:auto;"
            onclick="return confirm('Are you sure?')">Logout</a></li>
        <?php
        } else { ?>
        <li class="nav-item active"><a class="nav-link" href="#" data-toggle="modal" data-target="#login_form"
            style="width:auto;">Login</a></li>
        <li class="nav-item active"><a class="nav-link" href="#" data-toggle="modal" data-target="#signUp"
            style="width:auto;">Sign Up</a></li>
        <?php
        }
        ?>
      </ul>
    </div>
  </nav>
</header>
<!-- Login -->
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
        <span class="psw">No Account?<a href="#" data-toggle="modal" data-target="#signUp">Register</a></span>
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
                                  window.location = "../index.php";
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