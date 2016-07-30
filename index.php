<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Money Expense Tracker</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/login.css" />
	<style>
		.btn {
			font-family: Arial;
			color: #DF657F;
			font-size: 20px;
			background: #2F3238;
			padding: 10px 20px 10px 20px;
			border: solid #747981 4px;
			text-decoration: none;
			width:7em;
		}

		.btn:hover {
			background: #ffffff;
			text-decoration: none;
		}
	</style>
</head>
<body class="content bgcolor-4">
<div class="container">
	<h2 style="color:#FFF;">Money Expense Tracker<br><br>Sign Up</h2>
	<?php
session_start();
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	echo '<ul style="padding:0; color:red;">';
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
	echo '<li>',$msg,'</li>';
	}
	echo '</ul>';
	unset($_SESSION['ERRMSG_ARR']);
	}
	?>
	<form method="post" action="login.php">
				<span class="input input--kuro">
					<input class="input__field input__field--kuro" type="text" id="input-7" name="email"/>
					<label class="input__label input__label--kuro" for="input-7">
						<span class="input__label-content input__label-content--kuro">Email Address</span>
					</label>
				</span>
		<br/>
		<span class="input input--kuro">
					<input class="input__field input__field--kuro" type="password" name="pword" id="input-8" />
					<label class="input__label input__label--kuro" for="input-8">
						<span class="input__label-content input__label-content--kuro">Password</span>
					</label>
				</span>
		<br/>
		<span class="input input--kuro">
					<input type="submit" value="Log In" class="btn"/>
						<a href="signup.html"><h3 style="color:#DF657F;">Sign Up Here</h3></a>
				</span>
	</form>
</div><!-- /container -->
</body>
</html>
