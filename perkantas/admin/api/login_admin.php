<?php
include "connect.php";

$admin_email = $_POST['adminEmail'];
$pass = $_POST['adminPass'];

// check table admin
$result = mysqli_query($con, "SELECT * FROM admin_info WHERE admin_email = '$admin_email'");

// check username
if (mysqli_num_rows($result) === 1) {
    // check password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($pass, $row['password'])) {
        // $_SESSION['login_admin'] = true;
        // $_SESSION['login'] = $row['nama_admin'];
        if ($row['admin_status'] == "ACTIVE") {
            $_SESSION['login'] = $row['nama_admin'];
        } else {
            $em = "Akun belum diaktifkan. Silahkan hubungi admin utama.";
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