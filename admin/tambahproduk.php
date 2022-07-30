<?php
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) 
{
  $datakategori[] = $tiap;
}
?>
<h2>Tambah Produk</h2>

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
  <label>Stok Produk</label>
 <input type="text" class="form-control" name="stok">	
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
  $kategori = $_POST['id_kategori'];
  $stok = $_POST['stok'];
  $deskripsi  = $_POST['deskripsi'];
  $harga  = $_POST['harga'];
  $foto = $_FILES['foto']['name'];
  $lokasi = $_FILES['foto']['tmp_name'];
  move_uploaded_file($lokasi, "../foto_produk/".$foto);
  $mysqli  = "INSERT INTO produk (nama_produk, stok_produk, harga_produk, foto_produk, deskripsi_produk, id_kategori) VALUES ('$nama', '$stok','$harga','$foto','$deskripsi','$kategori')";
  $result  = mysqli_query($koneksi, $mysqli);
  if ($result) {
    echo "<div class='alert alert-info'>Barang Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
  } else {
    echo "Input gagal";
  }
  mysqli_close($koneksi);
 }
?>
