<?php 
include '../../database/conection.php';

$redirect = $_GET['redirect'] ?? '../page/home.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    die("Invalid ID");
}

$data_mhs = query("SELECT * FROM laporan WHERE id = $id")[0];

if (isset($_POST['submit'])) {
    // Update data and handle result
    if(update($_POST) > 0) {
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


<section class="insert py-5 mb-5">
    <div class="container">
        <div class="form-container">
            <h2 class="form-title text-center">Edit</h2>
            <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data_mhs['id']?>">
                <div class="input-group">
                    <input type="text" class="input-with-icon" name="laporan" id="laporan"
                        placeholder="Masukkan judul laporan" required value="<?= $data_mhs['laporan']?>">
                    <i class="fas fa-file-alt"></i>
                </div>

                <div class="input-group">
                    <input type="text" class="input-with-icon" name="lokasi" id="lokasi"
                        placeholder="Masukkan lokasi" required value="<?= $data_mhs['lokasi']?>">
                    <i class="fas fa-map-marker-alt"></i>
                </div>

                <div class="input-group">
                    <input type="text" class="input-with-icon" name="pelapor" id="pelapor"
                        placeholder="Masukkan nama pelapor" required value="<?= $data_mhs['pelapor']?>">
                    <i class="fas fa-user"></i>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" name="submit" class="btn btn-primary w-100 mb-3">
                        <i class="fas fa-edit me-2"></i>Edit Laporan
                    </button>
                    <a href="../page/home.php" class="btn btn-outline-secondary w-100">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>