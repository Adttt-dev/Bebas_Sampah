<!-- dampak -->
<?php
include "../../database/conection.php";
// Ambil data carousel
$carouselItems = getCarouselItems();
?>


<!-- Halaman Atas -->
<section class="lapor-menu py-3">
    <div class="container px-4 py-5">
        <div class="row align-items-center">
            <!-- Gambar -->
            <div class="col-lg-6 text-center mb-4 mb-lg-0" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                <div class="px-4 py-5">
                    <img src="../../src/img/home.png" class="img-fluid w-75" alt="Ilustrasi Edukasi Sampah">
                </div>
            </div>

            <!-- Deskripsi & Tombol -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                <div class="judul-edukasi mb-3">
                    <h1 class="fw-bold text-dark">Edukasi Tentang<span> Sampah</span></h1>
                </div>
                <p class="py-2 text-muted">Sampah menjadi masalah besar di seluruh dunia, mencemari lingkungan dan mengancam kesehatan kita. Melalui edukasi dan kesadaran bersama, kita bisa mengurangi, mendaur ulang, dan mengelola sampah dengan lebih bertanggung jawab. Laporan tentang pembuangan sampah ilegal atau yang tercecer dapat membantu kita menjaga kebersihan dan kesehatan lingkungan.</p>
                <a href="#jenis-sampah" class="btn btn-primary align-items-center text-white">
                    Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>

<!-- jenis sampah -->
<section id="jenis-sampah" class="edukasi py-5 mb-5"">
    <div class=" container px-5 py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold display-6">
            JENIS-JENIS <span class="text-success">SAMPAH</span>
        </h2>
        <p class="text-muted lead" style="font-size: 18px;">
            Pelajari jenis-jenis sampah yang ada dan cara pengelolaannya untuk menjaga lingkungan agar tetap bersih dan sehat.
        </p>
    </div>

    <!-- Sampah Organik -->
    <div class="row align-items-center py-4">
        <div class="col-lg-6" data-aos="fade-right">
            <div class="d-flex justify-content-center g-sampah">
                <img src="../../src/img/sampah/organik.jpg" class="img-fluid img-sampah rounded shadow w-75" alt="Sampah Organik">
            </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
            <div>
                <h3 class="mb-3 fw-bold">
                    <i class="fas fa-leaf text-success me-2"></i>
                    Sampah <span class="text-gradient">Organik</span>
                </h3>
                <p class="text-muted">
                    Sampah organik terdiri dari bahan alami yang dapat terurai dengan mudah, seperti sisa makanan, daun, dan limbah dapur. Sampah ini dapat didaur ulang menjadi kompos yang berguna untuk meningkatkan kesuburan tanah.
                </p>
            </div>
        </div>
    </div>

    <!-- Sampah Anorganik -->
    <div class="row align-items-center py-4">
        <div class="col-lg-6 order-lg-2" data-aos="fade-left">
            <div class="d-flex justify-content-center g-sampah">
                <img src="../../src/img/sampah/anorganik.jpg" class="img-fluid img-sampah rounded shadow w-75" alt="Sampah Anorganik">
            </div>
        </div>
        <div class="col-lg-6 order-lg-1" data-aos="fade-right">
            <div>
                <h3 class="mb-3 fw-bold">
                    <i class="fas fa-recycle text-primary me-2"></i>
                    Sampah <span class="text-gradient">Anorganik</span>
                </h3>
                <p class="text-muted">
                    Sampah anorganik, seperti plastik, kaca, logam, dan kertas, tidak terurai secara alami dan membutuhkan waktu yang lama untuk hancur. Banyak barang plastik dan kertas dapat didaur ulang untuk digunakan kembali.
                </p>
            </div>
        </div>
    </div>

    <!-- Sampah B3 -->
    <div class="row align-items-center py-4">
        <div class="col-lg-6" data-aos="fade-right">
            <div class="d-flex justify-content-center g-sampah">
                <img src="../../src/img/sampah/b3.png" class="img-fluid img-sampah rounded shadow w-75" alt="Sampah B3">
            </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
            <div>
                <h3 class="mb-3 fw-bold">
                    <i class="fas fa-biohazard text-danger me-2"></i>
                    Sampah <span class="text-gradient">B3 (Berbahaya)</span>
                </h3>
                <p class="text-muted">
                    Sampah B3 mencakup bahan-bahan berbahaya seperti bahan kimia, baterai, lampu neon, dan limbah medis yang dapat mencemari lingkungan jika tidak dikelola dengan hati-hati.
                </p>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Dampak Sampah Section -->
