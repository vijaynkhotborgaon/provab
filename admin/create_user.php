<?php
	session_start();
	require_once('../config.php');
	require_once('auth.php');
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
	</head>

  <body style="color:white;">
  
  <div class="container" style="background-color:black;">
  <?php include('header.php');
  ?>
  
  <form class="form-horizontal" action="create_user_process.php" method="post" enctype="multipart/form-data" role="form">
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

	<div class="form-group">
	 <label class="control-label col-sm-2" ><strong>Select Category</strong></label>
      <div class="col-sm-10">
	  <select name="category" id="category" class="form-control" required>
		<option  value="">Select Category</option>
		<?php
			$catid = mysql_query("SELECT * FROM category");
			while($category = mysql_fetch_array($catid)){
		?>
		<option  value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
		<?php
		} ?>
		</select>
		</div>
		</div>
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"><strong>Select Brand</strong></label>
       <div class="col-sm-10">
        <select name="brand" id="brand" class="form-control"  required>
		</select>
		</div>
    </div>

	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"><strong>Product Name</strong></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Product Name" name="name" id="name"  required>
      </div>
    </div>
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"><strong>Product Price</strong></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" placeholder="Product Price" name="price" id="price" pattern="[0-9]+([.][0-9]+)?" title="Price should be numeric or decimal" required>
      </div>
    </div>
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email"><strong>Product Description</strong></label>
      <div class="col-sm-10">
        <textarea class="form-control" rows="5" id="description" name="description" placeholder="Product Description" required></textarea>
      </div>
    </div>
	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-info" value="Submit">
      </div>
    </div>
	
  </form>
  </div>
  
  
  <div class="container" style="background-color:black;">
  <hr>
  <center><h1>Product List</h1></center>
  <hr>
  <?php
	if(isset($_SESSION['update']) && $_SESSION['update']==1 ) {
	?>
	<div class="alert alert-success">
	<strong>Updated Product successfully</strong>
	</div>
	<?php
		unset($_SESSION['update']);
		}
	?>
	
	<?php
	if(isset($_SESSION['delete']) && $_SESSION['delete']==1 ) {
	?>
	<div class="alert alert-success">
	<strong>Product Deleted successfully</strong>
	</div>
	<?php
		unset($_SESSION['delete']);
		}
	?>
	<table class="table">
    <thead>
      <tr>
        <th>No.</th>
        <th>Category</th>
        <th>Brand</th>
		<th>Product Name</th>
		<th>Price</th>
		<th>Description</th>
		<th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php
			$i=0;
			$p_id = mysql_query("SELECT * FROM products");
			while($product = mysql_fetch_array($p_id)){
			
				$cat_find= mysql_query("SELECT * FROM category where cat_id=".$product['cat_id']);
			    $cat = mysql_fetch_array($cat_find);
				
				$brand_id = mysql_query("SELECT * FROM brand where brand_id=".$product['brand_id']);
			    $brand = mysql_fetch_array($brand_id);
	?>
      <tr>
        <td><?php echo ++$i;?></td>
        <td><?php echo $cat['cat_name'];?></td>
        <td><?php echo $brand['brand_name'];?></td>
		<td><?php echo $product['p_name'];?></td>
		<td><?php echo $product['p_price'];?></td>
		<td><?php echo $product['description'];?></td>
		<td><a class="btn btn-primary" href="update.php?p_id=<?php echo $product['p_id'];?>" role="button">Update</a>
		<a class="btn btn-danger" href="delete.php?p_id=<?php echo $product['p_id'];?>" role="button">Delete</a>
		</td>
      </tr>
	  <?php
	  }
	  ?>
      
    </tbody>
  </table>
  </div>
  </body>
</html>
			      			
									
									
