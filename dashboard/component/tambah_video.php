<?php 
include '../../database/conection.php';

if (isset($_POST['submit'])) {
    if (tambahVideo($_POST) > 0) {
        echo "<script>
            alert('Data berhasil ditambahkan');
            document.location.href='../page/video.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan');
            document.location.href='../page/video.php';
        </script>";
    }
}
?>