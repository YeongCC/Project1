 
<?php
session_start();
unset($_SESSION["userEmail-foodtiger"]);
unset($_SESSION["autoLoginEmail"]);
unset($_SESSION["autoLoginPassword"]);
unset($_SESSION["cart"]);
header("location: deletecart.php");
?>