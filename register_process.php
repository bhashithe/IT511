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
	//echo "Connected successfully";

	//echo "<br>". $_POST['name'].' '.$_POST['age'].' '.$_POST['address'].' ';

	$name = htmlentities($_POST['name']);
	$age = htmlentities($_POST['age']);
	$address = htmlentities($_POST['address']);
	$email = htmlentities($_POST['email']);
	$password = htmlentities($_POST['password']);

	$salt = "lcmqwbvudbkvd894923";
	$password = crypt($password, $salt);

	mysqli_query($conn, 'START TRANSACTION');

	$str = "INSERT INTO `passenger` VALUES ('$name',$age,'$address', '$email')";
	$q_passenger = mysqli_query($conn,$str);
	$str = "INSERT INTO `user` VALUES('$password','$email','normal')";
	$q_user = mysqli_query($conn,$str);

	if($q_passenger && $q_user)
	{
			mysqli_query($conn, "COMMIT");		
			header("location: login.php");
	}
	else
	{
		mysqli_query($conn, "ROLLBACK");
		header('location:register.php?error');
	}

	mysqli_close($conn);
	?>