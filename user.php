<?php
	session_start();
	include 'lib/database.php';
	if(!isset($_SESSION['user']))
	{
		header("location:login.php");
	}
	$email = $_SESSION["user"];
	$query = "SELECT name FROM passenger WHERE email LIKE '$email' LIMIT 1";

	$result = mysqli_query($conn, $query);
	$name = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php echo $name['name']; ?> &nbsp;<a href="logout_process.php">logout</a>
	<br />
	<?php
		if($_SESSION['role'] == 'admin')
		{
			$query = "SELECT name, email FROM passenger";

			$result = mysqli_query($conn, $query);

			while($row = mysqli_fetch_assoc($result))
			{
				echo $row['name'].' ';
				echo $row['email'];
				echo '<br \>';
				mail()
			}
		}
	?>

</body>
</html>