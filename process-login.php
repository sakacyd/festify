<?php
session_start();
require 'db.php'; // Panggil file koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validasi input
    if (empty($email) || empty($password)) {
        $_SESSION["error"] = "Email and Password are required.";
        header("Location: login.html");
        exit();
    }

    // Cek data pengguna di database
    $stmt = $conn->prepare("SELECT name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($name, $hashedPassword);

    if ($stmt->fetch()) {
        if (password_verify($password, $hashedPassword)) {
            // Login berhasil
            $_SESSION["user"] = [
                "name" => $name,
                "email" => $email
            ];
            header("Location: dashboard.php");
        } else {
            $_SESSION["error"] = "Incorrect password.";
            header("Location: login.html");
        }
    } else {
        $_SESSION["error"] = "User not found. Please register first.";
        header("Location: register.html");
    }

    $stmt->close();
    $conn->close();
}
?>
