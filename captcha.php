<?php
session_start();
include('dbconnection.php');

function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Only generate a new captcha when loading the form for the first time
if (!isset($_SESSION['captcha'])) {
    $_SESSION['captcha'] = generateRandomString();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['captcha_input']) && trim($_POST['captcha_input']) === $_SESSION['captcha']) {
        echo '<script>alert("CAPTCHA validation successful!."); window.location.href = "pincode.php";</script>';
    } else {
        echo '<script>alert("BUGO!."); window.location.href = "login.php";</script>';
    }
    // Refresh captcha after each POST request
    $_SESSION['captcha'] = generateRandomString();
}
?>
