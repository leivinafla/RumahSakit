<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: ../login");
    exit(); // Terminate script execution after the redirect
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>tambah data Pasien</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body>

<div class="kotak_login">
	<p class="tulisan_login">Tambah Data Pasien</p>
 
	<form method="POST" action="tambah_aksi.php">
		<label>ID PASIEN</label>
		<input type="text" name="id_pasien" class="form_login" placeholder="id atau email ..">
 		<label>NAMA PASIEN</label>
		<input type="text" name="nama_pasien" class="form_login" placeholder="nama..">
		<label>GEJALA SAKIT</label>
		<input type="text" name="gejala_sakit" class="form_login" placeholder="gejala..">
		<label>TEMPAT LAHIR</label>
		<input type="text" name="tempat_lahir" class="form_login" placeholder="tempat..">
		<label>TANGGAL LAHIR</label>
		<input type="date" name="tanggal_lahir" class="form_login" placeholder="tanggal..">
 		<input type="submit" name="submit" class="tombol_login" value="SIMPAN">
		<br/>
		<br/>
		<center>
			
			<a class="link" href="../pasien/Tpasien.php">KEMBALI</a>
		</center>
	</form>
	
</div>
</body>
</html>