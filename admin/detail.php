<h2>Detail Booking</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM booking JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan WHERE booking.id_booking='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<!--<pre><?php //print_r($detail); ?></pre>-->


<div class="row">
	<div class="col-md-4">
		<h3>Booking</h3>
		<p>
	tanggal: <?php echo $detail['tanggal_booking']; ?> <br>
	total: Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
	status: <?php echo $detail['status_booking']; ?>
</p>
<br>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama_pelanggan'];?></strong>
		<p>
	<?php echo $detail['email_pelanggan']; ?> <br>
	<?php echo $detail['telepon_pelanggan']; ?>
</p> <br>
	</div>
	<div class="col-md-4">
		<h3>Detail</h3>
		<strong><?php echo $detail['lokasi'];?></strong>
		<p>alamat lengkap: <?php echo $detail['alamat_lengkap']; ?> <br>
		tarif : Rp. <?php echo number_format($detail['asuransi']); ?> </p> <br>
	</div>

</div>

 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama Jenis Jasa</th>
 			<th>Harga</th>
 			<th>Jumlah</th>
 			<th>Subtotal</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<?php $ambil=$koneksi->query("SELECT * FROM booking_success JOIN booking ON booking_success.id_booking=booking.id_booking WHERE booking_success.id_booking='$_GET[id]'"); ?>
 		<?php while($pecah=$ambil->fetch_assoc()) { ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
 			<td><?php echo $pecah['jumlah_booking']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['harga']*$pecah['jumlah_booking']); ?></td>
 		</tr>
 		<?php $nomor++; ?>
 	<?php } ?>
 	</tbody>
 </table>