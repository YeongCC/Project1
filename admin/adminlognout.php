 
<?php
session_start();
unset($_SESSION["adminEmail"]);
header("location:adminlogin.php");
?>