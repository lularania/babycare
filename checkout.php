<?php
session_start();

include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]))
{
  echo "<script>alert('silahkan login');</script>";
  echo "<script>location='sign.php';</script>";
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

    <title> Checkout | Baby Care</title>
  </head>
  <body>
    
   <?php include 'menu.php'; ?>

<section class="konten">
  <div class="container">
    <h1>Booking Jasa</h1>
    <hr>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Jasa</th>
          <th>Penyedia Jasa</th>
          <th>Harga</th>
          <th>Jumlah Paket Booking</th>
          <th>Subharga</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor=1; ?>
        <?php $totalbelanja = 0; ?>
        <?php foreach ($_SESSION["keranjangbc"] as $id_jenis_jasa_produk => $jumlah): ?>

          <?php 
          $ambil = $koneksi->query("SELECT * FROM jenis_jasa_produk WHERE id_jenis_jasa_produk='$id_jenis_jasa_produk'");
          $pecah = $ambil->fetch_assoc();
          $subharga = $pecah["harga_jenis_jasa_produk"]*$jumlah;
          ?>
        <tr>
          <td><?php echo $nomor; ?></td>
          <td><?php echo $pecah["nama_jenis_jasa_produk"]; ?></td>
          <td>ID. <?php echo $pecah["id_penyedia_jasa"];?></td>
          <td>Rp.<?php echo number_format($pecah["harga_jenis_jasa_produk"]); ?></td>
          <td><?php echo $jumlah; ?></td>
          <td>Rp. <?php echo number_format($subharga); ?></td>
        </tr>
        <?php $nomor++; ?>
        <?php $totalbelanja+=$subharga; ?>
        <?php endforeach ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="5">Total Belanja</th>
          <th>Rp. <?php echo number_format($totalbelanja) ?> </th>
        </tr>
      </tfoot>
    </table>
    
      <form method="post">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
          <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>"class="form-control">
        </div>
      </div>
      <?php if (!empty($_SESSION["pelanggan"]['telepon_pelanggan'])): ?>
          <div class="col-md-4">
            <div class="form-group">
          <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>"class="form-control">
        </div>
      </div>
      <?php endif ?>
          <div class="col-md-4">
         <select class="form-control" name="id_lokasi">
           <option value="">Pilih Lokasi Offline </option>
           <?php 

           $ambil = $koneksi->query("SELECT * FROM lokasi");
           while ($perlokasi=$ambil->fetch_assoc()) {

            ?>
           <option value="<?php echo $perlokasi["id_lokasi"] ?>">
             <?php echo $perlokasi['lokasi']; ?>
             RP. <?php echo number_format($perlokasi['asuransi']); ?>
           </option>
         <?php } ?>
         </select>
         
          </div>
          
        </div>
        <div class="form-group">
          <label>Alamat Lengkap</label>
          <textarea class="form-control" name="alamat_lengkap" placeholder="masukkan alamat anda"></textarea>
        </div>
        <button class="btn btn-primary" name="checkout">Checkout</button>
        
      </form>

      <?php
      if (isset($_POST["checkout"])) 
      {
        $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
        $id_lokasi = $_POST["id_lokasi"];
        $tanggal_booking = date("Y-m-d");
        $alamat_lengkap = $_POST['alamat_lengkap'];
        $ambil = $koneksi->query("SELECT * FROM lokasi WHERE id_lokasi='$id_lokasi'");
        $arraylokasi = $ambil->fetch_assoc();
        $lokasi = $arraylokasi['lokasi'];
        $asuransi = $arraylokasi['asuransi'];
        $total_pembelian = $totalbelanja + $asuransi;

        $koneksi->query("INSERT INTO booking (id_booking, id_pelanggan, id_penyedia_jasa, id_lokasi, tanggal_booking, total_pembelian, lokasi, asuransi, alamat_lengkap) VALUES ('$id_booking', '$id_pelanggan', '$id_lokasi', '$id_penyedia_jasa', '$tanggal_booking', '$total_pembelian','$lokasi', '$asuransi', '$alamat_lengkap') ");

        $id_booking_barusan = $koneksi->insert_id;

        foreach ($_SESSION["keranjangbc"] as $id_jenis_jasa_produk => $jumlah) 
        {
          $ambil=$koneksi->query("SELECT * FROM jenis_jasa_produk WHERE id_jenis_jasa_produk='$id_jenis_jasa_produk'");
          $perbook = $ambil->fetch_assoc();
          $nama = $perbook['nama_jenis_jasa_produk'];
          $harga = $perbook['harga_jenis_jasa_produk'];
          $subharga = $perbook['harga_jenis_jasa_produk']*$jumlah;
          $koneksi->query("INSERT INTO booking_success (id_booking, id_jenis_jasa_produk, nama, harga, subharga) VALUES ('$id_booking_barusan', '$id_jenis_jasa_produk', '$nama', '$harga', '$subharga')"); 
        }

        unset($_SESSION["keranjangbc"]);

        echo "<script>alert('booking sukses');</script>";
        echo "<script>location='nota.php?id=$id_booking_barusan';</script>";
      }
      ?>
  </div>
</section>
         
</body>
</html>
