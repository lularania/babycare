<?php
session_start(); // Start session nya
include "koneksi.php"; // Load file koneksi.php
$username = $_POST['username']; // Ambil value username yang dikirim dari form
$password = $_POST['password']; // Ambil value password yang dikirim dari form
$password = md5($password); // Kita enkripsi (encrypt) password tadi dengan md5
// Buat query untuk mengecek apakah ada data user dengan username dan password yang dikirim dari form
$sql = $pdo->prepare("SELECT * FROM pelanggan WHERE username=:a AND password_pelanggan=:b");
$sql->bindParam(':a', $username);
$sql->bindParam(':b', $password_pelanggan);
$sql->execute(); // Eksekusi querynya
$data = $sql->fetch(); // Ambil datanya dari hasil query tadi
// Cek apakah variabel $data ada datanya atau tidak
if( ! empty($data)){ // Jika tidak sama dengan empty (kosong)
  $_SESSION['username'] = $data['username']; // Set session untuk username (simpan username di session)
  $_SESSION['nama_pelanggan'] = $data['nama_pelanggan']; // Set session untuk nama (simpan nama di session)
  $_SESSION['email_pelanggan'] = $data['email_pelanggan']; // Set session untuk email (simpan email di session)
  setcookie("message","delete",time()-1); // Kita delete cookie message
  header("location: welcome.php"); // Kita redirect ke halaman welcome.php
}else{ // Jika $data nya kosong
  // Buat sebuah cookie untuk menampung data pesan kesalahan
  setcookie("message", "Maaf, Username atau Password salah", time()+3600);
  header("location: google.php"); // Redirect kembali ke halaman index.php
}
?>


