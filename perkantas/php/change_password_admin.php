<?php
include 'connect.php';

$teamName = $_POST['teamNameRst'];

$query1 = mysqli_query($con, "SELECT * FROM admin_info WHERE admin_email = '$teamName'");
$query2 = mysqli_query($con, "SELECT * FROM reset_verification WHERE user_email = '$teamName'");
$row = mysqli_fetch_assoc($query2);
$status = $row['reset_status'];

if ((mysqli_num_rows($query1) === 1) && ($status == "1")) {
    $newPass = password_hash($_POST['newPass'], PASSWORD_DEFAULT);

    $query3 = mysqli_query($con, "UPDATE `admin_info` SET `password`='$newPass' WHERE `admin_email` = '$teamName'");

    $query4 = mysqli_query($con, "UPDATE `reset_verification` SET `reset_code`='0', `reset_status`='0' WHERE `user_email` = '$teamName'");  
    
} else {
    // update reset log
    // $currentTimestamp = date('Y-m-d H:i:s');
    // $activity = 'Password Reset Failed.';
    // $sql = "INSERT INTO reset_log (time, teamName, activity)
    //         VALUES ('$currentTimestamp', '$teamName', '$activity')";
    // $stmt = $con -> prepare($sql);
    // $stmt -> execute();
    $em = "Reset password gagal! Silahkan coba lagi.";

    # response array
    $res = array('error' => 1, 'em'=> $em);

    echo json_encode($res);
    exit;
}

// update reset log
// $currentTimestamp = date('Y-m-d H:i:s');
// $activity = 'Password Changed.';
// $sql = "INSERT INTO reset_log (time, teamName, activity)
//         VALUES ('$currentTimestamp', '$teamName', '$activity')";
// $stmt = $con -> prepare($sql);
// $stmt -> execute();

$sm = "Reset password berhasil.";

    # response array
$res = array('error' => 0, 'sm'=> $sm);

echo json_encode($res);


?>