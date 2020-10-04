 
<?php
session_start();
unset($_SESSION["deliveryEmail"]);
header("location:adminlogin.php");
?>