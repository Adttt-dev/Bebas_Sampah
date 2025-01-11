<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
include '../../database/conection.php';

// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
  $login_required = true;
} else {
  $login_required = false;
}

// Konfigurasi pagination
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Query untuk mengambil data dengan limit
$laporan = query("SELECT * FROM laporan LIMIT $start, $limit");

// Query untuk menghitung total data
$total_rows = query("SELECT COUNT(*) as count FROM laporan")[0]['count'];
$total_pages = ceil($total_rows / $limit);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Sampah Ilegal</title>
  <!-- Bootstrap CSS -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Custom CSS -->
  <style>
    .search-container {
      padding: 0 15px 30px 15px;
    }

    .search-wrapper {
      position: relative;
      max-width: 500px;
      margin: 0 auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .search-wrapper:focus-within {
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
      transform: translateY(-2px);
    }

    .search-input {
      width: 100%;
      padding: 15px 20px 15px 45px;
      border: 2px solid transparent;
      border-radius: 12px;
      font-size: 16px;
      color: #333;
      transition: all 0.3s ease;
    }

    .search-input:focus {
      outline: none;
      border-color: #4CAF50;
    }

    .search-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #666;
    }

    .clear-button {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #666;
      cursor: pointer;
      padding: 5px;
      display: none;
      transition: color 0.3s ease;
    }

    .clear-button:hover {
      color: #dc3545;
    }

    .search-wrapper:has(.search-input:not(:placeholder-shown)) .clear-button {
      display: block;
    }

    .report-row {
      transition: all 0.3s ease;
    }

    .report-row.hidden {
      opacity: 0;
      transform: translateY(10px);
    }

    .container-atas {
      padding: 50px 0;
    }

    .tambah {
      background-color: #4CAF50;
    }

    .tambah:hover {
      background-color: #45a049;
    }

  </style>
</head>

<body>

  <!-- halaman atas -->
  <section class="lapor-menu py-5">
    <div class="container px-4 container-atas">
      <div class="row">
        <div class="col-lg-6 align-self-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
          <div class="judul">
            <h1 class="fw-bold">Pembuangan Sampah Ilegal</h1>
          </div>
          <p class="py-2">Adalah laporan pembuangan sampah yang dibuang secara ilegal atau tercecer di luar fasilitas pewadahan persampahan.</p>
          <?php if (!$login_required): ?>
            <a href="../page/tambahLaporan.php" class="btn tambah text-white">+ Laporan</a>
          <?php else: ?>
            <button id="loginAlert" class="btn tambah text-white">+ Laporan</button>
          <?php endif; ?>
        </div>
        <div class="col-lg-6 text-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
          <div class="px-4">
            <img src="../../src/img/laporan.png" class="px-4 pb-5 w-75">
          </div>
        </div>
      </div>
    </div>

    <!-- bagian table -->
    <section class="lapor py-2" id="tableSection">
      <div class="container laporan shadow-lg">
        <h2 class="fw-bold text-center py-5">Daftar Laporan</h2>

        <!-- Enhanced Search -->
        <div class="search-container">
          <div class="search-wrapper">
            <i class="fas fa-search search-icon"></i>
            <input
              type="text"
              id="searchInput"
              class="search-input"
              placeholder="Cari laporan atau lokasi..."
              autocomplete="off">
            <button type="button" id="clearSearch" class="clear-button">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        <div class="row justify-content-center py-4">
          <div class="col-lg-12">
            <table class="table table-hover tabel-fixed table-striped" id="reportTable">
              <thead>
                <tr class="head-table">
                  <th scope="col" style="width: 10%;">No</th>
                  <th scope="col" style="width: 40%;">Laporan</th>
                  <th scope="col" style="width: 25%;">Lokasi</th>
                  <th scope="col" style="width: 25%;">Gambar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = $start + 1;
                foreach ($laporan as $lap) { ?>
                  <tr class="report-row">
                    <td><?= $i; ?></td>
                    <td data-searchable="true"><?= $lap['laporan']; ?></td>
                    <td data-searchable="true"><?= $lap['lokasi']; ?></td>
                    <td><img src="../../database/img/<?= $lap['gambar']; ?>" alt="Gambar Laporan" style="width: 50px; height: 50px; object-fit: cover;"></td>
                  </tr>
                  <?php $i++; ?>
                <?php } ?>
              </tbody>
            </table>

            <!-- Pagination Navigation -->
            <nav aria-label="Page navigation" class="mt-4">
              <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                  <li class="page-item">
                    <a class="page-link pagination-link" href="?page=<?= $page - 1 ?>" data-page="<?= $page - 1 ?>" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                  <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link pagination-link" href="?page=<?= $i ?>" data-page="<?= $i ?>"><?= $i ?></a>
                  </li>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                  <li class="page-item">
                    <a class="page-link pagination-link" href="?page=<?= $page + 1 ?>" data-page="<?= $page + 1 ?>" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                <?php endif; ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section>
  </section>

  <!-- Modal untuk menampilkan data laporan -->
  <div class="modal fade" id="laporanModal" tabindex="-1" aria-labelledby="laporanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="laporanModalLabel">Detail Laporan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><strong>Laporan:</strong> <span id="laporanDetail"></span></p>
          <p><strong>Lokasi:</strong> <span id="lokasiDetail"></span></p>
          <p><strong>Gambar:</strong> <img id="gambarDetail" src="" alt="Gambar Laporan" style="max-width: 100%; height: auto;"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../../src/js/laporan.js"></script>
</body>

</html>