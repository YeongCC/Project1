<?php

$servername = "localhost";
$username = "root";
$password = "0612";
$db="foodtiger";
$conn = mysqli_connect($servername, $username, $password,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$limit = 3;  
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
$start_from = ($page-1) * $limit;  
  
$sql = "SELECT * FROM blog ORDER BY name ASC LIMIT $start_from, $limit";  
$rs_result = mysqli_query($conn, $sql);  
?>
 
<?php  
while ($row = mysqli_fetch_array($rs_result)) {  
?>
  <link rel="stylesheet" href="../css/blog.css">
  <div class="blog-post">
<div class="card">
  <div class="fakeimg" style="height:200px;"><a href="blogDetail.php?id=<?php echo $row['id'];?>"><img src="<?php echo $row['image'];?>"
      style="width:max-content; height:200px;object-fit: contain;" ></a></div>
  <h5><?php echo $row['title']?></h5>
  <p>by <?php echo $row['Name']?>,<?php echo $row['time_date']?></p>
</div>
</div>


<?php  
};  
?>

