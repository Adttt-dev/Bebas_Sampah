<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        /* Kontainer utama */
        .blinking-running-container {
            width: 100%;
            overflow: hidden;
            background-color: #f0f0f0;
            padding: 15px 0;
            text-align: center;
            position: relative;
        }

        /* Animasi teks berjalan dan berkedip */
        .blinking-running-text {
            display: inline-block;
            white-space: nowrap;
            
            /* Animasi berjalan */
            animation: 
                runningText 10s linear infinite,
                blinkingText 1s infinite;
        }

        /* Keyframes untuk teks berjalan */
        @keyframes runningText {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        /* Keyframes untuk berkedip */
        @keyframes blinkingText {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0;
            }
        }

        /* Variasi warna dan efek */
        .blinking-running-text-rainbow {
            display: inline-block;
            white-space: nowrap;
            animation: 
                runningText 15s linear infinite,
                blinkingText 1.5s infinite,
                rainbowColor 3s linear infinite;
        }

        @keyframes rainbowColor {
            0% { color: red; }
            20% { color: orange; }
            40% { color: yellow; }
            60% { color: green; }
            80% { color: blue; }
            100% { color: purple; }
        }

        /* Variasi berkedip dengan scale */
        .blinking-running-text-scale {
            display: inline-block;
            white-space: nowrap;
            animation: 
                runningText 12s linear infinite,
                blinkScaleText 1s infinite;
        }

        @keyframes blinkScaleText {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.5;
                transform: scale(0.9);
            }
        }
    </style>
</head>
<body>
    <h2></h2>

    <!-- Teks Berjalan Berkedip Standar -->
    <div class="blinking-running-container">
        <div class="blinking-running-text">
            📢 Selamat datang! Jagalah Kebersihan Kota
        </div>
    </div>
</body>
</html>