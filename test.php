<?php
include "database/connection.php";
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>

    </style>
<body>



    <div class="row">
        <div class="col-md-3 ">
            <?php
                $sql="select * from food".$search;
                $result=$conn->query($sql);
                if($result->num_rows >0){
                    while($row = $result -> fetch_assoc()){     
            ?>  
	<figure class="card card-product">
        <div class="inner" style="text-align:center">
            <a href="fooddetails.php?f_id=<?php echo $row['f_id']; ?>"><img src="image/<?php echo $row['imageFood'];?>"  class="img-fluid"  style="width:300px; height:300px;object-fit: contain;"></a>
        </div>
        <div class="card-body">
		<figcaption class="info-wrap">
			<h6 class="title text-dots"><a href="#"><?php echo $row['nameFood'];?></a></h6>
			<div class="action-wrap">
				<a href="#" class="btn btn-primary btn-sm float-right"> Order </a>
				<div class="price-wrap h5">
					<span class="price-new">RM<?php echo $row['price'];?></span>
				</div> <!-- price-wrap.// -->
			</div> <!-- action-wrap -->
		</figcaption>
        </div>
    </figure> <!-- card // -->
    <?php
                    }
                }
                ?>
</div> <!-- col // -->
</div> <!-- row // -->
            </body>
