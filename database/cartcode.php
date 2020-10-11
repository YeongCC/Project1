<?php
session_start();
require 'connection.php';
if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
if(array_key_exists('cart', $_SESSION) AND !empty($_SESSION['cart'])){
    unset($_SESSION['cart'][$_GET['id']]);
    echo '<script>alert("Food has been removed")</script>';
    echo '<script>window.location="../customer/cart.php"</script>';
}
}
}




if(isset($_GET["action"]))
{
if($_GET["action"] == "empty")
{
foreach($_SESSION["cart"] as $keys => $values)
{
unset($_SESSION["cart"]);
echo '<script>alert("Cart is made empty!")</script>';
echo '<script>window.location="../customer/cart.php"</script>';
}
}
}

?>



