<?php
	require 'lib/database.php';
	$error = "";
	if(isset($_GET['error']))
	{
		$error = "There was an error while processing the input";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="offset">
			&nbsp;	
		</div>

		<div class="form">
			<?php if($error) echo '<span class="error">'.$error.'</span>'; ?>
			<br/>
			<br/>
			<label>Log into the System</label>
			<form name="lform" method="post" action="login_process.php">
				<div class="input_field">
					<div class="input-label">	
						<label for="email">E-mail</label>
					</div>
					<div class="input">
						<input type="email" name="email" placeholder="email" id="email">
					</div>
				</div>
				<div class="input_field">
					<div class="input-label">
						<label for="password">Password</label>
					</div>
					<div class="input">
						<input type="password" name="password" placeholder="password" id="password">
					</div>
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