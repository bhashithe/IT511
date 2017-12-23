<?php
	$error = "";
	if(isset($_GET['error']))
	{
		$error = "There was an error while processing the input";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">
		<div class="offset">
			&nbsp;	
		</div>

		<div class="form">
			<?php if($error) echo '<span class="error">'.$error.'</span>'; ?>
			<br/>
			<br/>
			<label>Registration Form</label>
			<form name="vform" method="post" action="register_process.php">
				<div class="input_field">
					<div class="input-label">	
						<label for="name">Name</label>
					</div>
					<div class="input">
						<input type="text" name="name" placeholder="John Doe" id="name" required">
					</div>
				</div>
				<div class="input_field">
					<div class="input-label">	
						<label for="age">Age</label>
					</div>
					<div class="input">
						<input type="number" name="age" placeholder="age" id="age" required">
					</div>
				</div>
				<div class="input_field">
					<div class="input-label">	
						<label for="address">Address</label>
					</div>
					<div class="input">
						<input type="text" name="address" placeholder="address" id="address">
					</div>
					<span id="username_error"></span>
				</div>
				<div class="input_field">
					<div class="input-label">
						<label for="email">Email</label>
					</div>
					<div class="input">
						<input type="email" name="email" placeholder="johndoe@mail.com" id="email" required>
					</div>
					<span id="email_error"></span>
				</div>
				<div class="input_field">
					<div class="input-label">
						<label for="password">Password</label>
					</div>
					<div class="input">
						<input type="password" name="password" placeholder="password" id="password">
					</div>
					<span id="password_error"></span>
				</div>
				<div class="input_field">
					<div class="input-label">
						<label for="confirm">Confirm Password</label>
					</div>
					<div class="input">
						<input type="password" name="confirm" placeholder="confirm password" id="confirm">
					</div>
					<span id="confirm_error"></span>
				</div>
				<div class="input_field">
					<div class="input">
						<input class="btn" type="submit" value="register">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>