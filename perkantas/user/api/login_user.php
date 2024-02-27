<?php
include "../connect.php";

$user_email = $_POST['userEmail'];
$pass = $_POST['passwordIn'];

// check table user_dewasa
$result_dewasa = mysqli_query($con, "SELECT * FROM user_dewasa_info WHERE user_email = '$user_email'");

// check table user_anak
$result_anak = mysqli_query($con, "SELECT * FROM user_anak_info WHERE user_email = '$user_email'");

// check user
if (mysqli_num_rows($result_dewasa) === 1 || mysqli_num_rows($result_anak) === 1) {
    if (mysqli_num_rows($result_dewasa) === 1) {
        $result = $result_dewasa;
    } elseif (mysqli_num_rows($result_anak) === 1) {
        $result = $result_anak;
    }
    // check password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($pass, $row['password'])) {
        $_SESSION['login_user'] = true;
        $_SESSION["user_email"] = $row["user_email"];
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

$sm = "Berhasil Login.";
# response array
$res = array('error' => 0, 'sm'=> $sm);
echo json_encode($res);
?>
