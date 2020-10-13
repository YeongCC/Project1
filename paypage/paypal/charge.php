<?php
require_once '../config/config.php';
require_once "../config/connection.php";
session_start();
if (isset($_POST['submit'])) {
    $_SESSION['n']=$_POST['Name'];
    $_SESSION['o']=$_POST['order_id'];
    $_SESSION['p']=$_POST['PhoneNo']; 
    $_SESSION['e']=$_POST['email'];
    $_SESSION['a']=$_POST['Address'];
    try {
        $response = $gateway->purchase(array(
            'amount' => $_POST['amount'],   
            'currency' => PAYPAL_CURRENCY,
            'returnUrl' => PAYPAL_RETURN_URL,
            'cancelUrl' => PAYPAL_CANCEL_URL,
        ))->send();
 
        if ($response->isRedirect()) {
            $response->redirect(); 
        } else {
            echo $response->getMessage();
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}