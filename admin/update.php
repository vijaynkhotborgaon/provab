<?php


	require_once('../config.php');
	
	require_once('auth.php');
	
	$p_id=$_GET['p_id'];
	
	
?>


<!DOCTYPE html>

<html lang="en">
  <head>
    
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
	<script>
	$(document).ready(function() {
	$("#category").change(function(){
	
	$.ajax({

			url: 'dept_process_with_report_to.php',
			
	        type: 'POST', // Send post data
		
	        data: {
            'selected' : $(this).val()
        },
	       
			
	        success: function(data){
	        	
				document.getElementById("brand").innerHTML = data;
       
            }
		
		});
	});
	
	});
	</script>
	<title>Create Product</title>
	<style>
	
	
	
	</style>
	</head>

  <body style="color:white;">
  
  <div class="container" style="background-color:black;">
  
  
  <?php include('header.php');
  
  ?>
  <form class="form-horizontal" action="update_process.php" method="post" enctype="multipart/form-data" role="form">
  <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
  <center><h1>Add Product</h1></center>

	<?php
	if(isset($_SESSION['success']) && $_SESSION['success']==1 ) {
	?>
	<div class="alert alert-success">
	<strong>Product added successfully</strong>
	</div>
	<?php
		unset($_SESSION['success']);
		}
	?>
	
	<?php
			$p_id = mysql_query("SELECT * FROM products where p_id=".$p_id);
			$product = mysql_fetch_array($p_id);
			
		?>
	

	<div class="form-group">
	 <label class="control-label col-sm-2" ><strong>Select Category</strong></label>
      <div class="col-sm-10">
	  
	  <select name="category" id="category" class="form-control" required disabled>
		<?php
			$catid = mysql_query("SELECT * FROM category");
			while($category = mysql_fetch_array($catid)){
			if($product['cat_id']==$category['cat_id'])
			{
		?>
		<option  selected="<?php if($product['cat_id']==$category['cat_id']){?>selected<?php }?>" value="<?php echo $product['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
		<?php
		}
		}
		?>
		</select>
		<input type="hidden" name="cat_hidden" value="<?php echo $product['cat_id']; ?>" >
		</div>
	</div>
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"><strong>Select Brand</strong></label>
       <div class="col-sm-10">
	   
	   
        <select name="brand" id="brand" class="form-control"  required>
		
		<?php
			$b_id = mysql_query("SELECT * FROM brand where cat_id=".$product['cat_id']);
			while($brand = mysql_fetch_array($b_id)){
			if($brand['brand_id']==$product['brand_id'])
			{
			
		?>
		<option  selected="selected" value="<?php echo $brand['brand_id']; ?>"><?php echo $brand['brand_name'];?></option>
		<?php
		}
		else
		{?>
		<option value="<?php echo $brand['brand_id']; ?>"><?php echo $brand['brand_name'];?></option>
		<?php
		}
		}
		?>
		</select>
		</div>
    </div>

	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"><strong>Product Name</strong></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="name"  value="<?php echo $product['p_name'];?>" required>
      </div>
    </div>
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"><strong>Product Price</strong></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="price" id="price" pattern="[0-9]+([.][0-9]+)?" title="Price should be numeric or decimal" value="<?php echo $product['p_price'];?>" required>
      </div>
    </div>
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"><strong>Product Description</strong></label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" id="description" name="description" placeholder="Product Description" required><?php echo $product['description'];?></textarea>
      </div>
    </div>
	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-info" value="Update">
      </div>
    </div>
	
  </form>
  </div>
  
  
  

  </body>
</html>
			      			
									
									
