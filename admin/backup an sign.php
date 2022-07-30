<?php

session_start();

include 'koneksi.php';
require 'vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<link 
	rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
	integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
	crossorigin="anonymous" />

	<link rel="stylesheet" href="stylesign.css" />

	<title>Login To Babycare</title>
</head>
<body>
	<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button name="buat">Sign Up</button>
		</form>
	</div>

	<div class="form-container sign-in-container">
		<form method="post">
			<h1>Sign in</h1>
			<div class="social-container">
				<a onclick="location.href='<?= $auth_url ?>'" class="social"><i class="fab fa-google-plus-g"></i></a>
			</div>
			<span>or use your babycare account</span>
			<input type="email" class="form-control" name="email" placeholder="email"/>
			<input type="password" class="form-control" name="password" placeholder="password"/>
			<button name="simpan">Sign In</button>
		</form>
	</div>

<?php
//login google
$g_client = new Google_Client();

$g_client->setClientId("699789469248-j8iadg2u2gtfmhtdro4ftnrpdjbp9n7q.apps.googleusercontent.com");
$g_client->setClientSecret("ZTMT7LqksaQh_GBxQzUxQZlt");
$g_client->setRedirectUri("http://localhost/babycare/sign.php");
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
            echo "<script>location='riwayat.php';</script>";
        }

    }
	else { // kalau belum terdaftar, maka kita daftarkan

		$nama = $data["givenName"];
		$email = $data["email"];
		$password = $data["id"];

		// masukkan data ke database
		mysqli_query($koneksi, "INSERT INTO pelanggan VALUES('', '$email', '$password', '$nama', '', '', '')");
		
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
<footer>
	<a href="daftar.php"><h5>Didn't have an account? Click Here!</h5></a>
</footer>


    <!-- Facebook login button -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&autoLogAppEvents=1&version=v7.0&appId=861371124367635"></script>
    
    <!-- JavaScript -->


    <!-- Place your kit's code here -->

    <!-- Google API
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    -->

<script src="main.js"></script>
</body>
</html>