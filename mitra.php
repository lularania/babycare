<?php
session_start();
include 'koneksi.php';
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style2.css">

    <title>Mitra Baby Care | Baby Care</title>
  </head>
  <body>
    
    <?php include 'menu.php'; ?>

 <div class="row mt-5 no-gutters">
    <div class="col-md-2 bg-light">
      <ul class="list-group list-group-flush p-2 pt-5">
      <li class="list-group-item bg-danger text-white"> <i class="fas fa-list text-white"></i> Baby Care</li>
        <a href="pregnancy.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Pregnancy </li></a>
        <a href="babyhealth.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Baby's Health </li></a>
        <a href="parenting.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Parenting </li></a>
        <a href="kidsschool.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Kids School </li></a>
        <a href="bajubyank.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Pakaian Anak Laki-Laki</li></a>
       <a href="bajubyank2.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Pakaian Anak Perempuan</li></a>
       <a href="perlengbayi.php"><li class="list-group-item"><i class="fas fa-angle-right"></i> Perlengkapan Anak</li></a>
      </ul>
    </div>
    <div class="col-md-10">
<br>
      <h4 class="text-center font-weight-bold mr-6 mt-4 mb-4">MITRA KERJASAMA</h4>

      <div class="row mx-auto">
        <?php 
    $ambil=$koneksi->query("SELECT * FROM mitra");
    ?>
    <?php while ($permitra = $ambil->fetch_assoc()) { ?>
        <div class="card mr-2 ml-2" style="width: 16rem;">
          <img src="foto_mitra/<?php echo $permitra['foto_mitra']; ?>" class="card-img-top" alt="..." height="200px">
          <div class="card-body bg-light">
            <h5 class="card-title"><?php echo $permitra['nama_mitra']; ?></h5>
          </div>
        </div>
          <?php } ?>
      </div>
    </div>
    </div>

    <br>
    <br>


    <?php include 'footer.php'; ?>
  </body>
</html>