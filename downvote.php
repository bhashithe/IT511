<?php
	session_start();
	include 'lib/database.php';

	$postid = $_GET['postid'];

	$str = "SELECT votes FROM post WHERE post_id = $postid LIMIT 1";
	$result = mysqli_query($conn, $str) or die("error");
	$row = mysqli_fetch_assoc($result);
	$votes = $row['votes'];

	$votes--;

	$str = "UPDATE post SET votes = $votes WHERE post_id=$postid";
	$result = mysqli_query($conn, $str) or die("error");

	$str = "SELECT votes FROM post WHERE post_id = $postid LIMIT 1";
	$result = mysqli_query($conn, $str) or die("error");
	$row = mysqli_fetch_assoc($result);
	$votes = $row['votes'];

	echo $votes;

	$email = $_SESSION['user'];

	$str = "INSERT INTO logs(`email`,`post_id`) VALUES ('$email',$postid)";
	$result = mysqli_query($conn, $str) or die("error");
?>
