<?php
	session_start();
	if (isset($_SESSION["username"])) {
		$_SESSION["username"] = "";
		session_unset(); 
		session_destroy(); 
		header("Location: index.php");
	}else{
		header("Location: index.php");
	}
?>