<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['delete_event'])) {
    $id_event = $_POST['id_event'];

    try {
        // Mulai transaction
        $conn->begin_transaction();

        // Ambil informasi gambar event
        $query = $conn->prepare("SELECT gambar_event FROM event WHERE id_event = ?");
        $query->bind_param("i", $id_event);
        $query->execute();
        $result = $query->get_result();
        $event = $result->fetch_assoc();
        $id_gambar = $event['gambar_event'];

        // Hapus event
        $delete_event = $conn->prepare("DELETE FROM event WHERE id_event = ?");
        $delete_event->bind_param("i", $id_event);

        if (!$delete_event->execute()) {
            throw new Exception("Gagal menghapus event.");
        }

        // Jika ada gambar terkait, hapus dari tabel gambar
        if ($id_gambar) {
            $delete_image = $conn->prepare("DELETE FROM gambar WHERE id_gambar = ?");
            $delete_image->bind_param("i", $id_gambar);

            if (!$delete_image->execute()) {
                throw new Exception("Gagal menghapus gambar event.");
            }
        }

        $conn->commit();
        $_SESSION['success'] = "Event berhasil dihapus.";
    } catch (Exception $e) {
        $conn->rollback();
        $_SESSION['error'] = $e->getMessage();
    }
}

header("Location: admin.php");
exit();
