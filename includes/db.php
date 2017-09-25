<?php 

	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'kabaremont');
	define('DATABASE_NAME', 'cms');

	$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DATABASE_NAME);
	
	if (!$connection) {
		die("Connection failed" . mysqli_error($connection));
	}


?>