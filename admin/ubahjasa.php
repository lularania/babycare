<h2>Ubah Jasa</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM jenis_jasa_produk WHERE id_jenis_jasa_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<?php
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) 
{
  $datakategori[] = $tiap;
}
?>

<form method="post" enctype="multipart/form-data">
  <div class="form-group">
  <label>Kategori</label>
  <select class="form-control" name="id_kategori">
    <option>Pilih Kategori</option>
    <?php foreach ($datakategori as $key => $value) : ?>
    <option value="<?php echo $value["id_kategori"] ?>" <?php if ($pecah["id_kategori"]==$value["id_kategori"]) {echo "selected";} ?>>
      <?php echo $value["nama_kategori"] ?></option>
  <?php endforeach ?>
  </select>
</div>
  <div class="form-group">
    <label>Nama Produk</label>
    <input type="text" class="form-control" name="nama" value="<?php echo $pecah ['nama_jenis_jasa_produk'];?>">
  </div>
  <div class="form-group">
    <label>Harga(Rp)</label>
    <input type="number" class="form-control" name="harga" value="<?php echo $pecah ['harga_jenis_jasa_produk'];?>">
  </div>
  <div class="form-group">
    <label>Id Penyedia Jasa</label>
    <input type="number" class="form-control" name="pj" value="<?php echo $pecah ['id_penyedia_jasa'];?>">
  </div>
  <div class="form-group">
    <img src="../foto_jasa/<?php echo $pecah['foto_jenis_jasa_produk'] ?>" width="200">
  </div>
  <div class="form-group">
    <label>Ganti Foto</label>
    <input type="file" class="form-control" name="foto">
  </div>
  <div class="form-group">
  <label>Deskripsi</label>
    <textarea class="form-control" name="deskripsi" row="10">
      <?php echo $pecah['deskripsi_jenis_jasa_produk']; ?>
    </textarea> 
  </div>
  <button class="btn btn-primary" name="ubah">Ubah</button>

</form>
<?php 
if (isset($_POST['ubah']))
{
  $namafoto= $_FILES['foto']['name'];
  $lokasifoto= $_FILES['foto']['tmp_name'];
  //jika diubah
if (!empty($lokasifoto)) 
{
  move_uploaded_file($lokasifoto, "../foto_jasa/".$namafoto);

  $koneksi->query("UPDATE jenis_jasa_produk SET nama_jenis_jasa_produk='$_POST[nama]',harga_jenis_jasa_produk='$_POST[harga]', id_penyedia_jasa='$_POST[pj]',foto_jenis_jasa_produk='$namafoto',deskripsi_jenis_jasa_produk='$_POST[deskripsi]', id_kategori='$_POST[id_kategori]' WHERE id_jenis_jasa_produk='$_GET[id]'"); 
}
else
{
  $koneksi->query("UPDATE jenis_jasa_produk SET nama_jenis_jasa_produk='$_POST[nama]',harga_jenis_jasa_produk='$_POST[harga]', id_penyedia_jasa='$_POST[pj]', deskripsi_jenis_jasa_produk='$_POST[deskripsi]', id_kategori='$_POST[id_kategori]' WHERE id_jenis_jasa_produk='$_GET[id]'");
}
echo "<script>alert('data jasa diubah');</script>";
echo "<script>location='index.php?halaman=jenisjasa';</script>";
}
?>
