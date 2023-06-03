<?php
# The file should not be run alone

require("db_connect.php");
mysqli_select_db($conn,"db_store_test");

$username = readline(">  Username :");
if (empty($username)) {
	echo ">  Error . enter username;\n";
	exit();
	}

$username = mysqli_real_escape_string($conn, $username);
$sql = "SELECT username FROM users WHERE username = '".$username."'";
$result = mysqli_query($conn,$sql);
$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
if(array_filter($info)){
	echo ">  This username is exist.\n";
	exit();
}

$email = readline(">  Email :");
if (empty($email)) {
	echo ">  Error . enter email;\n";
	exit();
	}

$email = mysqli_real_escape_string($conn, $email);
$sql = "SELECT email FROM users WHERE email = '".$email."'";
$result = mysqli_query($conn,$sql);
$info = mysqli_fetch_all($result,MYSQLI_ASSOC);
if(array_filter($info)){
	echo ">  This email is exist.\n";
	exit();
}


$password = readline(">  password :");
$password = mysqli_real_escape_string($conn, $password);
if (empty($username)) {
	echo ">  Error . enter password;\n";
	exit();
	}


$sql = "INSERT INTO users(username,email,password,is_admin) VALUES ('".$username."','".$email."','".$password."','"."1"."')";
$result = mysqli_query($conn,$sql);
echo "user admin is created \n";



?>