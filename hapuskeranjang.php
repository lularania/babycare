<?php

session_start();
$id_jenis_jasa_produk=$_GET["id"];
unset($_SESSION["keranjangbc"][$id_jenis_jasa_produk]);

echo "<script>alert(' jasa dihapus dari keranjang booking');</script>";
echo "<script>location='keranjangbc.php';</script>";
?>