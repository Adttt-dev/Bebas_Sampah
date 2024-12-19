<style>
    a{
        text-decoration: none;
        color: white;
    }
</style>

<!-- saran -->
<section id="saran" class="py-3 mb-5">
    <div class="container py-3">
        <div class="table-container container py-4 shadow-lg">
            <h4 class="text-dark fw-bold mb-3">Saran</h4>
            <table class="table table-hover" id="reportTable">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 30%;">Kategori</th>
                        <th style="width: 45%;">Saran</th>
                        <th style="width: 20%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($saran as $s) { ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $s['kategori']; ?></td>
                            <td><?= $s['saran']; ?></td>
                            <td class="report-actions">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $s['id'] ?>">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </button>
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <a href="../component/deleteSaran.php?id=<?= $s['id'] ?>&redirect=../page/saran.php" onclick="return confirm('apakah anda yakin?')">
                                        <i class="bi bi-trash me-1"></i>Delete
                                    </a>
                                </button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal<?= $s['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $s['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel<?= $s['id'] ?>">Perbarui Saran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../component/update_saran.php" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $s['id']; ?>">

                                            <div class="mb-3">
                                                <label for="kategori<?= $s['id'] ?>" class="form-label">Kategori Saran</label>
                                                <select class="form-select" id="kategori<?= $s['id'] ?>" name="kategori" required>
                                                    <option value="Tempat Sampah" <?= ($s['kategori'] == 'Tempat Sampah') ? 'selected' : ''; ?>>Tempat Sampah</option>
                                                    <option value="Edukasi Masyarakat" <?= ($s['kategori'] == 'Edukasi Masyarakat') ? 'selected' : ''; ?>>Edukasi Masyarakat</option>
                                                    <option value="Pengelolaan Sampah" <?= ($s['kategori'] == 'Pengelolaan Sampah') ? 'selected' : ''; ?>>Pengelolaan Sampah</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="saran<?= $s['id'] ?>" class="form-label">Saran Anda</label>
                                                <textarea class="form-control" id="saran<?= $s['id'] ?>" name="saran" rows="4" placeholder="Tulis saran Anda disini..." required><?= htmlspecialchars($s['saran']); ?></textarea>
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