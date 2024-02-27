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

$data = $_SESSION['login-konselor'];
$result = mysqli_query($con, "SELECT * FROM `konselor_info` WHERE `nama_konselor` =  '$data'");
$row = mysqli_fetch_assoc($result);

$check_konselor = $row['konselor_email'];

if ($row['konselor_profil'] != null) {
    if (file_exists($row['konselor_profil'])) {
        // Attempt to delete the file
        if (unlink($row['konselor_profil'])) {
            // echo 'File deleted successfully.';
        } else {
            // echo 'Unable to delete the file.';
        }
    } else {
        // echo 'File does not exist.';
    }
}

$sql = "UPDATE `konselor_info` SET `konselor_profil`= null WHERE konselor_email = '$check_konselor'";
mysqli_query($con, $sql);

$sm = "Foto profil berhasil dihapus!";

# response array
$res = array('error' => 0, 'sm'=> $sm);

echo json_encode($res);
?>