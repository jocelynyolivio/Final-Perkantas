<?php

require_once "connect.php";

function getUserByEmail(string $email) {
    global $con;

    $stmt = $con->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param('s', $email);
    if (! $stmt->execute()) {
        return null;
    }

    $result = $stmt->get_result();

    return $result->fetch_assoc();
}