 
<?php
session_start();
unset($_SESSION["Superadmin"]);
header("location:adminlogin.php");
?>