<?php
   require_once('vendor/autoload.php');
   require_once('config/db.php');
   require_once('lib/pdo_db.php');
   require_once('models/Customer.php');
   require_once('models/Transaction.php');
   session_start();
   $gtotal = 0;
   foreach($_SESSION["cart"] as $keys => $values)
   {
     $foodname = $values["food_name"];
     $quantity = $values["food_quantity"];
     $price =  $values["food_price"];
     $total = ($values["food_quantity"] * $values["food_price"]);
     $tax = $total*0.1;
     $gtotal = $gtotal + $total + $tax;
   }
  \Stripe\Stripe::setApikey('sk_test_njtXWXkDY0JmPll16Pc2zY3R0059wgU4LV');

  $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

  $Name = $_POST['Name'];
  $order_id = $_POST['order_id'];
  $PhoneNo = $_POST['PhoneNo'];
  $email = $_POST['email'];
  $Address = $_POST['Address'];
  $price = $_POST['price'];
  $time_date = $_POST['time_date'];
  $payment_way = $_POST['payment_way'];
  $status = $_POST['status'];
  $receive = $_POST['receive'];
  $token= $_POST['stripeToken'];

//create customer in stripe
  $customer = \Stripe\Customer::create(array(
   "email" => $email,
   "source" => $token
 ));

//charge Customer
$charge = \Stripe\Charge::create(array(
   "amount" =>  $gtotal*100,
   "currency" => "myr",
   "description" => "Food",
   "customer" => $customer->id
 ));

 // Customer Data
$customerData = [
   'id' => $charge->customer,
   'order_id' => $order_id,
   'Name' => $Name,
   'PhoneNo' => $PhoneNo,
   'email' => $email,
   'Address' => $Address,
   'price' => $price,
   'time_date' => $time_date,
   'payment_way' => $payment_way,
   'status' => $status,
   'receive'=>$receive,
 ];
 
 // Instantiate Customer
$customer = new Customer();

// Add Customer To DB
$customer->addCustomer($customerData);


// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);

// Redirect to success
header('Location: doneStripe.php?tid='.$charge->id.'&product='.$charge->description);
