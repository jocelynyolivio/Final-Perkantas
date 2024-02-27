<?php

require_once 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/Exception.php';

if (isset($_POST['konselor'])) {
    $mail = new PHPMailer(true);
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
        $email = $jadwal['konselor_email'];
        $t1 = $jadwal['tanggal_konseling'];
        $t2 = $jadwal['mulai_konseling'];
        $t3 = $jadwal['akhir_konseling'];
    }

    #kalo null, di update isi dengan user_email
    if ($jadwal['user_email'] == null && $namaKonselor != 'Silahkan memilih' && $tanggal != null && $keluhan != null) {
        $nama = $_SESSION['user_email'];
        $jadwal = mysqli_query($con, "UPDATE jadwal_konseling SET user_email = '$nama', keluhan = '$keluhan', tipe_service = '1', is_show = '1', metode = '$metode' WHERE jadwal_konseling_id = $tanggal");

        

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        // $mail->SMTPDebug = 1;
        $mail->Username = 'manproperkantas@gmail.com';
        $mail->Password = 'brfgunmddmsjjgst';
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        $mail->setFrom($mail->Username, 'Griya Pulih Asih Pemberitahuan');
        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = 'Kode OTP Pemulihan Akun';
        $mail->Body    = 'Halo Konselor!👋<br>
        Berikut pemberitahuan untuk anda mengenai jadwal konseling pada:<br>
        Tanggal: ' . $t1 . '<br>
        Pukul: ' . $t2 . '-' . $t3 . '<br>
        Salam hangat,<br>
        Griya Pulih Asih <br>
        ';

        // Send mail   
        $mail->send();
        if (!$mail->send()) {
            // update reset log
            // $currentTimestamp = date('Y-m-d H:i:s');
            // $activity = 'Request OTP Failed.';
            // $sql = "INSERT INTO reset_log (time, teamName, activity)
            //         VALUES ('$currentTimestamp', '$teamName', '$activity')";
            // $stmt = $con -> prepare($sql);
            // $stmt -> execute();
            // echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
        } else {
            // echo 'Message has been sent.';
        }

        $mail->smtpClose();

        header('Location: konseling.php');
        exit;
    }
    if ($keluhan == null) {
        $_SESSION['flash']['error'] = "Silahkan isi keluhan terlebih dahulu!";
    }
    if ($namaKonselor == 'Silahkan memilih') {
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
            <a href="register1.php">
            </a>
            <!-- Form Section -->
            <div class="col">
                <div class="tab-content">
                    <div class="col-xl-15">
                        <div class="card-body p-md-5 text-black">
                            <h3 class="m-5 text-uppercase" style="text-align: center;">Form Registrasi Konseling</h3>

                            <?php if ($error_message != null) : ?>
                                <div class="alert alert-danger rounded p-3">
                                    <?= $error_message ?>
                                </div>
                            <?php endif; ?>

                            <!-- parent form -->
                            <form method="post" action="">
                                <div class="form-outline mb-4">
                                    <label class="form-label">Keluhan</label>
                                    <input name="keluhan" type="text" id="keluhan" class="form-control form-control-lg" required />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label">Nama Konselor</label>
                                    <select class="form-select" name="konselor" id="konselor" aria-label="Default select example" onchange="check()">
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
                                    <label class="form-label">Jadwal Konselor</label>
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
            url: "api/jadwal_konselor.php",
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