<?php
session_start();
require '../database/connection.php';
unset($_SESSION["cart"]);
header("location:../food/customer/viewfood.php");

  ?>