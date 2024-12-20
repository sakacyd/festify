<?php

// Ambil data event terdekat
$sql = "SELECT e.*, v.nama_venue 
        FROM event e 
        JOIN venue v ON e.id_venue = v.id_venue 
        WHERE e.tanggal_event >= NOW() 
        ORDER BY e.tanggal_event ASC 
        LIMIT 10";
$result = $conn->query($sql);
$event = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $event[] = $row;
  }
} else {
  echo "Tidak ada event yang ditemukan.";
}

// Menghitung sisa waktu
if (!empty($event[0])) {
  $concertDateTime = strtotime($event[0]['tanggal_event'] . ' 20:00:00'); // Asumsi konser dimulai jam 20:00
  $currentDateTime = time();
  $timeRemaining = $concertDateTime - $currentDateTime;

  // Menghitung hari, jam, menit, dan detik
  $days = floor($timeRemaining / (60 * 60 * 24));
  $hours = floor(($timeRemaining % (60 * 60 * 24)) / (60 * 60));
  $minutes = floor(($timeRemaining % (60 * 60)) / 60);
  $seconds = $timeRemaining % 60;
}

?>