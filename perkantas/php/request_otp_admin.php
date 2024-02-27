
<?php
include 'connect.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/Exception.php';

$teamName = $_POST['teamNameRst'];

$mail = new PHPMailer(true);
$otp = rand(100000, 999999);

$query1 = mysqli_query($con, "SELECT * FROM admin_info WHERE admin_email = '$teamName'");

if (mysqli_num_rows($query1) === 1 ) {
    // if (mysqli_num_rows($result_dewasa) === 1) {
    //     $query1 = $result_dewasa;
    // } elseif (mysqli_num_rows($result_anak) === 1) {
    //     $query1 = $result_anak;
    // }


    $row = mysqli_fetch_assoc($query1);
    $email = $row['admin_email'];

    $query2 = mysqli_query($con, "UPDATE `reset_verification` SET `reset_code`='$otp', `reset_status`='0' WHERE `user_email` = '$teamName'");

    // $query2 = mysqli_query($con, "UPDATE `reset_verification` SET `reset_code`='$otp', `reset_status`='1' WHERE `team_name` = '$teamName'");

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    // $mail->SMTPDebug = 1;
    $mail->Username = 'manproperkantas@gmail.com';
    $mail->Password = 'brfgunmddmsjjgst';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->setFrom($mail->Username, 'Griya Pulih Asih OTP');
    $mail->addAddress($email);

    $mail->isHTML(true);

    $mail->Subject = 'Kode OTP Pemulihan Akun';
    $mail->Body    = 'Halo User!👋<br>
                    Berikut merupakan kode otp untuk pemulihan akun anda.<br>
                    <br>
                    Kote OTP: ' . $otp . '<br>
                    <br>
                    Tetaplah jaga kerahasiaan kode ini untuk kebutuhan privasi anda. <br>
                    Salam hangat,<br>
                    Griya Pulih Asih <br>
                        ';

    // Send mail   
    $mail->send();
    if (!$mail->send()) {
        // update reset log
        // $currentTimestamp = date('Y-m-d H:i:s');
        // $activity = 'Request OTP Failed.';
        // $sql = "INSERT INTO reset_log (time, teamName, activity)
        //         VALUES ('$currentTimestamp', '$teamName', '$activity')";
        // $stmt = $con -> prepare($sql);
        // $stmt -> execute();
        // echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
    } else {
        // echo 'Message has been sent.';
    }

    $mail->smtpClose();
} else {
    $em = "Akun tidak terdaftar. Silahkan daftarkan akun anda terlebih dahulu.";

    # response array
    $res = array('error' => 1, 'em' => $em);

    echo json_encode($res);
    exit;
}

// update reset log
// $currentTimestamp = date('Y-m-d H:i:s');
// $activity = 'Request OTP Success.';
// $sql = "INSERT INTO reset_log (time, teamName, activity)
//         VALUES ('$currentTimestamp', '$teamName', '$activity')";
// $stmt = $con->prepare($sql);
// $stmt->execute();

$sm = "Kode OTP terkirim. Silahkan cek email anda.";

# response array
$res = array('error' => 0, 'sm' => $sm);

echo json_encode($res);

