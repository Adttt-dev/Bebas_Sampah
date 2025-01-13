<?php
include_once '../../database/conection.php';

$show_laporan_all = isset($_GET['lihat_semua_laporan']) ? true : false;
$show_saran_all = isset($_GET['lihat_semua_saran']) ? true : false;

// Conditional queries for laporan
$laporan = $show_laporan_all
    ? query("SELECT * FROM laporan")
    : query("SELECT * FROM laporan LIMIT 3");

// Conditional queries for saran
$saran = $show_saran_all
    ? query("SELECT * FROM saran")
    : query("SELECT * FROM saran LIMIT 3");

// Ambil jumlah laporan, saran, video, dan total
$total_laporan = query("SELECT COUNT(*) as total FROM laporan")[0]['total'];
$total_saran = query("SELECT COUNT(*) as total FROM saran")[0]['total'];
$total_video = query("SELECT COUNT(*) as total FROM edukasi_yt")[0]['total'];

// Hitung total keseluruhan
$total_keseluruhan = $total_laporan + $total_saran + $total_video;
?>

<style>
    h5 {
        text-align: center;
    }
</style>

<!-- KPIs -->
<div class="container mt-4 mb-5">
    <div class="row g-4">
        <!-- Laporan -->
        <div class="col-lg-3 col-md-6">
            <div class="card kpi-card bg-primary text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-file-earmark-text fs-1 me-3"></i>
                    <div class="px-2">
                        <p class="fs-3 fw-bold">Laporan</p>
                        <h5><?= $total_laporan; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Saran -->
        <div class="col-lg-3 col-md-6">
            <div class="card kpi-card bg-success text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-chat-left-dots fs-1 me-3"></i>
                    <div class="px-2">
                        <p class="fs-3 fw-bold">Saran</p>
                        <h5><?= $total_saran; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video -->
        <div class="col-lg-3 col-md-6">
            <div class="card kpi-card bg-warning text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-play-circle fs-1 me-3"></i>
                    <div class="px-2">
                        <p class="fs-3 fw-bold">Video</p>
                        <h5><?= $total_video; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total -->
        <div class="col-lg-3 col-md-6">
            <div class="card kpi-card bg-danger text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-bar-chart-fill fs-1 me-3"></i>
                    <div class="px-2">
                        <p class="fs-3 fw-bold">Total</p>
                        <h5><?= $total_keseluruhan; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include 'menuLaporan.php';
include 'menuSaran.php';
?>