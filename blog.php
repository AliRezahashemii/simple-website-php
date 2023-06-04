<!DOCTYPE html>
<html>
	<?php require("templates/head_tag.php"); ?>
<body>
	<?php require("templates/header.php"); ?>
	<div class="container bg-light">
		<div class="row d-flex flex-wrap flex-columt my-2 align-items-center">
			<?php require("db_conf/db_connect.php"); ?>
			<?php 
				mysqli_select_db($conn,"db_store_test");
				$sql = "SELECT * FROM blogs";
				$result = mysqli_query($conn,$sql);
				$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
			?>
			<?php foreach ($info as $key => $value) { ?>
				<div class="card my-2">
				  <div class="card-header">
				    <?php echo $value["title"] ; ?>
				  </div>
				  <div class="card-body">
				    <blockquote class="blockquote mb-0">
				      <p><?php echo $value["content"]; ?></p>
				      <footer class="blockquote-footer"><?php echo $value["time_create"]; ?></footer>
				    </blockquote>
				  </div>
				</div>
			<?php } ?>
		</div>
	</div>
	<script src="static/js/bootstrap.bundle.js"></script>
</body>
</html>