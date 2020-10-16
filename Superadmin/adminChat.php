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
    <script src="../../js/picture.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="../../css/pic.css" rel="stylesheet">

</head>
<?php
include "../database/connection.php";
session_start();
if (isset($_SESSION['Superadmin'])) {
	$Email = $_SESSION['Superadmin'];
	$query = "SELECT * FROM admin WHERE Email = '$Email'" ; 
	$result= mysqli_query($conn , $query) or die (mysqli_error($conn));
	if (mysqli_num_rows($result) > 0 ) {
		$row = mysqli_fetch_array($result);
		$userid = $row['ad_id'];
		$Email = $row['Email'];
		$userpassword = $row['Password'];
		$name = $row['Name'];
        $Position = $row['Position'];

    }}

if(isset($_GET['Email'])){
	$Email=$_GET['Email']; 
	$sql="select * from customer where Email ='$Email'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){
      $Email = $row['Email'];
      $Name = $row['Name'];
		}
	}
}
$_SESSION['curentUser'] =$Email ;
$_SESSION['curentName'] =$Name ;
?>
<div class="container">
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-4">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="panel-title">Online Chat --<?php echo $Name?> </div>
                <div style="float:right; font-size: 85%; position: relative; top:-18px"><a
                        href="viewChatList.php">Back</a></div>
            </div>
            <div class="panel-body">
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <div style="height:500px; overflow-y: scroll;padding:16px;background-color: #FFFFF0;">
                        <div id="chat_history_"></div>
                    </div>

                    <div class="d-block text-left mt-5">
                        <textarea placeholder="Type message.." name="message" id="message" class="message"
                            style="height: 100px; width:100%;" required></textarea>
                    </div>
                    <input type="text" class="form-control" name="from_user" id="from_user" value="admin"
                        style="display: none;" />
                    <input type="text" class="form-control" name="to_user" id="to_user" value="<?php echo $Email?>"
                        style="display: none;" />
                </div>
                <div class="form-group">
                    <!-- Button -->
                    <div class="col-md-offset-3 col-md-6">
                        <button id="chat_but" type="submit" name="chat_but" class="btn btn-info btn-block chat_but"><i
                                class="icon-hand-right"></i> Send</button>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-offset-3 col-md-6">
    <form action="../database/EndCoversation.php" method="POST">
        <button type="submit" name="update" class="btn btn-info btn-block"> End Conversation</button>
    </form>
</div>

</html>
<script>
    $(document).on('click', '.chat_but', function () {
        var from_user = $('#from_user').val();
        var to_user = $('#to_user').val();
        var message = $.trim($('#message').val());
        if (message != "") {
            $.ajax({
                url: "insertAdminChat.php",
                type: "POST",
                data: {
                    from_user: from_user,
                    to_user: to_user,
                    message: message
                },
                cache: false,
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        var message = $.trim($('#message').val(" "));
                    } else if (dataResult.statusCode == 201) {
                        alert("fail");
                        event.preventDefault();
                    }
                }
            });
        } else {
            alert('Please fill all the field !');
        };
    });

    setInterval(function () {
        $('#chat_history_').load("AdminChatShow.php");
    });
</script>