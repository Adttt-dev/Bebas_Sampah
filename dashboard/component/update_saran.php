

<?php
include '../../database/conection.php';

// Get redirect parameter or default to home.php
$redirect = $_GET['redirect'] ?? '../page/home.php';

// Validate and sanitize ID
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    die("Invalid ID");
}

// Query data saran based on ID
$saran = query("SELECT * FROM saran WHERE id = $id")[0];

// Check if form is submitted
if (isset($_POST['submit'])) {
    // Update saran and handle result
    if (updateSaran($_POST) > 0) {
        echo "<script>
            alert('Data berhasil diubah');
            document.location.href='" . htmlspecialchars($redirect) . "';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah');
            document.location.href='" . htmlspecialchars($redirect) . "';
        </script>";
    }
}
?>

<!-- Update Suggestion Section -->
<section class="form-section py-5 mb-5">
    <div class="container py-5 bg-white shadow-lg rounded">
        <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #333; font-weight: bold;">Formulir Perbarui Saran</h2>
        <form action="" method="post">
            <!-- Hidden input for ID to identify which suggestion to update -->
            <input type="hidden" name="id" value="<?= $saran['id']; ?>">

            <div class="input-group mb-3">
                <label for="kategori" class="form-label">Kategori Saran</label>
                <select class="form-select" id="kategori" name="kategori" required>
                    <option value="Tempat Sampah" <?= ($saran['kategori'] == 'Tempat Sampah') ? 'selected' : ''; ?>>Tempat Sampah</option>
                    <option value="Edukasi Masyarakat" <?= ($saran['kategori'] == 'Edukasi Masyarakat') ? 'selected' : ''; ?>>Edukasi Masyarakat</option>
                    <option value="Pengelolaan Sampah" <?= ($saran['kategori'] == 'Pengelolaan Sampah') ? 'selected' : ''; ?>>Pengelolaan Sampah</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <label for="saran" class="form-label">Saran Anda</label>
                <textarea class="form-control" id="saran" name="saran" rows="4" placeholder="Tulis saran Anda disini..." required><?= htmlspecialchars($saran['saran']); ?></textarea>
            </div>

            <div class="d-flex justify-content-between">
                <!-- Update Button -->
                <button type="submit" name="submit" class="btn btn-primary w-48">
                    <i class="fas fa-edit me-2"></i>Perbarui Saran
                </button>
                <!-- Back Button -->
                <a href="../page/home.php" class="btn btn-outline-secondary w-48">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </form>
    </div>
</section>
