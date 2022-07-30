<?php
session_start();

include 'koneksi.php';


if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
  echo "<script>alert('silahkan belanja dulu, keranjang kosong')</script>";
  echo "<script>location='index.php';</script>";

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
    <link rel="stylesheet" type="text/css" href="style2.css">

    <title>Keranjang Barang | Baby Care</title>
  </head>
  <body>
    <?php include 'menu.php'; ?>
  <br>
  <br>
  <br>
  <br>
  
  <style type='text/css'> .content-inner { margin-top: -30px !important; } </style>

<section class="konten">
  <div class="container">
    <h2>Keranjang Produk</h2>
    <br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subharga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor=1; ?>
        <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
          <?php 
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
          $pecah = $ambil->fetch_assoc();
          $subharga = $pecah["harga_produk"]*$jumlah;
          ?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td><?php echo $pecah["nama_produk"];?></td>
          <td>Rp.<?php echo number_format($pecah["harga_produk"]); ?></td>
          <td><?php echo $jumlah; ?></td>
          <td>Rp. <?php echo number_format($subharga); ?></td>
          <td>
            <a href="hapuskeranjang2.php?id=<?php echo $id_produk?>" class="btn btn-danger btn-xs">Hapus</a>
          </td>
        </tr>
        <?php $nomor++; ?>
        <?php endforeach ?>
      </tbody>
    </table>
    <a href="checkout2.php" class="btn btn-primary">Checkout</a>
    <a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
  </div>
</section>
          
</body>
</html>
