<?php

include('dbconnection.php');
session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Lockout time limit (in seconds)
$lockout_time = 60; // 10 minutes
$max_attempts = 3; // Maximum number of failed attempts before lockout

// Admin login functionality
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_pass = md5($password);

    // Check if the user account is locked
    $lockoutSql = "SELECT * FROM login_attempts WHERE email = '$email' AND timestamp > (NOW() - INTERVAL $lockout_time SECOND)";
    $lockoutResult = $conn->query($lockoutSql);

    if ($lockoutResult->num_rows >= $max_attempts) {
      
    
        echo '<script>alert("Too many failed login attempts. Please try again later."); window.location.href = "emplogin.php";</script>';
        echo "<a href='emplogin.php'><button class = 'back_btn ' type='button'>re-login</button></a>";
        exit; // Stop further execution
    }


    // Check username and password for admin
    $sql_admin = "SELECT * FROM accounts WHERE email = '$email' AND password = '$hash_pass'";
    $result_admin = $conn->query($sql_admin);

    if ($result_admin->num_rows == 1) {
        session_start();
        $_SESSION['admin_username'] = $email;
        // Reset failed login attempts
        $sql_reset = "DELETE FROM login_attempts WHERE email = '$email'";
        $conn->query($sql_reset);
        header("location: pincode.php"); // Redirect to admin dashboard page after successful login
    } else {
        // Record failed login attempt
        $sql_record_attempt = "INSERT INTO login_attempts (email) VALUES ('$email')";
        $conn->query($sql_record_attempt);
        
        echo '<script>alert("Invalid email or password"); window.location.href = "emplogin.php";</script>';
    }
}
}
?>