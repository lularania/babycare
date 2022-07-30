<h2>Tambah Produk Atau Jasa</h2>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
	<label>Nama Pelanggan</label>
	<input type="text" class="form-control" name="namapel">
</div>
<div class="form-group">
  <label>Email</label>
 <input type="text" class="form-control" name="email">	
 </div>
 <div class="form-group">
  <label>Telepon</label>
 <input type="text" class="form-control" name="telp">
 </div>
 <button class="btn btn-primary" name="save">Simpan</button>
 </form>

<?php
if (isset($_POST['save'])) 
{
  $nama  = $_POST['namapel'];
  $email= $_POST['email'];
  $telpon = $_POST['telp'];
  
  $mysqli  = "INSERT INTO pelanggan (nama_pelanggan , email_pelanggan , telepon_pelanggan) VALUES ('$nama','$email', '$telpon')";

  $result  = mysqli_query($koneksi, $mysqli);
  if ($result) {
    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
  } else {
    echo "Input gagal";
  }
  mysqli_close($koneksi);
 }
?>
