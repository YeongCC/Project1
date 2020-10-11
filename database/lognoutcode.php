 
<?php
session_start();
unset($_SESSION["userEmail-foodtiger"]);
header("location: ../index.php");
?>