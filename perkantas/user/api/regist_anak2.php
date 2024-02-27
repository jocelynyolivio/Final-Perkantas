<?php
include '../connect.php';

$check_email = strtolower($_POST['userEmail']);

// check table user_dewasa
$result_dewasa = mysqli_query($con, "SELECT * FROM user_dewasa_info WHERE LOWER(user_email) = '$check_email'");

// check table user_anak
$result_anak = mysqli_query($con, "SELECT * FROM user_anak_info WHERE LOWER(user_email) = '$check_email'");

if (mysqli_num_rows($result_dewasa) > 0 || mysqli_num_rows($result_anak) > 0) {
    // $em = "Email telah terdaftar. Silahkan login atau daftar menggunakan email lain.";
    // $error = array('error' => 1, 'em'=> $em);
    // echo json_encode($error);
    echo 5;
} else {

    // if (
    //     $_POST['confirmPassword'] != $password 
    // ){
    //     echo json_encode([
    //         "error" => 1,
    //         "em" => "password tidak sesuai",
    //     ]);
    // }
    // encrypt password
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // check kelamin
    $check_kelamin = strtolower($_POST['userKelaminAnak']);
    if ($check_kelamin == "male") {
        $kelamin = 0;
    } elseif ($check_kelamin == "female") {
        $kelamin = 1;
    }

    // check telepon
    $check_telepon = $_POST['userTeleponAnak'];
    $telepon = "";
    $code = "+62";
    if ($check_telepon[0] == "+") {
        $telepon = $check_telepon;
    } elseif ($check_telepon[0] == "0") {
        $telepon .= $code;
        for ($i = 1; $i < strlen($check_telepon); $i++) {
            $telepon .= $check_telepon[$i];
        }
    } else {
        $telepon .= $code;
        for ($i = 2; $i < strlen($check_telepon); $i++) {
            $telepon .= $check_telepon[$i];
        }
    }

    // check anak ke berapa
    $anak_ke = $_POST['userAnakKeAnak'].' dari '.$_POST['userSaudaraAnak'].' saudara';

    //ambil data
    $hubungan = $_POST['jenisKeluarga'];
    $namaKeluarga = $_POST['namaKeluarga'];
    $tanggalLahirKeluarga = $_POST['tanggalLahirKeluarga'];
    $agamaKeluarga = $_POST['agamaKeluarga'];
    $pekerjaanKeluarga = $_POST['pekerjaanKeluarga'];
    $pendidikanKeluarga = $_POST['pendidikanKeluarga'];

    // add user 
    $sql = "INSERT INTO user_anak_info (
        user_email, password, nama, kelamin, alamat, telepon, tempat_tanggal_lahir, anak_ke, warganegara, suku_agama, kelas, nama_sekolah,
        jenis_anggota_keluarga,
        nama_anggota_keluarga,
        tanggal_lahir_anggota_keluarga,
        agama_anggota_keluarga,
        pekerjaan_anggota_keluarga,
        pendidikan_anggota_keluarga)
        VALUES (
            '{$_POST['userEmail']}',
        '$password',
        '{$_POST['nameAnak']}',
        '$kelamin',
        '{$_POST['userAlamatAnak']}',
        '$telepon',
        '{$_POST['userLahirAnak']}',
        '$anak_ke',
        '{$_POST['userWarganegaraAnak']}',
        '{$_POST['userAgamaAnak']}',
        '{$_POST['kelas']}', 
        '{$_POST['nama_sekolah']}',
        '$hubungan',
        '$namaKeluarga',
        '$tanggalLahirKeluarga',
        '$agamaKeluarga', 
        '$pekerjaanKeluarga',
        '$pendidikanKeluarga')";
    mysqli_query($con, $sql);

    // update user reset
    $sql = "INSERT INTO reset_verification (
        user_email)
        VALUES (
            '{$_POST['userEmail']}')";
    mysqli_query($con, $sql);

    // update user log
    // $currentTimestamp = date('Y-m-d H:i:s');
    // $activity = $_POST['userEmail'].' terdaftar sebagai member.';
    // $sql = "INSERT INTO user_log (
    //     time, user_name, activity)
    //     VALUES (
    //         '$currentTimestamp','{$_POST['userNama']}','$activity')";
    // mysqli_query($con, $sql);

    // $sm = "Akun berhasil didaftarkan. Silahkan menuju halaman login.";
    # response array
    // $res = array('error' => 0, 'sm'=> $sm);
    // echo json_encode($res);
    echo 1;
}

?>
