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


$konselor_email = $_POST['konselorEmail'];

// check table konselor
$result = mysqli_query($con, "SELECT * FROM konselor_info WHERE konselor_email = '$konselor_email'");

// check username
if (mysqli_num_rows($result) === 1) {
    // check password
    $row = mysqli_fetch_assoc($result);

    // remove konselor
    $sql = "DELETE FROM `konselor_info` WHERE konselor_email = '$konselor_email'";
    mysqli_query($con, $sql);

    $sm = "$konselor_email berhasil dihapus.";
    # response array
    $res = array('error' => 0, 'sm'=> $sm);
    echo json_encode($res);
    
} else {
    $em = "Akun tidak terdaftar. Silahkan daftarkan akun anda terlebih dahulu.";
    # response array
    $res = array('error' => 1, 'em'=> $em);
    echo json_encode($res);
    exit;
}

// update admin log
$currentTimestamp = date('Y-m-d H:i:s');
$admin_name = $_SESSION['login'];
$activity = $_POST['konselorEmail'].' dihapus.';
$sql = "INSERT INTO admin_log (
    admin_name, activity)
    VALUES (
        '$admin_name','$activity')";
mysqli_query($con, $sql);


?>