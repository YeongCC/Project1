<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/picture.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


</head>
<?php
session_start();

?>
<div class="container">
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Add Blog</div>
                <div style="float:right; font-size: 85%; position: relative; top:-18px"><a
                        href="Blogmanage.php">Dismiss</a></div>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="../database/insertBlogCode.php" method="POST"
                    enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="title" class="col-md-3 control-label">Title :</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="image" class="col-md-3 control-label">Image :</label>
                        <div class="col-md-offset-5 col-md-6">
                            <img src="../image/uknown.png" onclick="triggerClick()" id="profileDisplay"
                                style="width: 60%;">
                            <input name="blogUpload" type="file" id="image" onchange="displayImage(this)"
                                style="display: none;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contain" class="col-md-3 control-label">Contain :</label>
                        <div class="col-md-9">
                            <textarea name="contain" id="contain"
                                style=" overflow-y: scroll;height: 400px; width:100%;"></textarea>
                        </div>
                    </div>
                    <input name="Email" value="<?php echo $_SESSION['Email'] ?>" style="display: none;">
                    <input name="Name" value="<?php echo $_SESSION['Name'] ?>" style="display: none;">
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-4 col-md-6">
                            <button id="btn-signup" type="submit" name="insert" class="btn btn-info btn-block" onclick="return confirm('Are you sure want to save?')"> Save</button>

                        </div>
                    </div>




                </form>
            </div>




        </div>
    </div>
</div>

</html>