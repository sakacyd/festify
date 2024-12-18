<?php
$host = "localhost"; // Server database
$username = "root";  // Username MySQL
$password = "";      // Password MySQL (biarkan kosong jika default)
$dbname = "festify"; // Nama database

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
