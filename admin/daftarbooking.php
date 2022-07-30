<h2>Daftar Booking Jasa </h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal Booking</th>
			<th>Status Pembayaran</th>
			<th>Total Harga</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php 
		$ambil=$koneksi->query("SELECT * FROM booking JOIN pelanggan ON booking.id_pelanggan=pelanggan.id_pelanggan");
		?>
		<?php 
		while($pecah = $ambil->fetch_assoc()){
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['tanggal_booking']; ?></td>
			<td><?php echo $pecah['status_booking']; ?></td>
			<td><?php echo $pecah['total_pembelian']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_booking'];?>" class="btn-primary btn">detail</a>
				<?php if($pecah['status_booking']!=="pending" ): ?>
				<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_booking'];?>" class="btn btn-success">Pembayaran</a>
			<?php endif ?>
			</td>
		</tr>
		<?php
		$nomor++;
		?>
		<?php 
		}
		?>
	</tbody>
</table>