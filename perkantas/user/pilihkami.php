<?php

define("USER_ACCESS", true);

require_once 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            padding: 0;
            margin: 0;
            background-color: #FFFADD;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: large;
        }

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

        .carousel {
            width: 60vw;
        }


        .row {
            padding-top: 100px;
            /* padding: 30px; */
            justify-content: center;
        }

        h3 {
            text-align: center;
            padding: 10px;
        }

        .card {
            margin: 20px;
        }

        .p {
            text-align: start !important;
            justify-content: center;
        }

        h5, h6{
            text-align: center;
        }

        .accordion-button {
            font-weight: 700;
            background-color: #FFCC70;
        }
        img{
            margin-top: 10px;
        }

    </style>
</head>

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
                            <li><a class="dropdown-item" href="#tentang-kami">Tentang Kami</a></li>
                            <li><a class="dropdown-item" href="#profil-tim">Profil Tim</a></li>
                            <li><a class="dropdown-item" href="#tim-support">Tim Support</a></li>
                            <li><a class="dropdown-item" href="#lokasi">Lokasi Kami</a></li>
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

    <div class="container" >
        <div class="row" id="tentang-kami" >
            <h3>TENTANG KAMI</h3>
            <h5>Griya Pulih Asih berada di bawah naungan Yayasan IIM (Insan Indonesia Mengabdi)</h5>
            <h5>Terdaftar. No. AHU 5554.AH.01.04 th. 2012</h5>
        </div>
        <div class="row">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                        Mengapa memilih kami?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        <p>Layanan yang kami berikan bukan hanya melibatkan klien dan profesional saja, namun juga melibatkan pihak lain dan orang tua yang bersangkutan seperti: Guru, saudara, pembimbing rohani, Supervisor dsb.
                                Layanan psikologi kami merupakan layanan psikologi terpadu dengan memiliki jejeraring dengan profesional lain yang bisa menjadi rujukan konsultasi yang dibutuhkan seperti: Dokter spesialis, terapis dsb.</p>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Bagaimana cara kerja layanan kami?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                            <ul>Dalam memberikan layanan psikologi, kami bersedia untuk melakukan wawancara dan observasi di luar jam dan tempat layanan kami sesuai dengan kesepakatan dengan klien.</ul>

                            <ul>Dalam memberikan hasil layanan pemeriksaan psikologi, kami memberikan penjelasan secara lisan kepada stakeholder, guru dan atau orang tua yang bersangkutan berkaitan dengan hasil pemeriksaan psikologi dan sekaligus memberikan jasa konsultasi berkaitan dengan hasil pemeriksaan psikologi tersebut.</ul>
                            </p>

                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Output yang dihasilkan
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>Hasil layanan pemeriksaan psikologi kami berikan dalam bentuk buku yang bisa dibaca ulang di kemudian hari dan bisa kami kirim melalui email jika dibutuhkan dalam bentuk pdf file.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Jam Kerja
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                            <Ul>Setiap hari Senin - Jumat:
                                Pukul 08.00 - 16.00 WIB</Ul>
                            <UL>Hari Sabtu:
                                Pukul 08.00 - 14.00 WIB</UL>
                            <UL>Hari Minggu TUTUP</UL>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="profil-tim">
            <h3>PROFIL TIM</h3>
            <div class="card" style="width: 18rem;">
                <img src="assets/orang2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Iis Achsa, M.K.</h5>
                    <h6 class="card-text">Konselor Profesional dalam menangani berbagai problem.</h6>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="assets/orang1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Agung Kurniawan,M.Psi,Psikolog.</h5>
                    <h6 class="card-text">Psikolog remaja dan dewasa, trainer dalam pembinaan life-skill, serta ahli dalam grafologi (mengenali karakter melalui tulisan tangan), fobia, trauma, psikosomatis, dan gangguan lainnya</h6>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="assets/orang1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Ivana Sajogo, Sp.KJ.</h5>
                    <h6 class="card-text">Dokter spesialis kedokteran jiwa (psikiatri) yang berkompeten dalam menyelesaikan permasalahan-permasalahan yang terkait dengan kondisi medis-psikis.  </h6>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="assets/orang1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Rieka Intansari, M. Psi, Psikolog.</h5>
                    <h6 class="card-text">Psikolog anak, pembicara dan trainer bagi remaja dan pemuda, serta berpengalaman sebagai terapis anak.</h6>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="assets/orang1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Ekawaty Rante Liling, S.Psi.</h5>
                    <h6 class="card-text">Konselor remaja dan terapis,  menangani assessment psikologis.</h6>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="assets/orang1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Kristin Nita Maria, S.Psi., Dipl.Spec.Ed</h5>
                    <h6 class="card-text">Terapis anak, pendampingan kepada ABK, serta menangani assessment psikologis untuk anak.</h6>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="assets/orang1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Marisa Ria Filnanti, S.Psi.</h5>
                    <h6 class="card-text">Memiliki pengalaman dalam menangani assessment psikologis dan sebagai trainer dalam pelatihan soft-skill</h6>
                </div>
            </div>
        </div>

        <div class="row" id="tim-support">
            <h3>TIM SUPPORT</h3>
            <h5>Griya Pulih Asih juga menjalin kerjasama </h5>
                <h5>dengan beberapa psikolog dan tenaga ahli dalam bidang lain yang berpengalaman dalam bidangnya.</h5>
            <div class="card" style="width: 18rem;">
                <img src="assets/orang1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Natalia Datti, S.T., Dipl. Spec. Ed</h5>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="assets/orang1.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5>Yunita Irwanto, S.Farm., Apt.</h5>
                    
                </div>
            </div>
        </div>

        <div class="row" id="lokasi">
            <h3>LOKASI KAMI</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.32543844047!2d112.76100747414763!3d-7.317291671949535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fae2a2ce4031%3A0x279cfb22309c0350!2sGriya%20Pulih%20Asih!5e0!3m2!1sen!2sid!4v1702887275236!5m2!1sen!2sid" width="300" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</body>