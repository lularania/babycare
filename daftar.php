<?php include 'koneksi.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Baby Care</title>
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
</head>
<body>

	<br>
	<br>
	<br>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Pelanggan</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal">
						<div class="form-group">
						<label class="control-label col-md-5">Nama</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="nama" required>
							</div>
						</div>
						<div class="form-group">
						<label class="control-label col-md-5">Email</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="email" required>
							</div>
						</div>
						<div class="form-group">
						<label class="control-label col-md-5">Password</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="password" required>
							</div>
						</div>
						<div class="form-group">
						<label class="control-label col-md-5">Alamat</label>
							<div class="col-md-7">
								<textarea class="form-control" name="alamat_pelanggan
								" required></textarea>
							</div>
						</div>
						<div class="form-group">
						<label class="control-label col-md-5">Telepon</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="telepon" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-7 col-md-offset-5">
								<button class="btn btn-primary" name="daftar">Daftar</button>
							</div>
						</div>
					</form>
					<?php

					if (isset($_POST["daftar"])) 
					{
						$nama = $_POST["nama"];
						$email = $_POST["email"];
						$password = $_POST["password"];
						$alamat_pelanggan = $_POST["alamat_pelanggan"];
						$telepon = $_POST["telepon"];

						$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
						$yangcocok = $ambil->num_rows;

						if ($yangcocok==1)
						{
							echo "<script>alert('pendaftaran gagal, email sudah terdaftar');</script>";
							echo "<script>location='daftar.php';</script>";
						}

						else
						{
							$koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES ('$email', '$password', '$nama', '$telepon', '$alamat_pelanggan')");
							echo "<script>alert('pendaftaran sukses, silahkan login terlebih dahulu');</script>";
							echo "<script>location='sign.php';</script>";

						}

					}

					?>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>