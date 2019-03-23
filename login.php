<?php session_start();
if (isset($_POST["btnLogin"])) {
	$username = $_POST["txtUsername"];
	$password = md5($_POST["txtPassword"]);
	$_SESSION["username"] = $username;
	$_SESSION["password"] = $password;
	header("Location: ../index.php");
}
?>

