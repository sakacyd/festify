<?php
session_start();
include 'db_connect.php'; // Koneksi database

if (isset($_POST['update_event'])) {
    $id_event = $_POST['id_event'];
    $nama_event = $_POST['nama_event'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_event = $_POST['tanggal_event'];
    $harga_tiket = $_POST['harga_tiket'];
    $id_venue = $_POST['id_venue'];

    // Update data event di database
    $stmt = $conn->prepare("UPDATE event SET nama_event = ?, deskripsi = ?, tanggal_event = ?, harga_tiket = ?, id_venue = ? WHERE id_event = ?");
    $stmt->bind_param("ssssii", $nama_event, $deskripsi, $tanggal_event, $harga_tiket, $id_venue, $id_event);
    $stmt->execute();

    // Redirect kembali ke halaman admin
    header("Location: admin.php");
    exit();
}
?>