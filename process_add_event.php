<?php
session_start();
include 'db_connect.php'; // Pastikan Anda menghubungkan ke database

if (isset($_POST['submit_event'])) {
    $nama_event = $_POST['nama_event'];
    $tanggal_event = $_POST['tanggal_event'];
    $id_venue = $_POST['id_venue'];
    $deskripsi = $_POST['deskripsi'];
    $harga_tiket = $_POST['harga'];
    
    // Proses upload gambar
    $target_dir = "uploads/"; // Pastikan folder ini ada dan dapat ditulis
    $target_file = $target_dir . basename($_FILES["gambar_event"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah gambar adalah gambar sebenarnya atau bukan
    $check = getimagesize($_FILES["gambar_event"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['error'] = "File bukan gambar.";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["gambar_event"]["size"] > 500000) { // 500KB
        $_SESSION['error'] = "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Izinkan format file tertentu
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $_SESSION['error'] = "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
        $uploadOk = 0;
    }

    // Cek apakah $uploadOk diatur ke 0 oleh kesalahan
    if ($uploadOk == 0) {
        $_SESSION['error'] = "Maaf, file tidak diupload.";
    } else {
        if (move_uploaded_file($_FILES["gambar_event"]["tmp_name"], $target_file)) {
            // Siapkan query untuk menambahkan event ke database
            $stmt = $conn->prepare("INSERT INTO event (nama_event, tanggal_event, id_venue, deskripsi, harga, gambar_event) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssisss", $nama_event, $tanggal_event, $id_venue, $deskripsi, $harga_tiket, $target_file);

            // Eksekusi query
            if ($stmt->execute()) {
                $_SESSION['success'] = "Event berhasil ditambahkan.";
            } else {
                $_SESSION['error'] = "Terjadi kesalahan saat menambahkan event: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $_SESSION['error'] = "Maaf, terjadi kesalahan saat mengupload file.";
        }
    }

    $conn->close();

    // Redirect kembali ke halaman admin
    header("Location: admin.php");
    exit();
}
?>