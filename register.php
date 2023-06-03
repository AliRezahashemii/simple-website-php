<!DOCTYPE html>
<html>
	<?php require("templates/head_tag.php"); ?>
<body>
	<?php require("templates/header.php"); ?>
	<div class="container bg-light">
		<div class="row my-2 d-flex justify-content-center">
			<div class="col-4 border p-3 bg-secondary text-light rounded">
				<span class="fs-5 my-5">REGISTER</span>
				<form>
					<div>
						<label for="username" class="form-label">Username:</label>
						<input type="text" class="form-control" id="username" placeholder="username">
					</div>
					<div>
						<label for="email" class="form-label">Email address:</label>
						<input type="email" class="form-control" id="email" placeholder="name@example.com">
					</div>
					<div>
						<label for="inputPassword6" class="col-form-label">Password:</label>
						<input type="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="static/js/bootstrap.bundle.js"></script>
</body>
</html>