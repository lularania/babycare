<?php
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";
if (isset($_POST["kirim"])) 
{
	$tgl_mulai = $_POST["tglm"];
	$tgl_selesai = $_POST["tgls"];
	$ambil = $koneksi->query("SELECT * FROM booking LEFT JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan WHERE tanggal_booking BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
	while ($pecah = $ambil->fetch_assoc()) 
	{
		$semuadata[]=$pecah;
	}
}

?>
<h2>Laporan Booking Jasa dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?>  </h2>
<hr>

<form method="post">
	<div class="row">
		<div class="col-md-5">
			<label>Tanggal Mulai</label>
			<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
		</div>
		<div class="col-md-5">
			<label>Tanggal Selesai</label>
			<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label> <br>
			<button class="btn btn-primary" name="kirim">Lihat</button>
		</div>
	</div>
</form>
<br>
<br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Id Penyedia Jasa</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0 ?>
		<?php foreach ($semuadata as $key => $value):?> 
		<?php $total+=$value['total_pembelian'] ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_pelanggan"]; ?></td>
			<td><?php echo $value["id_penyedia_jasa"]; ?></td>
			<td><?php echo $value["tanggal_booking"]; ?></td>
			<td>Rp. <?php echo number_format($value["total_pembelian"]) ;?></td>
			<td><?php echo $value["status_booking"]; ?></td>
		</tr>
	<?php endforeach ?>
	</tbody>
<tfoot>
	<th colspan="4">Total</th>
	<th>Rp. <?php echo number_format($total) ?> </th>
	<th></th>
</tfoot>
</table>