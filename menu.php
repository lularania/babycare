<nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top">
      <div class="container">

        <h3><i class="fas fa-baby text-white mr-2"></i></h3>
          <a class="navbar-brand font-weight-bold text-white " href="index.php">Baby Care</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-4">
              <li class="nav-item active">
                <a class="nav-link text-white" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-white" href="keranjang.php">Keranjang<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-white" href="keranjangbc.php">Booking<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-white" href="riwayat.php">Riwayat<span class="sr-only">(current)</span></a>
              </li>
              <?php if (isset($_SESSION["pelanggan"])): ?> 
              <li class="nav-item active">
                <a class="nav-link text-white" href="logout.php">Logout<span class="sr-only">(current)</span></a>
              </li>
              <?php else: ?>
              <li class="nav-item active">
                <a class="nav-link text-white" href="sign.php">Login<span class="sr-only">(current)</span></a>
              </li>
            <?php endif ?>
            </ul>
            <form action="pencarian.php" method="get" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" name="keyword" aria-label="search">
              <button class="btn btn-warning my-2 my-sm-2" type="submit">Search</button>
            </form>
            <div class="icon mt-2">
              <h5>
                <a href="riwayat.php"><i class="fas fa-cart-plus ml-5 mr-4" data-toggle="tooltip" title="Daftar Riwayat Belanja"></i></a>
                <a href="https://api.whatsapp.com/send?phone=62895366053139"><i class="fas fa-hospital mr-4" data-toggle="tooltip" title="FAQ Baby Care"></i></a>

                 <?php 
                 if (isset($_SESSION["pelanggan"]))
                    {
                $idpelangganyanglogin = $_SESSION["pelanggan"]["id_pelanggan"];
                $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$idpelangganyanglogin'");
                $pecah = $ambil->fetch_assoc();
              }
                ?>
             <a href="akun.php?id=<?php echo $pecah['id_pelanggan']; ?>"><i class="fas fa-user mr-4"data-toggle="tooltip" title="Informasi Akun"></i></a>
           
              </h5>
            </div>
          </div>
        </div>
      </nav>
