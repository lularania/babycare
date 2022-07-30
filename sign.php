<?php

session_start();

include 'koneksi.php';
require 'vendor/autoload.php';

//login google
$g_client = new Google_Client();

$g_client->setClientId("699789469248-j8iadg2u2gtfmhtdro4ftnrpdjbp9n7q.apps.googleusercontent.com");
$g_client->setClientSecret("ZTMT7LqksaQh_GBxQzUxQZlt");
$g_client->setRedirectUri("http://babycare.epizy.com/sign.php");
$g_client->setScopes("profile");
$g_client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);

//Step 2 : Create the url
$auth_url = $g_client->createAuthUrl();

//Step 3 : Get the authorization  code
$code = isset($_GET['code']) ? $_GET['code'] : NULL;

//Step 4: Get access token
if(isset($code)) {

    $token = $g_client->fetchAccessTokenWithAuthCode($code);
    $g_client->setAccessToken($token['access_token']);

    // get profile information
    $google_oauth = new Google_Service_Oauth2($g_client); 
    $google_account_info = $google_oauth->userinfo->get();
    $data = $google_account_info;

} 
else{
    $data = null;

}


// jika berhasil mendapatkan data dari google login
if(isset($data)){

    $email = $data["email"];

    // ambil data user
    $result = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");

    // cek apakah email sudah terdaftar
    if(mysqli_num_rows($result) === 1){
        
        $row = mysqli_fetch_assoc($result);

        // set session
        $_SESSION["pelanggan"] = $row;

    	echo "<script>alert('login anda sukses');</script>";

        if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) 
        {
            echo "<script>location='checkout2.php';</script>";
        }
        elseif (isset($_SESSION["keranjangbc"]) OR !empty($_SESSION["keranjangbc"])) 
        {
            echo "<script>location='checkout.php';</script>";
        }
        else
        {
            echo "<script>location='index.php';</script>";
        }

    }
	else { // kalau belum terdaftar, maka kita daftarkan

		$nama = $data["givenName"];
		$email = $data["email"];
		$password = $data["id"];

		// masukkan data ke database
		mysqli_query($koneksi, "INSERT INTO pelanggan VALUES('', '$email', '$password', '$nama', '')");
		
		// cek apakah data berhasil masuk
		$result = mysqli_query($koneksi, "SELECT * FROM pelanggan ORDER BY id DESC LIMIT 1");

		$row = mysqli_fetch_assoc($result);

		// set session
		$_SESSION["pelanggan"] = $row;

		echo "<script>alert('login anda sukses');</script>";
		header("Location: index.php");
		exit;

	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link 
	rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
	integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
	crossorigin="anonymous" />
	<link rel="stylesheet" href="stylesign.css" />
	<link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css" />

	<title>Login To Babycare</title>
</head>
<body>
	<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="post">
			<h1>Create Account</h1>
			<br>
			<span>Daftar dengan Akun Baby Care</span>
			<input type="text" class="form-control" name="nama" placeholder="Nama" required />
			<input type="email" class="form-control" name="email" placeholder="Email" required />
			<input type="password" class="form-control" name="password" placeholder="Password" required />
			<input type="number" class="form-control" name="telepon" placeholder="No. Telepon" required />
			<br>
			<button name="daftar">Sign Up</button>
		</form>
	</div>

	<div class="form-container sign-in-container">
		<form method="post">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a onclick="location.href='<?= $auth_url ?>'" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your babycare account</span>
			<input type="email" class="form-control" name="email" placeholder="email"/>
			<input type="password" class="form-control" name="password" placeholder="password"/>
			<br>
			<button name="simpan">Sign In</button>
		</form>
	</div>

</body>

<?php
if(isset($_POST["simpan"]))
{
	$email = $_POST["email"];
	$password = $_POST["password"];
	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

	$akunyangcocok = $ambil->num_rows;

	if($akunyangcocok==1)
	{
		//anda sudah login
		$akun = $ambil->fetch_assoc();
		$_SESSION["id_pelanggan"] = $akun["id_pelanggan"];
		echo "<script>alert('login anda sukses');</script>";

		if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"])) 
		{
			echo "<script>location='checkout2.php';</script>";
		}
		elseif (isset($_SESSION["keranjangbc"]) OR !empty($_SESSION["keranjangbc"])) 
		{
			echo "<script>location='checkout.php';</script>";
		}
		else
		{
			echo "<script>location='index.php';</script>";
		}
	}
	else
	{
		echo "<script>alert('anda gagal login, periksa akun anda');</script>";
		echo "<script>location='sign.php';</script>";

	}
}

?>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Momys!</h1>
				<p>Enter your personal details and join a member with babycare</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>


<?php
	if(isset($_POST["simpan"]))
{
	$email = $_POST["email"];
	$password = $_POST["password"];
	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

	$akunyangcocok = $ambil->num_rows;

	if($akunyangcocok==1)
	{
		//anda sudah login
		$akun = $ambil->fetch_assoc();
		$_SESSION["pelanggan"] = $akun;
		echo "<script>alert('login anda sukses');</script>";
		echo "<script>location='checkout.php';</script>";
	}
	else
	{
		echo "<script>alert('anda gagal login, periksa akun anda');</script>";
		echo "<script>location='sign.php';</script>";

	}
	
}

?> 

<?php
if (isset($_POST["daftar"])) 
					{
						$nama = $_POST["nama"];
						$email = $_POST["email"];
						$password = $_POST["password"];
						$telepon = $_POST["telepon"];

						$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
						$yangcocok = $ambil->num_rows;

						if ($yangcocok==1)
						{
							echo "<script>alert('pendaftaran gagal, email sudah terdaftar');</script>";
							echo "<script>location='daftar.php';</script>";
						}

						else
						{
							$koneksi->query("INSERT INTO pelanggan (email_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan) VALUES ('$email', '$password', '$nama', '$telepon')");
							echo "<script>alert('pendaftaran sukses, silahkan login terlebih dahulu');</script>";
							echo "<script>location='sign.php';</script>";

						}

					}

					?>
				</div>   
    <!-- JavaScript -->


    <!-- Place your kit's code here -->

    <!-- Google API
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    -->

<script src="main.js"></script>

</html>