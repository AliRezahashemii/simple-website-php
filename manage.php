<?php
	$selector = $argv[1];
	switch ($selector) {
		case 'migrate':
				require("db_conf/create_database.php");
			break;

		case 'runserver':
				echo ">  LISTEN ON localhost:8000\n\n";
				exec("php -S localhost:8000");
			break;
		case 'createadmin':
				require("db_conf/create_admin_user.php");
			break;
		default:
			echo ">   use this argument\n";
			echo ">   =================\n";
			echo ">       manage.php migrate\n";
			echo ">       manage.php runserver\n";
			echo ">       manage.php createadmin\n";
			echo "\n";
			break;
	}
?>