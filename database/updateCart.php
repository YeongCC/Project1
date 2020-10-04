<?php
session_start();
$food_quantity = $_POST["U_quantity"];
$food_id =$_POST["Ufood_id"];
$food_name = $_POST["Ufood_name"];
$food_price = $_POST["Ufood_price"];
$c_id = $_POST["Uc_id"];
$event=$_POST["event"];
$count = count($_SESSION["cart"]);
$item_array_id = array_column($_SESSION["cart"], "food_id");
$item_array = array($food_quantity,$food_id,$food_name,$food_price,$c_id,$event);
if($event == "Update"){
    
    $_SESSION["cart"][$count]=$item_array;
    echo '<script>window.location="../cart.php"</script>';
}

?>