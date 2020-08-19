<?php

session_start();
try {

    if (!file_exists('../database/pdo.php' ))
        throw new Exception();
    else
        require_once('../database/pdo.php' ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';

	header('location: viewPayhistory.php');

	exit();
	
}

if (!isset($_REQUEST['order_id'])) {

	$_SESSION['msg'] = 'Invalid ID!';

	header('location: viewPayhistory.php');

	exit();
} 

	$order_id = $_REQUEST['order_id'];


	$sql = "DELETE FROM payment WHERE order_id = ?";
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$order_id])) {

    	$_SESSION['msg'] = 'Blog Deleted!';

		header('location: viewPayhistory.php');
    	
    } else {

    	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

		header('location: viewPayhistory.php');

    }

