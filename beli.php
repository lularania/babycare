<?php
session_start();

$id_jenis_jasa_produk = $_GET['id'];

if(isset($_SESSION['keranjangbc'][$id_jenis_jasa_produk]))
{
	$_SESSION['keranjangbc'][$id_jenis_jasa_produk]+=1;
}

else
{
	$_SESSION['keranjangbc'][$id_jenis_jasa_produk] = 1;
}

echo "<script>alert('jasa telah masuk ke keranjang booking jasa');</script>";
echo "<script>location='keranjangbc.php';</script>";
