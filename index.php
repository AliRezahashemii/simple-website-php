<!DOCTYPE html>
<html>
	<?php require("templates/head_tag.php"); ?>
<body>
	<?php require("templates/header.php"); ?>
	<div class="container bg-light">
		<div class="row d-flex flex-wrap justify-content-around">
			<?php require("db_conf/db_connect.php"); ?>
			<?php 
				mysqli_select_db($conn,"db_store_test");
				$sql = "SELECT * FROM products";
				$result = mysqli_query($conn,$sql);
				$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
			?>
			<?php foreach ($info as $key => $value) { ?>
				<div class="card m-3" style="width: 18rem;">
				  <img src="<?php echo $value["url_location"]; ?>" class="card-img-top" alt="...">
				  <div class="card-body">
				    <h5 class="card-title"><?php echo $value["title"]; ?></h5>
				    <p class="card-text"><?php echo $value["info"]; ?></p>
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">inventory: </li>
				    <li class="list-group-item"><?php echo $value["inventory"]; ?></li>
				  </ul>
				</div>
			<?php } ?>
		</div>
	</div>
	<script src="static/js/bootstrap.bundle.js"></script>
</body>
</html>