<?php 
session_start();
include 'koneksi.php';
?>
<?php
$id_pelanggan = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pecah = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <br>
    <br>
  <title> Ubah Informasi Akun | Baby Care</title>
  <br>
</head>
<body>

  <?php include'menu.php'; ?>
  <hr>

<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nama Pelanggan</label>
    <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_pelanggan'];?>">
  </div>
  <div class="form-group">
    <label>Email Pelanggan</label>
    <input type="text" class="form-control" name="email" value="<?php echo $pecah['email_pelanggan'];?>">
  </div>
  <div class="form-group">
    <label>Password Pelanggan</label>
    <input type="text" class="form-control" name="password" value="<?php echo $pecah['password_pelanggan'];?>">
  </div>
  <div class="form-group">
    <label>Username Pelanggan</label>
    <input type="text" class="form-control" name="username" value="<?php echo $pecah['password_pelanggan'];?>">
  </div>
  <div class="form-group">
  <label>Telepon Pelanggan</label>
    <input type="text" class="form-control" name="telepon" value="<?php echo $pecah['telepon_pelanggan']; ?>">
  </div>
  <button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php 
if (isset($_POST['ubah']))
{
  
  $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',email_pelanggan='$_POST[email]',password_pelanggan='$_POST[password]',username='$_POST[username]', telepon_pelanggan='$_POST[telepon]' WHERE id_pelanggan='id_pelanggan'");

echo "<script>alert('data pelanggan diubah');</script>";
echo "<script>location='Babycare.php';</script>";
}
?>

</section>

</body>
</html>

