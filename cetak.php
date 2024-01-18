<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$mahasiswa = query("SELECT * FROM mhs_aryarizky");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Mahasiswa</title>
	<link rel="stylesheet" href="dist/css/print.css">
</head>
<body>
   <h1>Daftar Mahasiswa</h1>
   <table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Gambar</th>
			<th>Nim</th>
			<th>Nama</th>
			<th>Tahun Ajaran</th>
			<th>Jurusan</th>
			<th>Nomor Hp</th>
			<th>Jenis Kelamin</th>
			<th>Tanggal Lahir</th>
			<th>Alamat</th>
		</tr>';
$i = 1;
foreach ($mahasiswa as $row) {
	$html .= '<tr>
			<td>' . $i++ . '</td>
			<td><img src="dist/img/' . $row["gambar"] . '" width="75"></td>
			<td>' . $row["nim_mhs"] . '</td>
			<td>' . $row["nama_mhs"] . '</td>
			<td>' . $row["tahun_ajaran"] . '</td>
			<td>' . $row["jurusan"] . '</td>
			<td>' . $row["no_hp"] . '</td>
			<td>' . $row["jenis_kelamin"] . '</td>
			<td>' . date('d-m-Y', strtotime($row["tgl_lahir"])) . '</td>
			<td>' . $row["alamat"] . '</td>
			</tr>';
}
$html .= '</table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf', \Mpdf\Output\Destination::INLINE);
