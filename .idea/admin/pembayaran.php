<h2>Data Pembayaran</h2>

<?php

$id_booking = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_booking='$id_booking'");
$detail = $ambil->fetch_assoc();

?>

<div class="row">
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama</th>
				<td><?php echo $detail['nama'] ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?php echo $detail['bank'] ?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td>Rp. <?php echo number_format($detail['harga_booking']) ?></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td><?php echo $detail['tanggal'] ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<img src="../bukti_pembayaran/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
	</div>
	
</div>
<br>
<br>
<form method="post">
	<div class="form-group">
		<label>Tempat Konsultasi Offline</label>
		<input type="text" name="tempat_konsultasi" class="form-control">
	</div>
	<div class="form-group">
		<label>Penyedia Jasa</label>
		<input type="text" name="penyedia_jasa" class="form-control">
	</div>
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="">Pilih Status</option>
			<option value="proses booking">Proses Booking</option>
			<option value="booking selesai"> Booking Selesai</option>
			<option value="cancel">Cancel</option>
		</select>
	</div>
	<button class="btn btn-primary" name="proses">Proses</button>
</form>

<?php
if (isset($_POST["proses"])) 
{
	$tempat_konsultasi = $_POST["tempat_konsultasi"];
	$penyedia_jasa = $_POST["penyedia_jasa"];
	$status = $_POST["status"];
	$koneksi->query("UPDATE booking SET tempat_konsultasi='$tempat_konsultasi', penyedia_jasa='$penyedia_jasa', status_booking='$status' WHERE id_booking='$id_booking'");

	echo "<script>alert('data booking terupdate');</script>";
	echo "<script>location='index.php?halaman=daftarbooking';</script>";
}

?>