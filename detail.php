<?php 
session_start();
include 'koneksi.php';
?>
<?php
$id_jenis_jasa_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM jenis_jasa_produk  WHERE id_jenis_jasa_produk='$id_jenis_jasa_produk'");
$detail = $ambil->fetch_assoc();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">

    <title> Detail Jasa | Baby Care</title>
  </head>

<nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top">
      <div class="container">

        <h3><i class="fas fa-baby text-white mr-2"></i></h3>
          <a class="navbar-brand font-weight-bold text-white" href="index.php">Baby Care</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
           
          </div>
   </div>
</nav>

<br>
<br>
<br>
<br>
<section class= "konten">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="foto_jasa/<?php echo $detail["foto_jenis_jasa_produk"]; ?>" alt="" class="img-responsive">	
			</div>
			<div class="col-md-6">
				<h2><?php echo $detail["nama_jenis_jasa_produk"]; ?></h2>
				<h5>ID Penyedia Jasa:<?php echo $detail["id_penyedia_jasa"]; ?></h2>
				<h4>Rp. <?php echo number_format($detail["harga_jenis_jasa_produk"]); ?></h4>
				<form method="post">
					<div class="form_group">
						<div class="input-group-btn">
							<a href="beli.php?id=<?php echo $detail['id_jenis_jasa_produk']; ?>" class="btn btn-primary mt-2" >Booking</a>
							</div>
						
					</div>
				</form>
				<?php

				if (isset($_POST["beli"])) 
				{
					echo "<script>alert('jasa telah masuk ke keranjang belanja');</script>";
					echo "<script>location='keranjangbc.php';</script>";
				}

				  ?>
				<h5><?php echo $detail["deskripsi_jenis_jasa_produk"]; ?></h5>
				<a href="index.php" class="btn btn-warning">Kembali ke Home</a>
				<br>
				<br>
				<br>
			</div>
		</div>
	</div>
</section>

</body>
</html>

