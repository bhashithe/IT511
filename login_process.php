<?php
	session_start();
	require 'lib/database.php';

	$email = htmlentities($_POST['email']);
	$password = htmlentities($_POST['password']);

	$salt = "lcmqwbvudbkvd894923";
	$password = crypt($password, $salt);

	$query = "SELECT password, role FROM user WHERE email LIKE '$email' LIMIT 1";
	$result = mysqli_query($conn, $query);
	$db_info = mysqli_fetch_assoc($result);

	if($db_info['password'] == $password)
	{
		echo 'user authenticated';
		$_SESSION['user'] = $email;
		$_SESSION['role'] = $db_info['role'];

		header("location: user.php");
	}
	else
	{
		header("location: login.php?error");
	}

	mysqli_close($conn);
?>