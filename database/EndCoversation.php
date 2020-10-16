<?php
require 'connection.php';
session_start();
if(isset($_POST["update"]))
{
   $Email=$_SESSION['curentUser']  ;
    $sql="	UPDATE chat 
	SET status = '3' 
	WHERE to_user = '$Email' OR from_user= '$Email'";
    $query = mysqli_query($conn,$sql );

    echo '<script>window.location.assign("../Superadmin/viewChatList.php");</script>';
}

?>