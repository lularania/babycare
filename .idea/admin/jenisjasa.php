<h2>Daftar Jasa</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Kategori</th>
			<th>Nama Jasa</th>
			<th>Nama Penyedia Produk atau Jasa</th>
			<th>Harga Jasa</th>
			<th>Foto Jasa</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php 
		$ambil=$koneksi->query("SELECT * FROM jenis_jasa_produk JOIN penyedia_jasa ON jenis_jasa_produk.id_penyedia_jasa=penyedia_jasa.id_penyedia_jasa");
		?>
		<?php 
		while($pecah = $ambil->fetch_assoc()){
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['id_kategori']; ?></td>
			<td><?php echo $pecah['nama_jenis_jasa_produk']; ?></td>
			<td><?php echo $pecah['nama_penyedia_jasa']; ?></td>
			<td><?php echo $pecah['harga_jenis_jasa_produk']; ?></td>
			<td>
				<img src="../foto_jasa/<?php echo $pecah['foto_jenis_jasa_produk']; ?>" width="100">
			</td>
			<td>
				<a href="index.php?halaman=hapusjasa&id=<?php echo $pecah['id_jenis_jasa_produk']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahjasa&id=<?php echo $pecah['id_jenis_jasa_produk']; ?>" class="btn btn-warning">ubah</a>
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
<a href="index.php?halaman=tambahjasa" class="btn btn-primary">Tambah Data</a>