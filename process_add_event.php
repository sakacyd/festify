<?php
session_start();
include 'db_connect.php';

if (isset($_POST['submit_event'])) {
    $nama_event = $_POST['nama_event'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_event = $_POST['tanggal_event'];
    $harga_tiket = $_POST['harga_tiket'];
    $id_venue = $_POST['id_venue'];

    $stmt = $conn->prepare("INSERT INTO `event` (nama_event, deskripsi, tanggal_event, harga_tiket, id_venue) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $nama_event, $deskripsi, $tanggal_event, $harga_tiket, $id_venue);
    $stmt->execute();

    header("Location: admin.php");
    exit();
}
?>