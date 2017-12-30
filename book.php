<?php
	session_start();
	include 'lib/database.php';
	if(!isset($_SESSION['user']))
	{
		header("location:login.php");
	}

	if(!isset($_GET['train']))
	{
		header('location: user.php');
	}
	else
	{

		$train_id = htmlentities($_GET['train']);
		$str = "SELECT * FROM `train` WHERE train_id=$train_id LIMIT 1";
		$result  = mysqli_query($conn, $str);

		$edit = false;

		if(isset($_GET['edit']))
		{
			$edit=true;
			$ticket_id = htmlentities($_GET['edit']);

			$str = "SELECT * FROM `ticket` WHERE `ticket_id`=$ticket_id LIMIT 1";

			$result = mysqli_query($conn, $str);
			$row_edit = mysqli_fetch_assoc($result);
		}
	}

	if(isset($_POST['book']))
	{
		$class = htmlentities($_POST['class']);
		$number = htmlentities($_POST['tickets']);
		$train_id = htmlentities($_GET['train']);
		$email = $_SESSION['user'];

		$str = "INSERT INTO `ticket` (`type`, `train_id`, `email`, `number`) VALUES ('$class', $train_id, '$email', $number)";

		$q_book = mysqli_query($conn, $str);

		if($q_book)
		{
			header('location: user.php?booked');
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Book a train</title>
</head>
<body>
	<?php
		if(isset($_GET['train']))
		{
			while($row=mysqli_fetch_assoc($result))
			{
				echo $row['start'].' '.$row['end'].' '.$row['start_time'];
			}
		}
	?>

	<form action="#" method="post">
		<select name="class">
			<option <?php if($edit) {if($row_edit['type']=="first") echo "selected";}?> value="first">First class</option>
			<option <?php if($edit) {if($row_edit['type']=="second") echo "selected";}?> value="second">Second class</option>
			<option <?php if($edit) {if($row_edit['type']=="third") echo "selected";}?> value="third">Third class</option>
		</select>
		<input type="number" name="tickets" placeholder="number of tickets" value=<?php if($edit) echo $row_edit['number'] ?>>
		<br />
		<input type="submit" name="book" value="Book">
	</form>
</body>
</html>