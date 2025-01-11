<!-- Modal Edit -->
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