<?php
include 'koneksi.php';

?>

<?php
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR deskripsi_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc())
{
  $semuadata[]=$pecah;
}

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

    <title>Pencarian | Baby Care</title>
  </head>
  <body>
    <?php include 'menu.php'; ?>
<br>
<br>
<br>
<br>
<br>
    <div class="container">
      <h3>Hasil Pencarian Produk <?php echo $keyword ?></h3>
      <?php if (empty($semuadata)): ?>
        <div class="alert alert-danger">Pencarian Produk <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
      <?php endif ?>
      <div class="row">
      <?php 
      foreach ($semuadata as $key => $value): ?>
       <div class="card mr-2 ml-2" style="width: 16rem;">
          <img src="foto_produk/<?php echo $value['foto_produk']; ?>" class="card-img-top" alt="...">
          <div class="card-body bg-light">
            <h5 class="card-title"><?php echo $value['nama_produk']; ?></h5>
            <p class="card-text">Rp. <?php echo number_format($value['harga_produk']); ?></p>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i><br>
            <a href="beli2.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary mt-2" > Purchase</a>
            <a href="detail2.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-danger mt-2">Detail</a>
          </div>
        </div>
 <?php endforeach ?>
 <br>
 <?php
$keyword = $_GET["keyword"];

$semuajasa=array();
$ambil = $koneksi->query("SELECT * FROM jenis_jasa_produk WHERE nama_jenis_jasa_produk LIKE '%$keyword%' OR deskripsi_jenis_jasa_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc())
{
  $semuajasa[]=$pecah;
}

?>
<br>
<div class="container">
  <br>
      <h3>Hasil Pencarian Jasa <?php echo $keyword ?></h3>
      <?php if (empty($semuajasa)): ?>
        <div class="alert alert-danger">Pencarian Jasa <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
      <?php endif ?>
      <div class="row">
      <?php 
      foreach ($semuajasa as $key => $value): ?>
       <div class="card mr-2 ml-2" style="width: 16rem;">
          <img src="foto_jasa/<?php echo $value['foto_jenis_jasa_produk']; ?>" class="card-img-top" alt="...">
          <div class="card-body bg-light">
            <h5 class="card-title"><?php echo $value['nama_jenis_jasa_produk']; ?></h5>
            <p class="card-text">Rp. <?php echo number_format($value['harga_jenis_jasa_produk']); ?></p>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i>
            <i class="fas fa-star text-warning"></i><br>
            <a href="beli.php?id=<?php echo $value['id_jenis_jasa_produk']; ?>" class="btn btn-primary mt-2" > Purchase</a>
            <a href="detail.php?id=<?php echo $value['id_jenis_jasa_produk']; ?>" class="btn btn-danger mt-2">Detail</a>
          </div>
        </div>
 <?php endforeach ?>
      

</div>
</body>
</html>
