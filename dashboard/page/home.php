<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/styles.css">
</head>

<body>

    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column">
        <div class="py-3 text-center fs-5 fw-bold border-bottom">
            <span class="sidebar-text">Admin</span>
        </div>
        <ul class="nav flex-column mt-3">
            <li class="nav-item">
                <a href="../page/home.php" class="nav-link active">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="../page/laporan.php" class="nav-link">
                    <i class="bi bi-table"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="../page/saran.php" class="nav-link">
                    <i class="bi bi-journal-text"></i>
                    <span>Saran</span>
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a href="../database/logout.php" class="nav-link text-danger">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- isi -->
    <div class="main-content">
        <?php

        include '../component/header.php';

        include '../component/menuHeader.php';
        include '../component/foto.php';
        include '../component/footer.php';


        include '../component/endMenu.php';
        ?>

    </div>

    