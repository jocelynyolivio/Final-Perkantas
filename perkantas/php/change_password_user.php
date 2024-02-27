<?php
include 'connect.php';

$teamName = $_POST['teamNameRst'];

$result_dewasa = mysqli_query($con, "SELECT * FROM user_dewasa_info WHERE user_email = '$teamName'");

// check table user_anak
$result_anak = mysqli_query($con, "SELECT * FROM user_anak_info WHERE user_email = '$teamName'");

$type = 0;

if (mysqli_num_rows($result_dewasa) === 1 || mysqli_num_rows($result_anak) === 1){
    if (mysqli_num_rows($result_dewasa) === 1) {
        $query1 = $result_dewasa;
        $type = 1;
    } elseif (mysqli_num_rows($result_anak) === 1) {
        $query1 = $result_anak;
        $type = 2;
    }
}
// $query1 = mysqli_query($con, "SELECT * FROM team WHERE user_email = '$teamName'");
$query2 = mysqli_query($con, "SELECT * FROM reset_verification WHERE user_email = '$teamName'");
$row = mysqli_fetch_assoc($query2);
$status = $row['reset_status'];

if ((mysqli_num_rows($query1) === 1) && ($status == "1")) {
    $newPass = password_hash($_POST['newPass'], PASSWORD_DEFAULT);

    if ($type == 1) {
        $query3 = mysqli_query($con, "UPDATE `user_dewasa_info` SET `password`='$newPass' WHERE `user_email` = '$teamName'");
    } elseif ($type == 2) {
        if ($type == 1) {
            $query3 = mysqli_query($con, "UPDATE `user_anak_info` SET `password`='$newPass' WHERE `user_email` = '$teamName'");
        }
    }

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