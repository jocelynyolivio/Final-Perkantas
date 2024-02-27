<?php
require_once "../connect.php";

$konselor_email = $_GET['konselor_email'];

$jadwal = mysqli_query($con, "SELECT * FROM jadwal_konseling WHERE konselor_email = '$konselor_email' AND user_email IS NULL AND tipe_service =2");
$jadwal = mysqli_fetch_all($jadwal, MYSQLI_ASSOC);

echo json_encode($jadwal);
?>