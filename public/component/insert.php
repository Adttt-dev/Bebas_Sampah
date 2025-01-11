<?php
session_start();
require '../../database/conection.php'; // Pastikan koneksi database sudah benar

// Cek apakah pengguna sudah login
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: ../page/login.php");
    exit;
}

// Ambil id dari sesi pengguna yang login
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];  // Menggunakan id pengguna yang sudah disimpan di session
} else {
    echo "User tidak terautentikasi!";
    exit;
}

// Cek apakah tombol submit sudah diklik
if (isset($_POST['submit'])) {
    $laporan = mysqli_real_escape_string($conection, $_POST['laporan']);
    $lokasi = mysqli_real_escape_string($conection, $_POST['lokasi']);
    
    // Proses upload gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_path = '../../database/img/'; // Folder tujuan

    // Cek jika folder uploads ada
    if (!file_exists($gambar_path)) {
        mkdir($gambar_path, 0777, true); // Membuat folder uploads jika belum ada
    }

    // Cek apakah file gambar berhasil diupload
    if ($gambar_tmp) {
        // Dapatkan ekstensi file gambar
        $ekstensiGambar = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

        // Generate nama file unik dengan menambahkan timestamp
        $gambarBaru = uniqid('gambar_' . time() . '_', true) . '.' . $ekstensiGambar;

        // Cek apakah yang diupload adalah gambar
        if (in_array($ekstensiGambar, ['jpg', 'jpeg', 'png'])) {
            // Pindahkan gambar ke folder tujuan dengan nama file unik
            if (move_uploaded_file($gambar_tmp, $gambar_path . $gambarBaru)) {
                // Query untuk memasukkan data laporan ke database
                $query = "INSERT INTO laporan (laporan, lokasi, gambar, user_id) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_prepare($conection, $query);
                mysqli_stmt_bind_param($stmt, "sssi", $laporan, $lokasi, $gambarBaru, $user_id);

                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>
                            alert('Laporan berhasil ditambahkan');
                            document.location.href='../page/laporan.php';
                          </script>";
                } else {
                    echo "<script>
                            alert('Laporan gagal ditambahkan');
                          </script>";
                }
            } else {
                echo "<script>
                        alert('Gagal mengunggah gambar');
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Ekstensi file gambar tidak valid. Harus JPG, JPEG, atau PNG');
                  </script>";
        }
    } else {
        echo "<script>
                alert('Gagal mengunggah gambar, file tidak ditemukan');
              </script>";
    }
}
?>

<link rel="stylesheet" href="../../src/css/tambah.css">

<section class="insert">
    <div class="container">

        <div class="form-container">
            <h2 class="form-title text-center">Form Tambah Laporan</h2>
            <p class="form-description">Laporan Anda sangat penting bagi kami untuk meningkatkan pelayanan dan memantau kondisi di lapangan.
                Dengan melaporkan, Anda membantu kami menciptakan lingkungan yang lebih baik dan aman.</p>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="text" class="input-with-icon" name="laporan" id="laporan"
                        placeholder="Masukkan judul laporan" required>
                    <i class="fas fa-file-alt"></i>
                </div>

                <div class="input-group">
                    <input type="text" class="input-with-icon" name="lokasi" id="lokasi"
                        placeholder="Masukkan lokasi" required>
                    <i class="fas fa-map-marker-alt"></i>
                </div>

                <div class="input-group">
                    <label for="">Bukti Pendukung</label>
                    <input type="file" class="input-with-icon" name="gambar" id="gambar" required>
                    <i class="fas fa-user"></i>
                </div>

                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary w-100 mb-3">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Laporan
                    </button>
                    <a href="../page/laporan.php" class="btn btn-outline-secondary w-100">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
