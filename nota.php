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

    <title> Nota Booking | Baby Care</title>
  </head>
  <body>
    <?php include 'menu.php'; ?>

<section class="konten">
	<div class="container">
		<h2>Detail Booking</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM booking JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan WHERE booking.id_booking='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<?php

$idpelangganyangbeli = $detail["id_pelanggan"];

$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

if($idpelangganyangbeli!==$idpelangganyanglogin)
{
	echo "<script>alert('tidak dapat di akses');</script>";
	echo "<script>location='riwayat.php';</script>";
	exit();
}
?>

 <br>
 <br>

<h2>Detail Booking</h2>
<br>
<div class="row">
	<div class="col-md-4">
		<h3>Booking</h3>
		<strong>No. Booking: <?php echo $detail['id_booking']; ?></strong> <br>
		<p>
	Tanggal Booking: <?php echo $detail['tanggal_booking']; ?> <br>
	Total: <?php echo $detail['total_pembelian']; ?>
</p>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama_pelanggan'];?></strong> <br>
		<p>
	<?php echo $detail['email_pelanggan']; ?> <br>
	<?php echo $detail['telepon_pelanggan']; ?> 
</p>
	</div>
	<div class="col-md-4">
		<h3>Detail</h3>
		<strong><?php echo $detail['lokasi']; ?></strong> <br>
		Asuransi Kesehatan : Rp. <?php echo number_format($detail['asuransi']); ?> <br>
		Alamat : <?php echo $detail['alamat_lengkap']; ?>
	</div>
</div>
<br>
<table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Jasa</th>

          <th>Harga</th>
         
        </tr>
      </thead>
      <tbody>
    <?php $nomor=1; ?>
    <?php
    $ambil=$koneksi->query("SELECT * FROM booking_success WHERE id_booking='$_GET[id]'"); ?>
    <?php while($pecah=$ambil->fetch_assoc()) { ?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nama']; ?></td>
      <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
         </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>
</table>

<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>

				<strong>BANK MANDIRI 140-00-1917470-6 AN. MOM & BABY CARE CORPORATION</strong>

			</p>
      <a href="riwayat.php" class="btn btn-danger btn-xs">Pembayaran</a>
		</div>
		
	</div>
</div>

	</div>
</section>

</body>
</html>