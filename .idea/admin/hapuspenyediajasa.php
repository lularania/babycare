<h2>Data Penyedia Jasa Dihapus</h2>

<?php

$ambil=$koneksi->query("SELECT * FROM penyedia_jasa WHERE id_penyedia_jasa='$_GET[id]'");


$koneksi->query("DELETE FROM penyedia_jasa WHERE id_penyedia_jasa='$_GET[id]'");

echo "<script>alert('data penyedia jasa terhapus');</script>";
echo "<script>location='index.php?halaman=penyediajasa</script>";

?>