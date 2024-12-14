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
 
// menangkap data id yang di kirim dari url
$id_perawat = $_GET['id_perawat'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from perawat where id_perawat='$id_perawat'");
 
// mengalihkan halaman kembali ke index.php
header("location:Tperawat.php");
 
?>