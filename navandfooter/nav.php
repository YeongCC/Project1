<header>        
        <!-- nav bar -->
        <nav class="navbar navbar-expand-md bg-warning navbar-dark fixed-top">
            <!-- Brand -->
            <a class="navbar-brand" href="index.php"><img src="image/logo 256x256.png" alt="logo" width="30" height="30" style="margin-left:30%;"></a>
          
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
                        <a class="nav-link" href="category.php">Categories</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="food.php">Foods</a>
                    </li>
                    <?php
                    if (isset($_SESSION['Name'])) { ?>
                       <li class="nav-item active"><a href="userprofile.php" href="#" class="nav-link">Hi, <?php echo $_SESSION['Name']?></a></li>
                      <li class="nav-item active"><a class="nav-link" href="lognout.php" style="width:auto;" onclick="return confirm('Are you sure?')">Logout</a></li>
                      <li class="nav-item active">
                      <a class="nav-link" href="cart.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                      </li>
                     <?php
                     } else { ?>
                       <li class='nav-item active'><a class='nav-link' href="#" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</a></li>
                       <li class="nav-item active"><a class="nav-link" href="#" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign Up</a></li>
                        <?php
                     } 
                    ?>
                </ul>
            </div>
          </nav>
          <!-- Login -->
          <div id="id01" class="modal">
            <form class="modal-content animate" action="database/logincode.php" method="post">
              <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                </div>
                <div class="container1">
                  <h1>Login</h1>
                  <hr>
                <label for="Email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="Email" id="Email" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="Password" required>
                    
                <button type="submit" class="button2" name="login" id="login">Login</button>
                </div>

                <div class="container1" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw">No Account??<a href="#" >Register</a></span>
                </div>
            </form>
            </div>


            <!-- Sign Up -->
            <div id="id02" class="modal">
                <form class="modal-content animate" name="register" action="database/registercode.php" method="POST"  style="margin-top:0%;">
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
    <script>
    function logout() {
    alert("Log Out Successful!!!!!");
    }
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
