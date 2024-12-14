<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: ../login");
    exit(); // Terminate script execution after the redirect
}
?>
<?php 
// koneksi database
include '../koneksi.php';
 
// menangkap data yang di kirim dari form
$id_perawat = $_POST['id_perawat'];
$nama_perawat = $_POST['nama_perawat'];
$tempat_lahir= $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into perawat values('$id_perawat','$nama_perawat','$tempat_lahir','$tanggal_lahir')");
 
// mengalihkan halaman kembali ke index.php
header("location:Tperawat.php");
 
?>