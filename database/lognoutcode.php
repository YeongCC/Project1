 
<?php
session_start();
unset($_SESSION["userEmail-foodtiger"]);
unset($_SESSION["autoLoginEmail"]);
unset($_SESSION["autoLoginPassword"]);
header("location: ../index.php");
?>