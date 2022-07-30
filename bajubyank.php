<?php
session_start();
include 'koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style2.css">

    <title>Pakaian Anak Laki Laki | Baby Care</title>
  </head>
  <body>
    
    <?php include 'menu.php'; ?>

   <div class="row mt-5 no-gutters">
    <div class="col-md-2 bg-light">
      <ul class="list-group list-group-flush p-2 pt-5">
      <li class="list-group-item bg-danger text-white"> <i class="fas fa-list text-white"></i> Baby Care</li>
        <a href="pregnancy.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Pregnancy </li></a>
        <a href="babyhealth.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Baby's Health </li></a>
        <a href="parenting.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Parenting </li></a>
        <a href="kidsschool.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Kids School </li></a>
        <a href="bajubyank.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Pakaian Anak Laki-Laki</li></a>
       <a href="bajubyank2.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Pakaian Anak Perempuan</li></a>
       <a href="perlengbayi.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Perlengkapan Anak</li></a>
      </ul>
    </div>


    <div class="col-md-10">
<br>
      <h4 class="text-center font-weight-bold mr-6 mt-4 mb-4">PAKAIAN ANAK LAKI-LAKI</h4>

      <div class="row mx-auto">
        <?php 
    $ambil=$koneksi->query("SELECT * FROM jenis_jasa_produk WHERE id_kategori=7");
    ?>
    <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
        <div class="card mr-2 ml-2" style="width: 16rem;">
          <img src="foto_jasa/<?php echo $perproduk['foto_jenis_jasa_produk']; ?>" class="card-img-top" alt="..." height="200px">
          <div class="card-body bg-light">
            <h5 class="card-title"><?php echo $perproduk['nama_jenis_jasa_produk']; ?></h5>
            <p class="card-text">Rp. <?php echo number_format($perproduk['harga_jenis_jasa_produk']); ?></p>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i> <br>

            <a href="beli.php?id=<?php echo $perproduk['id_jenis_jasa_produk']; ?>" class="btn btn-primary mt-2" > Purchase</a>
            <a href="detail.php?id=<?php echo $perproduk['id_jenis_jasa_produk']; ?>" class="btn btn-danger mt-2">Detail</a>
          </div>
        </div>
          <?php } ?>
       <?php 
    $ambil=$koneksi->query("SELECT * FROM produk WHERE id_kategori=7");
    ?>
    <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
        <div class="card mr-2 ml-2" style="width: 16rem;">
          <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" class="card-img-top" height="300px" alt="...">
          <div class="card-body bg-light">
            <h5 class="card-title"><?php echo $perproduk['nama_produk']; ?></h5>
            <p class="card-text">Rp. <?php echo number_format($perproduk['harga_produk']); ?></p>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i><br>
            <a href="beli2.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary mt-2" > Purchase</a>
            <a href="detail2.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-danger mt-2">Detail</a>
          </div>
        </div>
          <?php } ?>
      </div>
    </div>
    </div>

    <br>
    <br>


    <?php include 'footer.php'; ?>
  </body>
</html>