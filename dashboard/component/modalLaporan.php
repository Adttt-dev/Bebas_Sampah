<!-- Modal Laporan Detail -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-3 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="reportModalLabel">Detail Laporan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong class="text-primary">Username:</strong>
                            <p id="modalUsername" class="ms-2"></p>
                        </div>
                        <div class="mb-3">
                            <strong class="text-primary">Laporan:</strong>
                            <p id="modalLaporan" class="ms-2"></p>
                        </div>
                        <div class="mb-3">
                            <strong class="text-primary">Lokasi:</strong>
                            <p id="modalLokasi" class="ms-2"></p>
                        </div>
                        <div class="mb-3">
                            <strong class="text-primary">Tanggal:</strong>
                            <p id="modalTanggal" class="ms-2"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <strong class="text-primary">Gambar:</strong>
                            <div class="mt-2 position-relative">
                                <img id="modalGambar" src="" alt="Gambar Laporan" 
                                     class="img-fluid rounded shadow-sm" 
                                     style="max-width: 100%; height: auto; cursor: pointer"
                                     onclick="openFullImage(this.src)">
                                <div class="position-absolute top-0 end-0 p-2">
                                    <button class="btn btn-sm btn-primary" onclick="openFullImage(document.getElementById('modalGambar').src)">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Laporan -->
<?php foreach ($laporan as $l) { ?>
    <div class="modal fade" id="editModal<?= $l['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $l['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editModalLabel<?= $l['id'] ?>">Edit Laporan</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../component/update.php" method="post" enctype="multipart/form-data" id="editForm<?= $l['id'] ?>" onsubmit="return validateForm(<?= $l['id'] ?>)">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $l['id'] ?>">

                        <div class="mb-3">
                            <label for="laporan<?= $l['id'] ?>" class="form-label text-primary">Laporan</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                <input type="text" class="form-control" name="laporan" id="laporan<?= $l['id'] ?>"
                                    placeholder="Masukkan judul laporan" required value="<?= htmlspecialchars($l['laporan']) ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="lokasi<?= $l['id'] ?>" class="form-label text-primary">Lokasi</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                <input type="text" class="form-control" name="lokasi" id="lokasi<?= $l['id'] ?>"
                                    placeholder="Masukkan lokasi" required value="<?= htmlspecialchars($l['lokasi']) ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="gambar<?= $l['id'] ?>" class="form-label text-primary">Gambar</label>
                            <div class="input-group">
                                <input type="file" class="form-control" name="gambar" id="gambar<?= $l['id'] ?>" 
                                       accept="image/*" onchange="previewImage(this, <?= $l['id'] ?>)">
                            </div>
                            <div class="mt-2">
                                <p class="text-muted small">Gambar saat ini:</p>
                                <img src="../../database/img/<?= htmlspecialchars($l['gambar']) ?>" 
                                     id="imagePreview<?= $l['id'] ?>" 
                                     alt="Preview" 
                                     class="img-thumbnail" 
                                     style="max-width: 150px; cursor: pointer"
                                     onclick="openFullImage(this.src)">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Full Image Modal -->
<div class="modal fade" id="fullImageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-header border-0">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="fullImage" src="" alt="Full Image" class="img-fluid">
            </div>
        </div>
    </div>
</div>