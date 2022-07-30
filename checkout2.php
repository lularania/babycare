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
		<h1>Keranjang Belanja</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subharga</th>
				</tr>
			</thead>
			<tbody>
        <?php $nomor=1; ?>
        <?php $totalbelanja = 0; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
					<?php 
					$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
					$pecah = $ambil->fetch_assoc();
          $subharga = $pecah["harga_produk"]*$jumlah;
					?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_produk"]; ?></td>
					<td>Rp.<?php echo number_format($pecah["harga_produk"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
				</tr>
        <?php $nomor++; ?>
        <?php $totalbelanja+=$subharga; ?>
				<?php endforeach ?>
			</tbody>
      <tfoot>
        <tr>
          <th colspan="4">Total Belanja</th>
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
         <select class="form-control" name="id_ongkir">
           <option value="">Pilih Ongkos Kirim </option>
           <?php 

           $ambil = $koneksi->query("SELECT * FROM ongkir");
           while ($perongkir=$ambil->fetch_assoc()) {

            ?>
           <option value="<?php echo $perongkir["id_ongkir"] ?>">
             <?php echo $perongkir['nama_kota']; ?>
             RP. <?php echo number_format($perongkir['tarif']); ?>
           </option>
         <?php } ?>
         </select>
         
          </div>
          
   			</div>

        <div class="form-group">
          <label>Alamat Pengiriman</label>
          <textarea class="form-control" name="alamat_pengiriman" placeholder="masukkan alamat pengiriman anda"></textarea>
        </div>
        <button class="btn btn-primary" name="checkout">Checkout</button>
   			
   		</form>

      <?php
      if (isset($_POST["checkout"])) 
      {
        $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
        $id_ongkir = $_POST["id_ongkir"];
        $tanggal_pembelian = date("Y-m-d");
        $alamat_pengiriman = $_POST['alamat_pengiriman'];
        $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir' ");
        $arrayongkir = $ambil->fetch_assoc();
        $nama_kota = $arrayongkir['nama_kota'];
        $tarif = $arrayongkir['tarif'];
        $total_pembelian = $totalbelanja + $tarif;

        $koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_kota, tarif, alamat_pengiriman) VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian','$nama_kota', '$tarif', '$alamat_pengiriman') ");

        $id_pembelian_barusan = $koneksi->insert_id;

        foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
        {
          $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
          $perproduk = $ambil->fetch_assoc();
          $nama = $perproduk['nama_produk'];
          $harga = $perproduk['harga_produk'];
          $subharga = $perproduk['harga_produk']*$jumlah;
          $koneksi->query("INSERT INTO pembelian_produk (id_pembelian, id_produk, jumlah, nama, harga, subharga) VALUES ('$id_pembelian_barusan', '$id_produk', '$jumlah', '$nama', '$harga', '$subharga')"); 

          $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah WHERE id_produk='$id_produk'");
        }

        unset($_SESSION["keranjang"]);

        echo "<script>alert('pembelian sukses');</script>";
        echo "<script>location='nota2.php?id=$id_pembelian_barusan';</script>";
      }
      ?>
	</div>
</section>
          
</body>
</html>
