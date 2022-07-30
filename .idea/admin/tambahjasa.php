<?php
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) 
{
  $datakategori[] = $tiap;
}
?>
<h2>Tambah Jasa</h2>

<form method="post" enctype="multipart/form-data">
  <div class="form-group">
  <label>Kategori</label>
  <select class="form-control" name="id_kategori">
    <option>Pilih Kategori</option>
    <?php foreach ($datakategori as $key => $value) : ?>
    <option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>
  <?php endforeach ?>
  </select>
</div>
<div class="form-group">
	<label>Nama</label>
	<input type="text" class="form-control" name="nama">
</div>
<div class="form-group">
  <label>Penyedia Jasa</label>
 <input type="text" class="form-control" name="pj">	
 </div>
<div class="form-group">
 <label>Harga (RP)</label>
 <input type="number" class="form-control" name="harga">
 </div>
  <div class="form-group">
  <label>Deskripsi</label>
 <input type="text" class="form-control" name="deskripsi">	
 </div>
 <div class="form-group">
  <label>Foto</label>
 <input type="file" class="form-control" name="foto">	
 </div>
 <button class="btn btn-primary" name="save">Simpan</button>

 </form>

<?php
if (isset($_POST['save'])) 
{
  $nama  = $_POST['nama'];
  $penyedia_jasa= $_POST['pj'];
  $kategori= $_POST['id_kategori'];
  $deskripsi  = $_POST['deskripsi'];
  $harga  = $_POST['harga'];
  $foto = $_FILES['foto']['name'];
  $lokasi = $_FILES['foto']['tmp_name'];
  move_uploaded_file($lokasi, "../foto_jasa/".$foto);
  $mysqli  = "INSERT INTO jenis_jasa_produk (nama_jenis_jasa_produk, id_penyedia_jasa, id_kategori , harga_jenis_jasa_produk, foto_jenis_jasa_produk, deskripsi_jenis_jasa_produk) VALUES ('$nama','$penyedia_jasa', '$kategori', '$harga','$foto','$deskripsi')";
  $result  = mysqli_query($koneksi, $mysqli);
  if ($result) {
    echo "<div class='alert alert-info'>Jasa Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jenisjasa'>";
  } else {
    echo "Input gagal";
  }
  mysqli_close($koneksi);
 }
?>
