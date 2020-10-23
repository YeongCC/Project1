<?php
 include "connection.php";
 include "pdo.php";

 function upload_blog($path, $file)
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
     }else{
	
     }

 }

 if(isset($_POST['insert'])) {
	
    $Email = $_POST['Email'];
    $Author = $_POST['Author'];
    $description = addslashes($_POST['description']);
    $contain = addslashes($_POST['contain']);
    $title = $_POST['title'];
    $files = $_FILES['blogUpload'];
    $blogImage = upload_blog('../image/blog/', $files);

    if(!empty($blogImage)){
	$sql="INSERT INTO `blog`(`id`, `title`,`description`,`contain`, `image`, `Email`, `Author` ) VALUES ('-','$title ',' $description','$contain','$blogImage','$Email','$Author')";
    $query = mysqli_query($conn,$sql );
	echo "<script>alert('Congratulations,Insert Succesful!!!');window.location.assign('../Superadmin/Blogmanage.php'); </script>";
}else{
    echo "<script>alert('Invalid !!! Please put picture! '); window.history.back();</script>";
}	
    } else {
		echo "<script>alert('Invalid !'); window.location.assign('../Superadmin/insertBlog.php');</script>";
    }