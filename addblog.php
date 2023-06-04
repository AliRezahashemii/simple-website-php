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
			$content = mysqli_real_escape_string($conn,check_input($_POST["content"]));

			$sql = "INSERT INTO blogs(title,content) VALUES('".$title."','".$content."')";
			$result = mysqli_query($conn,$sql);
			header("Location: blog.php");

		}else{
			header("Location: index.php");
		}
	}else{
		header("Location: index.php");
	}
?>
