<?php
include "../api/connect.php";

if (!$_SESSION['login-konselor']) {
    echo "
        <script>
            alert('Please sign in first ');
        </script>
    ";

    header("Location: ../../konselor.php");
    exit;
} else {
    $data = $_SESSION['login-konselor'];
    $result = mysqli_query($con, "SELECT * FROM `konselor_info` WHERE `nama_konselor` =  '$data'");
    $row = mysqli_fetch_assoc($result);

    if ($row['konselor_status'] == "NOT ACTIVE") {
        echo "
            <script>
                alert('Please sign in first ');
            </script>
        ";

        header("Location: ../api/logout_konselor.php");
        exit;
    } elseif ($row['konselor_status'] == "PENDING") {
        echo "
            <script>
                alert('Complete your profile first ');
            </script>
        ";

        header("Location: profile_page.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konselor Site - Griya Pulih Asih</title>

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
        $(document).ready(function() {
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



            $(".reBtn").hover(function() {
                $(".refresh").css("color", "white");
                $(".reBtn").css("background-color", "rgba(130, 92, 55, 1)");
                $(".reBtn").css("color", "white");

            }, function() {
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
                // alert("jalan")
                var konselorNama = "<?= $_SESSION['login-konselor'] ?>";
                $.ajax({
                    type: 'POST',
                    data: {
                        konselorNama: konselorNama
                    },
                    url: '../api/checkStatus.php',
                    success: function(res) {
                        // console.log(res);
                        if (res == "NOT ACTIVE") {
                            window.location.href = '../api/logout_konselor.php';
                        } else if (res == "PENDING") {
                            window.location.href = 'profile_page.php';
                        }
                    }
                });
            }
            setInterval(function() {
                checkStatus();
            }, 1000);
        });
    </script>
    <style>
        body {
            align-items: center;
            justify-content: center;
        }

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
    include "navbar_konselor.php";
    ?>
    <script>
        // $('#btnradio2').on('click', function(e) {
        //     alert('click')
        // });
    </script>
    <div class="btn-grp">
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-dark" for="btnradio1">List Jadwal</label>

            <?php if ($row['konselor_status'] == "ACTIVE") : ?>
                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <?php else : ?>
                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <?php endif ?>
            <label class="btn btn-outline-dark" for="btnradio2">Tambah Jadwal</label>
        </div>
        <h1 class="title"></h1>
        <div class="reBtn" id="reBtn">
            <input type="submit" name="refresh" id="refresh" class="refresh" value="Refresh ">
            <div class="spinBtn">
                <i class="fa-solid fa-arrows-rotate"></i>
            </div>
        </div>
        <!-- <div class="input-container2" style="margin-bottom: -5px; margin-top: 10px">
            <input type="text" name="jadwalSearch" id="jadwalSearch" placeholder="Cari Jadwal" required style="font-size: 1.3rem" onkeyup="list_load()">
        </div> -->
    </div>
    <div class="container">
        <div class="table-responsive mt-4">
            <table id="tabelEvent" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Tipe</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="list-jadwal">
                    <?php
                    $checkdata = $_SESSION['login-konselor'];
                    $sqlchck = "SELECT * FROM konselor_info WHERE nama_konselor = '$checkdata'";
                    $stmt1 = $con->prepare($sqlchck);
                    $stmt1->execute();
                    $result1 = $stmt1->get_result();
                    $row1 = $result1->fetch_assoc();
                    $newdata = $row1['konselor_email'];

                    $sql = "SELECT * FROM jadwal_konseling WHERE konselor_email = '$newdata' AND is_show = 0";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $i = 1;
                    while ($row = $result->fetch_assoc()) :
                    ?>
                        <tr>
                            <td><?= $i ?></td>

                            <td><?= $row['tanggal_konseling'] ?></td>
                            <td><?= $row['mulai_konseling'] ?></td>
                            <td><?= $row['akhir_konseling'] ?></td>
                            <?php if ($row['tipe_service'] == 1) : ?>
                                <td>Konseling</td>
                            <?php elseif ($row['tipe_service'] == 2) : ?>
                                <td>Psikotest</td>
                            <?php endif ?>
                            <td class="trash-icon"><i class="fa-solid fa-trash" style="color: #ff0000;" onclick="removeSelected('<?= $row['jadwal_konseling_id'] ?>')"></i></td>
                        </tr>
                        <?php $i++ ?>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function list_load() {
            // var data = $('#jadwalSearch').val();
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                // document.getElementById("list-jadwal").innerHTML = this.responseText;
                if (this.responseText == "") {
                    document.getElementById("list-jadwal").innerHTML = '<tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No data available in table</td></tr>';
                } else {
                    document.getElementById("list-jadwal").innerHTML = this.responseText;
                }
            }
            xhttp.open("GET", "../api/getJadwalInfo.php");
            // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send();
            // $(".spinBtn").html('<i class="fa-solid fa-arrows-rotate"></i>');
            $(".fa-arrows-rotate").css("-webkit-animation", "fa-stop .5s infinite linear");
            $(".fa-arrows-rotate").css("animation", "fa-stop .5s infinite linear");
        }

        function removeSelected(id) {
            var idJadwal = id;
            // alert(idJadwal)

            Swal.fire({
                title: "Apakah anda yakin untuk menghapus jadwal ini?",
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
                        data: {
                            idJadwal: idJadwal
                        },
                        url: '../api/rm_jadwal.php',
                        success: function(res) {
                            console.log(res);
                            data = JSON.parse(res);
                            // console.log(data)
                            // list_load()
                            if (data['error'] == 0) {
                                list_load()
                                Swal.fire({
                                    title: 'Hapus akun berhasil.',
                                    icon: 'success',
                                    text: data['sm'],
                                    allowOutsideClick: false,
                                    confirmButtonText: 'OK',
                                    willClose: () => {}
                                });
                            } else if (data['error'] == 1) {
                                Swal.fire({
                                    title: 'Hapus akun gagal.',
                                    icon: 'error',
                                    text: data['em'],
                                    confirmButtonText: 'Close',
                                    willClose: () => {

                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Silahkan coba lagi!',
                                    icon: 'error',
                                    confirmButtonText: 'Close',
                                    willClose: () => {

                                    }
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Error',
                                text: 'Silahkan coba lagi!',
                                icon: 'error',
                                confirmButtonText: 'Close',
                                willClose: () => {

                                }
                            });
                        }
                    });
                }
            });
        }
    </script>

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
                <center>
                    <div class="input-container">
                        <select class="form-select form-select-opsi" id="opsiTipe" aria-label="Floating label select example" style="width: 350px; height: 50px">
                            <option selected value="1">Konseling</option>
                            <option value="2">Psikotest</option>
                        </select>
                    </div>
                    <div class="input-container">
                        <input type="date" id="date-picker" style="color: rgba(0, 0, 0, 0.5); width: 350px;">
                    </div>
                    <!-- </center>
                <center> -->
                    <div class="row row-cols-2" style="max-width: 350px; margin-left: 15px; margin-top: 5px;">
                        <div class="col">
                            <input type="checkbox" id="cbx1" style="display: none;" value="08:00:00">
                            <label for="cbx1" class="check">
                                <svg width="18px" height="18px" viewBox="0 0 18 18">
                                    <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                    <polyline points="1 9 7 14 15 4"></polyline>
                                </svg>
                                <label for="cbx1" class="labeljam8">08.00-09.00 WIB</label>
                            </label>
                        </div>
                        <div class="col">
                            <input type="checkbox" id="cbx2" style="display: none;" value="09:00:00">
                            <label for="cbx2" class="check">
                                <svg width="18px" height="18px" viewBox="0 0 18 18">
                                    <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                    <polyline points="1 9 7 14 15 4"></polyline>
                                </svg>
                                <label for="cbx2" class="labeljam9">09.00-10.00 WIB</label>
                            </label>
                        </div>
                        <div class="col">
                            <input type="checkbox" id="cbx3" style="display: none;" value="10:00:00">
                            <label for="cbx3" class="check">
                                <svg width="18px" height="18px" viewBox="0 0 18 18">
                                    <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                    <polyline points="1 9 7 14 15 4"></polyline>
                                </svg>
                                <label for="cbx3" class="labeljam10">10.00-11.00 WIB</label>
                            </label>
                        </div>
                        <div class="col">
                            <input type="checkbox" id="cbx4" style="display: none;" value="11:00:00">
                            <label for="cbx4" class="check">
                                <svg width="18px" height="18px" viewBox="0 0 18 18">
                                    <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                    <polyline points="1 9 7 14 15 4"></polyline>
                                </svg>
                                <label for="cbx4" class="labeljam11">11.00-12.00 WIB</label>
                            </label>
                        </div>
                        <div class="col">
                            <input type="checkbox" id="cbx5" style="display: none;" value="12:00:00">
                            <label for="cbx5" class="check">
                                <svg width="18px" height="18px" viewBox="0 0 18 18">
                                    <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                    <polyline points="1 9 7 14 15 4"></polyline>
                                </svg>
                                <label for="cbx5" class="labeljam12">12.00-13.00 WIB</label>
                            </label>
                        </div>
                        <div class="col">
                            <input type="checkbox" id="cbx6" style="display: none;" value="13:00:00">
                            <label for="cbx6" class="check">
                                <svg width="18px" height="18px" viewBox="0 0 18 18">
                                    <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                    <polyline points="1 9 7 14 15 4"></polyline>
                                </svg>
                                <label for="cbx6" class="labeljam13">13.00-14.00 WIB</label>
                            </label>
                        </div>
                        <div class="col">
                            <input type="checkbox" id="cbx7" style="display: none;" value="14:00:00">
                            <label for="cbx7" class="check">
                                <svg width="18px" height="18px" viewBox="0 0 18 18">
                                    <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                    <polyline points="1 9 7 14 15 4"></polyline>
                                </svg>
                                <label for="cbx7" class="labeljam14">14.00-15.00 WIB</label>
                            </label>
                        </div>
                        <div class="col">
                            <input type="checkbox" id="cbx8" style="display: none;" value="15:00:00">
                            <label for="cbx8" class="check">
                                <svg width="18px" height="18px" viewBox="0 0 18 18">
                                    <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                    <polyline points="1 9 7 14 15 4"></polyline>
                                </svg>
                                <label for="cbx8" class="labeljam15">15.00-16.00 WIB</label>
                            </label>
                        </div>
                    </div>
                </center>
                <center>
                    <input type="submit" name="addJadwal" id="addJadwal" class="submit" value="Tambah" style="margin-top: 20px;">
                </center>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#addJadwal").click(function(e) {
                e.preventDefault();
                var tipe = $('#opsiTipe').val()
                var tanggal = $('#date-picker').val();

                cbx = ['cbx1', 'cbx2', 'cbx3', 'cbx4', 'cbx5', 'cbx6', 'cbx7', 'cbx8']
                choose = []

                // alert(tanggal)

                for (let j = 0; j < cbx.length; j++) {
                    if ($('#' + cbx[j]).is(':checked')) {
                        // alert(cbx[j]);
                        choose.push($('#' + cbx[j]).val())
                    }
                }
                if (tanggal != null && tanggal != "" && tanggal != " " && choose.length > 0) {
                    for (let q = 0; q < choose.length; q++) {
                        var jam_awal = choose[q]
                        var waktuAwal = new Date(tanggal + ' ' + choose[q]);
                        waktuAwal.setHours(waktuAwal.getHours() + 1);
                        var jam_akhir = ('0' + waktuAwal.getHours()).slice(-2) + ':' + ('0' + waktuAwal.getMinutes()).slice(-2) + ':' + ('0' + waktuAwal.getSeconds()).slice(-2);

                        // alert(tanggal)
                        // alert(jam_awal)
                        // alert(jam_akhir)

                        $.ajax({
                            type: 'POST',
                            data: {
                                tipe: tipe,
                                tanggal: tanggal,
                                jam_awal: jam_awal,
                                jam_akhir: jam_akhir
                            },
                            url: '../api/add_jadwal.php',
                            success: function(res) {
                                console.log(res);
                                data = JSON.parse(res);
                                // console.log(data)
                                // list_load()
                                if (data['error'] == 0) {
                                    Swal.fire({
                                        title: 'Tambah jadwal berhasil.',
                                        icon: 'success',
                                        text: data['sm'],
                                        allowOutsideClick: false,
                                        confirmButtonText: 'OK',
                                        willClose: () => {
                                            // if (q == choose.length - 1) {
                                            window.location.href = 'jadwal_page.php';
                                            // } else {

                                            // }
                                        }
                                    });
                                } else if (data['error'] == 1) {
                                    Swal.fire({
                                        title: 'Tambah jadwal gagal.',
                                        icon: 'error',
                                        text: data['em'],
                                        confirmButtonText: 'Close',
                                        willClose: () => {
                                            // if (q == choose.length - 1) {
                                            window.location.href = 'jadwal_page.php';
                                            // } else {

                                            // }
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'Silahkan coba lagi!',
                                        icon: 'error',
                                        confirmButtonText: 'Close',
                                        willClose: () => {
                                            // if (q == choose.length - 1) {
                                            window.location.href = 'jadwal_page.php';
                                            // } else {

                                            // }
                                        }
                                    });
                                }
                            },
                            error: function() {
                                Swal.fire({
                                    title: 'Error',
                                    text: 'Silahkan coba lagi!',
                                    icon: 'error',
                                    confirmButtonText: 'Close',
                                    willClose: () => {

                                    }
                                });
                            }
                        });
                    }
                } else {
                    if ((tanggal == null || tanggal == "" || tanggal == " ") && choose.length < 1) {
                        Swal.fire({
                            title: 'Input tanggal tidak valid!',
                            icon: 'warning',
                            text: 'Silahkan input tanggal dan minimal 1 sesi.',
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            willClose: () => {

                            }
                        });
                    } else if ((tanggal == null || tanggal == "" || tanggal == " ") && choose.length > 0) {
                        Swal.fire({
                            title: 'Input tanggal tidak valid!',
                            icon: 'warning',
                            text: 'Silahkan input tanggal terlebih dahulu.',
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            willClose: () => {

                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Input tanggal tidak valid!',
                            icon: 'warning',
                            text: 'Silahkan input minimal 1 sesi.',
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            willClose: () => {

                            }
                        });
                    }
                }
            });
        });
    </script>
    <style>
        label {
            display: inline;
        }

        .col {
            text-align: start;
        }



        .labeljam8,
        .labeljam9,
        .labeljam10,
        .labeljam11,
        .labeljam12,
        .labeljam13,
        .labeljam14,
        .labeljam15 {
            font-weight: 500;
            color: rgba(74, 37, 23, 0.5);
            transition: all 0.2s ease-in-out;
            cursor: pointer;

        }

        .labeljam8:hover,
        .labeljam9:hover,
        .labeljam10:hover,
        .labeljam11:hover,
        .labeljam12:hover,
        .labeljam13:hover,
        .labeljam14:hover,
        .labeljam15:hover {
            color: rgba(74, 37, 23, 1);
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }

        .check {
            cursor: pointer;
            position: relative;
            margin: auto;
            width: 18px;
            height: 18px;
            -webkit-tap-highlight-color: transparent;
            transform: translate3d(0, 0, 0);
        }

        .check:before {
            content: "";
            position: absolute;
            top: -15px;
            left: -15px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: rgba(34, 50, 84, 0.03);
            opacity: 0;
            transition: opacity 0.2s ease;
        }

        .check svg {
            position: relative;
            z-index: 1;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke: rgba(74, 37, 23, 0.5);
            stroke-width: 1.5;
            transform: translate3d(0, 0, 0);
            transition: all 0.2s ease-in-out;
        }

        .check svg path {
            stroke-dasharray: 60;
            stroke-dashoffset: 0;
        }

        .check svg polyline {
            stroke-dasharray: 22;
            stroke-dashoffset: 66;
        }

        .check:hover:before {
            opacity: 1;
        }

        .check:hover svg {
            stroke: rgba(74, 37, 23, 1);
        }

        #cbx1:checked+.check svg,
        #cbx2:checked+.check svg,
        #cbx3:checked+.check svg,
        #cbx4:checked+.check svg,
        #cbx5:checked+.check svg,
        #cbx6:checked+.check svg,
        #cbx7:checked+.check svg,
        #cbx8:checked+.check svg {
            stroke: rgba(74, 37, 23, 1);
            stroke-width: 3;
        }

        #cbx1:checked+.check svg path,
        #cbx2:checked+.check svg path,
        #cbx3:checked+.check svg path,
        #cbx4:checked+.check svg path,
        #cbx5:checked+.check svg path,
        #cbx6:checked+.check svg path,
        #cbx7:checked+.check svg path,
        #cbx8:checked+.check svg path {
            stroke-dashoffset: 60;
            transition: all 0.3s linear;
        }

        #cbx1:checked+.check svg polyline,
        #cbx2:checked+.check svg polyline,
        #cbx3:checked+.check svg polyline,
        #cbx4:checked+.check svg polyline,
        #cbx5:checked+.check svg polyline,
        #cbx6:checked+.check svg polyline,
        #cbx7:checked+.check svg polyline,
        #cbx8:checked+.check svg polyline {
            stroke-dashoffset: 42;
            transition: all 0.2s linear;
            transition-delay: 0.15s;
        }

        #cbx1:checked+label .labeljam8,
        #cbx2:checked+label .labeljam9,
        #cbx3:checked+label .labeljam10,
        #cbx4:checked+label .labeljam11,
        #cbx5:checked+label .labeljam12,
        #cbx6:checked+label .labeljam13,
        #cbx7:checked+label .labeljam14,
        #cbx8:checked+label .labeljam15 {
            color: rgba(74, 37, 23, 1);
        }
    </style>

    <script>
        $(document).ready(function() {
            var date = new Date()
            var today = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + (date.getDate() + 1)
            $('#date-picker').attr('min', today);
        });

        const picker = document.getElementById('date-picker');

        picker.addEventListener('change', function(e) {

            var day = new Date(this.value).getUTCDay();
            if ([0].includes(day)) {
                e.preventDefault();
                this.value = '';
                // alert('Weekends not allowed');
                $('#date-picker').css('color', 'rgba(0, 0, 0, 0.5)')
                Swal.fire({
                    title: 'Input tanggal tidak valid!',
                    icon: 'error',
                    text: 'Silahkan input tanggal selain hari Minggu.',
                    confirmButtonText: "OK",
                    allowOutsideClick: false,
                    willClose: () => {

                    }
                });
            }
            if (this.value != '') {
                $('#date-picker').css('color', 'rgba(0, 0, 0, 1)')
            } else {
                $('#date-picker').css('color', 'rgba(0, 0, 0, 0.5)')
            }
        });
    </script>

