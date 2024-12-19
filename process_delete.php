<?php
session_start();
include 'db_connect.php';

if (isset($_POST['delete_venue'])) {
    $id_venue = $_POST['id_venue'];

    // Debugging: Tampilkan ID yang akan dihapus
    error_log("Menghapus venue dengan ID: " . $id_venue);

    // Hapus venue dari database
    $stmt = $conn->prepare("DELETE FROM venue WHERE id_venue = ?");
    $stmt->bind_param("i", $id_venue);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Venue berhasil dihapus.";
    } else {
        $_SESSION['error'] = "Terjadi kesalahan saat menghapus venue: " . $stmt->error;
    }
    $stmt->close();
    header("Location: admin.php");
    exit();
}

$conn->close();
