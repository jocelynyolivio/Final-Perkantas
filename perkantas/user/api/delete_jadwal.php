<?php

require_once "../connect.php";

$jadwal_konseling_id = $_GET["id"];
if (!isset($_GET["id"])) {
    echo "error"; exit;
}

$result = mysqli_query($con, "
    UPDATE jadwal_konseling
    SET user_email = NULL, tipe_service = NULL, keluhan = '', is_show = '0'
    WHERE jadwal_konseling_id = $jadwal_konseling_id
");
if ($result === false) {
    echo "error"; exit;
}
echo "ok"; exit;