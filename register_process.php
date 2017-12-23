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

	$str = "INSERT INTO `passenger` VALUES ('$name',$age,'$address', '$email')";

	if(mysqli_query($conn,$str)===TRUE)
	{
		$str = "INSERT INTO `user` VALUES('$password','$email','normal')";
		if(mysqli_query($conn,$str)===TRUE)
		{
			header("location: success.php");
		}
		else
		{
			//die(mysqli_error($conn));
			header('location:register.php?error');
		}
	}
	else
	{
		//die(mysqli_error($conn));
		header('location:register.php?error');
	}

	mysqli_close($conn);
	//header('location:register.php?error');
	?>