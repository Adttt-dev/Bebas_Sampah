<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back to Top Button</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* height: 2000px; Untuk membuat scroll panjang */
            margin: 0;
        }

        /* Tombol Back to Top */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s;
            z-index: 9999;
            display: none; /* Disembunyikan awalnya */
        }

        .back-to-top:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 600px) {
            .back-to-top {
                width: 40px;
                height: 40px;
                font-size: 20px;
                bottom: 15px;
                right: 15px;
            }
        }
    </style>
</head>
<body>
    <button class="back-to-top" onclick="scrollToTop()">↑</button>

    <script>
        // Fungsi untuk scroll ke atas
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Tampilkan atau sembunyikan tombol saat scroll
        const backToTopButton = document.querySelector('.back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 200) {
                backToTopButton.style.display = 'block'; // Tampilkan tombol
            } else {
                backToTopButton.style.display = 'none'; // Sembunyikan tombol
            }
        });
    </script>
</body>
</html>
