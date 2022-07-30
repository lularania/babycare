<?php
session_start();
//koneksi ke database

$koneksi=new mysqli("localhost","root","","babycare");

if(!isset($_SESSION['admin']))
{
    echo "<script>alert('Silahkan Login Terbih Dulu');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">babycare admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
<?php $ambil = $koneksi->query("SELECT * FROM admin");
        $pecah=$ambil->fetch_assoc(); ?>
font-size: 16px;"> Last access : <?php echo $pecah["tanggal_login"]?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/Logo.png" class="user-image img-responsive"/>
					</li>
                    <li><a href="index.php"><i class="fa fa-home fa-2x"></i> Home </a></li>
                    <li><a href="index.php?halaman=kategori"><i class="fa fa-exchange fa-2x"></i> Kategori </a></li>
                    <li><a href="index.php?halaman=produk"><i class="fa fa-archive fa-2x"></i> Produk </a></li>
                    <li><a href="index.php?halaman=jenisjasa"><i class="fa fa-ambulance fa-2x"></i> Jenis Jasa </a></li>
                    <li><a href="index.php?halaman=daftarbooking"><i class="fa fa-hospital-o fa-2x"></i> Booking </a></li>
                    <li><a href="index.php?halaman=pembelian"><i class="fa fa-shopping-cart fa-2x"></i> Pembelian </a></li>
                    <li><a href="index.php?halaman=laporan_booking"><i class="fa fa-file fa-2x"></i> Laporan Booking </a></li>
                    <li><a href="index.php?halaman=laporan_pembelian"><i class="fa fa-file fa-2x"></i> Laporan Pembelian </a></li>
                    <li><a href="index.php?halaman=pelanggan"><i class="fa fa-user fa-2x"></i> Pelanggan </a></li>
                     <li><a href="index.php?halaman=penyediajasa"><i class="fa fa-user-md fa-2x"></i> Penyedia Jasa </a></li>
                    <li><a href="index.php?halaman=logout"><i class="fa fa-sign-out fa-2x"></i> Logout </a></li>
                     
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">

                <?php
                if (isset($_GET['halaman'])) 
                {
                    if($_GET['halaman']=="jenisjasa")
                    {
                        include 'jenisjasa.php';
                    }
                    elseif ($_GET['halaman']=="produk")
                    {
                        include 'produk.php';
                    }
                    elseif ($_GET['halaman']=="daftarbooking") 
                    {
                        include 'daftarbooking.php';
                    }
                    elseif ($_GET['halaman']=="pembelian") 
                    {
                        include 'pembelian.php';
                    }
                     elseif ($_GET['halaman']=="pembayaran") 
                    {
                        include 'pembayaran.php';
                    }
                    elseif ($_GET['halaman']=="pembayaran2") 
                    {
                        include 'pembayaran2.php';
                    }
                    elseif ($_GET['halaman']=="pelanggan") 
                    {
                        include 'pelanggan.php';
                    }
                    elseif ($_GET['halaman']=="penyediajasa") 
                    {
                        include 'penyediajasa.php';
                    }
                    elseif ($_GET['halaman']=="detail") {
                        include 'detail.php';
                    }
                     elseif ($_GET['halaman']=="detail2") {
                        include 'detail2.php';
                    }
                    elseif ($_GET['halaman']=="tambahproduk") {
                        include 'tambahproduk.php';
                    }
                    elseif ($_GET['halaman']=="tambahjasa") {
                        include 'tambahjasa.php';
                    }
                    elseif ($_GET['halaman']=="hapusproduk") {
                        include 'hapusproduk.php';
                    }
                     elseif ($_GET['halaman']=="hapusjasa") {
                        include 'hapusjasa.php';
                    }
                    elseif ($_GET['halaman']=="tambahpelanggan") {
                        include 'tambahpelanggan.php';
                    }
                    elseif ($_GET['halaman']=="hapuspelanggan") {
                        include 'hapuspelanggan.php';
                    }
                    elseif ($_GET['halaman']=="tambahpenyediajasa") {
                        include 'tambahpenyediajasa.php';
                    }
                    elseif ($_GET['halaman']=="hapuspenyediajasa") {
                        include 'hapuspenyediajasa.php';
                    }
                    elseif ($_GET['halaman']=="ubahproduk") {
                        include 'ubahproduk.php';
                    }
                    elseif ($_GET['halaman']=="ubahjasa") {
                        include 'ubahjasa.php';
                    }
                    elseif ($_GET['halaman']=="ubahpelanggan") {
                        include 'ubahpelanggan.php';
                    }
                    elseif ($_GET['halaman']=="ubahpenyediajasa") {
                        include 'ubahpenyediajasa.php';
                    }
                    elseif ($_GET['halaman']=="logout") {
                        include 'logout.php';
                    }
                    elseif ($_GET['halaman']=="laporan_pembelian") {
                        include 'laporan_pembelian.php';
                    }
                    elseif ($_GET['halaman']=="laporan_booking") {
                        include 'laporan_booking.php';
                    }
                    elseif ($_GET['halaman']=="kategori") {
                        include 'kategori.php';
                    }
                    elseif ($_GET['halaman']=="tambahkategori") {
                        include 'tambahkategori.php';
                    }
                    elseif ($_GET['halaman']=="hapuskategori") {
                        include 'hapuskategori.php';
                    }
                    elseif ($_GET['halaman']=="ubahkategori") {
                        include 'ubahkategori.php';
                    }
                }
                else
                {
                    include 'home.php';
                }
                
                ?>

            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
