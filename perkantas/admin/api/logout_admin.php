<?php
    session_name('admin');
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: ../../admin.php");
    exit;
?>