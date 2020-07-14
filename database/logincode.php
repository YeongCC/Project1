<?php
include "connection.php";
if($_POST)
   {
       $Email = $_POST['Email'];
       $Password = $_POST['Password'];
       
       $sql = "SELECT * FROM `customer` where Email = '".$Email."' and Password = '".$Password."' ";
       $query =  mysqli_query($conn, $sql);
       if(mysqli_num_rows($query)>0)
       {
           $row = mysqli_fetch_assoc($query);
           session_start();
           $_SESSION['Email'] = $row['Email'];
           header('Location: ../userprofile.php');
       }
       else
       {
           echo "<script> alert('Invalid Email or Password.'); </script>";
       }
   }
?>