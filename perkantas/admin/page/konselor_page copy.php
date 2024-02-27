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

    .reBtn {
        display: flex;
        flex-direction: row;
        justify-content: center;
        text-align: center;
        align-items: center;
        /* padding-top: 0.6rem;
        padding-bottom: 0.6rem; */
        background-color: #FF9B50;
        color: rgb(74, 37, 23);
        line-height: 1.25rem;
        width: 150px;
        height: 39px;
        /* width: 100%; */
        border-radius: 0.5rem;
        cursor: pointer;
    }

    .refresh {
            background-color: transparent;
            text-align: center;
            /* display: block; */
            /* padding-top: 0.6rem;
            padding-bottom: 0.6rem;
            background-color: #FF9B50;
            color: rgb(89, 59, 29);
            line-height: 1.25rem; */
            font-weight: 700;
            font-size: 25px;
            max-width: 150px;
            color: rgb(74, 37, 23);
            margin-top: -3px;
            margin-left: -8px;
            /* width: 100%; */
            /* border-radius: 0.5rem; */
            border-color: transparent;
        }

        .fa-arrows-rotate {
            text-align: center;
            font-size: 25px;
            /* color: rgb(74, 37, 23); */
        }

        /* .reBtn:hover {
            background-color: rgba(130, 92, 55, 1);
            color: white !important;
            
        } */

        /* .slow-spin {
            -webkit-animation: fa-spin 6s infinite linear;
            animation: fa-spin 6s infinite linear;
        } */

        @keyframes fa-spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg);
            }
        }

        @keyframes fa-stop {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
        }
