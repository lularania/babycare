<?php
session_start();

include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('silahkan login terlebih dahulu');</script>";
	echo "<script>location='sign.php';</script>";
	exit();
}

$id_pembelian = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembayaran LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

if($_SESSION["pelanggan"]["id_pelanggan"]!==$detbay["id_pelanggan"])
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
							<td><?php echo $detbay["nama"]; ?></td>
						</tr>
						<tr>
							<th>Bank</th>
							<td><?php echo $detbay["bank"]; ?></td>
						</tr>
						<tr>
							<th>Tanggal</th>
							<td><?php echo $detbay["tanggal"]; ?></td>
						</tr>
						<tr>
							<th>Jumlah</th>
							<td>Rp. <?php echo number_format( $detbay["total"]); ?> </td>
						</tr>
						<tr>
							<?php if (!empty($detbay["resi_pengiriman"])): ?>
							<th>Resi Pengiriman</th>
							<td><?php echo $detbay["resi_pengiriman"]; ?></td>
							<?php endif ?>
						</tr>
					</table>
					<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p> Terimakasih telah melakukan pembayaran, anda akan menerima pesan konfirmasi dari kami berupa nomer resi pengiriman.</p> 
				<br>
			<p>Silahkan check laman ini, apabila dalam 2x24 jam tidak menerima konfirmasi, silahkan menghubungi admin via WA untuk konfirmasi lebih lanjut.</p> 
			<br>

		<strong>Silahkan Klik Button di Bawah</strong>

    <a href="https://api.whatsapp.com/send?phone=62895366053139" class="btn btn-primary btn-xs">Kontak Admin</a>
		</div>
		
	</div>
</div>
				</div>
				<div class="col-md-6">
					<img src="bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive">
					
				</div>
			</div>
</body>
</html>