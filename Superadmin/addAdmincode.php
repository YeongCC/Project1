<?php
include "../database/connection.php";
include "../database/pdo.php";

if(isset($_POST['insert'])) {
   
     $Name = $_POST['Name'];
     $Email = $_POST['Email'];
     $Password=$_POST['Password'];
     $Position = $_POST['Position'];

   $sql = "INSERT into admin(ad_id, Name, Email, Password,Position)values('', '$Name', '$Email', '$Password', '$Position')";
 $query = mysqli_query($conn,$sql );
   echo "<script>alert('Congratulations,Insert Succesful!!!'); window.location.assign('adminPage.php');</script>";
       
   } else {
    $query="UPDATE requestjob 
    SET status = 'have not approve' 
    WHERE id = '".$_SESSION["id"]."'";
  $statement = $connect->prepare($query);
  
  $statement->execute();
       echo "<script>alert('Invalid !'); window.location.assign('adminPage.php');</script>";
   }

?>