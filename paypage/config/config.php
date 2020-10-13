<?php
require_once "../vendor/autoload.php";
 
use Omnipay\Omnipay;
 
define('CLIENT_ID', 'ATmVG42edocM3OSfaCLqkynqOAufiy9sH9jmCmfm5Or5s7KOzT926452OeUZiSjuq6MoyH_cdoabvRg-');
define('CLIENT_SECRET', 'EDNFQ-ctr6YPvQTE2a-uulYT0k6b3lQD0wEsLZip1LG7_5i-EPdzrZOcpKrYghA7fw_BnDkmIkS7C5RA');
 
define('PAYPAL_RETURN_URL', 'http://localhost/foodtiger-master/paypage/paypal/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/foodtiger-master/paypage/paypal/cancel.php');
define('PAYPAL_CURRENCY', 'MYR'); // set your currency here
 
// Connect with the database 
$db = new mysqli('localhost', 'root', '0612', 'foodtiger'); 
 
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}
 
$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live