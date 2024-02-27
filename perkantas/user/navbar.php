<style>
  .navbar-brand:hover {
    transform: scale(1.1);
  }

  .navbar {
    background-color: #FFCC70;
    position: sticky;
    top: 0;
    z-index: 100;
  }

  .nav-link {
    font-weight: bold;
    font-size: 14px;
    text-transform: uppercase;
    text-decoration: none;
    color: #031D44;
    padding: 20px 0px;
    margin-right: 20px;
    display: inline-block;
    position: relative;
    opacity: 0.75;
  }

  .nav-link:hover {
    opacity: 1;
  }

  .nav-link::before {
    transition: 300ms;
    height: 2px;
    content: "";
    position: absolute;
    background-color: red;
  }

  .nav-link-img {
    color: #031D44;
    padding-top: 15px;
    margin-right: 20px;
    display: inline-block;
    position: relative;
    opacity: 0.75;
  }

  .nav-link-img:hover {
    opacity: 1;
    transform: scale(1.1);
  }

  .nav-link-ltr::before {
    width: 0%;
    bottom: 10px;
  }

  .nav-link-ltr:hover::before {
    width: 100%;
  }

  #dropdown-products {
            display: none;
        }

        #menu-products:hover #dropdown-products {
            display: block;
        }
</style>

<body>
  <nav class="navbar navbar-expand-sm">
    <div class="container-fluid ">
      <a class="navbar-brand" href="#"><img src="assets/logo.png" style="height: 64px; height: 64px;"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active nav-link-ltr" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown" id="menu-products">
            <a class="nav-link nav-link-ltr dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
              Services
            </a>
            <ul class="dropdown-menu" id="dropdown-products" style="background-color: rgba(255, 255, 255, 0.9);">
              <li><a class="dropdown-item" href="konseling.php">Konseling</a></li>
              <li><a class="dropdown-item" href="psikotes.php">Psikotes</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown" id="menu-products">
            <a class="nav-link nav-link-ltr dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
              About Us
            </a>
            <ul class="dropdown-menu" id="dropdown-products" style="background-color: rgba(255, 255, 255, 0.9);">
              <!-- <li><a class="dropdown-item" href="visimisi.php">Visi Misi</a></li> -->
              <li><a class="dropdown-item" href="pilihkami.php#tentang-kami">Tentang Kami</a></li>
              <li><a class="dropdown-item" href="#pilihkami.phpprofil-tim">Profil Tim</a></li>
              <li><a class="dropdown-item" href="pilihkami.php#tim-support">Tim Support</a></li>
              <li><a class="dropdown-item" href="pilihkami.php#lokasi">Lokasi Kami</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-ltr" href="artikel.php">Article</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-ltr" href="activity.php">Activity</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-ltr" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>