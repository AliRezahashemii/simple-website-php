<?php

# The file should not be run alone

require("db_connect.php");

$sql = "CREATE DATABASE IF NOT EXISTS db_store_test";
$result = mysqli_query($conn,$sql);
if($result == 1){
	echo ">  Database is created\n";
}
mysqli_select_db($conn,"db_store_test");

$sql = "CREATE TABLE IF NOT EXISTS users(ID INT NOT NULL AUTO_INCREMENT, username VARCHAR(32),email VARCHAR(64), password VARCHAR(64), is_admin CHAR(1) ,PRIMARY KEY (ID))";
$result = mysqli_query($conn,$sql);

echo ">  users Table is created\n";

$sql = "CREATE TABLE IF NOT EXISTS products(ID INT NOT NULL AUTO_INCREMENT, title VARCHAR(32),url_location VARCHAR(64), info VARCHAR(255), inventory INT ,PRIMARY KEY (ID))";
$result = mysqli_query($conn,$sql);

echo ">  products Table is created\n";

$sql = "CREATE TABLE IF NOT EXISTS blogs(ID INT NOT NULL AUTO_INCREMENT, title VARCHAR(32),time_create DATE DEFAULT(CURRENT_DATE), content VARCHAR(255) ,PRIMARY KEY (ID))";
$result = mysqli_query($conn,$sql);

echo ">  blogs Table is created\n";

?>