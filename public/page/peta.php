<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peta Titik Sampah</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../src/css/main.css">
    <link rel="icon" href="../../src/img/earth.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        .title-project {
            font-size: 2.5rem;
            color: #333;
            font-weight: bold;
        }

        .subtitle-project {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 30px;
        }

        .map-container {
            position: relative;
            width: 100%;
            height: 500px;
            overflow: hidden;
            border-radius: 15px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 10px;
        }

        .map-container:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .cta-btn {
            margin-top: 30px;
            padding: 12px 25px;
            background-color: #28a745;
            color: white;
            border-radius: 50px;
            text-transform: uppercase;
            font-weight: bold;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .cta-btn:hover {
            background-color: #218838;
            text-decoration: none;
        }

        .section-header {
            margin-bottom: 50px;
            text-align: center;
            padding: 20px;
        }

        .section-header h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #333;
            letter-spacing: 2px;
        }

        .section-header p {
            font-size: 1.2rem;
            color: #555;
        }

    </style>
</head>

<body>
    <?php
    include '../component/navbar.php';
    ?>

    <section id="peta" class="py-5 mb-5 text-dark">
        <div class="container py-3 text-center">
            <div class="section-header" data-aos="fade-up">
                <h1 class="title-project">
                    PETA <span>TITIK SAMPAH</span>
                </h1>
                <p class="subtitle-project">
                    Temukan titik-titik pengumpulan sampah dan mari bersama-sama menjaga kebersihan lingkungan kita!
                </p>
                <a href="#mapSection" class="cta-btn">Lihat Peta</a>
            </div>

            <!-- map -->
            <div id="mapSection" class="map-container" data-aos="zoom-in">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d243578.97350461438!2d104.65096960452104!3d-2.955126183825332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stempat%20pembuangan%20sampah%20di%20indonesia!5e1!3m2!1sen!2sid!4v1736522008460!5m2!1sen!2sid"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>

    <?php
    include '../component/backtop.php';
    include '../component/hoverpad.php';
    include '../component/footer.php';
    ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>

</html>
