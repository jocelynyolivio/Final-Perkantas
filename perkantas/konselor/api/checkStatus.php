<?php
include "connect.php";
$data = $_POST['konselorNama'];
$result = mysqli_query($con, "SELECT * FROM `konselor_info` WHERE `nama_konselor` =  '$data'");
$row = mysqli_fetch_assoc($result);

$res = $row['konselor_status'];
echo $res;
?>