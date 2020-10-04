<?php
$connect = new PDO("mysql:host=localhost;dbname=foodtiger", "root", "0612");

if(isset($_POST["chat_id"]))
{
	$query = "
	UPDATE chat 
	SET status = '2' 
	WHERE id = '".$_POST["chat_id"]."'
	";

	$statement = $connect->prepare($query);

	$statement->execute();
}

?>