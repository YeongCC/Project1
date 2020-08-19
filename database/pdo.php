<?php

include_once "connection.php";

try {
    $pdoconn = new PDO("mysql:host=$dbHost; dbname=$dbDatabase", $dbUsername, $dbPassword, array( PDO::ATTR_PERSISTENT => true ));
    $pdoconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    throw new Exception();
    
}


?>