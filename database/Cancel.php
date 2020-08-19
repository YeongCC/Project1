<?php
session_start();
require 'connection.php';
unset($_SESSION["cart"]);
header("location: ../customer/foodpage.php");


  ?>