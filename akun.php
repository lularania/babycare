<?php 
session_start();
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]))
{
  echo "<script>alert('silahkan login');</script>";
  echo "<script>location='sign.php';</script>";
}
?>

<?php
$id_pelanggan = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$pecah = $ambil->fetch_assoc();

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="akun2.css">
    <title> Informasi Akun | Baby Care</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <div class="main">
                    <h3 class="name"><?php echo $pecah["nama_pelanggan"]; ?></h3>
                </div>
            </div>

            <div class="content">
                <div class="left">
                    <div class="about-container">
                        <h3 class="title">Status</h3>
                        <p class="text">Pelanggan</p>
                    </div>
                    <div class="about-container">
                        <h3 class="title">Email</h3>
                        <p class="text"><?php echo $pecah["email_pelanggan"]; ?></p>
                    </div>
                    <div class="about-container">
                        <?php if (!empty($pecah["telepon_pelanggan"])): ?>
                        <h3 class="title">Telepon</h3>
                        <p class="text"><?php echo $pecah["telepon_pelanggan"]; ?></p>
                        <?php endif ?>
                    </div>
                   
                    <div class="icons-container">
                        <h5>Social Media Baby Care</h5>
                        <a href="https://instagram.com/babycarebylularania?igshid=csqfor7d7taz" class="icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="icon">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="icon">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                        <a href="https://twitter.com/babycarebylula?s=09" class="icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                    <div class="buttons-wrap">
                        <div class="follow-wrap">
                            <a href="index.php" class="follow">HOME</a>
                        </div>
                        <div class="share-wrap">
                            <a href="https://api.whatsapp.com/send?phone=62895366053139" class="share">FAQ</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>