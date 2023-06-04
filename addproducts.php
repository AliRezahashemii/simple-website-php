<?php
	require("templates/head_tag.php");
	require("db_conf/db_connect.php");
	mysqli_select_db($conn,"db_store_test");

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		if ($info["is_admin"] && isset($_SESSION['username'])) {
			function check_input($data){
				$data = htmlspecialchars($data);
				$data = trim($data);
				$data = stripcslashes($data);
				return $data;
			}
			$title = mysqli_real_escape_string($conn,check_input($_POST["title"]));
			$info = mysqli_real_escape_string($conn,check_input($_POST["info"]));
			$inventory = mysqli_real_escape_string($conn,check_input($_POST["inventory"]));

			$target_dir = "media/";
			$target_file = $target_dir . uniqid() . basename($_FILES["image"]["name"]);
			move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

			$sql = "INSERT INTO products(title,url_location,info,inventory) VALUES('".$title."','".$target_file."','".$info."','".$inventory."')";
			$result = mysqli_query($conn,$sql);
			header("Location: index.php");

		}else{
			header("Location: index.php");
		}
	}else{
		header("Location: index.php");
	}
?>
