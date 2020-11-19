<?php
include "connection.php";
$sql = "DELETE cus_order , orders FROM cus_order INNER JOIN orders WHERE cus_order.order_id= orders.cust_id and cus_order.status ='have not'";

if ($conn->query($sql) == TRUE) {
    header("location: ../index.php");
} 

?>