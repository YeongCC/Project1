<?php
 include "../../database/connection.php";
 include "../../database/pdo.php";

 function upload_food($path, $file)
 {
     $targetDir = $path;
     // get the filename
     $filename = basename($file['name']);
     $targetFilePath = $targetDir . $filename;
     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
 
     if (!empty($filename)) {
         // allow certain file format
         $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
         if (in_array($fileType, $allowType)) {
             // upload file to the server
             if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                 return $targetFilePath;
             }
         }
     }

 }

 if(isset($_POST['insert'])) {
    $cart_id = $_POST['cart_id'];
    $nameFood = $_POST['nameFood'];
    $description = $_POST['description'];
    $files = $_FILES['foodUpload'];
    $foodImage = upload_food('../../image/food/', $files);
    $price=$_POST['price'];

if(!empty($foodImage)){
	$sql = "INSERT into food(f_id,cart_id,nameFood,description,imageFood,price)values('','$cart_id', '$nameFood', '$description', '$foodImage','$price')";
  $query = mysqli_query($conn,$sql );
	echo "<script>alert('Congratulations,Insert Succesful!!!'); window.location.assign('food.php');</script>";
}else{
    echo "<script>alert('Invalid !!! Please put picture! '); window.location.assign('FoodList.php');</script>";
  }	 	  	
    } else {
		echo "<script>alert('Invalid !'); window.location.assign('FoodList.php');</script>";
    }

    
