<h2>Detail Pembelian</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<!--<pre><?php //print_r($detail); ?></pre>-->


<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
	tanggal: <?php echo $detail['tanggal_pembelian']; ?> <br>
	total: Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
	status: <?php echo $detail['status_pembelian']; ?>
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
		<h3>Pengiriman</h3>
		<strong><?php echo $detail['nama_kota'];?></strong>
		<p>alamat pengiriman: <?php echo $detail['alamat_pengiriman']; ?> <br>
		tarif : Rp. <?php echo number_format($detail['tarif']); ?> </p> <br>
	</div>

</div>

 <table class="table table-bordered">
 	<thead>
 		<tr>
 			<th>No</th>
 			<th>Nama Produk</th>
 			<th>Harga</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
 		<?php while($pecah=$ambil->fetch_assoc()) { ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama_produk']; ?></td>
 			<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
 		</tr>
 		<?php $nomor++; ?>
 	<?php } ?>
 	</tbody>
 </table>