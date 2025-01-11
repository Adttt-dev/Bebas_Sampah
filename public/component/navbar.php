<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Sampah</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="../../src/css/nav.css">
    <link rel="stylesheet" href="../../src/css/main.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .btn-primary a {
            color: white;
            text-decoration: none;
        }

        .navbar-orange {
            background-color: #FFA500;
        }

        .btn.dropdown-toggle {
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: none !important;
            outline: none !important;
        }

        .btn.dropdown-toggle:focus,
        .btn.dropdown-toggle:active,
        .btn.dropdown-toggle:focus:active {
            box-shadow: none !important;
            outline: none !important;
            background-color: transparent !important;
        }

        .btn.dropdown-toggle::after {
            display: none;
        }

        /* Styling for the username display */
        .navbar .username {
            color: rgb(255, 255, 255);
            font-weight: bold;
            font-size: 13px;
            margin-left: 10px;
            transition: color 0.3s ease-in-out;
            background-color: #28a745;
            padding: 5px 10px;
            border-radius: 5px;
            display: inline-block;
        }

        .navbar .user-icon {
            color: #28a745;
            font-size: 30px;
        }

        .navbar .user-icon.logged-out {
            color: #6c757d;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light py-2 sticky-top">
        <div class="container">
            <!-- Navbar Brand -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <h2 class="fw-bold mb-0">BEBAS <span class="text-success">SAMPAH</span></h2>
            </a>
            <!-- Toggler Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edukasi.php">Edukasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="peta.php">Peta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="laporan.php">Pembuangan Sampah Ilegal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="saran.php">Saran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Tentang Kami</a>
                    </li>

                    <div class="d-flex align-items-center ps-5">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" data-bs-toggle="dropdown" style="width: 100px; background: none; font-size: 25px;">
                                <i class="fas fa-user-circle user-icon <?php echo (isset($_SESSION['login']) && $_SESSION['login'] === true) ? 'logged-in' : 'logged-out'; ?>"></i>
                                <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true && isset($_SESSION['username'])) { ?>
                                    <span class="username"><?= $_SESSION['username']; ?></span>
                                <?php } ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true) { ?>
                                    <li><a class="dropdown-item text-danger" href="../../dashboard/database/logout.php">Logout</a></li>
                                <?php } else { ?>
                                    <li><a class="dropdown-item" href="../../dashboard/index.php">Login</a></li>
                                    <li><a class="dropdown-item" href="../../dashboard/register.php">Register</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../../src/js/main.js"></script>
</body>

</html>


