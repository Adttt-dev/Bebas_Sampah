<?php 
include '../../database/conection.php';

if (isset($_POST['submit'])) {
    // Prepare data for update
    $data = [
        'id' => $_POST['id'],
        'title' => $_POST['title'],
        'url_video' => $_POST['url_video'], // Perbaikan nama field input
        'video_embed' => $_POST['video_embed']
    ];

    // Update data and handle result
    if (updateVideo($data) > 0) {
        echo "<script>
            alert('Data berhasil diubah');
            document.location.href='../page/video.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah');
            document.location.href='../page/video.php';
        </script>";
    }
}
