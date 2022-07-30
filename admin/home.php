<?php
session_start();
$koneksi = new mysqli("sql309.epizy.com","epiz_25822280","DE19vTSrfmDtepz","epiz_25822280_babycare");
//$koneksi = new mysqli("localhost","root","","babycare");
?>
<!DOCTYPE html>
        
                    <div class="col-md-12">
                     <h2>SELAMAT DATANG ADMIN BABYCARE!</h2> 
                      <?php 
                 if (isset($_SESSION["admin"]))
{
                $idadminyanglogin = $_SESSION["admin"]["id_admin"];
                $ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin='$idadminyanglogin'");
                $pecah = $ambil->fetch_assoc();
              }
                ?>
             <h3>Welcome <?php echo $pecah['nama_lengkap'] ?>, Love to see you back. </h3>
                            
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box set-icon">
                    <a href="daftarbooking.php"><i class="fa fa-bars"></i></a>
                </span>
                <div class="text-box" >
                    <p class="main-text">BOOKING</p>
                    <p class="text-muted">LIST BOOKING</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box set-icon">
                   <a href="pembelian.php"><i class="fa fa-shopping-cart"></i></a>
                </span>
                <div class="text-box" >
                    <p class="main-text">PEMBELIAN</p>
                    <p class="text-muted">LIST PEMBELIAN</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box set-icon">
                    <a href="pembayaran.php"><i class="fa fa-plane"></i></a>
                </span>
                <div class="text-box" >
                    <p class="main-text">PEMBAYARAN</p>
                    <p class="text-muted">PEMBAYARAN BOOKING JASA</p>
                </div>
             </div>
		     </div>
		     <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box set-icon">
                    <a href="pembayaran2.php"><i class="fa fa-rocket"></i></a>
                </span>
                <div class="text-box" >
                    <p class="main-text">PEMBAYARAN</p>
                    <p class="text-muted">PEMBAYARAN PEMBELIAN PRODUK</p>
                </div>
             </div>
		     </div>
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
