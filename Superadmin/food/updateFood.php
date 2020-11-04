<?php
 include "../../database/connection.php";
 include "../../database/pdo.php";
 session_start();
 function upload_food($path, $file)
{
    $targetDir = $path;
    $default = $_SESSION['image'];

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
    // return default image
    return $default;
}


 if(isset($_POST['update'])){
    $f_id=$_POST['f_id'];
    $cart_id=$_POST['cart_id'];
    $nameFood=$_POST['nameFood'];
    $description=$_POST['description'];
    $price=$_POST['price'];

  $sql="update food set cart_id='$cart_id',nameFood='$nameFood',description='$description',price='$price' where f_id='$f_id'";
	$result=$conn->query($sql);
     echo "<script>alert('Congratulations,Update Succesful!!!');window.location.assign('food.php');</script>";
   
}


if(isset($_POST['foodpictureSave'])) {
    $f_id = $_POST['f_id'];
    $files = $_FILES['foodUpload'];
    $foodImage = upload_food('../../image/food/', $files);

    $sql="update food set `imageFood`= '$foodImage' where f_id='$f_id'";
	$result=$conn->query($sql);
    echo "<script>alert('Congratulations,Update Succesful!!!');window.history.back();</script>";
    } 