<?php 
include '../../database/conection.php';

// Pastikan data ada
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id = $_POST['id'];
    $laporan = mysqli_real_escape_string($conection, $_POST['laporan']);
    $lokasi = mysqli_real_escape_string($conection, $_POST['lokasi']);
    $gambar = $_FILES['gambar']['name'];

    // periksa kesalahan sql
    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }


    // Cek apakah gambar baru diupload
    if ($gambar) {
        // Proses upload gambar
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $gambar_path = '../../database/img/' . $gambar;

        // Cek jika folder img ada, jika tidak buat folder
        if (!file_exists('../../database/img/')) {
            mkdir('../../database/img/', 0777, true);
        }

        if (move_uploaded_file($gambar_tmp, $gambar_path)) {
            // Query update data laporan di database
            $query = "UPDATE laporan SET laporan = ?, lokasi = ?, gambar = ? WHERE id = ?";
            $stmt = mysqli_prepare($conection, $query);
            mysqli_stmt_bind_param($stmt, "sssi", $laporan, $lokasi, $gambar, $id);

            if (mysqli_stmt_execute($stmt)) {
                echo "<script>
                    alert('Data berhasil diubah');
                    document.location.href='../page/laporan.php';
                </script>";
            } else {
                echo "<script>
                    alert('Data gagal diubah');
                    document.location.href='../page/laporan.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Gagal mengunggah gambar');
                document.location.href='../page/laporan.php';
            </script>";
        }
    } else {
        // Jika gambar tidak diupload, cukup update laporan dan lokasi saja
        $query = "UPDATE laporan SET laporan = ?, lokasi = ? WHERE id = ?";
        $stmt = mysqli_prepare($conection, $query);
        mysqli_stmt_bind_param($stmt, "ssi", $laporan, $lokasi, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                alert('Data berhasil diubah');
                document.location.href='../page/laporan.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal diubah');
                document.location.href='../page/laporan.php';
            </script>";
        }
    }
}
?>
