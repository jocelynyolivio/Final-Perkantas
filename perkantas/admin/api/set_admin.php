<?php
include 'connect.php';

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

        header("Location: logout_admin.php");
        exit;
    }
}

$check_email = strtolower($_POST['adminEmail']);

// check table admin
$result = mysqli_query($con, "SELECT * FROM admin_info WHERE LOWER(admin_email) = '$check_email'");

if (mysqli_num_rows($result) > 0) {
    $em = "Email telah terdaftar. Silahkan login atau daftar menggunakan email lain.";
    $error = array('error' => 1, 'em'=> $em);
    echo json_encode($error);
} else {
    // encrypt password
    $password = password_hash($_POST['adminPass'], PASSWORD_DEFAULT);

    // add admin
    $sql = "INSERT INTO admin_info (
        admin_email, password, nama_admin)
        VALUES (
            '{$_POST['adminEmail']}','$password','{$_POST['adminNama']}')";
    mysqli_query($con, $sql);

    $sql = "INSERT INTO reset_verification (
        user_email)
        VALUES (
            '{$_POST['adminEmail']}')";
    mysqli_query($con, $sql);

    // update admin log
    $currentTimestamp = date('Y-m-d H:i:s');
    $admin_name = $_SESSION['login'];
    $activity = $_POST['adminEmail'].' didaftarkan sebagai admin.';
    $sql = "INSERT INTO admin_log (
        admin_name, activity)
        VALUES (
            '$admin_name','$activity')";
    mysqli_query($con, $sql);

    $sm = "Akun berhasil didaftarkan sebagai admin. Silahkan menuju halaman login admin.";
    # response array
    $res = array('error' => 0, 'sm'=> $sm);
    echo json_encode($res);
}

?>