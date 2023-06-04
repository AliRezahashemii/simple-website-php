<!DOCTYPE html>
<html>
	<?php require("templates/head_tag.php"); ?>
<body>
	<?php require("templates/header.php"); ?>
	<div class="container bg-light">
		<?php require("db_conf/db_connect.php"); ?>
	</div>
	<script src="static/js/bootstrap.bundle.js"></script>
	<?php if ($log_in_user){ ?>
		<script type="text/javascript" src="static/js/logout.js"></script>
	<?php } ?>
</body>
</html>