<head>
	<?php
		session_start();
		if (isset($_SESSION['username'])) {
			$log_in_user = true;
			require("db_conf/db_connect.php");
			mysqli_select_db($conn,"db_store_test");
			$sql = "SELECT * FROM users WHERE username = '".$_SESSION['username']."'";
			$result = mysqli_query($conn,$sql);
			$info = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
			$username_title = $info["username"];
		}
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="static/style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="static/style/style.css">
	<title>My Store</title>
</head>

