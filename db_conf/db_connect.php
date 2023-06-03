<?php

$host = "127.0.0.1";
$user = "root";
$passwd = "1234qwer";

$conn = mysqli_connect($host,$user,$passwd);

if (!$conn) {
	echo "Connection Error!";
}

?>