<!DOCTYPE html>
<html>

<head>
    <title>FoodTiger</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../image/logo 256x256.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">	
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../../js/picture.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="../../css/pic.css" rel="stylesheet" >
    <script src="../../js/confirmUpdate.js"></script>

</head>
<?php
session_start();
require('../../database/pdo.php');

$sql = 'SELECT c_id,name FROM category';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['c_id'])){
	$c_id=$_GET['c_id']; 
	$sql="select * from category where c_id ='$c_id'";
	$result=$conn->query($sql);
	if($result->num_rows>0){
		while($row=$result->fetch_assoc()){

            $c_id=$row['c_id'];
            $name=$row['name'];
            $description=$row['description'];
            $image=$row['image'];
            $category_exixts=$row['category_exixts'];
		}
	}
}

?>


<div class="container">    
 <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-12 col-sm-offset-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">
                            Update Category Detail	
                           </div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a href="category.php" >Dismiss</a></div>
                        </div>  
                        <div class="panel-body" >
                            
                            <form id="signupform" class="form-horizontal" role="form" action="updateCategory.php" method="POST" >
                            <input name="c_id" type="text" class="form-control" placeholder="" value="<?php if (isset($_GET['c_id'])){echo $c_id; }?>" style="display: none;">
                                <div class="form-group">
                                    <label for="nameFood" class="col-md-3 control-label">Food Name :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control"  name="name" id="nameFood" value="<?php if (isset($_GET['c_id'])){echo $name; }?>">
                                    </div>
                                </div>
          
                                <div class="form-group">
                                    <label for="description" class="col-md-3 control-label">Descriptuon :</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="description"  id="description" value="<?php if (isset($_GET['c_id'])){echo $description; }?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category_exixts" class="col-md-3 control-label">Exixts :</label>
                                    <div class="col-md-9">
                                        <select name="category_exixts"  class="form-control" style="height:30px;">
                                            <option value="<?php if (isset($_GET['c_id'])){echo $category_exixts; }?>"><?php if (isset($_GET['c_id'])){echo $category_exixts; }?></option>
                                            <option value="exixts">Exixts</option>
                                            <option value="no exixts">No Exixts</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="col-md-3 control-label">Image :</label>
                                    <div class="col-md-9">
                                   
                                   <img src="../../image/<?php if (isset($_GET['c_id'])){echo $image; }?>" value="<?php if (isset($_GET['c_id'])){echo $image; }?>" onclick="triggerClick()" id="profileDisplay">
                                    
                                 
                                    <input name="image" type="file"  id="image"  onchange="displayImage(this)" style="display: none;">  
                                    </div>
                                </div>
                                 
                                
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-6">
              <button id="btn-signup" type="submit"  name="update"class="btn btn-info btn-block" onclick="return ConfirmUpdate();">Update</button>
	
                       
                                       
                                    </div>
                                </div>
                                
             
                                
                                
                            </form>
                         </div>

               
               
                
         </div> 

</html>