<!DOCTYPE html>
<html>
	<?php require("templates/head_tag.php"); ?>
<body>
	<?php require("templates/header.php"); ?>
	<?php
		require("db_conf/db_connect.php");
		mysqli_select_db($conn,"db_store_test");
		$error = array("username"=>"", "email"=>"", "password"=>"");
		$username = $email = $password = "";
		if (isset($_SESSION['username'])) {
			header("Location: index.php");
		}
		function check_input($data){
			$data = htmlspecialchars($data);
			$data = trim($data);
			$data = stripcslashes($data);
			return $data;
		}
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$username = check_input($_POST["username"]);
			$email = check_input($_POST["email"]);
			$password = check_input($_POST['password']);
			if (empty($username)) {
				$error["username"] = "username is required";
			}else{
				$username = mysqli_real_escape_string($conn,$username);
				$sql = "SELECT * FROM users WHERE username = '".$username."'";
				$result = mysqli_query($conn, $sql);
				$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
				if (isset($info[0]["username"])) {
					$error["username"] = "Username is registered in the system";
				}
			}
			if (empty($email)) {
				$error["email"] = "email is required";
			}else{
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$error["email"] = "email format is unvalid";	
				}else{
					$email = mysqli_real_escape_string($conn,$email);
					$sql = "SELECT * FROM users WHERE email = '".$email."'";
					$result = mysqli_query($conn, $sql);
					$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
					if (isset($info[0]["email"])) {
						$error["email"] = "email is registered in the system";
					}
				}
			}
			if (empty($password)) {
				$error["password"] = "password is required";
			}

			//register 
			if (!array_filter($error)) {
				$username = mysqli_real_escape_string($conn,$username);
				$email = mysqli_real_escape_string($conn,$email);
				$password = mysqli_real_escape_string($conn,$password);
				$sql = "INSERT INTO users (username,email,password,is_admin) VALUES ('".$username."','".$email."','".$password."','0')";
				$result = mysqli_query($conn, $sql);

				$_SESSION['username'] = $username;
				header("Location: index.php");
			}

		}
	?>
	<div class="container bg-light">
		<div class="row my-2 d-flex justify-content-center">
			<div class="col-4 border p-3 text-light rounded"  style="background-color: #457b9d;">
				<span class="fs-5 my-5">REGISTER</span>

				<form method="POST" action="register.php">
					<span class="text-danger fw-bold">
						<?php
							if (!empty($error['username'])) {
								echo $error['username']."<br>";
							}
							if (!empty($error['email'])) {
								echo $error['email']."<br>";	
							}
							if (!empty($error['password'])) {
								echo $error['password']."<br>";	
							}
						?>
					</span>
					<div>
						<label for="username" class="form-label">Username:</label>
						<input type="text" value="<?php echo $username; ?>" name="username" class="form-control" id="username" placeholder="username">
					</div>
					<div>
						<label for="email" class="form-label">Email address:</label>
						<input type="email" value="<?php echo $email; ?>" name="email" class="form-control" id="email" placeholder="name@example.com">
					</div>
					<div>
						<label for="inputPassword6" class="col-form-label">Password:</label>
						<input type="password" name="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
					</div>
					<input type="submit" name="submit" value="Register" class="btn btn-outline-warning my-4">
				</form>
			</div>
		</div>
	</div>
	<script src="static/js/bootstrap.bundle.js"></script>
</body>
</html>