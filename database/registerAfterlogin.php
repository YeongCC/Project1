<?php
include "connection.php";
session_start();

$Email = $_SESSION['autoLoginEmail'];
$Password = $_SESSION['autoLoginPassword'];
mysqli_real_escape_string($conn, $Email);
mysqli_real_escape_string($conn, $Password);
$query = "SELECT * FROM customer WHERE Email = '$Email'";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $cus_id = $row['cus_id'];
        $Name = $row['Name'];
        $Email = $row['Email'];
        $pass = $row['Password'];
        $PhoneNo = $row['PhoneNo'];
        $Address = $row['Address'];
    }
    if (password_verify($Password, $pass)) {
        $_SESSION['cus_id'] = $cus_id;
        $_SESSION['Name'] = $Name;
        $_SESSION['Email'] = $Email;
        $_SESSION['PhoneNo'] = $PhoneNo;
        $_SESSION['Address'] = $Address;
        $_SESSION['userEmail-foodtiger'] = $Email;
        // echo "<script>window.location.assign('../index.php');</script>";
        echo "<script>window.history.back();</script>";
    }
}
