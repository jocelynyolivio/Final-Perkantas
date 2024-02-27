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
    // $c = $row['admin_status'];

    if ($row['konselor_status'] == "NOT ACTIVE") {
        echo "
            <script>
                alert('Please sign in first ');
            </script>
        ";

        header("Location: logout_konselor.php");
        exit;
    }
}


$idJadwal = $_POST['idJadwal'];

// check table konselor
$result = mysqli_query($con, "SELECT * FROM jadwal_konseling WHERE jadwal_konseling_id = '$idJadwal'");

// check username
if (mysqli_num_rows($result) === 1) {
    // check password
    $row = mysqli_fetch_assoc($result);

    $tanggal = $row['tanggal_konseling'];
    $mulai = $row['mulai_konseling'];
    $selesai = $row['akhir_konseling'];

    // remove konselor
    $sql = "DELETE FROM `jadwal_konseling` WHERE jadwal_konseling_id = '$idJadwal'";
    mysqli_query($con, $sql);

    $sm = "Jadwal berhasil dihapus.";
    # response array
    $res = array('error' => 0, 'sm'=> $sm);
    echo json_encode($res);
    
} else {
    $em = "Jadwal tidak terdata.";
    # response array
    $res = array('error' => 1, 'em'=> $em);
    echo json_encode($res);
    exit;
}

// update konselor log
$currentTimestamp = date('Y-m-d H:i:s');
$konselor_name = $_SESSION['login-konselor'];
$activity = 'Jadwal '.$tanggal.' '.$mulai.'-'.$selesai.' dihapus.';
$sql = "INSERT INTO konselor_log (
    konselor_name, activity)
    VALUES (
        '$konselor_name','$activity')";
mysqli_query($con, $sql);


?>