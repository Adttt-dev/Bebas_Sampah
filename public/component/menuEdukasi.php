<?php
include "../../database/conection.php";
$carouselItems = getCarouselItems();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukasi Lingkungan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../../src/css/edu.css">
    <style>
        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="scroll-progress"></div>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content" data-aos="fade-up">
                    <span class="badge bg-white text-success px-3 py-2 mb-3 rounded-pill">Edukasi Lingkungan</span>
                    <h1 class="display-4 fw-bold text-white mb-4">Mari Peduli <br><span class="text-warning">Lingkungan</span> Kita</h1>
                    <p class="lead text-white mb-5">Bersama-sama kita bisa menciptakan perubahan positif untuk lingkungan dengan mengelola sampah secara bertanggung jawab.</p>
                    <div class="d-flex gap-3 flex-wrap justify-content-center justify-content-lg-start">
                        <a href="#jenis-sampah" class="btn btn-light" style="font-size: 14px;">
                            <i class="fas fa-book-reader me-2"></i>Pelajari
                        </a>
                        <a href="#dampak-sampah" class="btn btn-outline-light" style="font-size: 14px;">
                            <i class="fas fa-play me-2"></i>Video
                        </a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up">
                    <img src="../../src/img/home.png" class="img-fluid hero-image" alt="Ilustrasi Lingkungan">
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <!-- Stat 1 -->
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="stats-card text-center">
                        <i class="fas fa-trash-alt fa-2x text-success mb-3"></i>
                        <div class="stats-number" data-value="300">0</div>
                        <p class="mb-0 text-muted">Juta Ton Sampah/Tahun</p>
                    </div>
                </div>
                <!-- Stat 2 -->
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="stats-card text-center">
                        <i class="fas fa-recycle fa-2x text-success mb-3"></i>
                        <div class="stats-number" data-value="12">0</div>
                        <p class="mb-0 text-muted">% Sampah Didaur Ulang</p>
                    </div>
                </div>
                <!-- Stat 3 -->
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="stats-card text-center">
                        <i class="fas fa-users fa-2x text-success mb-3"></i>
                        <div class="stats-number" data-value="270">0</div>
                        <p class="mb-0 text-muted">Juta Penduduk</p>
                    </div>
                </div>
                <!-- Stat 4 -->
                <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="stats-card text-center">
                        <i class="fas fa-globe fa-2x text-success mb-3"></i>
                        <div class="stats-number" data-value="85">0</div>
                        <p class="mb-0 text-muted">% Pencemaran Laut</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Jenis Sampah Section -->
    <section id="jenis-sampah" class="py-5">
        <div class="container py-5">
            <div class="section-header text-center" data-aos="fade-up">
                <h2 class="display-5 fw-bold">Jenis-Jenis <span class="text-success">Sampah</span></h2>
                <p class="lead text-muted">Kenali berbagai jenis sampah untuk pengelolaan yang lebih baik</p>
            </div>

            <div class="row g-4">
                <!-- Organik -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card h-100 shadow-lg">
                        <div class="card-body p-4">
                            <div class="text-success mb-3">
                                <i class="fas fa-leaf fa-2x"></i>
                            </div>
                            <h3 class="h4 mb-3">Sampah Organik</h3>
                            <img src="../../src/img/sampah/organik.jpg" class="img-fluid rounded mb-3" alt="Sampah Organik">
                            <p class="text-muted">Sampah yang dapat terurai secara alami seperti sisa makanan dan dedaunan.</p>
                        </div>
                    </div>
                </div>

                <!-- Anorganik -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card h-100 shadow-lg">
                        <div class="card-body p-4">
                            <div class="text-primary mb-3">
                                <i class="fas fa-recycle fa-2x"></i>
                            </div>
                            <h3 class="h4 mb-3">Sampah Anorganik</h3>
                            <img src="../../src/img/sampah/anorganik.jpg" class="img-fluid rounded mb-3" alt="Sampah Anorganik">
                            <p class="text-muted">Sampah yang sulit terurai seperti plastik, kaca, dan logam.</p>
                        </div>
                    </div>
                </div>

                <!-- B3 -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card h-100 shadow-lg">
                        <div class="card-body p-4">
                            <div class="text-danger mb-3">
                                <i class="fas fa-biohazard fa-2x"></i>
                            </div>
                            <h3 class="h4 mb-3">Sampah B3</h3>
                            <img src="../../src/img/sampah/b3.png" class="img-fluid rounded mb-3" alt="Sampah B3">
                            <p class="text-muted">Sampah berbahaya yang memerlukan penanganan khusus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Dampak Sampah Section -->
    <section id="dampak-sampah" class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold">Dampak <span class="text-danger">Negatif</span> Sampah</h2>
                <p class="lead text-muted">Pelajari dampak buruk sampah terhadap lingkungan</p>
                <div class="section-divider mx-auto" style="max-width: 100px;"></div>
            </div>

            <div id="carouselDampakSampah" class="carousel slide rounded-4 overflow-hidden shadow-lg" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($carouselItems as $index => $item): ?>
                        <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                            <div class="bg-opacity-10 p-4">
                                <div class="row justify-content-center">
                                    <div class="col-lg-10">
                                        <div class="ratio ratio-16x9 rounded-4 overflow-hidden">
                                            <iframe src="<?= htmlspecialchars($item['video_embed']) ?>"
                                                title="<?= htmlspecialchars($item['title']) ?>"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="text-center mt-4">
                                            <h5 class="fw-bold mb-3"><?= htmlspecialchars($item['title']) ?></h5>
                                            <a href="<?= htmlspecialchars($item['url_video']) ?>"
                                                class="btn btn-danger rounded-pill px-4">
                                                <i class="fas fa-play me-2"></i>Tonton
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselDampakSampah" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselDampakSampah" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Reduce, Reuse, Recycle Section -->
    <section id="reduce-reuse-recycle" class="py-5">
        <div class="container py-5">
            <div class="section-header text-center" data-aos="fade-up">
                <h2 class="display-5 fw-bold">Prinsip <span class="text-success">3R</span></h2>
                <p class="lead text-muted">Langkah-langkah yang dapat membantu kita mengurangi dampak sampah terhadap lingkungan</p>
            </div>

            <div class="row g-4">
                <!-- Reduce -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card h-100">
                        <div class="card-body p-4">
                            <div class="icon-wrapper text-success mb-4">
                                <i class="fas fa-arrow-down fa-3x"></i>
                            </div>
                            <h3 class="h4 mb-3">Reduce</h3>
                            <p class="text-muted mb-4">Kurangi penggunaan barang sekali pakai dan pilih produk yang ramah lingkungan untuk mengurangi sampah.</p>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Gunakan tas belanja sendiri</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Hindari produk sekali pakai</li>
                                <li><i class="fas fa-check text-success me-2"></i>Pilih produk isi ulang</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Reuse -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card h-100">
                        <div class="card-body p-4">
                            <div class="icon-wrapper text-primary mb-4">
                                <i class="fas fa-sync-alt fa-3x"></i>
                            </div>
                            <h3 class="h4 mb-3">Reuse</h3>
                            <p class="text-muted mb-4">Gunakan kembali barang yang masih layak pakai untuk mengurangi pembuangan barang yang masih berguna.</p>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Gunakan botol minum isi ulang</li>
                                <li class="mb-2"><i class="fas fa-check text-primary me-2"></i>Manfaatkan barang bekas</li>
                                <li><i class="fas fa-check text-primary me-2"></i>Perbaiki barang rusak</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Recycle -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card h-100">
                        <div class="card-body p-4">
                            <div class="icon-wrapper text-danger mb-4">
                                <i class="fas fa-recycle fa-3x"></i>
                            </div>
                            <h3 class="h4 mb-3">Recycle</h3>
                            <p class="text-muted mb-4">Daur ulang sampah yang bisa diproses ulang untuk mengurangi penumpukan sampah di tempat pembuangan.</p>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-2"><i class="fas fa-check text-danger me-2"></i>Pisahkan sampah sesuai jenisnya</li>
                                <li class="mb-2"><i class="fas fa-check text-danger me-2"></i>Olah sampah organik jadi kompos</li>
                                <li><i class="fas fa-check text-danger me-2"></i>Kumpulkan sampah daur ulang</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init({
                duration: 1000,
                once: true,
                offset: 100,
                easing: 'ease-in-out'
            });

            // Scroll Progress Bar
            window.addEventListener('scroll', () => {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (winScroll / height) * 100;
                document.querySelector('.scroll-progress').style.width = scrolled + '%';
            });

            // Stats Animation
            const animateStats = () => {
                document.querySelectorAll('.stats-number').forEach(stat => {
                    const value = parseInt(stat.dataset.value);
                    let current = 0;
                    const increment = value / 50;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= value) {
                            clearInterval(timer);
                            current = value;
                        }
                        stat.textContent = Math.round(current);
                    }, 40);
                });
            };

            // Intersection Observer for stats
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateStats();
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            // Observe stats section
            document.querySelector('.stats-card').parentElement.parentElement.parentElement &&
                observer.observe(document.querySelector('.stats-card').parentElement.parentElement.parentElement);

            // Smooth scroll for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>