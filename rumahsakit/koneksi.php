<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "rumahsakit";
$koneksi = mysqli_connect($server, $user, $pass, $database);
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>