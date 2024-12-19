<?php
session_start();
include 'db_connect.php';

if (isset($_POST['update_venue'])) {
    $id_venue = $_POST['id_venue'];
    $nama_venue = $_POST['nama_venue'];
    $kota_venue = $_POST['kota_venue'];

    // Update data venue di database
    $stmt = $conn->prepare("UPDATE venue SET nama_venue = ?, kota_venue = ? WHERE id_venue = ?");
    $stmt->bind_param("ssi", $nama_venue, $kota_venue, $id_venue);
    $stmt->execute();

    // Redirect kembali ke halaman admin
    header("Location: admin.php");
    exit();
}
?>