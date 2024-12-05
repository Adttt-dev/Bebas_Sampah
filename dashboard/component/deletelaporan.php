<?php 
include '../../database/conection.php';

$id = $_GET['id'];
$redirect = $_GET['redirect'] ?? '../page/home.php';

if(deleteLaporan($id) > 0) {
    echo "<script>
            alert('Laporan berhasil dihapus');
            document.location.href='" . htmlspecialchars($redirect) . "';
        </script>";
}else{
    echo "<script>
            alert('Laporan gagal dihapus');
            document.location.href='" . htmlspecialchars($redirect) . "';
        </script>";
}
?>