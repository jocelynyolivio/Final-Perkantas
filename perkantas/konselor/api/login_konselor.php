<?php
include "connect.php";

$konselor_email = $_POST['konselorEmail'];
$pass = $_POST['konselorPass'];

// check table konselor
$result = mysqli_query($con, "SELECT * FROM konselor_info WHERE konselor_email = '$konselor_email'");

// check username
if (mysqli_num_rows($result) === 1) {
    // check password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($pass, $row['password'])) {
        // $_SESSION['login_konselor'] = true;
        // $_SESSION['login'] = $row['nama_konselor'];
        if ($row['konselor_status'] == "ACTIVE" || $row['konselor_status'] == "PENDING") {
            $_SESSION['login-konselor'] = $row['nama_konselor'];
        } else {
            $em = "Akun belum diaktifkan. Silahkan hubungi admin.";
            # response array
            $res = array('error' => 1, 'em'=> $em);
            echo json_encode($res);
            exit;
        }
    } else {
        $em = "Password Salah.";
        # response array
        $res = array('error' => 1, 'em'=> $em);
        echo json_encode($res);
        exit;
    }
} else {
    $em = "Akun tidak terdaftar. Silahkan daftarkan akun anda terlebih dahulu.";
    # response array
    $res = array('error' => 1, 'em'=> $em);
    echo json_encode($res);
    exit;
}

$sm = "";
# response array
$res = array('error' => 0, 'sm'=> $sm);
echo json_encode($res);
?>