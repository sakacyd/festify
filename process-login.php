<?php
session_start();
require 'db.php'; // Koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Validasi input
    if (empty($email) || empty($password)) {
        $_SESSION["error"] = "Email and Password are required.";
        header("Location: login.php");
        exit();
    }

    // Ambil data pengguna dari database
    $stmt = $conn->prepare("SELECT id_akun, nama_lengkap, password, role FROM akun WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id_user, $nama_lengkap, $hashedPassword, $role);

    if ($stmt->fetch()) {
        if (password_verify($password, $hashedPassword)) {
            // Simpan data ke session
            $_SESSION['user'] = [
                'id_user' => $id_user,
                'nama_lengkap' => $nama_lengkap,
                'email' => $email,
                'role' => $role
            ];

            // Debug session
            echo "<pre>";
            print_r($_SESSION['user']);
            echo "</pre>";

            // Arahkan berdasarkan role
            if ($role === 'admin') {
                $_SESSION['admin_logged_in'] = true;
                header("Location: admin.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            $_SESSION["error"] = "Incorrect password.";
            header("Location: login.php");
        }
    } else {
        $_SESSION["error"] = "User not found.";
        header("Location: login.php");
    }

    $stmt->close();
    $conn->close();
}
