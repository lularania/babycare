<h2>Data Jasa Terhapus</h2>

<?php

$ambil=$koneksi->query("SELECT * FROM jenis_jasa_produk WHERE id_jenis_jasa_produk='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
$fotojasa=$pecah['foto_jenis_jasa_produk'];
if (file_exists("../babycare/foto_jasa/$fotojasa")) 
{
	unlink("../babycare/foto_jasa/$fotojasa");
}

$koneksi->query("DELETE FROM jenis_jasa_produk WHERE id_jenis_jasa_produk='$_GET[id]'");

echo "<script>alert('jasa terhapus');</script>";
echo "<script>location='index.php?halaman=jenisjasa</script>";

?>