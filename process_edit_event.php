<?php
session_start();
include 'db_connect.php';

if (isset($_POST['update_event'])) {
    $id_event = $_POST['id_event'];
    $nama_event = $_POST['nama_event'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_event = $_POST['tanggal_event'];
    $harga_tiket = $_POST['harga_tiket'];
    $id_venue = $_POST['id_venue'];

    // Handle image upload if new image is provided
    if (isset($_FILES['gambar_event']) && $_FILES['gambar_event']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["gambar_event"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Generate unique filename
        $new_filename = uniqid() . '.' . $imageFileType;
        $target_file = $target_dir . $new_filename;

        if (move_uploaded_file($_FILES["gambar_event"]["tmp_name"], $target_file)) {
            // Insert new image into gambar table
            $stmt = $conn->prepare("INSERT INTO gambar (path_gambar) VALUES (?)");
            $stmt->bind_param("s", $target_file);
            $stmt->execute();
            $id_gambar = $conn->insert_id;

            // Update event with new gambar_event
            $stmt = $conn->prepare("UPDATE event SET nama_event = ?, deskripsi = ?, tanggal_event = ?, harga_tiket = ?, id_venue = ?, gambar_event = ? WHERE id_event = ?");
            $stmt->bind_param("ssssiii", $nama_event, $deskripsi, $tanggal_event, $harga_tiket, $id_venue, $id_gambar, $id_event);
        }
    } else {
        // Update without changing image
        $stmt = $conn->prepare("UPDATE event SET nama_event = ?, deskripsi = ?, tanggal_event = ?, harga_tiket = ?, id_venue = ? WHERE id_event = ?");
        $stmt->bind_param("ssssii", $nama_event, $deskripsi, $tanggal_event, $harga_tiket, $id_venue, $id_event);
    }

    $stmt->execute();
    header("Location: admin.php");
    exit();
}
