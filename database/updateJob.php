<?php
$connect = new PDO("mysql:host=localhost;dbname=foodtiger", "root", "0612");
 if(isset($_POST['update_id'])) {
	$query="UPDATE requestjob 
	SET status = 'approve' 
	WHERE id = '".$_POST["update_id"]."'";
$statement = $connect->prepare($query);

$statement->execute();
    }
    
    if(isset($_POST['reject_id'])) {
        $query="UPDATE requestjob 
        SET status = 'reject' 
        WHERE id = '".$_POST["reject_id"]."'";
     $statement = $connect->prepare($query);

     $statement->execute();
        }  
    ?>