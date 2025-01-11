<section id="layanan" class="py-5 text-dark bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold display-6 text-uppercase">
                Mari <span class="text-success">Bersama Bergerak</span>
            </h2>
            <p class="text-muted lead">
                Bergabunglah dalam gerakan perubahan positif! Jelajahi layanan kami untuk mendukung pengelolaan sampah yang lebih baik demi lingkungan sehat dan lestari.
            </p>
        </div>

        <div class="row g-4">
            <!-- Card 1 -->
            <!-- Card 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card layanan-card h-100 shadow border-0">
                    <div class="layanan-card-icon text-center py-4">
                        <i class="fas fa-location-dot text-success layanan-icon" style="font-size: 70px;"></i>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-dark mb-3">Lokasi Pengelolaan</h5>
                        <p class="card-text text-muted mb-4">
                            Temukan lokasi pengelolaan sampah terdekat dengan peta interaktif. Bersama kita optimalkan pengelolaan sampah!
                        </p>
                        <a href="../../public/page/peta.php" class="btn btn-success px-4 py-2 layanan-btn">
                            <i class="fas fa-location-dot px-1"></i> Telusuri Peta
                        </a>
                    </div>
                </div>
            </div>


            <!-- Card 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card layanan-card h-100 shadow border-0">
                    <div class="layanan-card-icon text-center py-4">
                        <i class="fas fa-file-alt text-success layanan-icon" style="font-size: 70px;"></i>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-dark mb-3">Laporan Aksi</h5>
                        <p class="card-text text-muted mb-4">
                            Lihat laporan kontribusi Anda dalam pengelolaan sampah. Jadilah bagian dari gerakan nyata untuk perubahan!
                        </p>
                        <a href="../../public/page/laporan.php" class="btn btn-success px-4 py-2 layanan-btn">
                            <i class="fas fa-file px-1"></i> Lihat Laporan
                        </a>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card layanan-card h-100 shadow border-0">
                    <div class="layanan-card-icon text-center py-4">
                        <i class="fas fa-lightbulb text-success layanan-icon" style="font-size: 70px;"></i>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-dark mb-3">Saran dan Ide</h5>
                        <p class="card-text text-muted mb-4">
                            Bagikan ide dan saran Anda untuk sistem pengelolaan sampah yang lebih baik. Kontribusi Anda penting bagi inovasi!
                        </p>
                        <a href="../../public/page/saran.php" class="btn btn-success px-4 py-2 layanan-btn">
                            <i class="fas fa-paper-plane px-1"></i> Kirim Saran
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .layanan-card:hover {
        transform: translateY(-10px);
        transition: all 0.3s ease-in-out;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .layanan-icon {
        transition: color 0.3s ease;
    }

    .layanan-card:hover .layanan-icon {
        color: #27ae60;
    }

    .layanan-btn {
        transition: all 0.3s ease;
    }

    .layanan-btn:hover {
        background-color: #2ecc71;
        color: white;
        transform: translateY(-2px);
    }
</style>