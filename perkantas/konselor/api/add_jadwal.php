<?php
include 'connect.php';

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

    if ($row['konselor_status'] != "ACTIVE") {
        echo "
            <script>
                alert('Please sign in first ');
            </script>
        ";

        // header("Location: logout_konselor.php");
        exit;
    }
}

$data = $_SESSION['login-konselor'];
$result = mysqli_query($con, "SELECT * FROM `konselor_info` WHERE `nama_konselor` =  '$data'");
$row = mysqli_fetch_assoc($result);

$check_konselor = $row['konselor_email'];
$check_tanggal = ($_POST['tanggal']);
$check_jam = ($_POST['jam_awal']);

$check = mysqli_query($con, "SELECT * FROM jadwal_konseling WHERE konselor_email = '$check_konselor' AND tanggal_konseling = '$check_tanggal' AND mulai_konseling = '$check_jam'");

if (mysqli_num_rows($check) > 0) {
    $em = "Tanggal/jam:".$check_tanggal." ".$check_jam." sudah terisi. Silahkan tambahkan sesi di tanggal/jam lain.";
    // $em = "0";
    $error = array('error' => 1, 'em'=> $em);
    echo json_encode($error);
} else {
    $query = "INSERT INTO jadwal_konseling (
        konselor_email, tanggal_konseling, mulai_konseling, akhir_konseling, tipe_service)
        VALUES (
        '$check_konselor', '{$_POST['tanggal']}', '{$_POST['jam_awal']}', '{$_POST['jam_akhir']}', '{$_POST['tipe']}')";
    mysqli_query($con, $query);

    // update konselor log
    $currentTimestamp = date('Y-m-d H:i:s');
    $konselor_name = $_SESSION['login-konselor'];
    // Convert the date string to a Unix timestamp using strtotime
    $timestamp = strtotime($check_tanggal);
    // Get the day name using the date function
    $dayName = date("l", $timestamp);
    $activity = 'Menambahkan sesi pada '.$dayName.', '.$check_tanggal.' pk. '.$_POST['jam_awal'].'-'.$_POST['jam_akhir'].'.';
    $sql = "INSERT INTO konselor_log (
        konselor_name, activity)
        VALUES (
            '$konselor_name','$activity')";
    mysqli_query($con, $sql);

    $sm = "Sesi berhasil ditambahkan.";
    // $sm = "1";
    # response array
    $res = array('error' => 0, 'sm'=> $sm);
    echo json_encode($res);
}

?>