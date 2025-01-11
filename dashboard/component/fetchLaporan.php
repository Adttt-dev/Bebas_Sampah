<?php
// fetchLaporan.php
include '../../database/conection.php';

// Query untuk laporan
$query_laporan = "
    SELECT laporan.id, laporan.laporan, laporan.lokasi, laporan.gambar, laporan.tanggal, users.username 
    FROM laporan
    INNER JOIN users ON laporan.user_id = users.id
";

$laporan = query($query_laporan); // Asumsi fungsi query sudah didefinisikan sebelumnya
?>
