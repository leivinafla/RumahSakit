<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: ../login/index.php");
    exit(); // Terminate script execution after the redirect
}
?>

<?php 
// koneksi database
include '../koneksi.php';
 
if (isset($_POST['submit'])) {
	// menangkap data yang di kirim dari form
	$id_pasien = $_POST['id_pasien'];
	$nama_pasien = $_POST['nama_pasien'];
	$gejala_sakit = $_POST['gejala_sakit'];
	$tempat_lahir= $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$username = $_SESSION['username'];

	$result = mysqli_query($koneksi,"SELECT id_perawat FROM perawat WHERE username = '$username'");
	$user = [];

	while ($d = mysqli_fetch_assoc($result)) {
		$user[] = $d;
	}

	$user_id = $user[0]['id_perawat'];

	// menginput data ke database
	mysqli_query($koneksi,"insert into pasien values('$id_pasien','$nama_pasien','$gejala_sakit','$tempat_lahir','$tanggal_lahir','$user_id')");
}
 
// mengalihkan halaman kembali ke index.php
header("location:Tpasien.php");
 
?>