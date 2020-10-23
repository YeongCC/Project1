<?php
include "../database/connection.php";
session_start();
$user=$_SESSION['curentUser'];
$name=$_SESSION['curentName'];

  $query = "SELECT * FROM chat ";
  $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if (mysqli_num_rows($run_query) > 0) {
  while ($row = mysqli_fetch_array($run_query)) {
      $message = $row['message'];
      $from_user = $row['from_user'];
      $to_user = $row['to_user'];
      $status = $row['status'];
      if($row["from_user"] == $user)
      {
        if($row["status"] == '2')
        {
          $dynamic_background = 'background-color:#FFD6B2;';
          echo '
            <div style="border-bottom:1px #ccc;padding-top:8px; padding-left:8px; padding-right:8px;'.$dynamic_background.'">
            
            <p align="left">'.$name.' - </p><p align="right"><em>This message has been removed</em></p>
            
            <div align="right">
            - <small><em>'.$row['time_date'].'</em></small>
            </div>
            </div>';
        }
        else if($row["status"] == '1')
        {      
      $dynamic_background = 'background-color:#F4FC92;';
      echo '
            <div style="border-bottom:1px #ccc;padding-top:8px; padding-left:8px; padding-right:8px;'.$dynamic_background.'">
            
            <p align="left">'.$name.' - </p><p align="right">'.$message.'</p>
            <div align="right">
            - <small><em>'.$row['time_date'].'</em></small>
            </div>
            </div>';
    }  else 
    {      

  echo '';
}


    }else if($row["from_user"] == "admin" && $row['to_user']== $user&&$row["status"] == "1")
		{   
       $dynamic_background = 'background-color:#FDF29E;';
      echo '<div style="border-bottom:1px #ccc;padding-top:8px; padding-left:8px; padding-right:8px;'.$dynamic_background.'">
           <p align="left">You - </p><p align="right">'.$message.'  </p>
       
          <div align="right">
          - <small><em>'.$row['time_date'].'</em></small>
          </div>
        
          </div>';

   

    }
  };
  };

?>