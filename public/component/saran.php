<?php
// Mulai sesi
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Koneksi ke database
include '../../database/conection.php';

// Cek apakah user sudah login
if (!isset($_SESSION['login'])) {
    $login_required = true; // Menandakan bahwa user harus login
} else {
    $login_required = false; // User sudah login
}

// Variabel untuk status pengiriman saran
$status_message = '';

// Jika tombol submit ditekan
if (isset($_POST['submit'])) {
    if ($login_required) {
        $status_message = 'login'; // Status untuk login diperlukan
    } else {
        if (tambahSaran($_POST) > 0) {
            $status_message = 'success'; // Saran berhasil ditambahkan
        } else {
            $status_message = 'error'; // Saran gagal ditambahkan
        }
    }
}
?>

<link rel="stylesheet" href="../../src/css/main.css">
<!-- halaman atas untuk Saran -->
<section class="saran-menu py-5">
  <div class="container px-4 container-atas">
    <div class="row">
      <div class="col-lg-6 text-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
        <div class="px-4 py-5">
          <!-- Ganti Ikon dengan GIF -->
          <img src="../../src/img/g.gif" alt="Saran GIF" class="img-fluid" style="max-width: 300px;" />
        </div>
      </div>
      <div class="col-lg-6 align-self-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
        <div class="judul">
          <h1 class="fw-bold">Ajukan Saran Anda</h1>
        </div>
        <p class="py-2">Kami mendengarkan setiap saran untuk meningkatkan kebersihan dan pengelolaan sampah di lingkungan sekitar. Berikan ide atau masukan Anda untuk menciptakan lingkungan yang lebih bersih.</p>
        <a href="#saran" class="btn tambah text-white">+ Kirim Saran</a>
      </div>
    </div>
  </div>
</section>

<!-- Form Tambah Saran -->
<section id="saran" class="form-section py-5 mb-5">
  <div class="container py-5 bg-white shadow-lg rounded">
    <h2 class="text-center mb-4 fw-bold" style="font-family: 'Poppins', sans-serif; color: #333;">Form Tambah Saran</h2>
    <form action="" method="post" id="suggestionForm">
      <div class="mb-3">
        <label for="kategori" class="form-label" style="font-size: 1.1rem; font-weight: 500;">Kategori Saran</label>
        <select class="form-select" id="kategori" name="kategori" required style="border: 2px solid #4CAF50; border-radius: 8px;">
          <option value="" disabled selected>Pilih Kategori</option>
          <option value="Tempat Sampah">Tempat Sampah</option>
          <option value="Edukasi Masyarakat">Edukasi Masyarakat</option>
          <option value="Pengelolaan Sampah">Pengelolaan Sampah</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="saran" class="form-label" style="font-size: 1.1rem; font-weight: 500;">Saran Anda</label>
        <textarea class="form-control" id="saran" name="saran" rows="4" placeholder="Tulis saran Anda disini..." required style="border: 2px solid #4CAF50; border-radius: 8px;"></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-primary w-100 mb-3">
        <i class="fas fa-paper-plane me-2"></i>Kirim Saran
      </button>
    </form>
  </div>
</section>

<!-- Menambahkan SweetAlert untuk notifikasi -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Menambahkan event listener untuk form submit
  document.getElementById('suggestionForm').addEventListener('submit', function(event) {
    <?php if ($login_required): ?>
      // Jika tidak login, tampilkan popup peringatan
      event.preventDefault(); // Menghentikan form submit
      Swal.fire({
        icon: 'warning',
        title: 'Harap Login Terlebih Dahulu',
        text: 'Anda harus login untuk dapat mengirim saran.',
        confirmButtonText: 'Login Sekarang',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '../../dashboard/index.php'; // Ganti dengan path halaman login Anda
        }
      });
    <?php endif; ?>
  });

  // Cek status pengiriman saran setelah halaman dimuat
  window.onload = function() {
    <?php if ($status_message == 'login'): ?>
      Swal.fire({
        icon: 'warning',
        title: 'Harap Login Terlebih Dahulu',
        text: 'Anda harus login untuk mengirimkan saran.',
        confirmButtonText: 'Login Sekarang',
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '../../dashboard/index.php'; // Ganti dengan path halaman login Anda
        }
      });
    <?php elseif ($status_message == 'success'): ?>
      Swal.fire({
        icon: 'success',
        title: 'Saran berhasil ditambahkan!',
        text: 'Terima kasih atas saran Anda.',
        confirmButtonText: 'OK',
      }).then(() => {
        document.location.href = 'saran.php'; // Arahkan kembali ke halaman saran
      });
    <?php elseif ($status_message == 'error'): ?>
      Swal.fire({
        icon: 'error',
        title: 'Saran gagal ditambahkan!',
        text: 'Terjadi kesalahan saat menambahkan saran.',
        confirmButtonText: 'OK',
      });
    <?php endif; ?>
  }
</script>
