<?php
    session_name('konselor');
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: ../../konselor.php");
    exit;
?>