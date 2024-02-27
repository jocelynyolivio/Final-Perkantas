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
    $check_kelamin = strtolower($_POST['userKelamin']);
    if ($check_kelamin == "laki-laki") {
        $kelamin = 0;
    } elseif ($check_kelamin == "perempuan") {
        $kelamin = 1;
    }

    // check telepon
    $check_telepon = $_POST['userTelepon'];
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
    $anak_ke = $_POST['userAnakKe'].' dari '.$_POST['userSaudara'].' saudara';

    // check status menikah
    $status = $_POST['userStatus'].' (Usia menikah '.$_POST['userUsiaMenikah'].' tahun)';

    // add user dewasa
    $sql = "INSERT INTO user_dewasa_info (
        user_email, password, nama, kelamin, pekerjaan, alamat, telepon, pendidikan, tempat_tanggal_lahir, anak_ke, warganegara, suku_agama, status)
        VALUES (
            '{$_POST['userEmail']}','$password','{$_POST['userNama']}','$kelamin','{$_POST['userPekerjaan']}','{$_POST['userAlamat']}','$telepon','{$_POST['userPendidikan']}','{$_POST['userLahir']}','$anak_ke','{$_POST['userWarganegara']}','{$_POST['userAgama']}','$status')";
    mysqli_query($con, $sql);

    // update user reset
    $sql = "INSERT INTO reset_verification (
        user_email)
        VALUES (
            '{$_POST['userEmail']}')";
    mysqli_query($con, $sql);

    // update user log
    $currentTimestamp = date('Y-m-d H:i:s');
    $activity = $_POST['userEmail'].' terdaftar sebagai member.';
    $sql = "INSERT INTO user_log (
        time, user_name, activity)
        VALUES (
            '$currentTimestamp','{$_POST['userNama']}','$activity')";
    mysqli_query($con, $sql);

    // $sm = "Akun berhasil didaftarkan. Silahkan menuju halaman login.";
    # response array
    // $res = array('error' => 0, 'sm'=> $sm);
    // echo json_encode($res);
    echo 1;
}

?>