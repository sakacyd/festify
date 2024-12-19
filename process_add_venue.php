<?php
session_start();
include 'db_connect.php';

if (isset($_POST['submit_venue'])) {
    $nama_venue = $_POST['nama_venue'];
    $kota_venue = $_POST['kota_venue'];

    $stmt = $conn->prepare("INSERT INTO venue (nama_venue, kota_venue) VALUES (?, ?)");
    $stmt->bind_param("ss", $nama_venue, $kota_venue);
    $stmt->execute();

    header("Location: admin.php");
    exit();
}
?>