<?php

session_start();
try {

    if (!file_exists('../database/pdo.php' ))
        throw new Exception();
    else
        require_once('../database/pdo.php' ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';

	header('location: viewCustomerAcc.php');

	exit();
	
}

if (!isset($_REQUEST['Email'])) {

	$_SESSION['msg'] = 'Invalid ID!';

	header('location: viewCustomerAcc.php');

	exit();
} 

	$Email = $_REQUEST['Email'];


	$sql = "DELETE FROM customer WHERE Email = ?";
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$Email])) {

    	$_SESSION['msg'] = 'Blog Deleted!';

		header('location: viewCustomerAcc.php');
    	
    } else {

    	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

		header('location: viewCustomerAcc.php');

    }

