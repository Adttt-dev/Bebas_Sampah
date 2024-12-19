<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sampah</title>
    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../../src/css/main.css">
    <link rel="icon" href="../../src/img/earth.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <?php
    include '../component/navbar.php';
    ?>
    <section id="peta" class="py-5 mb-5 text-dark">
        <div class="container py-3 text-center">
            <div class="container-fluid pt-5 text-center">
                <h1 class="title-project fw-bold">
                    PETA
                    <span>TITIK SAMPAH</span>
                </h1>
                <p class="subtitle-project mb-5">
                    Temukan titik-titik pengumpulan sampah dan mari bersama-sama menjaga kebersihan lingkungan kita!F
                </p>
                <!-- map -->
                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/d/embed?mid=15CRHAKPp1S6Uyah-9kWkelguP5C8zFI&ehbc=2E312F"
                        width="100%"
                        height="500px"
                        style="border:1px solid black; border-radius: 10px;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>


    <?php
    // footer
    include '../component/footer.php';
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>