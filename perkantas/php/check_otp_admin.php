<?php
include 'connect.php';

$teamName = $_POST['teamNameRst'];
$otp = $_POST['otpIn'];

$query1 = mysqli_query($con, "SELECT reset_code FROM reset_verification WHERE user_email = '$teamName'");

$row = mysqli_fetch_assoc($query1);
$otpCheck = $row['reset_code'];

if ((mysqli_num_rows($query1) === 1) && ($otpCheck == $otp)) {
    $query2 = mysqli_query($con, "UPDATE `reset_verification` SET `reset_status`='1' WHERE `user_email` = '$teamName'");  
    
} else {
    // update reset log
    // $currentTimestamp = date('Y-m-d H:i:s');
    // $activity = 'OTP Input Not Valid.';
    // $sql = "INSERT INTO reset_log (time, teamName, activity)
    //         VALUES ('$currentTimestamp', '$teamName', '$activity')";
    // $stmt = $con -> prepare($sql);
    // $stmt -> execute();

    $em = "OTP tidak valid.";

    # response array
    $res = array('error' => 1, 'em'=> $em);

    echo json_encode($res);
    exit;
}

// update reset log
// $currentTimestamp = date('Y-m-d H:i:s');
// $activity = 'OTP Input Valid.';
// $sql = "INSERT INTO reset_log (time, teamName, activity)
//         VALUES ('$currentTimestamp', '$teamName', '$activity')";
// $stmt = $con -> prepare($sql);
// $stmt -> execute();

$sm = "Silahkan masukkan password baru anda.";

    # response array
$res = array('error' => 0, 'sm'=> $sm);

echo json_encode($res);


?>