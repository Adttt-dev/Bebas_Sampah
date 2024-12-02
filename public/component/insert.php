<?php

// koneksi ke database
include '../../database/conection.php';

// cek apakah tombol submit sudah di klik atau belum
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo
        "<script>
            alert('Laporan berhasil ditambahkan');
            document.location.href='../page/laporan.php';
        </script>";
    } else {
        echo
        "<script>
            alert('Laporan gagal ditambahkan');
        </script>";
    }
}

?>
    

<link rel="stylesheet" href="../../src/css/tambah.css">

<section class="insert py-5 mb-5">
    <div class="container">
        <div class="form-container">
            <h2 class="form-title text-center">Form Tambah Laporan</h2>
            <p class="form-description">Laporan Anda sangat penting bagi kami untuk meningkatkan pelayanan dan memantau kondisi di lapangan.
                Dengan melaporkan, Anda membantu kami menciptakan lingkungan yang lebih baik dan aman.</p>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="text" class="input-with-icon" name="laporan" id="laporan"
                        placeholder="Masukkan judul laporan" required>
                    <i class="fas fa-file-alt"></i>
                </div>

                <div class="input-group">
                    <input type="text" class="input-with-icon" name="lokasi" id="lokasi"
                        placeholder="Masukkan lokasi" required>
                    <i class="fas fa-map-marker-alt"></i>
                </div>

                <div class="input-group">
                    <input type="text" class="input-with-icon" name="pelapor" id="pelapor"
                        placeholder="Masukkan nama pelapor" required>
                    <i class="fas fa-user"></i>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" name="submit" class="btn btn-primary w-100 mb-3">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Laporan
                    </button>
                    <a href="../page/laporan.php" class="btn btn-outline-secondary w-100">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>