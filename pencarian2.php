<?php
include 'koneksi.php';

?>

<?php
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM penyedia_jasa WHERE id_penyedia_jasa LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc())
{
  $semuadata[]=$pecah;
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">

    <title>Pencarian Daftar Jasa | Baby Care</title>
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top">
      <div class="container">

        <h3><i class="fas fa-baby text-white mr-2"></i></h3>
          <a class="navbar-brand font-weight-bold text-white " href="index.php">Baby Care</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-4">
              <li class="nav-item active">
                <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-white" href="keranjang.php">Keranjang<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-white" href="keranjangbc.php">Booking<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-white" href="riwayat.php">Riwayat<span class="sr-only">(current)</span></a>
              </li>
              <?php if (isset($_SESSION["pelanggan"])): ?> 
              <li class="nav-item active">
                <a class="nav-link text-white" href="logout.php">Logout<span class="sr-only">(current)</span></a>
              </li>
              <?php else: ?>
              <li class="nav-item active">
                <a class="nav-link text-white" href="sign.php">Login<span class="sr-only">(current)</span></a>
              </li>
            <?php endif ?>
            </ul>
            <form action="pencarian.php" method="get" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" name="keyword" aria-label="search">
              <button class="btn btn-warning my-2 my-sm-2" type="submit">Search</button>
            </form>
            <div class="icon mt-2">
              <h5>
                <a href="riwayat.php"><i class="fas fa-cart-plus ml-5 mr-4" data-toggle="tooltip" title="Daftar Riwayat Belanja"></i></a>
                <a href="https://api.whatsapp.com/send?phone=62895366053139"><i class="fas fa-hospital mr-4" data-toggle="tooltip" title="FAQ Baby Care"></i></a>

                 <?php 
                 if (isset($_SESSION["pelanggan"]))
{
                $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];
                $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$idpelangganyanglogin'");
                $pecah = $ambil->fetch_assoc();
              }
                ?>
             <a href="akun.php?id=<?php echo $pecah['id_pelanggan']; ?>"><i class="fas fa-user mr-4"data-toggle="tooltip" title="Informasi Akun"></i></a>
           
              </h5>
            </div>
          </div>
   </div>
</nav>
<br>
<br>
<br>
<br>
<br>
    <div class="container">
      <h3>Hasil Pencarian ID Jasa <?php echo $keyword ?></h3>
      <?php if (empty($semuadata)): ?>
        <div class="alert alert-danger">Pencarian ID Penyedia Jasa <strong><?php echo $keyword ?></strong> tidak ditemukan</div>
      <?php endif ?>
      <div class="row">
      <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Penyedia Jasa</th>
                <th>Email</th>
          <th>Telepon (Whatsapp)</th>
          <th>Profile</th>
        </tr>
      </thead>
      <tbody>
        <?php 
      foreach ($semuadata as $key => $value): ?>
          <?php 
          $ambil = $koneksi->query("SELECT * FROM penyedia_jasa"); ?>
        <tr>
          <td><?php echo $value["id_penyedia_jasa"]; ?></td>
          <td><?php echo $value["nama_penyedia_jasa"]; ?></td>
          <td><?php echo $value["email_penyedia_jasa"]; ?></td>
          <td><?php echo $value["telepon_penyedia_jasa"]; ?></td>
          <td><?php echo $value["Profile_penyedia_jasa"]; ?></td>
        </tr>
      </tbody>
    </table>
 <?php endforeach ?>
 <br>
      
</div>
</body>
</html>
