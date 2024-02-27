<?php
include "connect.php";
$data = $_POST['adminNama'];
$result = mysqli_query($con, "SELECT * FROM `admin_info` WHERE `nama_admin` =  '$data'");
$row = mysqli_fetch_assoc($result);

$res = $row['admin_status'];
echo $res;
?>