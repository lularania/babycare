<?php
session_start();

include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('silahkan login terlebih dahulu');</script>";
	echo "<script>location='sign.php';</script>";
	exit();
}

$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

$id_pelanggan_beli = $detpem["id_pelanggan"];
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if($id_pelanggan_login !==$id_pelanggan_beli)
{
	echo "<script>alert('akses data ditolak');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <br>
    <br>
	<title>Pembayaran | Babycare</title>
</head>
<body>

	<?php include'menu.php'; ?>
	<hr>

		<div class="container">
			<h2>Konfirmasi Pembayaran</h2>
			<p>Silahkan kirim bukti pembayaran anda</p>
			<div class="alert alert-info">Total Tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]); ?></strong></div>

				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Nama Penyetor</label>
						<input type="text" class="form-control" name="nama">
					</div>
					<div class="form-group">
						<label>Bank</label>
						<input type="text" class="form-control" name="bank">
					</div>
					<div class="form-group">
						<label>Jumlah</label>
						<input type="number" class="form-control" name="total">
					</div>
					<div class="form-group">
						<label>Foto Bukti</label>
						<input type="file" class="form-control" name="bukti">
						<p class="text-danger">Foto Bukti Harus berupa JPG, PNG, dan JPEG</p>
					</div>
					<button class="btn btn-primary" name="kirim">Kirim</button>
				</form>

		</div>
		<br>
		<br>

		<?php

		if (isset($_POST["kirim"]))
		{
			$namabukti = $_FILES["bukti"]["name"];
			$lokasibukti = $_FILES["bukti"]["tmp_name"];
			$namafiks = date("YmdHis").$namabukti;
			move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");
			$nama = $_POST["nama"];
			$bank = $_POST["bank"];
			$total = $_POST["total"];
			$tanggal = date("Y-m-d");

			$koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,total,tanggal,bukti) VALUES('$idpem','$nama','$bank','$total','$tanggal','$namafiks')");

			$koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem'");
			echo "<script>alert('terimakasih telah melakukan transaksi');</script>";
	echo "<script>location='riwayat.php';</script>";
		}

		?>
</body>
</html>