<section id="dampak-sampah" class="pt-5 text-dark">
    <div class="container py-5">
        <!-- Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold display-5" style="color: #333;">
                KENALI <span class="text-gradient">DAMPAK NEGATIF SAMPAH</span>
            </h2>
            <p class="text-muted lead">
                Pelajari dampak buruk yang ditimbulkan oleh sampah yang tidak terkelola dengan baik terhadap lingkungan dan kehidupan manusia.
            </p>
        </div>

        <!-- Carousel -->
        <div id="carouselDampakSampah" class="carousel slide rounded-4" data-bs-ride="carousel" data-bs-interval="4000">
            <div class="carousel-inner">
                <?php foreach ($carouselItems as $index => $item): ?>
                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="card border-0 p-3">
                                    <div class="card-body text-center bg-gradient uniform-card" style="border-radius: 20px;">
                                        <div class="video-container mb-4">
                                            <iframe
                                                src="<?= htmlspecialchars($item['video_embed']) ?>"
                                                title="<?= htmlspecialchars($item['title']) ?>"
                                                class="video-embed shadow-sm"
                                                style="width:700px; height:300px; border-radius:10px;"
                                                allowfullscreen>
                                                
                                            </iframe>
                                        </div>
                                        <h5 class="card-title fw-bold mb-3" style="color: #2c3e50;"><?= htmlspecialchars($item['title']) ?></h5>
                                        <div>
                                            <a href="<?= htmlspecialchars($item['url_video']) ?>" class="btn btn-danger text-white mt-3 px-4 shadow-sm">
                                                Tonton Video
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Tombol Navigasi -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselDampakSampah" data-bs-slide="prev">
                <span class="fa fa-chevron-left text-danger fs-3" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselDampakSampah" data-bs-slide="next">
                <span class="fa fa-chevron-right text-danger fs-3" aria-hidden="true"></span>
                <span class="visually-hidden">Selanjutnya</span>
            </button>
        </div>
    </div>
</section>


<!-- kelola sampah -->
<section class="kelola-sampah py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold">CARA MENGELOLA SAMPAH DENGAN BENAR</h1>
            <p class="text-muted">Langkah-langkah sederhana untuk membantu menjaga lingkungan.</p>
        </div>
        <div class="timeline">
            <!-- Reduce -->
            <div class="timeline-item left" data-aos="fade-right">
                <div class="timeline-icon bg-primary text-white">
                    <i class="fas fa-trash-alt"></i>
                </div>
                <div class="timeline-content bg-light p-4 rounded shadow-sm">
                    <h4 class="text-primary">Reduce (Mengurangi)</h4>
                    <p>Kurangi penggunaan barang sekali pakai dan pilihlah produk yang lebih ramah lingkungan. Mengurangi sampah sejak awal adalah langkah pertama dalam pengelolaan sampah yang baik.</p>
                </div>
            </div>
            <!-- Reuse -->
            <div class="timeline-item right" data-aos="fade-left">
                <div class="timeline-icon bg-success text-white">
                    <i class="fas fa-recycle"></i>
                </div>
                <div class="timeline-content bg-light p-4 rounded shadow-sm">
                    <h4 class="text-success">Reuse (Menggunakan Kembali)</h4>
                    <p>Manfaatkan kembali barang-barang yang masih bisa digunakan, seperti kantong plastik dan botol kaca. Ini membantu mengurangi sampah yang terbuang dan memperpanjang usia barang tersebut.</p>
                </div>
            </div>
            <!-- Recycle -->
            <div class="timeline-item left" data-aos="fade-right">
                <div class="timeline-icon bg-warning text-white">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <div class="timeline-content bg-light p-4 rounded shadow-sm">
                    <h4 class="text-warning">Recycle (Mendaur Ulang)</h4>
                    <p>Pisahkan sampah anorganik seperti plastik, kaca, dan logam agar dapat didaur ulang dan digunakan kembali dalam proses produksi. Daur ulang mengurangi kebutuhan akan bahan baku baru dan menghemat energi.</p>
                </div>
            </div>
            <!-- Composting -->
            <div class="timeline-item right" data-aos="fade-left">
                <div class="timeline-icon bg-info text-white">
                    <i class="fas fa-seedling"></i>
                </div>
                <div class="timeline-content bg-light p-4 rounded shadow-sm">
                    <h4 class="text-info">Composting (Pengomposan)</h4>
                    <p>Ubah sampah organik seperti sisa makanan dan daun menjadi kompos yang berguna sebagai pupuk untuk tanaman. Pengomposan mengurangi jumlah sampah yang dibuang ke tempat pembuangan akhir dan menghasilkan produk yang bermanfaat bagi lingkungan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- YouTube Video Embed -->
<section class="container py-5">
    <h2 class="section-title">Belajar Lebih Lanjut</h2>
    <div class="image-section">
        <iframe width="100%" height="400" src="https://www.youtube.com/embed/pnuiEGuThsI" frameborder="0" allowfullscreen></iframe>
    </div>
    <a href="https://youtu.be/pnuiEGuThsI" class="btn-custom mt-3" target="_blank" style="text-decoration: none;">Tonton Video Lengkapnya</a>
</section>


<script>
    var myCarousel = document.getElementById('carouselDampakSampah');
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 3000, // Interval 4 detik
        ride: 'carousel' // Memulai carousel otomatis
    });
</script>