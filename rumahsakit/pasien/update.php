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
$id_pasien = $_POST['id_pasien'];
$nama_pasien = $_POST['nama_pasien'];
$gejala_sakit = $_POST['gejala_sakit'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];

 
// update data ke database
mysqli_query($koneksi,"update pasien set nama_pasien='$nama_pasien', gejala_sakit='$gejala_sakit', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir' where id_pasien='$id_pasien'");
 
// mengalihkan halaman kembali ke index.php
header("location:Tpasien.php");
 
?>

