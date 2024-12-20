<?php
session_start();
include 'db_connect.php'; // Pastikan Anda menghubungkan ke database

if (isset($_POST['delete_event'])) {
    $id_event = $_POST['id_event'];

    // Siapkan query untuk menghapus event
    $stmt = $conn->prepare("DELETE FROM event WHERE id_event = ?");
    $stmt->bind_param("i", $id_event);

    // Eksekusi query
    if ($stmt->execute()) {
        $_SESSION['success'] = "Event berhasil dihapus.";
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat menghapus event: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect kembali ke halaman admin
    header("Location: admin.php");
    exit();
}
