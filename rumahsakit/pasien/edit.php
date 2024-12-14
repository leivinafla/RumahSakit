<?php
session_start();
include '../koneksi.php';
 
if (!isset($_SESSION['username'])) {
    header("Location: ../login/index.php");
    exit(); // Terminate script execution after the redirect
}

$id_pasien = $_GET['id_pasien'];
$data = mysqli_query($koneksi,"select * from pasien where id_pasien='$id_pasien'");

$result = [];


while($d = mysqli_fetch_assoc($data))
{
	$result[] = $d;
}

$result= $result[0];



?>


<!DOCTYPE html>
<html>
<head>
	<title>CRUD PHP dan MySQLi</title>
	<link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>
<body>
		<div class="kotak_login">
	<p class="tulisan_login">Edit Data Pasien</p>
 
	<form method="POST" action="update.php">
		<label>ID PASIEN</label>
		<input type="text" name="id_pasien" class="form_login" placeholder="id atau email .." value="<?php echo $result['id_pasien'] ?>">
		<label>NAMA PASIEN</label>
		<input type="text" name="nama_pasien" class="form_login" placeholder="nama" value="<?php echo $result['nama_pasien'] ?>">
		<label>GEJALA SAKIT</label>
		<input type="text" name="gejala_sakit" class="form_login" placeholder="gejala" value="<?php echo $result['gejala_sakit'] ?>">
		<label>TEMPAT LAHIR</label>
		<input type="text" name="tempat_lahir" class="form_login" placeholder="tempat.." value="<?php echo $result['tempat_lahir']?>">
		<label>TANGGAL LAHIR</label>
		<input type="date" name="tanggal_lahir" class="form_login" placeholder="tanggal.." value="<?php echo $result['tanggal_lahir'] ?>">
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