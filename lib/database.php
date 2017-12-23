<?php
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'railway';

	//$con = new mysqli($hostname, $username, $password);

	$conn = mysqli_connect($hostname, $username, $password, $db);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
?>
