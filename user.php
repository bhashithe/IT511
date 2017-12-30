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

	$display_search=false;

	if(isset($_POST['search']))
	{
		$start = htmlentities($_POST['query']);
		$display_search=true;
		$str_search = "SELECT `train_id`, `start`, `end`, `start_time` FROM train WHERE start LIKE '%$start%'";
	}

	$booked = null;

	if(isset($_GET['booked']))
	{
		$booked = "Successfully booked!";
	}

	$email = $_SESSION['user'];

	$str_books = "SELECT `ticket`.*, `train`.* FROM `ticket` INNER JOIN `train` ON `train`.`train_id`=`ticket`.`train_id` WHERE `email` LIKE '$email'";

	$result_books = mysqli_query($conn, $str_books);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Users Page</title>
</head>
<body>
	<?php echo $name['name']; ?> &nbsp;<a href="logout_process.php">logout</a>
	<br />

	<form action="#" method="POST">
		<input type="text" name="query" placeholder="search">
		<input type="submit" name="search" value="search">
	</form>
	<?php if($booked) echo '<span class="success">'.$booked.'</span><br />'; ?>
	<?php

		if($display_search)
		{
			$result = mysqli_query($conn, $str_search);

			while($row=mysqli_fetch_assoc($result))
			{
					echo $row['start'].' '.$row['end'].' '.$row['start_time'].' <a href="book.php?train='.$row['train_id'].'"">Book</a><br>';
			}
		}

		if($_SESSION['role'] == 'admin')
		{
			$query = "SELECT name, email FROM passenger";

			$result = mysqli_query($conn, $query);

			while($row = mysqli_fetch_assoc($result))
			{
				echo $row['name'].' ';
				echo $row['email'];
				echo '<br \>';
			}
		}

		if($result_books)
		{
			while($row=mysqli_fetch_assoc($result_books))
			{
				echo $row['type']. ' '.$row['number'].' '.$row['start'].' '.$row['end'].' '.$row['start_time'].'<a href="book.php?train='.$row['train_id'].'&edit='.$row['ticket_id'].'">edit</a><br>';
			}
		}
	?>

</body>
</html>