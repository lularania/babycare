<?php
session_start();

include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"])) 
{
	echo "<script>alert('silahkan login terlebih dahulu');</script>";
	echo "<script>location='sign.php';</script>";
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
	<title>Riwayat | Baby Care</title>
</head>
<body>

	<?php include'menu.php'; ?>
	<hr>
	<section class="riwayat">
		<div class="container">
			<h4>Riwayat Belanja Saudara/i <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?> </h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Total</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$nomor=1;
					$id_pelanggan =  $_SESSION["pelanggan"] ["id_pelanggan"];
					$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
					while ($pecah = $ambil->fetch_assoc()) {
					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah["tanggal_pembelian"]; ?></td>
						<td>
							<?php echo $pecah["status_pembelian"]; ?>
							</td>
						<td><?php echo number_format($pecah["total_pembelian"]); ?></td>
						<td>
							<a href="nota2.php?id=<?php echo $pecah["id_pembelian"]?>" class="btn btn-info">Nota</a>
							<?php if ($pecah['status_pembelian']=="pending"): ?>
								<a href="pembayaran2.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-warning">Lakukan Pembayaran
								</a>
								<?php else: ?>
									<a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-success">Lihat Pembayaran
								</a>
						<?php endif ?>
							
						</td>
					</tr>
					<?php $nomor++; ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</section>

			<section class="riwayat">
		<div class="container">
			<h4>Riwayat Booking Saudara/i <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?> </h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Status</th>
						<th>Total</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$nomor=1;
					$id_pelanggan =  $_SESSION["pelanggan"] ["id_pelanggan"];
					$ambil = $koneksi->query("SELECT * FROM booking WHERE id_pelanggan='$id_pelanggan'");
					while ($pecah = $ambil->fetch_assoc()) {
					?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah["tanggal_booking"]; ?></td>
						<td><?php echo $pecah["status_booking"]; ?>
							</td>
						</td>
						<td><?php echo number_format($pecah["total_pembelian"]); ?></td>
						<td>
							<a href="nota.php?id=<?php echo $pecah["id_booking"] ?>" class="btn btn-info">Nota</a>
							<?php if ($pecah['status_booking']=="pending"): ?>
								<a href="pembayaran.php?id=<?php echo $pecah["id_booking"] ?>" class="btn btn-warning">Lakukan Pembayaran
								</a>
								<?php else: ?>
									<a href="lihat_booking.php?id=<?php echo $pecah["id_booking"] ?>" class="btn btn-success">Lihat Pembayaran
								</a>
						<?php endif ?>
						</td>
					</tr>
					<?php $nomor++; ?>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</section>
	
</body>
</html>