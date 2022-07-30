<h2>Data Penyedia Jasa Dihapus</h2>

<?php

$ambil=$koneksi->query("SELECT * FROM penyedia_jasa WHERE id_penyedia_jasa='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
$fotopj=$pecah['foto_pj'];
if (file_exists("../babycare/foto_pj/$fotopj")) {
	unlink("../babycare/foto_pj/$fotopj");
}

$koneksi->query("DELETE FROM penyedia_jasa WHERE id_penyedia_jasa='$_GET[id]'");

echo "<script>alert('data penyedia jasa terhapus');</script>";
echo "<script>location='index.php?halaman=penyediajasa</script>";

?>