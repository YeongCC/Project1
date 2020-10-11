<?php
 include "../../database/connection.php";
 include "../../database/pdo.php";

 function upload_category($path, $file)
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
	
  	$name = $_POST['name'];
  	$description = $_POST['description'];
    $files = $_FILES['categoryUpload'];
    $categoryImage = upload_category('../../image/category/', $files);
if(!empty($categoryImage)){
	$sql = "INSERT into category(c_id, name, description, image)values('', '$name', '$description', '$categoryImage')";
  $query = mysqli_query($conn,$sql );
	echo "<script>alert('Congratulations,Insert Succesful!!!'); window.location.assign('category.php');</script>";
}else{
  echo "<script>alert('Invalid !!! Please put picture! '); window.location.assign('CategoryList.php');</script>";
}	 	
    } else {
		echo "<script>alert('Invalid !'); window.location.assign('CategoryList.php');</script>";
    }


