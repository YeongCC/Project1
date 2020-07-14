<?php
include "connection.php";
if(isset($_POST['insert'])){
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $PhoneNo=$_POST['PhoneNo'];
    $Address=$_POST['Address'];
    $Password=$_POST['Password'];
    $Password2=$_POST['Password2'];

    $sql="insert into customer values('$Name','$Email','$PhoneNo','$Address','$Password')";
    
    // Your validation code.
    if ($Password != $Password2) {
        echo "<script>alert('Your passwords do not match. Please type carefully.');</script>";
    }
    // Passwords match
    if ($Password == $Password2){ 
        $result=$conn->query($sql);
        echo "<script>alert('Congratulations,Sign Up Successful!!! Try To Login Now.');window.location.assign('../index.php');</script>";
    }
    
}
?>