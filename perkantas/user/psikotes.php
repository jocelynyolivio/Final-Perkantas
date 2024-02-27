<?php
include "connect.php";

if (!$_SESSION['login_user']) {
    echo "
        <script>
            alert('Please sign in first ');
        </script>
    ";

    header("Location: login.php");
    exit;
}

$user_email = $_SESSION['user_email'];
$list_konseling = mysqli_query($con, "SELECT
            jk.jadwal_konseling_id,
            jk.tanggal_konseling,
            jk.mulai_konseling,
            jk.akhir_konseling,
            ki.nama_konselor
            FROM jadwal_konseling jk
            LEFT JOIN konselor_info ki ON ki.konselor_email = jk.konselor_email
            WHERE user_email = '$user_email' AND tipe_service = 2");
$list_konseling = mysqli_fetch_all($list_konseling, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psikotes Site - Griya Pulih Asih</title>

    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

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

    <!-- Navbar CSS -->
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
    </style>
    <style>
        .container {
            margin-top: 2vh;
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
    <?php include "navbar.php" ?>
    <div class="col-11 col-sm-8 mx-auto mt-5">
        <h1 style="text-align:center">List Psikotes</h1>
        <div class="container p-3">
            <a href="daftar_psikotes.php" class="btn btn-primary px-4">+ Daftar</a>
            <div class="table-responsive mt-4">
                <table id="tabelEvent" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Konselor</th>
                            <!-- <th>Link Psikotes</th> -->
                            <th>Tanggal Psikotes</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="listKonseling">
                        <?php
                        foreach ($list_konseling as $index => $konseling) : ?>
                            <tr>
                                <td>
                                    <?= $index + 1 ?>
                                </td>
                                <td>
                                    <?= $konseling['nama_konselor'] ?>
                                </td>
                                <!-- <td>
                                    <a href="google.com">Link Psikotes</a>
                                </td> -->
                                <td>
                                    <?= $konseling['tanggal_konseling'] ?>
                                </td>
                                <td>
                                    <?= $konseling['mulai_konseling'] ?>
                                </td>
                                <td>
                                    <?= $konseling['akhir_konseling'] ?>
                                </td>
                                <td class="trash-icon"><i class="fa-solid fa-trash" style="color: #ff0000;" onclick="removeSelected('<?= $konseling['jadwal_konseling_id'] ?>')"></i></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
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

            reloadTable();
        });

        async function removeSelected(id) {
            let result = await Swal.fire({
                title: "Apakah anda yakin untuk menghapus jadwal ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Batalkan",
                confirmButtonText: "Ya, hapus",
                allowOutsideClick: false
            });
            if (result.isConfirmed) {
                deleteSchedule(id);
            }
        }

        function deleteSchedule(id) {
            $.ajax({
                url: "api/delete_jadwal.php",
                method: "GET",
                data: {
                    id: id,
                },
                error: (xhr, status, err) => {
                    showErrorAlert(`Error ${status}: ${err}`);
                },
                complete: async (xhr) => {
                    if (xhr.status != 200) {
                        showErrorAlert("Error " + xhr.statusText);
                        return;
                    }

                    console.log(xhr.responseText);

                    if (xhr.responseText == "ok") {
                        await showSuccessAlert();
                        window.location.reload();
                    } else {
                        await showErrorAlert("Gagal menghapus data.");
                    }
                }
            });
        }

        async function showErrorAlert(error) {
            await Swal.fire({
                title: 'Error',
                icon: 'error',
                confirmButtonText: 'Close',
                willClose: () => {}
            });
        }

        async function showSuccessAlert() {
            await Swal.fire({
                title: 'Berhasil.',
                icon: 'success',
                allowOutsideClick: false,
                confirmButtonText: 'OK',
                willClose: () => {}
            });
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
</body>

</html>