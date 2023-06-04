<header class="container border bg-light rounded">
	<div class="row p-4 d-flex justify-content-around ">
		<div class="col-md-3 col-12 my-2 p-1 d-flex justify-content-center align-items-center">
			<?php if ($log_in_user){ ?>
				<a href="logout.php" style="font-size: 12px;" class="mx-2 btn btn-outline-danger">LogOut !</a>
				<?php if ($info["is_admin"] == 1) { ?>

				<button type="button" style="font-size: 12px;" class="mx-2 btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addproducts">
				  Add products
				</button>

				<!-- Modal -->
				<div class="modal fade" id="addproducts" tabindex="-1" aria-labelledby="addproductsLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h1 class="modal-title fs-5" id="addproductsLabel">Add Products</h1>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				      <form action="addproducts.php" method="POST" enctype="multipart/form-data">
					      <div class="modal-body">
					        <div class="mb-3">
							  <label for="title-products" class="form-label">title</label>
							  <input type="text" name="title" class="form-control" id="title-products">
							</div>
							<hr>
							<div class="mb-3">
							  <label for="image-products" class="form-label">image_file</label>
							  <input type="file" name="image" class="form-control" id="image-products">
							</div>
							<hr>
							<div class="mb-3">
							  <label for="info-products" class="form-label">info</label>
							  <input type="text" name="info" class="form-control" id="info-products">
							</div>
							<hr>
							<div class="mb-3">
							  <label for="inventory-products" class="form-label">inventory</label>
							  <input type="number" name="inventory" class="form-control" id="inventory-products">
							</div>

					      </div>
					      <div class="modal-footer">
					        <button type="submit" name="submit" class="btn btn-primary">Add</button>
					      </div>
				      </form>
				    </div>
				  </div>
				</div>


				<button type="button" style="font-size: 12px;" class="mx-2 btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addblog">
				  Add Blog
				</button>

				<!-- Modal -->
				<div class="modal fade" id="addblog" tabindex="-1" aria-labelledby="addblogLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h1 class="modal-title fs-5" id="addblogLabel">Add Blog</h1>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				      <div class="modal-body">
				        ...
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-primary">Add</button>
				      </div>
				    </div>
				  </div>
				</div>
				<?php } ?>
			<?php } else{ ?>
				<a href="login.php" class="btn btn-outline-success mx-1">Login</a>
				<a href="register.php" class="btn btn-outline-success mx-1">Register</a>
			<?php } ?>
			
		</div>
		<div class="col-md-4 col-12 my-2 p-1 text-start">
			<span>welcome</span>
			<?php 
				if ($log_in_user){
					echo "<span class='fs-5'>$username_title</span>";
				}else {
					echo "<span class='fs-5'>Guest</span>";
				}
			?>
		</div>
		<div class="col-md-3 col-12 my-2 p-1 text-end">
			<a href="blog.php" class="text-primary mx-1">Blog</a>
			<a href="index.php" class="text-primary mx-1">Home</a>
			<span class="fs-4 mx-4">LOGO</span>
		</div>
	</div>
</header>