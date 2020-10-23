<?php
 include "connection.php";
 include "pdo.php";

 function upload_blog($path, $file)
 {
     $targetDir = $path;
     $filename = basename($file['name']);
     $targetFilePath = $targetDir . $filename;
     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
 
     if (!empty($filename)) {
         $allowType = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
         if (in_array($fileType, $allowType)) {
             if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                 return $targetFilePath;
             }
         }
     }else{

     }
	
 }

 if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $Email = $_POST['Email'];
    $Author = $_POST['Author'];
    $description = addslashes($_POST['description']);
    $contain = addslashes($_POST['contain']);
    $title = $_POST['title'];

	$sql="UPDATE `blog` SET `id`='$id',`title`= '$title',`description`='  $description',`contain`='$contain',`Email`='$Email',`Author`='$Author' WHERE id='$id'";
    $query = mysqli_query($conn,$sql );
	echo "<script>alert('Congratulations,Insert Succesful!!!'); window.location.assign('../Superadmin/Blogmanage.php');</script>";

    } 

    if(isset($_POST['pictureSave'])) {
        $id = $_POST['id'];
        $files = $_FILES['blogUpload'];
        $blogImage = upload_blog('../image/blog/', $files);
    
        $sql="UPDATE `blog` SET `id`='$id',`image`= '$blogImage' WHERE id='$id'";
        $query = mysqli_query($conn,$sql );
        echo "<script>window.history.back();</script>";
    
        } else {
            echo "<script>alert('Invalid !'); window.location.assign('../Superadmin/Blogmanage.php');</script>";
        }