<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebas Sampah</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../../src/css/main.css">
    <style>
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
            min-height: 100vh;
            position: relative;
            overflow: hidden;
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
        }

        .hero-image {
            animation: float 3s ease-in-out infinite;
            max-width: 90%;
            margin: 0 auto;
            display: block;
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

        .stats-card {
            padding: 20px;
            background: white;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .stats-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2ecc71;
            margin-bottom: 10px;
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
                    <span class="badge bg-white text-success px-3 py-2 mb-3 rounded-pill">Indonesia Bebas Sampah</span>
                    <h1 class="display-4 fw-bold text-white mb-4">Bersama Wujudkan<br><span class="text-warning">Indonesia</span> Tanpa Sampah</h1>
                    <p class="lead text-white">Mari bergabung dalam gerakan perubahan untuk menciptakan lingkungan yang lebih bersih dan sehat melalui pengelolaan sampah yang bertanggung jawab.</p>
                    <div class="d-flex gap-3 flex-wrap justify-content-center justify-content-lg-start">
                        <a href="#layanan" class="btn btn-light" style="font-size: 14px; background-color: #ffffff;">
                            <i class="fas fa-arrow-right me-2"></i>Mulai
                        </a>
                        <a href="#program" class="btn btn-outline-light" style="font-size: 14px;">
                            <i class="fas fa-info-circle me-2"></i>Selengkapnya
                        </a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <img src="../../src/img/a.gif" class="img-fluid hero-image" alt="Ilustrasi Bebas Sampah">
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