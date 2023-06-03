<!DOCTYPE html>
<html>
	<?php require("templates/head_tag.php"); ?>
<body>
	<?php require("templates/header.php"); ?>
	<?php
		session_start();
		if (isset($_SESSION['username'])) {
			header("Location: index.php");
		}
		function check_input($data){
			$data = htmlspecialchars($data);
			$data = trim($data);
			$data = stripcslashes($data);
			return $data;
		}
		$error = array("username" => "","password"=>"");
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$username = check_input($_POST['username']);
			$password = check_input($_POST['password']);
			if (empty($username)) {
				$error["username"] = "username is empty";	
			}
			if (empty($password)) {
				$error["password"] = "password is empty";	
			}
			if (!array_filter($error)) {
				require("db_conf/db_connect.php");
				mysqli_select_db($conn,"db_store_test");
				$username = mysqli_real_escape_string($conn,$username);
				$sql = "SELECT * FROM users WHERE username = '".$username."'";
				$result = mysqli_query($conn,$sql);
				$info = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];

				if (isset($info["username"])) {
					if ($info["password"] == $password) {
						$_SESSION['username'] = $username;
						header("Location: index.php");

					}else{
						$error["password"] = "password not valid";	
					}
				}else{
					$error["username"] = "username not valid";
				}
			}

		}

	?>
	<div class="container bg-light">
		<div class="row my-2 d-flex justify-content-center">
			<div class="col-4 border p-3 text-light rounded" style="background-color: #457b9d;">
				<span class="fs-5 my-5">Login</span>
				<form action="login.php" method="POST">
					<span class="text-danger fw-bold">
						<?php
						if (!empty($error['username'])) {
							echo $error['username']."<br>";
						}
						if (!empty($error['password'])) {
							echo $error['password']."<br>";	
						}
							
						?>
					</span>
					<div>
						<label for="username" class="form-label">Username:</label>
						<input type="text" name="username" value="<?php echo $username; ?>" class="form-control" id="username" placeholder="username">
					</div>
					<div>
						<label for="inputPassword6" class="col-form-label">Password:</label>
						<input type="password" name="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
					</div>
					<input type="submit" name="submit" value="Login" class="btn btn-outline-warning my-4">
				</form>
			</div>
		</div>
	</div>
	<script src="static/js/bootstrap.bundle.js"></script>
</body>
</html>