<?php

include '../../database/conection.php';
$laporan = query('SELECT * FROM laporan');

?>

<style>
    a {
        text-decoration: none;
        color: white;
    }
</style>

<!-- laporan -->
<section id="laporan" class="py-3 mb-5">
    <!-- <h1 class="fw-bold text-center pt-4">Lorem ipsum dolor sit amet consectetur!</h1> -->
    <div class="container py-3">
        <div class="table-container container py-4 shadow-lg">
            <h4 class="text-dark fw-bold mb-3">Laporan</h4>
            <table class="table table-hover" id="reportTable">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 35%;">Laporan</th>
                        <th style="width: 20%;">Lokasi</th>
                        <th style="width: 20%;">Pelapor</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($laporan as $l) { ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $l['laporan']; ?></td>
                            <td><?= $l['lokasi']; ?></td>
                            <td><?= $l['pelapor']; ?></td>
                            <td class="report-actions">
                                <button class="btn btn-warning btn-sm">
                                    <a href="../page/update.php?id=<?= $l['id'] ?>&redirect=../page/laporan.php"><i class="bi bi-pencil me-1"></i>Edit</a>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash me-1"></i>
                                    <a href="../component/deleteLaporan.php?id=<?= $l['id'] ?>&redirect=../page/laporan.php" onclick="return confirm('apakah anda yakin?')">Delete</a>
                                </button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>