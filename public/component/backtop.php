<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back to Top Button</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            height: 2000px; /* Untuk membuat scroll panjang */
            margin: 0;
        }

        /* Desain tombol Back to Top */
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
            transition: background-color 0.3s;
        }

        /* Efek hover pada tombol */
        .back-to-top:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Tombol Back to Top -->
    <button class="back-to-top" onclick="scrollToTop()">↑</button>

    <script>
        // Fungsi untuk menggulir halaman ke atas
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>

</body>
</html>
