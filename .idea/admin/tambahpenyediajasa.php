<h2>Tambah Penyedia Jasa</h2>

<form method="post" enctype="multipart/form-data">
<div class="form-group">
	<label>Nama Penyedia Jasa</label>
	<input type="text" class="form-control" name="namapj">
</div>
<div class="form-group">
  <label>Profile Penyedia Jasa</label>
 <input type="text" class="form-control" name="ppj">
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
  $nama  = $_POST['namapj'];
  $profile= $_POST['ppj'];
  $email = $_POST['email'];
  $telpon = $_POST['telp'];
  
  $mysqli  = "INSERT INTO penyedia_jasa (nama_penyedia_jasa, Profile_penyedia_jasa, email_penyedia_jasa, telepon_penyedia_jasa) VALUES ('$nama','$profile','$email', '$telpon')";

  $result  = mysqli_query($koneksi, $mysqli);
  if ($result) {
    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penyediajasa'>";
  } else {
    echo "Input gagal";
  }
  mysqli_close($koneksi);
 }
?>
