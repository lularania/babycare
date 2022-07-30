<?php 
session_start();
include 'koneksi.php';
?>
<?php
$id_pelanggan = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pecah = $ambil->fetch_assoc();
?>
<?php

$idpelangganyangbeli = $pecah["id_pelanggan"];

$idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];

if($idpelangganyangbeli!==$idpelangganyanglogin)
{
  echo "<script>alert('tidak dapat di akses');</script>";
  echo "<script>location='Babycare.php';</script>";
  exit();
}
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
  <title> Informasi Akun | Baby Care</title>
  <br>
</head>
<body>

  <?php include'menu.php'; ?>
  <hr>
      <div class="container">
      <h2>Informasi Akun</h2>
      <br>
      <div class="row">
        <div class="col-md-6">
          <table class="table">
            <tr>
              <th>Nama User</th>
              <td><?php echo $pecah["nama_pelanggan"]; ?></td>
            </tr>
            <tr>
              <th>Email Pelanggan</th>
              <td><?php echo $pecah["email_pelanggan"]; ?></td>
            </tr>
            <tr>
              <th>Password Pelanggan</th>
              <td><?php echo $pecah["password_pelanggan"]; ?></td>
            </tr>
                  <tr>
              <th>Username Pelanggan</th>
              <td><?php echo $pecah["username"]; ?></td>
            </tr>
            <tr>
              <th>No.Telp</th>
              <td><?php echo $pecah["telepon_pelanggan"]; ?> </td>
            </tr>
          </table>
</section>

</body>
</html>

