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

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Datatables CSS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" />

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.5.2/sweetalert2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.5.2/sweetalert2.all.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            justify-content: center;
            align-items: center;
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

        @media screen and (min-width: 900px) {
            .btn-group {
                scale: 1.2;
                
            }
        }
        /* table tr td, table tr th {
            background-color: rgba(255, 155, 80, .5) !important;
        } */

        .reBtn {
            display: flex;
            flex-direction: row;
            justify-content: center;
            text-align: center;
            align-items: center;
            background-color: #FF9B50;
            color: rgb(74, 37, 23);
            line-height: 1.25rem;
            width: 150px;
            height: 39px;
            border-radius: 0.5rem;
            cursor: pointer;
        }

        .refresh {
            background-color: transparent;
            text-align: center;
            font-weight: 700;
            font-size: 25px;
            max-width: 150px;
            color: rgb(74, 37, 23);
            margin-top: -3px;
            margin-left: -8px;
            border-color: transparent;
        }

        .fa-arrows-rotate {
            text-align: center;
            font-size: 25px;
        }

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
            // $(".trash-icon").hover(function(){
            //     alert("cok")
            //     $(".trash-icon").html(<i class="fa-solid fa-trash fa-shake" style="color: #ff0000;"></i>)
            // });

            // $(".trash-icon").hover(function() {
            //     // alert("hover");
            //     $(this).html('<i class="fa-solid fa-trash fa-shake" style="color: #ff0000;"></i>');
            // }, function() {
            //     // alert("unhover");
            //     $(this).html('<i class="fa-solid fa-trash" style="color: #ff0000;"></i>');
            // });

            

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
                $(".fa-arrows-rotate").css("-webkit-animation", "fa-spin .5s infinite linear");
                $(".fa-arrows-rotate").css("animation", "fa-spin .5s infinite linear");
                setTimeout(function() {
                    list_load()
                }, 1000)
                // list_load()
            });

            function checkStatus() {
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
            // var data = $('#adminSearch').val();
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                if (this.responseText == "") {
                    document.getElementById("list-admin").innerHTML = '<tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No data available in table</td></tr>';
                } else {
                    document.getElementById("list-admin").innerHTML = this.responseText;
                }
            }
            xhttp.open("GET","../api/getAdminInfo.php");
            // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
            // $(".spinBtn").html('<i class="fa-solid fa-arrows-rotate"></i>');
            $(".fa-arrows-rotate").css("-webkit-animation", "fa-stop .5s infinite linear");
            $(".fa-arrows-rotate").css("animation", "fa-stop .5s infinite linear");
        }
        
    </script>
    <style>
        @font-face {
            font-family: 'SuperMario256';
            src: url('../../aspirasi/assets/SuperMario256.ttf') format('truetype');
        }

            /* *,
            *:after,
            *:before {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                -ms-box-sizing: border-box;
                box-sizing: border-box;
            } */

        body {
            /* font-family: arial;
            font-size: 16px;
            background-image: url('../../aspirasi/assets/background.png');
            background-size: cover;
            background-attachment: fixed; */
            align-items: center;
            justify-content: center;
        }

        /* .title {
            color: white !important;
            -webkit-text-stroke-width: 4px !important;
            -webkit-text-stroke-color: darkred !important;
            letter-spacing: 4px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.9) !important;
            font-family: "SuperMario256", sans-serif;
            font-size: 8vh !important;
        } */

        .container {
            margin-top: 2vh;
            max-width: 1100px;
            width: 100%;
            background-color: #fff;
            padding: 1vw;
            margin-bottom: -43vh;
            border-radius: 10px;
            box-shadow: -10px 10px 19px 5px rgba(0, 0, 0, 0.4);
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .dt-buttons .buttons-copy,
        .dt-buttons .buttons-csv,
        .dt-buttons .buttons-excel,
        .dt-buttons .buttons-pdf,
        .dt-buttons .buttons-print {
            background-color: darkmagenta;
            border-color: darkmagenta;
            color: #fff;
            border-radius: 5px;
        }

        .dt-buttons .buttons-copy:hover,
        .dt-buttons .buttons-csv:hover,
        .dt-buttons .buttons-excel:hover,
        .dt-buttons .buttons-pdf:hover,
        .dt-buttons .buttons-print:hover {
            background-color: lightgray;
            border-color: lightgray;
            color: black;
        }

        #tabelEvent {
            border-collapse: collapse;
            margin-top: 2vh;
            overflow-x: auto;
            table-layout: auto;
            margin-bottom: 2vh;
            text-align: center;
        }

        #tabelEvent td:nth-child(3) {
            text-align: justify;
        }

        #tabelEvent th,
        #tabelEvent td {
            padding: 1vh;
            border: 1px solid #ccc;
            white-space: normal;
        }

        #tabelEvent th {
            background-color: darkred;
            color: white;
            text-align: left;
        }

        #tabelEvent thead th {
            font-weight: bold;
        }

        #tabelEvent tbody tr:hover {
            cursor: pointer;
        }

        div.dataTables_wrapper div.dataTables_filter {
            margin-bottom: 2vh;
        }

        .table-responsive {
            overflow-x: auto;
        }

        @media screen and (max-width: 768px) {

            table {
                font-size: 12px;
            }

            h1 {
                font-size: 48px !important;
            }

            .dt-buttons .buttons-copy,
            .dt-buttons .buttons-csv,
            .dt-buttons .buttons-excel,
            .dt-buttons .buttons-pdf,
            .dt-buttons .buttons-print {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>
    <?php
    include "navbar_admin.php";
    ?>
    <div class="btn-grp">
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-dark" for="btnradio1">List Admin</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-dark" for="btnradio2">Tambah Admin</label>
        </div>
        <h1 class="title"></h1>
        <div class="reBtn" id="reBtn">
            <input type="submit" name="refresh" id="refresh" class="refresh" value="Refresh ">
            <div class="spinBtn">
                <i class="fa-solid fa-arrows-rotate"></i>
            </div>
        </div>
        <!-- <div class="input-container2" style="margin-bottom: -5px; margin-top: 10px">
            <input type="text" name="adminSearch" id="adminSearch" placeholder="Cari Admin" required style="font-size: 1.3rem" onkeyup="list_load()">
        </div> -->
    </div>
    <div class="container">
        <div class="table-responsive mt-4">
            <table id="tabelEvent" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <?php if ($_SESSION['login'] == "Admin Utama"): ?>
                        <th>Action</th>
                        <?php endif ?>
                    </tr>
                </thead>
                <tbody id="list-admin">
                <?php 
                    $sql = "SELECT * FROM admin_info ORDER BY counter ASC";
                    $stmt = $con -> prepare($sql);
                    $stmt -> execute();
                    $result = $stmt -> get_result();
                    $i = 1;
                    while ($row = $result -> fetch_assoc()):
                ?>
                    <tr>
                        <td><?= $i?></td>
                        <td><?= $row['nama_admin'] ?></td>
                        <td><?= $row['admin_email'] ?></td>
                        <?php if ($_SESSION['login'] == "Admin Utama"): ?>
                            <?php if ($row['nama_admin'] == "Admin Utama"): ?>
                                <td></td>
                            <?php else: ?>
                                <td>
                                <?php if ($row['admin_status'] == "ACTIVE"): ?>
                                    <select class="form-select form-select-<?= $i ?>" id="<?= $row['admin_email'] ?>" aria-label="Floating label select example" style="background-color: green;  color: white; font-weight: bold;" onchange="changeSelected('<?= $i ?>', '<?= $row['admin_email'] ?>')">
                                        <option selected hidden value="<?= $row['admin_status'] ?>"><?= $row['admin_status'] ?></option>
                                        <option value="NOT ACTIVE" style="background-color: #FFCC70; color: red; font-weight: bold;">NOT ACTIVE</option>
                                <?php else: ?>
                                    <select class="form-select form-select-<?= $i ?>" id="<?= $row['admin_email'] ?>" aria-label="Floating label select example" style="background-color: red;  color: white; font-weight: bold;" onchange="changeSelected('<?= $i ?>', '<?= $row['admin_email'] ?>')">
                                        <option selected hidden value="<?= $row['admin_status'] ?>"><?= $row['admin_status'] ?></option>
                                        <option value="ACTIVE" style="background-color: #FFCC70; color: green; font-weight: bold;">ACTIVE</option>
                                <?php endif ?>
                                </td>
                            <?php endif ?>
                            <?php if ($row['nama_admin'] == "Admin Utama"): ?>
                                <td></td>
                            <?php else: ?>
                                <td class="trash-icon"><i class="fa-solid fa-trash" style="color: #ff0000;" onclick="removeSelected('<?= $row['admin_email'] ?>')"></i></td>
                            <?php endif ?>  
                        <?php else: ?>
                            <?php if ($row['admin_status'] == "ACTIVE"): ?>
                                <td><?= $row['admin_status'] ?></td>
                            <?php else: ?>
                                <td><?= $row['admin_status'] ?></td>
                            <?php endif ?>
                        <?php endif ?>
                        
                    </tr>
                        <?php $i++ ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            var table = $('#tabelEvent').DataTable();

            function setPageSize() {
                var windowWidth = $(window).width();

                //Ukuran layar HP
                if (windowWidth <= 768) {
                    table.page.len(5).draw(); //Entri 5 per page
                } else { // Ukuran layar laptop
                    table.page.len(10).draw(); //Entri 10 per page
                }
            }

            setPageSize();

            $(window).on('resize', function() {
                setPageSize();
            });


            $(".view-poster-link").click(function(e) {
                e.preventDefault();
                var posterPath = $(this).data("poster");
                $("#eventPosterImage").attr("src", posterPath);
                $("#eventPosterModal").modal("show");
            });

        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <div class="form-container" id="daftar" style="visibility: hidden;">
        <form class="form" style="margin-top: 20px;">
            <div class="p1" id="p1">
                <div class="input-container">
                    <input type="text" name="adminEmail" id="adminEmail" placeholder="Email Admin" required>
                </div>
                <div class="input-container">
                    <input type="text" name="adminNama" id="adminNama" placeholder="Nama Admin" required>
                </div>
                <div class="input-container">
                    <input type="password" name="adminPass" id="adminPass" placeholder="Password" required><span><i class="fa-solid fa-eye" style="margin-left: -30px;"></i><i class="fa-solid fa-eye-slash" style="margin-left: -30px;"></i></span>
                </div>
                <center>
                    <input type="submit" name="daftarBtn" id="daftarBtn" class="submit" value="Daftar" style="margin-top: 20px;">
                </center>
            </div>
        </form>
    </div>
</body>

<script>
    function removeSelected(email) {
        var adminEmail = email;
        // alert(adminEmail)

        Swal.fire({
            title: "Apakah anda yakin untuk menghapus " + adminEmail + "?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Batalkan",
            confirmButtonText: "Ya, hapus",
            allowOutsideClick: false
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    data: {adminEmail: adminEmail},
                    url: '../api/rm_admin.php',
                    success: function(res) {
                        console.log(res);
                        data = JSON.parse(res);
                        // console.log(data)
                        // list_load()
                        if (data['error'] == 0) {
                            list_load()
                            Swal.fire({
                                title:'Hapus akun berhasil.', 
                                icon:'success', 
                                text:data['sm'], 
                                allowOutsideClick: false,
                                confirmButtonText:'OK', 
                                willClose:() => {
                                }
                            });
                        } else if (data['error'] == 1) {
                            Swal.fire({
                                title:'Hapus akun gagal.', 
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
        });
    }

    function changeSelected(id, email) {
        // e.preventDefault(e);
        var adminEmail = email;
        var adminStatus = $('.form-select-' + id).val()

        // alert(adminEmail)
        // alert(adminStatus)
        $.ajax({
            type: 'POST',
            data: {adminEmail: adminEmail, adminStatus: adminStatus},
            url: '../api/set_adminStatus.php',
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
<script>
    $( document ).ready(function() {
        $('.fa-eye-slash').hide();
    });

    $('.fa-eye').on('click', function(e) {
        e.preventDefault;
        $('#adminPass').attr('type', 'text');
        $('.fa-eye-slash').show();
        $('.fa-eye').hide();
    });

    $('.fa-eye-slash').on('click', function(e) {
        e.preventDefault;
        $('#adminPass').attr('type', 'password');
        $('.fa-eye').show();
        $('.fa-eye-slash').hide();
    });
</script>
<script>
    $( document ).ready(function() {
        $('.title').html("List Admin")
        $('.tab-con').show();
        $('.input-container2').show();
        $('#list-admin').show();
        $('#reBtn').show();
        $('.container').show();
        $('#daftar').css('visibility', 'hidden')
    });

    $('#btnradio1').on('click', function(e) {
        $('.title').html("List Admin")
        $('.tab-con').show();
        $('#list-admin').show();
        $('.input-container2').show();
        // $('#daftar').hide();
        $('#reBtn').show();
        $('.container').show();
        $('#daftar').css('visibility', 'hidden')
    });

    $('#btnradio2').on('click', function(e) {
        $('.title').html("Tambah Admin")
        $('.tab-con').hide();
        $('#list-admin').hide();
        $('.input-container2').hide();
        // $('#daftar').show();
        $('#reBtn').hide();
        $('.container').hide();
        $('#daftar').css('visibility', 'visible')
    });

    $('#daftarBtn').on('click', function(e) {
        e.preventDefault(e);
        var adminEmail = $("#adminEmail").val();
        var adminNama = $("#adminNama").val();
        var adminPass = $("#adminPass").val();
        if (adminEmail != null && adminEmail != "" && adminEmail != " " && adminEmail != "-" && adminNama != null && adminNama != "" && adminNama != " " && adminNama != "-" && adminPass != null && adminPass != "" && adminPass != " " && adminPass != "-") {
            $.ajax({
                type: 'POST',
                data: {adminEmail: adminEmail, adminPass: adminPass, adminNama: adminNama},
                url: '../api/set_admin.php',
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
                                window.location.href = 'admin_page.php';
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
        } else {
            Swal.fire({
                title:'Error',
                text:'Input anda tidak valid. Silahkan cek lagi!',
                icon:'error',
                confirmButtonText:'Close',
                willClose:() => {
                        
                }
            });
        }
    });
</script>
<script>
    $('.navbar-collapse').on('shown.bs.collapse', function () {
        $('center').css('filter', 'blur(0.2rem)')
        $('.btn-grp').css('filter', 'blur(0.2rem)')
        $('#daftar').css('filter', 'blur(0.2rem)')
        $('body').css('overflow', 'hidden')
        $('center').css('pointer-events', 'none')
    });
    $('.navbar-collapse').on('hidden.bs.collapse', function () {
        $('center').css('filter', '')
        $('.btn-grp').css('filter', '')
        $('#daftar').css('filter', '')
        $('body').css('overflow', 'visible')
        $('center').css('pointer-events', '')
    });
</script>
</html>