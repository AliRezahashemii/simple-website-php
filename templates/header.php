<header class="container border bg-light rounded">
	<div class="row p-4 d-flex justify-content-around ">
		<div class="col-md-3 col-12 my-2 p-1 d-flex justify-content-center">
			<?php if ($log_in_user){ ?>
				login
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