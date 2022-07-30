<h2>Ubah Penyedia Jasa</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM penyedia_jasa WHERE id_penyedia_jasa='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

  <div class="form-group">
    <label>Nama Penyedia Jasa</label>
    <input type="text" class="form-control" name="nama" value="<?php echo $pecah ['nama_penyedia_jasa'];?>">
  </div>
  <div class="form-group">
    <label>Email Penyedia Jasa</label>
    <input type="text" class="form-control" name="email" value="<?php echo $pecah ['email_penyedia_jasa'];?>">
  </div>
  <div class="form-group">
    <label>Telepon Penyedia Jasa</label>
    <input type="number" class="form-control" name="telepon" value="<?php echo $pecah ['telepon_penyedia_jasa'];?>">
  </div>
  <div class="form-group">
  <label>Profile Penyedia Jasa</label>
    <textarea class="form-control" name="profile" row="10">
      <?php echo $pecah['Profile_penyedia_jasa']; ?>
    </textarea> 
  </div>
  <button class="btn btn-primary" name="ganti">Ubah</button>

</form>

<?php 
if (isset($_POST['ganti']))
{
  
  $koneksi->query("UPDATE penyedia_jasa SET nama_penyedia_jasa='$_POST[nama]',email_penyedia_jasa='$_POST[email]',telepon_penyedia_jasa='$_POST[telepon]',Profile_penyedia_jasa='$_POST[profile]' WHERE id_penyedia_jasa='$_GET[id]'");

echo "<script>alert('data penyedia jasa diubah');</script>";
echo "<script>location='index.php?halaman=penyediajasa';</script>";
}
?>
