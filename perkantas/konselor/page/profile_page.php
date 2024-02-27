<?php
include "../api/connect.php";

if (!$_SESSION['login-konselor'])
{
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

        /* .modal-dialog {
            z-index: 2000 !important;
        } */
    </style>
</head>

<body>
    <?php
    include "navbar_konselor.php";
    ?>
    <div class="btn-grp">
        <h1 class="title">Profil</h1>
    </div>
    
        
    <div class="form-container" id="daftar">
        <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bolder" id="staticBackdropLabel">Unggah Foto Profil Anda</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="images" class="drop-container" id="dropcontainer">
                        <span class="drop-title">Drop files here</span>
                        or
                        <input type="file" id="images" accept="image/*" style="border: 1px solid black; border-radius: 10px; padding: 5px;" required>
                        </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="resetBtn" class="btn btn-secondary">RESET</button>
                        <button type="button" name="hapusGambar" id="hapusGambar" class="btn btn-danger">HAPUS</button>
                        <button type="button" name="simpanGambar" id="simpanGambar" class="btn submit2">SIMPAN</button>
                        <!-- <button type="button" class=""  data-bs-dismiss="modal">Simpan</button> -->
                    </div>
                    </div>
                </div>
            </div>
        
        <form class="form" style="margin-top: 20px;">
            <div class="p1" id="p1">
                

                <?php
                $checkdata = $_SESSION['login-konselor'];
                $sql = "SELECT * FROM konselor_info WHERE nama_konselor = '$checkdata'";
                $stmt = $con -> prepare($sql);
                $stmt -> execute();
                $result = $stmt -> get_result();
                $row = $result -> fetch_assoc();

                $originalDateString = $row['konselor_ttl'];
                $datePart = substr($originalDateString, strpos($originalDateString, ',') + 2);
                $parts = explode(',', $originalDateString);
                $cityName = trim($parts[0]);
                $originalDate = new DateTime($datePart);
                $formattedDate = $originalDate->format('d-m-Y');
                $result_ttl = $cityName.', '.$formattedDate
                ?>

                <!-- <div class="input-container"> -->
                <center>
                    <!-- <img class="pp" src="../assets/default.png" alt="" width="80px" height="80px"> -->
                    <div class="profilepic" id="profpic" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <?php if ($row['konselor_profil'] == null) : ?>
                            <img class="profilepic__image" src="../assets/default.png" width="80px" height="80px" alt="Profibild" />
                        <?php else : ?>
                            <img class="profilepic__image" src="<?= $row['konselor_profil'] ?>" width="80px" height="80px" alt="Profibild" />
                        <?php endif ?>
                        <!-- <img class="profilepic__image" src="../assets/default.png" width="80px" height="80px" alt="Profibild" /> -->
                        <div class="profilepic__content">
                            <span class="profilepic__icon"><i class="fas fa-pencil"></i></span>
                            <!-- <span class="profilepic__text">Edit Profile</span> -->
                        </div>
                    </div>
                </center>
                <!-- </div> -->

                <div class="input-container">
                    <div class="input" style="background-color: white;"><?= $_SESSION['login-konselor'] ?></div>
                </div>

                <?php if ($row['konselor_ttl'] == null): ?>
                    <div class="input-container">
                        <input type="text" name="tempatLahir" id="tempatLahir" placeholder="Kota Kelahiran" required>
                    </div>
                    <div class="input-container">
                        <input type="date" id="date-picker" style="color: rgba(0, 0, 0, 0.5);" required>
                    </div>
                <?php else: ?>
                    <div class="input-container">
                        <div class="input" style="background-color: white;"><?= $result_ttl ?></div>
                    </div>
                <?php endif ?>

                <?php if($row['konselor_surat'] == null): ?>
                    <div class="input-container">
                        <input type="file" name="file_surat" accept="application/pdf" id="file_surat" placeholder="Kota Kelahiran" required>
                    </div>
                <?php else: ?>
                    <a href="<?= $row['konselor_surat'] ?>" target="_blank">
                        <button type="button" class="btn btn-primary"style="line-height: 1.25rem; width: 100%; padding-top: 0.6rem; padding-bottom: 0.6rem; margin-bottom: -10px; margin-top: 0px;">Unduh Surat</button>
                    </a>
                <?php endif ?>

                <center>
                <?php if($row['konselor_ttl'] == null && $row['konselor_surat'] == null): ?>
                    <input type="submit" name="simpanBtn" id="simpanBtn" class="submit" value="Simpan" style="margin-top: 20px;">
                <?php else: ?>
                    <input type="submit" name="simpanBtn" id="simpanBtn" class="submit" value="Simpan" style="margin-top: 20px; background-color: rgba(255, 155, 80, 0.5);" disabled>
                <?php endif ?>
                </center>
            </div>
        </form>
    </div>
</body>

<script>
    $(document).ready(function() {
        firstCheck();
        const picker = document.getElementById('date-picker');

        if (picker != null) {
            picker.addEventListener('change', function(e) {
                var day = new Date(this.value).getUTCDay();
                if (this.value != '') {
                    $('#date-picker').css('color', 'rgba(0, 0, 0, 1)')
                } else {
                    $('#date-picker').css('color', 'rgba(0, 0, 0, 0.5)')
                }
            });
        }

        function checkStatus() {
            // alert("jalan")
            var konselorNama = "<?= $_SESSION['login-konselor'] ?>";
            $.ajax({
                type: 'POST',
                data: {konselorNama: konselorNama},
                url: '../api/checkStatus.php',
                success: function(res) {
                    // console.log(res);
                    if (res == "NOT ACTIVE") {
                        window.location.href = '../api/logout_konselor.php';
                    }
                }
            });
        }
        setInterval(function(){
            checkStatus();
        }, 1000);

        function firstCheck() {
            // alert("jalan")
            var konselorNama = "<?= $_SESSION['login-konselor'] ?>";
            $.ajax({
                type: 'POST',
                data: {konselorNama: konselorNama},
                url: '../api/checkStatus.php',
                success: function(res) {
                    // console.log(res);
                    if (res == "PENDING") {
                        Swal.fire ({
                            title: "Akun belum diaktivasi.",
                            icon: "warning",
                            text: "Silahkan lengkapi profil terlebih dahulu!",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "Mengerti",
                            allowOutsideClick: false
                        });
                    }
                }
            });
        }

        const dropContainer = document.getElementById("dropcontainer")
        const fileInput = document.getElementById("images")

        dropContainer.addEventListener("dragover", (e) => {
            // prevent default to allow drop
            e.preventDefault()
        }, false)

        dropContainer.addEventListener("dragenter", () => {
            dropContainer.classList.add("drag-active")
        })

        dropContainer.addEventListener("dragleave", () => {
            dropContainer.classList.remove("drag-active")
        })

        // dropContainer.addEventListener("drop", (e) => {
        //     e.preventDefault()
        //     dropContainer.classList.remove("drag-active")
        //     fileInput.files = e.dataTransfer.files
        // })

        dropContainer.addEventListener("drop", (e) => {
            e.preventDefault();
            dropContainer.classList.remove("drag-active");

            const droppedFiles = e.dataTransfer.files;

            // Check file extensions
            for (const file of droppedFiles) {
                const fileName = file.name;
                const fileExtension = fileName.split('.').pop(); // Get the file extension

                // Add your extension checking logic here
                if (isValidExtension(fileExtension)) {
                    // Do something with the valid file
                    console.log(`${fileName} has a valid extension.`);
                    // Update file input with the dropped files
                    fileInput.files = droppedFiles;
                } else {
                    // Handle files with invalid extensions

                    Swal.fire ({
                        title: "Format file tidak valid.",
                        icon: "error",
                        text: "Pastikan format file anda valid (.jpg, .jpeg, .png).",
                        confirmButtonColor: "#3085d6",
                        confirmButtonText: "Mengerti",
                        allowOutsideClick: false
                    });
                    console.log(`${fileName} has an invalid extension.`);
                }
            }

            
            
        });

        function isValidExtension(extension) {
            // Define the valid file extensions you want to allow
            const validExtensions = ["jpg", "jpeg", "png"]; // Add your valid extensions here

            // Check if the extension is in the array of valid extensions
            return validExtensions.includes(extension.toLowerCase());
        }

        function isValidExtensionSurat(extension) {
            // Define the valid file extensions you want to allow
            const validExtensions = ["jpg", "jpeg", "png", "pdf"]; // Add your valid extensions here

            // Check if the extension is in the array of valid extensions
            return validExtensions.includes(extension.toLowerCase());
        }

        $('#resetBtn').on('click', function(e) {
            const fileInput = document.getElementById("images")
            fileInput.value = ''
        })

        // AJAX
        $('#simpanGambar').on('click', function(e) {
            var form_photo = new FormData();
            var filePhoto = $('#images')[0].files;

            form_photo.append('filePhoto', filePhoto[0]);

            if (fileInput.value != null && fileInput.value != "") {
                Swal.fire({
                    title: "Apakah anda yakin untuk menyimpan perubahan?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Batalkan",
                    confirmButtonText: "Ya, Simpan",
                    allowOutsideClick: false
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            data: form_photo,
                            url: '../api/editPhotos.php',
                            enctype: 'form/multipart',
                            contentType: false,
                            processData: false,
                            success: function(res) {
                                console.log(res);
                                data = JSON.parse(res);
                                // console.log(data)
                                // list_load()
                                if (data['error'] == 0) {
                                    Swal.fire({
                                        title:'Ubah foto profil berhasil.', 
                                        icon:'success', 
                                        text:data['sm'], 
                                        allowOutsideClick: false,
                                        confirmButtonText:'OK', 
                                        willClose:() => {
                                            $('.modal').modal('toggle'); 
                                            photos_load();
                                            fileInput.value = '';
                                        }
                                    });
                                } else if (data['error'] == 1) {
                                    Swal.fire({
                                        title:'Ubah foto profil gagal.', 
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
                        // $('.modal').modal('toggle'); 
                        // photos_load()
                    }
                });
            } else {
                Swal.fire ({
                    title: "Input tidak valid.",
                    icon: "error",
                    text: "Silahkan unggah foto terlebih dahulu!",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Mengerti",
                    allowOutsideClick: false
                });
            }
        })

        $('#hapusGambar').on('click', function(e) {
            Swal.fire({
                title: "Apakah anda yakin untuk menghapus foto profil?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Batalkan",
                confirmButtonText: "Ya, Hapus",
                allowOutsideClick: false
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '../api/rmPhotos.php',
                        success: function(res) {
                            console.log(res);
                            data = JSON.parse(res);
                            // console.log(data)
                            // list_load()
                            if (data['error'] == 0) {
                                Swal.fire({
                                    title:'Hapus foto profil berhasil.', 
                                    icon:'success', 
                                    text:data['sm'], 
                                    allowOutsideClick: false,
                                    confirmButtonText:'OK', 
                                    willClose:() => {
                                        $('.modal').modal('toggle'); 
                                        photos_load();
                                        fileInput.value = '';
                                    }
                                });
                            } else if (data['error'] == 1) {
                                Swal.fire({
                                    title:'Hapus foto profil gagal.', 
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
        })

        $('#simpanBtn').on('click', function(e) {
            e.preventDefault()
            if ($('#tempatLahir').val() != null && $('#tempatLahir').val() != '' && $('#date-picker').val() != null && $('#date-picker').val() != '' && $('#file_surat').val() != null && $('#file_surat').val() != '') { 
                var form_data = new FormData(); 
                var ttl = $('#tempatLahir').val() + ', ' + $('#date-picker').val();
                var surat = $('#file_surat')[0].files;
                
                form_data.append('ttl', ttl);
                form_data.append('surat', surat[0]);

                $.ajax({
                    type: 'POST',
                    data: form_data,
                    url: '../api/addData.php',
                    enctype: 'form/multipart',
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        console.log(res);
                        data = JSON.parse(res);
                        // console.log(data)
                        // list_load()
                        if (data['error'] == 0) {
                            Swal.fire({
                                title:'Update data diri berhasil.', 
                                icon:'success', 
                                text:data['sm'], 
                                allowOutsideClick: false,
                                confirmButtonText:'OK', 
                                willClose:() => {
                                    window.location.href = "profile_page.php";
                                }
                            });
                        } else if (data['error'] == 1) {
                            Swal.fire({
                                title:'Update data diri gagal.', 
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

            } else {
                Swal.fire ({
                    title: "Input tidak valid.",
                    icon: "error",
                    text: "Silahkan lengkapi data diri terlebih dahulu!",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Mengerti",
                    allowOutsideClick: false
                });
            }
        });

    });

    function photos_load() {
        // var data = $('#jadwalSearch').val();
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            // document.getElementById("list-jadwal").innerHTML = '<tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No data available in table</td></tr>';
            document.getElementById("profpic").innerHTML = this.responseText;
        }
        xhttp.open("GET","../api/getProfilePic.php");
        xhttp.send();
    }
</script>

<style>
    .drop-container {
        position: relative;
        display: flex;
        gap: 10px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 200px;
        padding: 20px;
        border-radius: 10px;
        border: 2px dashed #555;
        color: #444;
        cursor: pointer;
        transition: background .2s ease-in-out, border .2s ease-in-out;
    }

    .drop-container:hover {
        background: #eee;
        border-color: #111;
    }

    .drop-container:hover .drop-title {
        color: #222;
    }

    .drop-title {
        color: #444;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        transition: color .2s ease-in-out;
    }

    /* .drop-container.drag-active {
        background: #eee;
        border-color: #111;
    }

    .drop-container.drag-active .drop-title {
        color: #222;
    } */

    .profilepic {
        position: relative;
        border-radius: 100%;
        width: 80px;
        overflow: hidden;
        background-color: #111;
        margin-bottom: 15px;
        cursor: pointer;
    }

    .profilepic:hover .profilepic__content {
        opacity: 1;
    }

    .profilepic:hover .profilepic__image {
        opacity: .5;
    }

    .profilepic__image {
        border: 3px solid black;
        object-fit: cover;
        opacity: 1;
        transition: opacity .2s ease-in-out;
        /* margin-bottom: 10px; */
    }

    .profilepic__content {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        opacity: 0;
        transition: opacity .2s ease-in-out;
    }

    .profilepic__icon {
        color: white;
    }

    .profilepic__text {
        text-transform: uppercase;
        font-size: 10px;
        width: 50%;
        text-align: center;
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

    input[type="file"]::-webkit-file-upload-button {
        border-radius: 0.5rem;
        height: 2.5rem;
        width: 6rem;
        border: 0px;
        background-color: #FF9B50;
        color: rgb(89, 59, 29);
        font-weight: 600;
        transition: .2s ease-in-out;
        cursor: pointer;
    }

    input[type="file"]::-webkit-file-upload-button:hover {
        color: white;
        background-color: rgba(130, 92, 55, 1);
        transition: .2s ease-in-out;
    }

    #file_surat {
        background-color: white;
        padding: 10px;
        cursor: pointer;
    }

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

    .input-container input, .form button, .input-container .input {
        outline: none;
        border: 0px solid #e5e7eb;
        margin: 8px 0;
        font-size: 15px;
    }

    .input-container input, .input-container .input {
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

    .btn {
        font-weight: 600 !important;
    }

    .submit2 {
        /* padding-top: 0.6rem;
        padding-bottom: 0.6rem; */
        /* padding: 6px 12px; */
        background-color: #FF9B50;
        color: rgb(89, 59, 29);
        /* font-size: 0.875rem;
        line-height: 1.25rem;
        font-weight: 700;
        width: 20%;
        border-radius: 0.5rem;
        border-color: transparent;
        text-transform: uppercase; */
    }

    .submit2:enabled:hover {
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

        .modal-dialog {
            scale: 1.3;
        }

        .modal {
            overflow: hidden;
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