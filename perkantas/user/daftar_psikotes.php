<?php

require_once 'connect.php';

if (isset($_POST['konselor'])) {
    $keluhan = $_POST['keluhan'];
    $namaKonselor = $_POST['konselor'];
    if ($namaKonselor != 'Silahkan memilih') {
        $tanggal = $_POST['jadwalKonseling'];
    }
    $metode = $_POST['metode'];
    #cek apakah konseling id masih null
    if ($tanggal != null) {
        $jadwal = mysqli_query($con, "SELECT * FROM jadwal_konseling WHERE jadwal_konseling_id = $tanggal");
        $jadwal = mysqli_fetch_assoc($jadwal);
    }
    if ($jadwal['user_email'] == null && $namaKonselor != 'Silahkan memilih' && $tanggal != null && $keluhan != null) {
        # kalo null, di update isi dengan user_email
        $nama = $_SESSION['user_email'];
        $jadwal = mysqli_query($con, "UPDATE jadwal_konseling SET user_email = '$nama', keluhan = '$keluhan', tipe_service = '2', is_show = '1', metode = '$metode' WHERE jadwal_konseling_id = $tanggal");
        header('location: psikotes.php');
        exit;
    } if($keluhan == null){
        $_SESSION['flash']['error'] = "Silahkan isi keluhan terlebih dahulu!";
        
    } if ($namaKonselor == 'Silahkan memilih') {
        $_SESSION['flash']['error'] = "Silahkan pilih konselor terlebih dahulu!";
        
    } else {
        # kalo terisi, error message
        $_SESSION['flash']['error'] = "Waktu tersebut sudah terisi!";
        
    }
};

$list_konselor = mysqli_query($con, "SELECT * FROM konselor_info");
$list_konselor = mysqli_fetch_all($list_konselor, MYSQLI_ASSOC);

// Handle error message
$error_message = $_SESSION["flash"]["error"] ?? null;
unset($_SESSION["flash"]["error"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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

        .card-body {
            background-color: lightgoldenrodyellow;
        }

        .card-footer.text-muted {
            background-color: #FF9B50;
        }

        .btn-submit:hover {
            background-color: #FF9B50 !important;
        }

        .col-xl-15 {
            margin: 4vh;
            border-radius: 20px;
            overflow: hidden;
        }

        .fa-arrow-left {
            font-size: 3rem;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php include "navbar.php" ?>

    <div class="container-fluid" style="max-width: 80%;">
        <div class="row">
            <!-- Form Section -->
            <div class="col">
                <div class="tab-content">
                    <div class="col-xl-15">
                        <div class="card-body p-md-5 text-black">
                            <h3 class="m-5 text-uppercase" style="text-align: center;">Form Registrasi Psikotes</h3>

                            <?php if ($error_message != null) : ?>
                                <div class="alert alert-danger rounded p-3">
                                    <?= $error_message ?>
                                </div>
                            <?php endif; ?>

                            <!-- parent form -->
                            <form method="post" action="">
                                <div class="form-outline mb-4">
                                    <label class="form-label">Keluhan</label>
                                    <input name="keluhan" type="text" id="keluhan" class="form-control form-control-lg" />
                                </div>

                                <!-- <div class="form-outline mb-4">
                                    <label class="form-label">Pilihan Psikotes</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Pilih Psikotes yang anda inginkan</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div> -->

                                <div class="form-outline mb-4">
                                    <label class="form-label">Nama Konselor</label>
                                    <select class="form-select" name="konselor" aria-label="Default select example" onchange="check()">
                                        <option>Silahkan memilih</option>
                                        <?php
                                        foreach ($list_konselor as $konselor) : ?>
                                            <option value="<?= $konselor['konselor_email'] ?>">
                                                <?= $konselor['nama_konselor'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label">Jadwal Psikotes</label>
                                    <select class="form-select" name="jadwalKonseling" id="jadwalKonseling"></select>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label">Metode</label>
                                    <select class="form-select" name="metode" aria-label="Default select example">
                                        <option value="offline">offline</option>
                                        <option value="online">online</option>
                                    </select>
                                </div>

                                <div class="d-flex justify-content-end pt-3">
                                    <input type="submit" id="submitButton" class="btn btn-submit btn-lg ms-2" style="background-color: #FFCC70;" disabled>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

<script>
    $('select[name="konselor"]').on('change', function(event) {
        const konselor_email = event.target.value;
        $.ajax({
            url: "api/jadwal_psikotes.php",
            method: "GET",
            data: {
                konselor_email: konselor_email,
            },
            error: function(xhr) {
                alert("Error " + xhr.status + ": " + xhr.statusText);
            },
            complete: function(xhr) {
                $('#jadwalKonseling').html('');
                const jadwal = JSON.parse(xhr.responseText);
                jadwal.forEach((element, index) =>
                    $('#jadwalKonseling').append(`
                        <option value='${element.jadwal_konseling_id}'>
                            ${element.tanggal_konseling},
                            ${element.mulai_konseling},
                            ${element.akhir_konseling}
                        </option>
                    `)
                );
            }
        });
    });

    function check() {
        if ($('#konselor').val() != "Silahkan memilih") {
            $('#submitButton').attr('disabled', false)
        } else {
            $('#submitButton').attr('disabled', true)
        }
    }
</script>

</html>