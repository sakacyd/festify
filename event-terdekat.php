<?php

// Ambil data event terdekat
$sql = "SELECT * FROM event WHERE tanggal_event >= NOW() ORDER BY tanggal_event ASC LIMIT 3";
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