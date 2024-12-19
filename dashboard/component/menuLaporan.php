<style>
    a {
        text-decoration: none;
        color: white;
    }
</style>

<!-- laporan -->
<section id="laporan" class="py-3">
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
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $l['id'] ?>">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash me-1"></i>
                                    <a href="../component/deletelaporan.php?id=<?= $l['id'] ?>&redirect=../page/laporan.php" onclick="return confirm('apakah anda yakin?')">Delete</a>
                                </button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal<?= $l['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $l['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel<?= $l['id'] ?>">Edit Laporan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../component/update.php" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $l['id'] ?>">

                                            <div class="mb-3">
                                                <label for="laporan<?= $l['id'] ?>" class="form-label">Laporan</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="laporan" id="laporan<?= $l['id'] ?>"
                                                        placeholder="Masukkan judul laporan" required value="<?= $l['laporan'] ?>">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="lokasi<?= $l['id'] ?>" class="form-label">Lokasi</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="lokasi" id="lokasi<?= $l['id'] ?>"
                                                        placeholder="Masukkan lokasi" required value="<?= $l['lokasi'] ?>">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="pelapor<?= $l['id'] ?>" class="form-label">Pelapor</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="pelapor" id="pelapor<?= $l['id'] ?>"
                                                        placeholder="Masukkan nama pelapor" required value="<?= $l['pelapor'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>