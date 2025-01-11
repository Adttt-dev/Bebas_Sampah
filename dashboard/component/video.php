<?php
include '../../database/conection.php';
$video = query('SELECT * FROM edukasi_yt');
?>

<style>
    a {
        text-decoration: none;
        color: white;
    }

    .truncate {
        max-width: 150px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<!-- Edukasi YouTube -->
<section id="edukasi_yt" class="py-3 mb-5">
    <div class="container py-3">
        <div class="table-container container py-4 shadow-lg">
            <h4 class="text-dark fw-bold mb-3 d-flex justify-content-between align-items-center">
                Edukasi YouTube
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="bi bi-plus-circle me-1"></i>Tambah
                </button>
            </h4>
            <table class="table table-hover" id="reportTable">
                <thead>
                    <tr>
                        <th style="width: 1%;">No</th>
                        <th style="width: 20%;">Title</th>
                        <th style="width: 15%;">URL Video</th>
                        <th style="width: 10%;">Video Embed</th>
                        <th style="width: 30%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($video as $s) { ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td class="truncate"><?= htmlspecialchars($s['title']); ?></td>
                            <td class="truncate"><a href="<?= $s['url_video']; ?>" target="_blank"><?= $s['url_video']; ?></a></td>
                            <td>
                                <iframe src="<?= htmlspecialchars($s['video_embed']); ?>" style="width:100px; height:56px;" allowfullscreen></iframe>
                            </td>
                            <td class="report-actions">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $s['id'] ?>">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $s['id'] ?>">
                                    <i class="bi bi-trash me-1"></i>Delete
                                </button>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal<?= $s['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $s['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel<?= $s['id'] ?>">Edit Edukasi YouTube</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../component/update_video.php" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="id" value="<?= $s['id']; ?>">

                                            <div class="mb-3">
                                                <label for="title<?= $s['id'] ?>" class="form-label">Judul</label>
                                                <input type="text" class="form-control" id="title<?= $s['id'] ?>" name="title"
                                                    value="<?= htmlspecialchars($s['title']); ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="url_video<?= $s['id'] ?>" class="form-label">URL Video</label>
                                                <input type="url" class="form-control" id="url_video<?= $s['id'] ?>" name="url_video"
                                                    value="<?= htmlspecialchars($s['url_video']); ?>" required>
                                            </div>


                                            <div class="mb-3">
                                                <label for="video_embed<?= $s['id'] ?>" class="form-label">Video Embed</label>
                                                <textarea class="form-control" id="video_embed<?= $s['id'] ?>" name="video_embed" rows="3" required><?= htmlspecialchars($s['video_embed']); ?></textarea>
                                                <small class="form-text text-muted">Masukkan kode embed YouTube</small>
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

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal<?= $s['id'] ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Konfirmasi Penghapusan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ingin menghapus video ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <a href="../component/deleteVideo.php?id=<?= $s['id'] ?>&redirect=../page/video.php" class="btn btn-danger">Hapus</a>
                                    </div>
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

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Edukasi YouTube</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../component/tambah_video.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="url_video" class="form-label">URL Video</label>
                        <input type="url" class="form-control" id="url_video" name="url_video" placeholder="Masukkan URL Video" required>
                    </div>
                    <div class="mb-3">
                        <label for="video_embed" class="form-label">Video Embed</label>
                        <textarea class="form-control" id="video_embed" name="video_embed" rows="3" placeholder="Masukkan kode embed YouTube" required></textarea>
                        <small class="form-text text-muted">Masukkan kode embed YouTube</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // AJAX for adding video
    $(document).on('submit', 'form[action="../component/tambah_video.php"]', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#addModal').modal('hide');
                location.reload(); // Refresh page
            },
            error: function() {
                alert('Terjadi kesalahan!');
            }
        });
    });
</script>
