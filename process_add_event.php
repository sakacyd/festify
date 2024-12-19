<?php
session_start();
include 'db_connect.php';

if (isset($_POST['submit_event'])) {
    $nama_event = $_POST['nama_event'];
    $tanggal_event = $_POST['tanggal_event'];
    $id_venue = $_POST['id_venue'];

    $stmt = $conn->prepare("INSERT INTO event (nama_event, tanggal_event, id_venue) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $nama_event, $tanggal_event, $id_venue);
    $stmt->execute();

    header("Location: admin.php");
    exit();
}
?>