<?php 
session_start();
include 'includes/dbConnection.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>AX GYM Managment </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"-->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script> 
		<?php include 'globalExternals/components.php'; ?>
	</head>

	<body class="login_page" style="background-image:url(images/bg_4.jpg)">
		<div class="grid">
			<?php if (isset($_SESSION["success"])) { ?>
				<div class="alert alert-success">
					<strong>Success!</strong> <?php echo $_SESSION["success"];
																														session_unset(); ?>
				</div>
			<?php 
	} ?>

			<?php if (isset($_SESSION["error"])) { ?>
				<div class="alert alert-danger">
					<strong>Alert!</strong> <?php echo $_SESSION["error"];
																												session_unset(); ?>
				</div>
			<?php 
	} ?>

			<?php if (isset($_SESSION["expired_session"])) { ?>
				<div class="alert alert-danger">
					<strong>Alert!</strong> <?php echo $_SESSION["expired_session"];
																												session_unset(); ?>
				</div>
			<?php 
	} ?>

			<form action="includes/phpScripts.php" method="post" class="form login" style="bakcground:rgba(233, 243, 235, 0.58);">
				<h2>LOGIN</h2> 
				<input id="login__username" type="text" name="txtUsername" class="form__input" placeholder="Username" required>				
				<input id="login__password" type="password" name="txtPassword" class="form__input" placeholder="Password" required>
				<button name="btnLogin" type="submit"  value="LOG IN">LOG IN </button>
				<br> <br>
				<a href="#" style="color: #222;">or Contact The Admin. </a>
				<!--	<table class="table" style="background-color:azure;">
						<tr><th>Role</th><th>Username</th><th>Password</th></tr>
						<tr><td>Admin</td><td>admin</td><td>admin</td></tr>
						<tr><td>Staff</td><td>test</td><td>test</td></tr>
					</table>	-->
			</form>
		</div>

	</body>
</html>