</body>
</body>



<style>
    .form-container {
        /* width: 100vw;
        height: 100vh; */
        align-items: center;
        justify-content: center;
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

    .input-container input,
    .form button {
        outline: none;
        border: 0px solid #e5e7eb;
        margin: 8px 0;
        font-size: 15px;
    }

    .input-container input {
        padding: 1rem;
        /* padding-right: 3rem; */
        font-size: 15px;
        line-height: 1.25rem;
        width: 300px;
        border-radius: 0.5rem;
    }

    .input-container2 {
        position: relative;
    }

    .input-container2 input,
    .form button {
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
    $(document).ready(function() {
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
    $(document).ready(function() {
        $('.title').html("List Jadwal")
        $('.tab-con').show();
        $('.input-container2').show();
        $('#list-jadwal').show();
        $('#reBtn').show();
        $('.container').show();
        $('#daftar').css('visibility', 'hidden')
    });

    $('#btnradio1').on('click', function(e) {
        $('.title').html("List Jadwal")
        $('.tab-con').show();
        $('#list-jadwal').show();
        $('.input-container2').show();
        // $('#daftar').hide();
        $('#reBtn').show();
        $('.container').show();
        $('#daftar').css('visibility', 'hidden')
    });

    $('#btnradio2').on('click', function(e) {
        var konselorNama = "<?= $_SESSION['login-konselor'] ?>";

        $.ajax({
            type: 'POST',
            data: {
                konselorNama: konselorNama
            },
            url: '../api/checkStatus.php',
            success: function(res) {
                console.log(res);
                if (res == "ACTIVE") {
                    $('.title').html("Tambah Jadwal")
                    $('.tab-con').hide();
                    $('#list-jadwal').hide();
                    $('.input-container2').hide();
                    // $('#daftar').show();
                    $('#reBtn').hide();
                    $('.container').hide();
                    $('#daftar').css('visibility', 'visible')
                } else {
                    $('.title').html("Tambah Jadwal")
                    $('.tab-con').hide();
                    $('#list-jadwal').hide();
                    $('.input-container2').hide();
                    // $('#daftar').show();
                    $('#reBtn').hide();
                    $('.container').hide();
                    $('#daftar').css('visibility', 'visible')
                    Swal.fire({
                        title: 'Error',
                        text: 'Akun anda belum diaktivasi. Silahkan hubungi admin.',
                        allowOutsideClick: false,
                        icon: 'error',
                        confirmButtonText: 'Close',
                        willClose: () => {
                            window.location.href = 'jadwal_page.php';
                        }
                    });
                }
            }
        });
        // var stat = "NOT ACTIVE"
    });
</script>
<script>
    $('.navbar-collapse').on('shown.bs.collapse', function() {
        $('center').css('filter', 'blur(0.2rem)')
        $('.btn-grp').css('filter', 'blur(0.2rem)')
        $('#daftar').css('filter', 'blur(0.2rem)')
        $('body').css('overflow', 'hidden')
        $('center').css('pointer-events', 'none')
    });
    $('.navbar-collapse').on('hidden.bs.collapse', function() {
        $('center').css('filter', '')
        $('.btn-grp').css('filter', '')
        $('#daftar').css('filter', '')
        $('body').css('overflow', 'visible')
        $('center').css('pointer-events', '')
    });
</script>

</html>