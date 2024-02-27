<?php

require_once 'connect.php';

if (!isset($_SESSION["login_user"])) {
    header("Location: login.php");
    exit;
}

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
        }

        .navbar-brand:hover {
            transform: scale(1.1);
        }

        .navbar {
            background-color: #FFCC70;
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

        h2 {
            margin-bottom: 2%;
        }

        .card-text {
            height: 7vh;
        }

        a {
            text-decoration: none;
        }

        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transform: scale(1.05);
            transition: all 0.3s ease;
        }

        p {
            text-align: center;
            padding-top: 10px;
            font-size: 20px;
        }

        .card-desc {
            /* justify-content: left; */
            text-align: left;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <?php include "navbar.php" ?>
    <div id="carouselExampleIndicators" class="carousel slide m-auto pt-5" data-bs-ride="carousel" style="font-size: 10rem;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/image1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/image2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/image3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="visimisi p-3 col-8 mx-auto d-flex align-items-center flex-column">
        <h1 class="vm mt-3">VISI & MISI</h1>
        <p>Menolong Sumber Daya Manusia Indonesia untuk <b>memahami</b> dan <b>mengembangkan</b> potensi serta
            <b>mengatasi</b> hambatan-hambatan dirinya sehingga dapat mengembangkan potensinya dengan lebih <b>efektif</b>.
        </p>
        <h1 class="motto mt-3">MOTTO</h1>
        <p><b><i>“Mendampingi menggapai potensi efektif”</i></b></p>
    </div>

    <section class="services py-5">
        <div class="container">
            <h2 class="text-center">Layanan Kami</h2>
            <div class="row">
                <div class="col-md-6">
                    <a href="konseling.php">
                        <div class="card mb-4">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Layanan 1">
                            <div class="card-body">
                                <h5 class="card-title">Konseling Pribadi</h5>
                                <p class="card-desc">Kami menyediakan layanan konseling pribadi untuk membantu Anda.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="psikotes.php">
                        <div class="card mb-4">
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Layanan 2">
                            <div class="card-body">
                                <h5 class="card-title">Psikotes</h5>
                                <p class="card-desc">Dapatkan dukungan untuk kepribadian anda.</p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>Informasi Kontak</h4>
                    <p>
                        Jika Anda memiliki pertanyaan atau ingin berbicara dengan kami, jangan ragu untuk menghubungi kami.
                    </p>
                    <address>
                        <strong>Konseling Online</strong><br>
                        Jl. Contoh No. 123<br>
                        Kota Anda, 12345<br>
                        Email: info@konselingonline.com<br>
                        Telepon: (123) 456-7890
                    </address>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<script>
    // biar carousel jalan
    var myCarousel = document.getElementById('carouselExampleIndicators');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 2000 //2 secs
    });
</script>