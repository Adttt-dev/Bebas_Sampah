<?php 
include '../../database/conection.php';

if (isset($_POST['submit'])) {
    // Update data and handle result
    if(update($_POST) > 0) {
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
?>