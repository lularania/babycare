<h2>Data Kategori Terhapus</h2>

<?php

$ambil=$koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");

echo "<script>alert('kategori terhapus');</script>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
?>