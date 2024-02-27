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
    // $c = $row['admin_status'];

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

$check_email = strtolower($_POST['konselorEmail']);

// check table konselor
$result = mysqli_query($con, "SELECT * FROM konselor_info WHERE LOWER(konselor_email) = '$check_email'");

if (mysqli_num_rows($result) > 0) {
    $em = "Email telah terdaftar. Silahkan login atau daftar menggunakan email lain.";
    $error = array('error' => 1, 'em'=> $em);
    echo json_encode($error);
} else {
    // encrypt password
    $password = password_hash($_POST['konselorPass'], PASSWORD_DEFAULT);

    // add konselor
    $sql = "INSERT INTO konselor_info (
        konselor_email, password, nama_konselor)
        VALUES (
            '{$_POST['konselorEmail']}','$password','{$_POST['konselorNama']}')";
    mysqli_query($con, $sql);

    $sql = "INSERT INTO reset_verification (
        user_email)
        VALUES (
            '{$_POST['konselorEmail']}')";
    mysqli_query($con, $sql);

    // update admin log
    $currentTimestamp = date('Y-m-d H:i:s');
    $admin_name = $_SESSION['login'];
    $activity = $_POST['konselorEmail'].' didaftarkan sebagai konselor.';
    $sql = "INSERT INTO admin_log (
        admin_name, activity)
        VALUES (
            '$admin_name','$activity')";
    mysqli_query($con, $sql);

    $sm = "Akun berhasil didaftarkan sebagai konselor. Silahkan menuju halaman login konselor.";
    # response array
    $res = array('error' => 0, 'sm'=> $sm);
    echo json_encode($res);
}

?>