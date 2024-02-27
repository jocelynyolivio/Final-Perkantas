<?php
include "../api/connect.php";

if (!$_SESSION['login'])
{
    echo "
        <script>
            alert('Please sign in first ');
        </script>
    ";

    header("Location: ../../admin.php");
    exit;
} else {
    $data = $_SESSION['login'];
    $result = mysqli_query($con, "SELECT * FROM `admin_info` WHERE `nama_admin` =  '$data'");
    $row = mysqli_fetch_assoc($result);
    // $c = $row['admin_status'];

    if ($row['admin_status'] != "ACTIVE") {
        echo "
            <script>
                alert('Please sign in first ');
            </script>
        ";

        header("Location: ../api/logout_admin.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Site - Griya Pulih Asih</title>

    <!-- ICON -->
    <link href="../assets/logo.png" rel="icon" />

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/acc3ee9eed.js" crossorigin="anonymous"></script>

    <!-- SWEET ALERT 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- BOOTSTRAP -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<style>
    body {
        /* margin-top: 50px; */
        justify-content: center;
        align-items: center;
        /* display: flex; */
    }

    .btn-grp {
        margin-top: 110px;
        justify-content: center;
        align-items: center;
        display: flex;
        flex-direction: column;
    }

    .title {
        margin-top: 20px;
    }

    .btn-outline {
        background-color: yellow !important;
    }

    .p-admin {
        margin-top: 20px;
    }

    .p-konselor {
        margin-top: 20px;
    }

    .p-user {
        margin-top: 20px;
    }

    .table {
        background-color: #FFCC70 !important;
    }

    @media screen and (min-width: 900px) {
        .btn-group {
            scale: 1.2;
        }
    }
    table tr td, table tr th {
        background-color: rgba(255, 155, 80, .5) !important;
    }
</style>
<body>
    <?php include "navbar_admin.php"; ?>
    <div class="btn-grp">
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-dark" for="btnradio1">Admin Logs</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-dark" for="btnradio2">Konselor Logs</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-dark" for="btnradio3">User Logs</label>
        </div>
        <h1 class="title"></h1>
    </div>

    <style>
        table {
            width: 100vw !important;
        }

        @media screen and (max-width: 899.9px) {
            .nama {
                width: 100px !important;
            }

            .waktu {
                width: 100px;
            }
        }

        @media screen and (min-width: 900px) {
            table {
                width: 98vw !important;
            }

            /* .nama {
                padding-left: 0;
            } */

            .aktv {
                padding-left: 120px !important;
            }

        }   
        /* table th {
            width: 300px;
        } */
    </style>

    <center>
    <div class="table-responsive tab-con" style="margin-top: 20px;">
        <table class="table table-striped table-md table-responsive align-middle">
            <thead class="table-light">
                <tr style="background-color: #90603d;">
                    <th scope="col" class="waktu">Waktu</th>
                    <th scope="col" class="nama" style="width: 500px;padding-left: 30px;">Nama</th>
                    <th scope="col" class="aktv" style="padding-left: 40px;">Aktivitas</th>
                </tr>
            </thead>
        
            <!-- Admin -->
            <tbody id="log-admin"></tbody>
            <script>
                function admin_load() {
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                        document.getElementById("log-admin").innerHTML = this.responseText;
                    }
                    xhttp.open("GET", "../api/getAdminLogs.php");
                    xhttp.send();
                }
                setInterval(function(){
                    admin_load();
                }, 100);
            </script>

            <!-- Konselor -->
            <tbody id="log-konselor"></tbody>
            <script>
                function konselor_load() {
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                        document.getElementById("log-konselor").innerHTML = this.responseText;
                    }
                    xhttp.open("GET", "../api/getKonselorLogs.php");
                    xhttp.send();
                }
                setInterval(function(){
                    konselor_load();
                }, 100);
            </script>

            <!-- User -->
            <tbody id="log-user"></tbody>
            <script>
                function user_load() {
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                        document.getElementById("log-user").innerHTML = this.responseText;
                    }
                    xhttp.open("GET", "../api/getUserLogs.php");
                    xhttp.send();
                }
                setInterval(function(){
                    user_load();
                }, 100);
            </script>
        </table>
    </div>
    </center>
</body>
<script>
    $( document ).ready(function() {
        $('.title').html("Admin Logs")
        $('#log-konselor').hide();
        $('#log-user').hide();

        function checkStatus() {
            // alert("jalan")
            var adminNama = "<?= $_SESSION['login'] ?>";
            $.ajax({
            type: 'POST',
            data: {adminNama: adminNama},
            url: '../api/checkStatus.php',
            success: function(res) {
                // console.log(res);
                if (res != "ACTIVE") {
                    window.location.href = '../api/logout_admin.php';
                }
            }
        });
        }
        setInterval(function(){
            checkStatus();
        }, 1000);
    });

    $('#btnradio1').on('click', function(e) {
        $('.title').html("Admin Logs")
        $('#log-admin').show();
        $('#log-konselor').hide();
        $('#log-user').hide();
    });

    $('#btnradio2').on('click', function(e) {
        $('.title').html("Konselor Logs")
        $('#log-admin').hide();
        $('#log-konselor').show();
        $('#log-user').hide();
    });

    $('#btnradio3').on('click', function(e) {
        $('.title').html("User Logs")
        $('#log-admin').hide();
        $('#log-konselor').hide();
        $('#log-user').show();
    });
</script>
<script>
    $('.navbar-collapse').on('shown.bs.collapse', function () {
        $('center').css('filter', 'blur(0.2rem)')
        $('.btn-grp').css('filter', 'blur(0.2rem)')
        $('body').css('overflow-y', 'hidden')
        $('center').css('pointer-events', 'none')
    });
    $('.navbar-collapse').on('hidden.bs.collapse', function () {
        $('center').css('filter', '')
        $('.btn-grp').css('filter', '')
        $('body').css('overflow-y', 'visible')
        $('center').css('pointer-events', '')
    });
</script>
</html>