<?php
include "database/connection.php";
session_start(); 
if(!isset($_SESSION['userEmail-foodtiger']))
{
	header("location:index.php");
}

if (isset($_SESSION['userEmail'])) {
	$Email = $_SESSION['userEmail'];
	$query = "SELECT * FROM customer WHERE Email = '$Email'" ; 
	$result= mysqli_query($conn , $query) or die (mysqli_error($conn));
	if (mysqli_num_rows($result) > 0 ) {
		$row = mysqli_fetch_array($result);
		$userid = $row['cus_id'];
		$Email = $row['Email'];
		$Name = $row['Name'];
        $PhoneNo = $row['PhoneNo'];
        $Address = $row['Address'];

	}}
?>
<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/nav-bar.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/aboutus.css">
    <link rel="stylesheet" href="css/chat.css">
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
        <div class="container" style="margin-top: 5%;">

            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h6 class="border-bottom border-gray pb-2 mb-0">Online Life Chat</h6>
                <div class="media text-muted pt-3">
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                        </div>
                    </div>
                </div>
                <!-- ////////////////////////////////////////////////////// -->
                <div style="height:500px; overflow-y: scroll;padding:16px;background-color: #FFFFF0;">
                    <div id="chat_history_"></div>
                </div>
                <!-- ////////////////////////////////////////////////////// -->

                <div class="d-block text-left mt-5">
                    <input type="text" class="form-control" name="to_user" id="to_user" value="admin"
                        style="display: none;" />
                    <input type="text" class="form-control" name="from_user" id="from_user"
                        value="<?php echo $_SESSION['userEmail']; ?>" style="display: none;" />
                    <textarea placeholder="Type message.." name="message" id="message" class="message"
                        style="height: 100px; width:100%;" required></textarea>

                    <button type="submit" class="btn btn-warning chat_but" id="chat_but" name="chat_but"
                        style="margin-left:40%;height: 50px; width:200px;">Send</button>
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


<script>
    $(document).on('click', '.chat_but', function () {
        var from_user = $('#from_user').val();
        var to_user = $('#to_user').val();
        var message = $.trim($('#message').val());
        if (message != "") {
            $.ajax({
                url: "database/insertChat.php",
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
                        $('#chat_history_').html(data);
                    }
                }
            });
        } else {
            alert('Please fill all the field !');
        };
    });
    setInterval(function () {
        $('#chat_history_').load("database/ChatShow.php").fadeIn("slow");
    }, 1000);

	$(document).on('click', '.remove_chat', function(){
		var chat_id = $(this).attr('id');
		if(confirm("Are you sure you want to remove this chat?"))
		{
			$.ajax({
				url:"database/removechat.php",
				method:"POST",
				data:{chat_id:chat_id},
				success:function(data)
				{
					update_chat_history_data();
				}
			})
		}
	});
 
</script>