<?php
 include "../../database/connection.php";
 include "../../database/pdo.php";
 session_start();
 function upload_category($path, $file)
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

if (isset($_POST['update'])) {
    $c_id=$_POST['c_id'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    $category_exixts=$_POST['category_exixts'];
    $files = $_FILES['categoryUpload'];
    $categoryImage = upload_category('../../image/category/', $files);


    $sql = "update category set name='$name',description='$description',image='$categoryImage',category_exixts='$category_exixts' where c_id='$c_id'";
    echo "<script>alert('Congratulations,Update Succesful!!!');window.location.assign('category.php');</script>";
    $result = $conn->query($sql);
}

