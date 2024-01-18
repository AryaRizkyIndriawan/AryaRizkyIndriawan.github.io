<?php
require 'functions.php';
if (isset($_POST["register"])) {
	if (registrasi($_POST) > 0) {
		echo "<script>
		alert('user baru berhasil ditambahkan');
		</script>";
	} else {
		echo mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" href="dist/css/style2.css">
</head>

<body>
	<div class="center">
		<h1>Register</h1>
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
			<div class="txt_field">
				<input type="password" name="password2" id="password2" required>
				<span></span>
				<label>Konfirmasi Password</label>
			</div>
			<button type="submit" name="register">Register</button>
			<div class="signup_link">
				Have Registered? <a href="login.php">Login</a>
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