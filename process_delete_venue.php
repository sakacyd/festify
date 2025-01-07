<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['delete_venue'])) {
    $id_venue = $_POST['id_venue'];

    try {
        // Mulai transaction
        $conn->begin_transaction();

        // Cek apakah venue masih digunakan di event
        $check_query = $conn->prepare("SELECT COUNT(*) as total FROM event WHERE id_venue = ?");
        $check_query->bind_param("i", $id_venue);
        $check_query->execute();
        $result = $check_query->get_result();
        $row = $result->fetch_assoc();

        if ($row['total'] > 0) {
            throw new Exception("Venue masih digunakan dalam " . $row . " event. Hapus event terkait terlebih dahulu.");
        }

        // Hapus venue
        $delete_query = $conn->prepare("DELETE FROM venue WHERE id_venue = ?");
        $delete_query->bind_param("i", $id_venue);

        if (!$delete_query->execute()) {
            throw new Exception("Gagal menghapus venue.");
        }

        $conn->commit();
        $_SESSION['success'] = "Venue berhasil dihapus.";
    } catch (Exception $e) {
        $conn->rollback();
        $_SESSION['error'] = $e->getMessage();
    }
}

header("Location: admin.php");
exit();
