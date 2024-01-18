<?php
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'functions.php';
$id_mhs = $_GET["id_mhs"];
if (hapus($id_mhs) > 0) {
	echo "<script>
		alert('data berhasil dihapus');
		document.location.href = 'pages/UI/data.php';
		</script>";
} else {
	echo "<script>
		alert('data gagal dihapus');
		document.location.href = 'pages/UI/data.php';
		</script>";
}
