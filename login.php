<?php
session_start();
require 'functions.php';
// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];
	// ambil username berdasarkan  id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
	$row = mysqli_fetch_assoc($result);
	// cek cookie dan username
	if ($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}
if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}

if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	// cek username
	if (mysqli_num_rows($result) === 1) {
		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;
			$_SESSION["username"] = $row["username"];
			// cek remember me
			if (isset($_POST['remember'])) {
				// buat cookie
				setcookie('id', $row['id'], time() + 60);
				setcookie('key', hash('sha256', $row['username']), time() + 60);
			}
			header("Location: index.php");
			exit;
		}
	}
	$error = true;
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>
	<link rel="stylesheet" href="dist/css/style2.css">
</head>

<body>
	<div class="center">
		<h1>Login</h1>
		<?php if (isset($error)) : ?>
			<strong>
				<p style="color: red; font-style: italic; text-align: center;">username / password salah</p>
			</strong>
		<?php endif; ?>
		<form method="post" autocomplete="off">
			<div class="txt_field">
				<input type="text" name="username" id="username" required>
				<span></span>
				<label>Username</label>
			</div>
			<div class="txt_field">
				<input type="password" name="password" id="password" required>
				<span></span>
				<label>Password</label>
			</div>
			<div class="pass">
				<input type="checkbox" name="remember" id="remember">
				<labell>Remember Me</labell>
			</div>
			<button type="submit" name="login">Login</button>
			<div class="signup_link">
				Not Registered Yet? <a href="register.php">Sing Up</a>
			</div>
		</form>
	</div>
</body>
<style>
	/* Media Query for Tablets and Smaller Desktop Screens */
	@media (max-width: 768px) {
		.center {
			width: 90%;
		}
	}
</style>

</html>