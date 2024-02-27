<?php

// define("USER_ACCESS", true);

// require_once 'connect.php';

// mustLoggedIn();

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
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            margin: 0;
            background-color: #FFFADD;
        }

        .team-member {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }

        .team-member img {
            max-width: 100%;
            border-radius: 50%;
            margin-right: 20px;
        }

        .team-member-info {
            text-align: left;
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
    </style>
</head>

<body>
    <?php include "navbar.php" ?>

    <!-- <div class="team-member">
        <img src="foto1.jpg" alt="Foto Anggota Tim 1">
        <h2>Nama Anggota 1</h2>
        <p>Jabatan Anggota 1</p>
        <p>Deskripsi singkat mengenai Anggota 1.</p>
    </div>

    <div class="team-member">
        <img src="foto2.jpg" alt="Foto Anggota Tim 2">
        <h2>Nama Anggota 2</h2>
        <p>Jabatan Anggota 2</p>
        <p>Deskripsi singkat mengenai Anggota 2.</p>
    </div> -->

</body>