</style>
<script>
    $(document).ready(function(){
        $(".reBtn").hover(function(){
            $(".refresh").css("color", "white");
            $(".reBtn").css("background-color", "rgba(130, 92, 55, 1)");
            $(".reBtn").css("color", "white");

            }, function(){
                $(".refresh").css("color", "rgb(74, 37, 23)");
                $(".reBtn").css("background-color", "rgb(255, 155, 80)");
                $(".reBtn").css("color", "rgb(74, 37, 23)");

        });

        $('#reBtn').on('click', function(e) {
            // $(".spinBtn").html('<i class="fa-solid fa-arrows-rotate fa-spin fast-spin"></i>');
            $(".fa-arrows-rotate").css("-webkit-animation", "fa-spin .5s infinite linear");
            $(".fa-arrows-rotate").css("animation", "fa-spin .5s infinite linear");
            setTimeout(function() {
                list_load()
            }, 1000)
            // list_load()
        });

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

    function list_load() {
        var data = $('#konselorSearch').val();
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("list-konselor").innerHTML = this.responseText;
        }
        xhttp.open("POST","../api/getKonselorInfo.php",true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("data=" + data);
        $(".fa-arrows-rotate").css("-webkit-animation", "fa-stop .5s infinite linear");
        $(".fa-arrows-rotate").css("animation", "fa-stop .5s infinite linear");
    }
    
</script>
<body>
    <?php include "navbar_admin.php"; ?>
    <div class="btn-grp">
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-dark" for="btnradio1">List Konselor</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-dark" for="btnradio2">Tambah Konselor</label>
        </div>
        <h1 class="title"></h1>
        <div class="reBtn" id="reBtn">
            <input type="submit" name="refresh" id="refresh" class="refresh" value="Refresh ">
            <div class="spinBtn">
                <i class="fa-solid fa-arrows-rotate"></i>
            </div>
        </div>
        <div class="input-container2" style="margin-bottom: -5px; margin-top: 10px">
            <input type="text" name="konselorSearch" id="konselorSearch" placeholder="Cari Konselor" required style="font-size: 1.3rem" onkeyup="list_load()">
        </div>
    </div>

    <style>
        table {
            width: 100vw !important;
        }

        #konselorSearch {
            border-width: 4px;
            border-color: #90603d;
            text-align: center;
            padding: 16px;
            height: 50px;
        }

        @media screen and (max-width: 899.9px) {
            .nama {
                width: 150px !important;
            }

            
        }

        @media screen and (min-width: 900px) {
            table {
                width: 98vw !important;
            }

            /* .nama {
                padding-left: 0;
            } */

            #konselorSearch {
                width: 800px;
            }

            .aktv {
                padding-left: 120px !important;
            }

        }   
        /* table th {
            width: 300px;
        } */
    </style>
    
    <center>
    <div class="table-responsive tab-con" style="margin-top: 15px;">
        <table class="table table-striped table-md table-responsive align-middle">
            <thead class="table-light">
                <tr style="background-color: #90603d;">
                    <th scope="col">#</th>
                    <th scope="col" class="nama" style="width: 500px;padding-left: 30px;">Nama</th>
                    <th scope="col" class="aktv" style="padding-left: -70px;">Email</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
        
            <!-- List Konselor -->
            <tbody id="list-konselor">
                <?php 
                    $sql = "SELECT * FROM konselor_info";
                    $stmt = $con -> prepare($sql);
                    $stmt -> execute();
                    $result = $stmt -> get_result();
                    $i = 1;
                    while ($row = $result -> fetch_assoc()):
                ?>
                    <tr>
                        <td><?= $i?></td>
                        <td class="nama text-break" style="padding-left: 30px;"><?= $row['nama_konselor'] ?></td>
                        <td class="aktv" style="padding-left: -40px;"><?= $row['konselor_email'] ?></td>
                        <td>
                        <?php if ($row['konselor_status'] == "ACTIVE"): ?>
                            <select class="form-select form-select-<?= $i ?>" id="<?= $row['konselor_email'] ?>" aria-label="Floating label select example" style="background-color: green;  color: white; 
                font-weight: bold;" onchange="changeSelected('<?= $i ?>', '<?= $row['konselor_email'] ?>')">
                                <option selected hidden value="<?= $row['konselor_status'] ?>"><?= $row['konselor_status'] ?></option>
                                <option value="PENDING" style="background-color: #FFCC70; color: #ff6d0d; 
                font-weight: bold;">PENDING</option>
                                <option value="NOT ACTIVE" style="background-color: #FFCC70; color: red; 
                font-weight: bold;">NOT ACTIVE</option>
                        <?php elseif ($row['konselor_status'] == "PENDING"): ?>
                            <select class="form-select form-select-<?= $i ?>" id="<?= $row['konselor_email'] ?>" aria-label="Floating label select example" style="background-color: #ff6d0d;  color: white; 
                font-weight: bold;" onchange="changeSelected('<?= $i ?>', '<?= $row['konselor_email'] ?>')">
                                <option selected hidden value="<?= $row['konselor_status'] ?>"><?= $row['konselor_status'] ?></option>
                                <option value="ACTIVE" style="background-color: #FFCC70; color: green; 
                font-weight: bold;">ACTIVE</option>
                                <option value="NOT ACTIVE" style="background-color: #FFCC70; color: red; 
                font-weight: bold;">NOT ACTIVE</option>
                        <?php else: ?>
                            <select class="form-select form-select-<?= $i ?>" id="<?= $row['konselor_email'] ?>" aria-label="Floating label select example" style="background-color: red;  color: white; 
                font-weight: bold;" onchange="changeSelected('<?= $i ?>', '<?= $row['konselor_email'] ?>')">
                                <option selected hidden value="<?= $row['konselor_status'] ?>"><?= $row['konselor_status'] ?></option>
                                <option value="ACTIVE" style="background-color: #FFCC70; color: green; 
                font-weight: bold;">ACTIVE</option>
                                <option value="PENDING" style="background-color: #FFCC70; color: #ff6d0d; 
                font-weight: bold;">PENDING</option>
                        <?php endif ?>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endwhile; ?>
            </tbody>
            </script>
        </table>
    </div>
    </center>

    <script>
        function changeSelected(id, email) {
            // e.preventDefault(e)
            // alert(email)
            // if ($('.form-select-'+id).val() == "ACTIVE") {
            //     $('.form-select-'+id).css('background-color', 'green')
            // } else {
            //     $('.form-select-'+id).css('background-color', 'red')
            // }

            // e.preventDefault(e);
            var konselorEmail = email;
            var konselorStatus = $('.form-select-' + id).val()

            // alert(adminEmail)
            // alert(adminStatus)
            $.ajax({
                type: 'POST',
                data: {konselorEmail: konselorEmail, konselorStatus: konselorStatus},
                url: '../api/set_konselorStatus.php',
                success: function(res) {
                    console.log(res);
                    data = JSON.parse(res);
                    // console.log(data)
                    // list_load()
                    if (data['error'] == 0) {
                        list_load()
                        Swal.fire({
                            title:'Update berhasil.', 
                            icon:'success', 
                            text:data['sm'], 
                            allowOutsideClick: false,
                            confirmButtonText:'OK', 
                            willClose:() => {
                                // window.location.href = 'admin/index.php';
                                // if ($('.form-select-'+id).val() == "ACTIVE") {
                                //     $('.form-select-'+id).css('background-color', 'green')
                                // } else {
                                //     $('.form-select-'+id).css('background-color', 'red')
                                // }
                            }
                        });
                    } else if (data['error'] == 1) {
                        Swal.fire({
                            title:'Update gagal.', 
                            icon:'error', 
                            text:data['em'],
                            confirmButtonText:'Close',
                            willClose:() => {
                                
                            }
                        });
                    } else {
                        Swal.fire({
                            title:'Error',
                            text:'Silahkan coba lagi!',
                            icon:'error',
                            confirmButtonText:'Close',
                            willClose:() => {
                                
                            }
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title:'Error',
                        text:'Silahkan coba lagi!',
                        icon:'error',
                        confirmButtonText:'Close',
                        willClose:() => {
                                
                        }
                    });
                }
            });
        }
    </script>

    <style>
        .form-container {
            /* width: 100vw;
            height: 100vh; */
            align-items: center;
            justify-content:center;
            display: flex;
        }

        .form {
            background-color: rgba(255, 255, 255, 0.3);
            display: block;
            padding: 30px;
            /* max-width: 500px; */
            border-radius: 0.5rem;
        }

        .form-title {
            font-size: 40px;
            line-height: 1.75rem;
            font-weight: 400;
            text-align: center;
            color: #29351d;
        }

        .input-container {
            position: relative;
        }

        .input-container input, .form button {
            outline: none;
            border: 0px solid #e5e7eb;
            margin: 8px 0;
            font-size: 15px;
        }

        .input-container input {
            padding: 1rem;
            padding-right: 3rem;
            font-size: 15px;
            line-height: 1.25rem;
            width: 300px;
            border-radius: 0.5rem;
        }

        .input-container2 {
            position: relative;
        }

        .input-container2 input, .form button {
            outline: none;
            border: 0px solid #e5e7eb;
            margin: 8px 0;
            font-size: 15px;
        }

        .input-container2 input {
            padding: 1rem;
            padding-right: 3rem;
            font-size: 15px;
            line-height: 1.25rem;
            width: 300px;
            border-radius: 0.5rem;
        }

        .submit {
            display: block;
            padding-top: 0.6rem;
            padding-bottom: 0.6rem;
            background-color: #FF9B50;
            color: rgb(89, 59, 29);
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 500;
            width: 100%;
            border-radius: 0.5rem;
            border-color: transparent;
            text-transform: uppercase;
        }

        .submit:enabled:hover {
            background-color: rgba(130, 92, 55, 1);
            color: white;
        }

        .signup-link {
            color: #6B7280;
            font-size: 18px;
            line-height: 1.25rem;
            margin-top: 10px;
            margin-bottom: -6px;
            text-align: center;
        }

        .signup-link a {
            text-decoration: underline;
            cursor: pointer;
        }

        @media screen and (min-width: 900px) {
            .form {
                margin-top: 50px !important;
                scale: 1.2;
            }
        }

        .fa-eye:hover {
            color: #FF9B50;
            cursor: pointer;
        }

        .fa-eye-slash:hover {
            color: #FF9B50;
            cursor: pointer;
        }
    </style>
    <div class="form-container" id="daftar" style="visibility: hidden;">
        <form class="form" style="margin-top: 20px;">
            <div class="p1" id="p1">
                <div class="input-container">
                    <input type="text" name="konselorEmail" id="konselorEmail" placeholder="Email Konselor" required>
                </div>
                <div class="input-container">
                    <input type="text" name="konselorNama" id="konselorNama" placeholder="Nama Konselor" required>
                </div>
                <div class="input-container">
                    <input type="password" name="konselorPass" id="konselorPass" placeholder="Password" required><span><i class="fa-solid fa-eye" style="margin-left: -30px;"></i><i class="fa-solid fa-eye-slash" style="margin-left: -30px;"></i></span>
                </div>
                <center>
                    <input type="submit" name="daftarBtn" id="daftarBtn" class="submit" value="Daftar" style="margin-top: 20px;">
                </center>
            </div>
        </form>
    </div>
    <script>
        $( document ).ready(function() {
            $('.fa-eye-slash').hide();
        });

        $('.fa-eye').on('click', function(e) {
            e.preventDefault;
            $('#konselorPass').attr('type', 'text');
            $('.fa-eye-slash').show();
            $('.fa-eye').hide();
        });

        $('.fa-eye-slash').on('click', function(e) {
            e.preventDefault;
            $('#konselorPass').attr('type', 'password');
            $('.fa-eye').show();
            $('.fa-eye-slash').hide();
        });
    </script>
    
</body>
<script>
    $( document ).ready(function() {
        $('.title').html("List Konselor")
        $('.tab-con').show();
        $('#list-konselor').show();
        $('.input-container2').show();
        $('#reBtn').show();
        $('#daftar').css('visibility', 'hidden')
    });

    $('#btnradio1').on('click', function(e) {
        $('.title').html("List Konselor")
        $('.tab-con').show();
        $('#list-konselor').show();
        $('.input-container2').show();
        // $('#daftar').hide();
        $('#reBtn').show();
        $('#daftar').css('visibility', 'hidden')
    });

    $('#btnradio2').on('click', function(e) {
        $('.title').html("Tambah Konselor")
        $('.tab-con').hide();
        $('#list-konselor').hide();
        $('.input-container2').hide();
        // $('#daftar').show();
        $('#reBtn').hide();
        $('#daftar').css('visibility', 'visible')
    });

    $('#daftarBtn').on('click', function(e) {
        e.preventDefault(e);
        var konselorEmail = $("#konselorEmail").val();
        var konselorNama = $("#konselorNama").val();
        var konselorPass = $("#konselorPass").val();
        $.ajax({
            type: 'POST',
            data: {konselorEmail: konselorEmail, konselorPass: konselorPass, konselorNama: konselorNama},
            url: '../api/set_konselor.php',
            success: function(res) {
                console.log(res);
                data = JSON.parse(res);
                // console.log(data)
                if (data['error'] == 0) {
                    Swal.fire({
                        title:'Proses berhasil.', 
                        icon:'success', 
                        text:data['sm'], 
                        allowOutsideClick: false,
                        confirmButtonText:'OK', 
                        willClose:() => {
                            window.location.href = 'konselor_page.php';
                        }
                    });
                } else if (data['error'] == 1) {
                    Swal.fire({
                        title:'Proses gagal.', 
                        icon:'error', 
                        text:data['em'],
                        confirmButtonText:'Close',
                        willClose:() => {
                            
                        }
                    });
                } else {
                    Swal.fire({
                        title:'Error',
                        text:'SIlahkan coba lagi!',
                        icon:'error',
                        confirmButtonText:'Close',
                        willClose:() => {
                            
                        }
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title:'Error',
                    text:'Silahkan coba lagi!',
                    icon:'error',
                    confirmButtonText:'Close',
                    willClose:() => {
                            
                    }
                });
            }
        });
    });
</script>
<script>
    $('.navbar-collapse').on('shown.bs.collapse', function () {
        $('center').css('filter', 'blur(0.2rem)')
        $('.btn-grp').css('filter', 'blur(0.2rem)')
        $('#daftar').css('filter', 'blur(0.2rem)')
        $('body').css('overflow-y', 'hidden')
        $('center').css('pointer-events', 'none')
    });
    $('.navbar-collapse').on('hidden.bs.collapse', function () {
        $('center').css('filter', '')
        $('.btn-grp').css('filter', '')
        $('#daftar').css('filter', '')
        $('body').css('overflow-y', 'visible')
        $('center').css('pointer-events', '')
    });
</script>
</html>