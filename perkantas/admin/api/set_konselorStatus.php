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
$konselor_status = $_POST['konselorStatus'];

// check table konselor
$result = mysqli_query($con, "SELECT * FROM konselor_info WHERE konselor_email = '$konselor_email'");

// check username
if (mysqli_num_rows($result) === 1) {
    // check password
    $row = mysqli_fetch_assoc($result);

    // change status konselor
    $sql = "UPDATE `konselor_info` SET `konselor_status`='$konselor_status' WHERE konselor_email = '$konselor_email'";
    mysqli_query($con, $sql);
    
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
if ($konselor_status == "ACTIVE") {
    $activity = $_POST['konselorEmail'].' aktif.';
}
elseif ($konselor_status == "PENDING") {
    $activity = $_POST['konselorEmail'].' pending.';
} else {
    $activity = $_POST['konselorEmail'].' tidak aktif.';
}
$sql = "INSERT INTO admin_log (
    admin_name, activity)
    VALUES (
        '$admin_name','$activity')";
mysqli_query($con, $sql);

$sm = "";
# response array
$res = array('error' => 0, 'sm'=> $sm);
echo json_encode($res);
?>