<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: ../login");
    exit(); // Terminate script execution after the redirect
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Job Dashboard | By Code Info</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/style3.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
   

    <!-- dari sini -->
  <div class="container">   
    <section class="main">
      <div class="main-top">
        <p>SELAMAT DATANG DI RUMAH SAKIT PUSAT!</p>
      </div>
      <div class="main-body">

      <div class="job_card">
        <div class="">
          <div class="img">
            <i class=""></i>
          </div>
  
    <a href="tambah.php" class="icon-button">
        <i class="fas fa-plus" herf="tambah.php"> TAMBAH DATA</i>
    </a>

     <a href="../dashboard.php" class="icon-button">
                    <i class="fas fa-backward" herf="tambah.php"> BACK</i>
                    </a>
    <br/>
    <br/>
    <table class="table1">
        <tr>
            <th>ID PASIEN</th>
            <th>ID PERAWAT</th>
            <th>PETUGAS</th>
            <th>NAMA PASIEN</th>
            <th>GEJALA SAKIT</th>
            <th>TEMPAT LAHIR</th>
            <th>TANGGAL LAHIR</th>    
            <th colspan="2">OPSI</th>

        </tr>
     <?php
                        include '../koneksi.php';

                        $batas = 5;
                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                        $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
                        $previous = $halaman - 1;
                        $next = $halaman + 1;
                        $no = 1;

                        $data = mysqli_query($koneksi, "SELECT pasien.*, perawat.username 
                            FROM pasien
                            INNER JOIN perawat ON pasien.id_perawat = perawat.id_perawat
                            ORDER BY pasien.id_pasien ASC LIMIT $halaman_awal, $batas");

                        $data_page = mysqli_query($koneksi, "SELECT * from pasien");
                        $jumlah_data = mysqli_num_rows($data_page);
                        $total_halaman = ceil($jumlah_data / $batas);
                        $data_page = mysqli_query($koneksi, "SELECT * from pasien limit $halaman_awal, $batas");
                        $nomor = $halaman_awal + 1;

                        while ($d = mysqli_fetch_array($data)) {
                            ?>
            <tr>
            
                <td><?php echo $d['id_pasien']; ?></td>
                <td><?php echo $d['id_perawat']; ?></td>
                <td><?php echo $d['username']; ?></td>
                <td><?php echo $d['nama_pasien']; ?></td>
                <td><?php echo $d['gejala_sakit']; ?></td>
                <td><?php echo $d['tempat_lahir']; ?></td>
                <td><?php echo $d['tanggal_lahir']; ?></td>
                <td>
                    <a href="edit.php?id_pasien=<?php echo $d['id_pasien']; ?>" onclick="return confirm ('yakin mau edit ?');" class="btn btn-outline-success">
                    <i class="fas fa-pen"></i> </a></td>
                    <td><a href="hapus.php?id_pasien=<?php echo $d['id_pasien']; ?>" onclick="return confirm ('yakin mau hapus ?');" class="btn btn-outline-danger">
                        <i class="fas fa-eraser"></i></a>
                    </td>
                </td>
            </tr>
            <?php 
        }
        ?>
</center>
    </table>
    
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>              
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
        
    </div>
                </div>
                <!-- end blog -->
            </div>

    
    </div>
    </section>
  </div>

</body>
</html>