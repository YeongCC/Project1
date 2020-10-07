<?php

session_start();
try {

    if (!file_exists('pdo.php' ))
        throw new Exception();
    else
        require_once('pdo.php' ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';

	header('location:../Superadmin/Blogmanage.php');

	exit();
	
}

if (!isset($_REQUEST['id'])) {

	$_SESSION['msg'] = 'Invalid ID!';

	header('location: ../Superadmin/Blogmanage.php');

	exit();
} 

	$id = $_REQUEST['id'];


	$sql = "DELETE FROM blog WHERE id = ?";
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$id])) {

    	$_SESSION['msg'] = 'Blog Deleted!';

		header('location: ../Superadmin/Blogmanage.php');
    	
    } else {

    	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

		header('location: ../Superadmin/Blogmanage.php');

    }

