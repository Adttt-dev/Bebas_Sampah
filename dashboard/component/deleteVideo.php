<?php
include '../../database/conection.php';

// Get the ID and redirect path
$id = $_GET['id'] ?? null;
$redirect = $_GET['redirect'] ?? '../page/video.php';

if ($id) {
    // Assuming you have a deleteEdukasiYt function in your conection.php
    if (deleteVideo($id) > 0) {
        echo "<script>
            alert('Data berhasil dihapus');
            document.location.href='" . htmlspecialchars($redirect) . "';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus');
            document.location.href='" . htmlspecialchars($redirect) . "';
        </script>";
    }
} else {
    echo "<script>
        alert('ID tidak valid');
        document.location.href='" . htmlspecialchars($redirect) . "';
    </script>";
}
?>