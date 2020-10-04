<?php
$host = "localhost";
$user= "root";
$pwd = "0612";
$database = "foodtiger";

try {
    $pdoconn = new PDO("mysql:host=$host; dbname=$database", $user, $pwd, array( PDO::ATTR_PERSISTENT => true ));
    $pdoconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    throw new Exception();
    
}


