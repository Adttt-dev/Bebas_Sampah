<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebas Sampah</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../../src/css/main.css">
    <style>
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: #2ecc71;
            z-index: 9999;
            transition: width 0.2s ease;
        }

        .hero-section {
            background: linear-gradient(-45deg, #2ecc71, #3498db, #27ae60, #2980b9);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            min-height: 95vh;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('../../src/img/pattern.png') repeat;
            opacity: 0.1;
        }

        .hero-content {
            z-index: 1;
            animation: fadeInUp 1s ease;
        }

        .hero-image {
            animation: float 3s ease-in-out infinite;
            max-width: 90%;
            margin: 0 auto;
            display: block;
        }

        .badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .team-member {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .team-member:hover {
            background: #f8f9fa;
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .team-member img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin-bottom: 20px;
            object-fit: cover;
            border: 5px solid #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .team-member:hover img {
            transform: scale(1.05);
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin: 0 5px;
            color: #fff;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-links .instagram {
            background: linear-gradient(45deg, #405DE6, #5851DB, #833AB4, #C13584, #E1306C, #FD1D1D);
        }

        .social-links .whatsapp {
            background: #25D366;
        }

        .social-links a:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .values-card {
            border-radius: 15px;
            border: none;
            transition: all 0.3s ease;
            height: 100%;
            overflow: hidden;
        }

        .values-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .icon-wrapper {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(46, 204, 113, 0.1);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .section-divider {
            height: 4px;
            background: #2ecc71;
            margin: 30px auto;
            width: 80px;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                min-height: auto;
                padding: 100px 0;
            }

            .hero-content {
                text-align: center;
                margin-bottom: 40px;
            }
        }
    </style>
</head>

<body>
    <div class="scroll-progress"></div>

    <!-- Hero Section -->
    <section class="hero-section d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content" data-aos="fade-up">
                    <span class="badge bg-white text-success px-3 py-2 mb-3 rounded-pill">Tentang Kami</span>
                    <h1 class="display-4 fw-bold text-white mb-4">Mengenal Lebih Dekat<br><span class="text-warning">Perjalanan</span> Kami</h1>
                    <p class="lead text-white">Bebas Sampah adalah komitmen kami untuk menciptakan lingkungan bersih dan bebas dari limbah, dengan berfokus pada inovasi dan kolaborasi dalam pengelolaan sampah yang berkelanjutan.</p>
                    <div class="d-flex gap-3 flex-wrap justify-content-center justify-content-lg-start">
                        <a href="#team" class="btn btn-light" style="font-size: 14px; background-color: #ffffff;">
                            <i class="fas fa-arrow-right me-2"></i>Kenali Tim Kami
                        </a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <img src="../../src/img/edukasi.png" class="img-fluid hero-image" alt="Ilustrasi Bebas Sampah">
                </div>
            </div>
        </div>
    </section>


    <!-- Team Section -->
    <section id="team" class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-4 fw-bold">Tim <span class="text-success">Kami</span></h2>
                <p class="lead text-muted">Dipimpin oleh para profesional yang berdedikasi</p>
                <div class="section-divider"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <img src="../../src/img/about/a.jpg" alt="CEO">
                        <h4 class="mb-2">Aditya</h4>
                        <p class="text-muted mb-3">Fullstack</p>
                        <div class="social-links">
                            <a href="https://www.instagram.com/adittya_prst?igsh=d3oxamt0aGdrZnBr" target="_blank" class="instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://wa.me/6281234567890" target="_blank" class="whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member">
                        <img src="../../src/img/about/gustiar.jpg" alt="CTO">
                        <h4 class="mb-2">Gustiar</h4>
                        <p class="text-muted mb-3">FrontEnd</p>
                        <div class="social-links">
                            <a href="https://www.instagram.com/gustiards_" target="_blank" class="instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://wa.me/6281234567891" target="_blank" class="whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member">
                        <img src="../../src/img/about/armando.jpg" alt="COO">
                        <h4 class="mb-2">Armando</h4>
                        <p class="text-muted mb-3">Documentation</p>
                        <div class="social-links">
                            <a href="https://www.instagram.com/armgmg1?igsh=MWF1bXAydTJtc3Azbg==" target="_blank" class="instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://wa.me/6281234567892" target="_blank" class="whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="team-member">
                        <img src="../../src/img/about/panji.jpg" alt="CMO">
                        <h4 class="mb-2">Panji Rizki</h4>
                        <p class="text-muted mb-3">Documentation</p>
                        <div class="social-links">
                            <a href="https://www.instagram.com/panjirizkipurnomo/" target="_blank" class="instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://wa.me/6281234567893" target="_blank" class="whatsapp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section id="values" class="py-5 bg-light">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-4 fw-bold">Nilai-Nilai <span class="text-success">Kami</span></h2>
                <p class="lead text-muted">Prinsip yang kami pegang dalam memberikan layanan terbaik</p>
                <div class="section-divider"></div>
            </div>

            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card values-card shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="icon-wrapper mx-auto">
                                <i class="fas fa-leaf fa-2x text-success"></i>
                            </div>
                            <h3 class="h4 mb-3 text-center">Keberlanjutan</h3>
                            <p class="text-muted text-center">Berkomitmen untuk menciptakan solusi pengelolaan sampah yang ramah lingkungan dan berkelanjutan untuk generasi mendatang.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card values-card shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="icon-wrapper mx-auto">
                                <i class="fas fa-lightbulb fa-2x text-success"></i>
                            </div>
                            <h3 class="h4 mb-3 text-center">Inovasi</h3>
                            <p class="text-muted text-center">Terus berinovasi dalam teknologi dan metode pengelolaan sampah untuk mencapai efisiensi maksimal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card values-card shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="icon-wrapper mx-auto">
                                <i class="fas fa-handshake fa-2x text-success"></i>
                            </div>
                            <h3 class="h4 mb-3 text-center">Kolaborasi</h3>
                            <p class="text-muted text-center">Bermitra dengan berbagai pihak untuk menciptakan ekosistem pengelolaan sampah yang terintegrasi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Scroll Progress Bar
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.querySelector('.scroll-progress').style.width = scrolled + '%';
        });
    </script>
</body>

</html>