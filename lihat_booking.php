<?php
session_start();

include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('silahkan login terlebih dahulu');</script>";
	echo "<script>location='sign.php';</script>";
	exit();
}

$id_booking = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN booking ON pembayaran.id_booking=booking.id_booking WHERE booking.id_booking='$id_booking'");
$book = $ambil->fetch_assoc();

if($_SESSION["pelanggan"]["id_pelanggan"]!==$book["id_pelanggan"])
{
	echo "<script>alert('tidak dapat mengakses data lain');</script>";
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
	<title> Lihat Pembayaran | Baby Care</title>
	<br>
</head>
<body>

	<?php include'menu.php'; ?>
	<hr>

		<div class="container">
			<h2>Lihat Pembayaran</h2>
			<br>
			<div class="row">
				<div class="col-md-6">
					<table class="table">
						<tr>
							<th>Nama</th>
							<td><?php echo $book["nama"]; ?></td>
						</tr>
						<tr>
							<th>Bank</th>
							<td><?php echo $book["bank"]; ?></td>
						</tr>
						<tr>
							<th>Tanggal</th>
							<td><?php echo $book["tanggal"]; ?></td>
						</tr>
						<tr>
							<th>Jumlah</th>
							<td>Rp. <?php echo number_format($book["harga_booking"]); ?></td>
						</tr>
						<tr>
							<?php if (!empty($book["tempat_konsultasi"])): ?>
							<th>Tempat Layanan Konsultasi Offline</th>
							<td><?php echo $book["tempat_konsultasi"]; ?></td>
							<?php endif ?>
						</tr>
						<tr>
							<?php if (!empty($book["penyedia_jasa"])): ?>
							<th>Penyedia Jasa</th>
							<td><?php echo ($book["penyedia_jasa"]); ?></td>
							<?php endif ?>
							
						</tr>

					</table>
					<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p> Terimakasih telah melakukan pembayaran, anda akan menerima pesan konfirmasi dari kami berupa identitas penyedia jasa.</p> 
				<br>
			<p>Apabila dalam 2x24 jam tidak menerima email ataupun WA, silahkan menghubungi penyedia jasa via email ataupun WA untuk konfirmasi lebih lanjut.</p> 
			<br>

		<strong>Silahkan Klik Button di Bawah</strong>

    <a href="daftarpj.php" class="btn btn-primary btn-xs">Kontak Penyedia Jasa</a>
		</div>
		
	</div>
</div>

	</div>
				<div class="col-md-6">
					<img src="bukti_pembayaran/<?php echo $book["bukti"] ?>" alt="" class="img-responsive">
					
				</div>
			</div>
</body>
</html>