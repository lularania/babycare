<?php 
session_start();
include 'koneksi.php';
?>
<?php
$id_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
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

    <title> Detail Produk | Baby Care</title>
  </head>
  <body>
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
<section class= "konten">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="" class="img-responsive">	
			</div>
			<div class="col-md-6">
				<h2><?php echo $detail["nama_produk"]; ?></h2>
				<h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>
				<h5>Stok: <?php echo $detail["stok_produk"] ?></h5>
				<form method="post">
					<div class="form_group">
						<div class="input-group">
							<input type="number" min="1"class="form-control" name="jumlah" max="<?php echo $detail["stok_produk"] ?>">
							<br>
							<div class="col-md-4"></div>
							<div class="input-group-btn">
								<button class="btn btn-primary" name="beli">Beli</button>
							</div>
						</div>
						<h5><?php echo $detail["deskripsi_produk"]; ?></h5>
         				<div class="row">
						<div class="col-md-9">
					<div class="alert alert-info">
						<strong>DEAR PELANGGAN BABY CARE YANG TERHORMAT,</strong>
						<br>
					<p>Apabila Anda Ingin Menanyakan Tentang Produk Ini Dengan Lebih Jelas<br>
				<br>
				<strong>SILAHKAN HUBUNGI ADMIN</strong>
				<br>
				<br>
			</p>
			<a href="https://api.whatsapp.com/send?phone=62895366053139" class="btn btn-danger btn">Kontak Admin</a>
			<br>
			<br>
			<strong>APABILA ADA PERMINTAAN KHUSUS YANG DISETUJUI AKAN DIPROSES APABILA SUDAH MELAKUKAN TRANSAKSI</strong>
		</div>

		
	</div>
</div>
					</div>
				</form>
				<?php

				if (isset($_POST["beli"])) 
				{	
					$jumlah = $_POST["jumlah"];
					$_SESSION["keranjang"][$id_produk] = $jumlah;
					echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
					echo "<script>location='keranjang.php';</script>";
				}

				  ?>
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

