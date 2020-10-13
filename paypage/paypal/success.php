<?php
require_once '../config/config.php';
require_once "../config/connection.php";
session_start();

// Once the transaction has been approved, we need to complete it.
if (array_key_exists('paymentId', $_GET) && array_key_exists('PayerID', $_GET)) {
    $transaction = $gateway->completePurchase(array(
        'payer_id'             => $_GET['PayerID'],
        'transactionReference' => $_GET['paymentId'],
    ));
    $response = $transaction->send();
 
    if ($response->isSuccessful()) {
        // The customer has successfully paid.
        $arr_body = $response->getData();
        $payment_id = $arr_body['id'];
        $payer_id = $arr_body['payer']['payer_info']['payer_id'];
        $amount = $arr_body['transactions'][0]['amount']['total'];
        $currency = PAYPAL_CURRENCY;
        $payment_status = $arr_body['state'];
    $Name=$_SESSION['n'];
    $PhoneNo=$_SESSION['p'];
    $Address= $_SESSION['a']; 
    $order_id=$_SESSION['o'];
    $email=$_SESSION['e']; 
        $sql = "INSERT into payment(id,order_id, email, Name, PhoneNo, Address,price,payment_way,status,receive)values('','$order_id', '$email', '$Name', '$PhoneNo', '$Address','$amount','paypal','paid','no')";
        $result=$conn->query($sql);
        // Insert transaction data into the database
        $Email=$_SESSION['userEmail-foodtiger'];
        $sql = "select * from payment where email = '$Email' ";
     $result=$conn->query($sql);
     if($result->num_rows>0){
       while($row=$result->fetch_assoc()){
          $order_id=$row['order_id'];
       
     }
     }else{
       $order_id='';

     }
        $isPaymentExist = $db->query("SELECT * FROM paypal WHERE payment_id = '".$order_id."'");
 
        if($isPaymentExist->num_rows == 0) { 
            $insert = $db->query("INSERT INTO paypal(payment_id, payer_id, amount, currency, payment_status) VALUES('". $order_id ."', '". $payer_id ."','". $amount ."', '". $currency ."', '". $payment_status ."');");
 
        }

        echo "<script>window.location.assign('../donePaypal.php');</script>";
    } else {
        echo $response->getMessage();
    }
} else {
    echo 'Transaction is declined';
}