<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['update'])){
        if(array_key_exists('cart', $_SESSION)){
            $_SESSION['cart'][$_SESSION['id']] = $_POST;
            header('location:../customer/cart.php');
        }
    }
}
if(isset($_POST['cancel'])) {
 echo "<script>window.location.assign('../customer/cart.php');</script>";
}

?>