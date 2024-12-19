<?php 
include '../../database/conection.php';

if (isset($_POST['submit'])) {
    // Update data and handle result
    if(updateSaran($_POST) > 0) {
        echo "<script>
            alert('Data berhasil diubah');
            document.location.href='../page/saran.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah');
            document.location.href='../page/saran.php';
        </script>";
    }
}
?>