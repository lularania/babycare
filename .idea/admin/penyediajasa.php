<h2>Daftar Penyedia Jasa</h2>


<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Penyedia Jasa</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Profile Penyedia Jasa</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$ambil=$koneksi->query("SELECT * FROM penyedia_jasa");
		?>
		<?php 
		while($pecah = $ambil->fetch_assoc()){
		?>
		<tr>
			<td><?php echo $pecah["id_penyedia_jasa"] ?></td>
			<td><?php echo $pecah['nama_penyedia_jasa']; ?></td>
			<td><?php echo $pecah['email_penyedia_jasa']; ?></td>
			<td><?php echo $pecah['telepon_penyedia_jasa']; ?></td>
			<td><?php echo $pecah['Profile_penyedia_jasa']; ?></td>
			<td>
				<a href="index.php?halaman=hapuspenyediajasa&id=<?php echo$pecah['id_penyedia_jasa']; ?>" class="btn-danger btn">hapus</a>
				<a href="" class="btn btn-warning">ubah</a>
			</td>
		</tr>
		<?php 
		}
		?>
	</tbody>
</table>
<a href="index.php?halaman=tambahpenyediajasa" class="btn btn-primary">Tambah Data</a>