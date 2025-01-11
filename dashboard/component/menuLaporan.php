<?php
// Pagination setup
$rows_per_page = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $rows_per_page;

// Get total number of rows for pagination
$total_rows_query = "SELECT COUNT(*) as count FROM laporan";
$total_rows_result = query($total_rows_query);
$total_rows = $total_rows_result[0]['count'];
$total_pages = ceil($total_rows / $rows_per_page);

// Get paginated data
if (!isset($laporan[0]['username'])) {
    $query = "
        SELECT laporan.id, laporan.laporan, laporan.lokasi, laporan.gambar, laporan.tanggal, users.username
    FROM laporan
    INNER JOIN users ON laporan.user_id = users.id
    ORDER BY laporan.tanggal DESC
        LIMIT $rows_per_page OFFSET $offset";
    $laporan = query($query);
}
?>

<style>
    a {
        text-decoration: none;
        color: white;
    }

    .pagination .page-link {
        color: #0d6efd;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    .pagination .page-item.active .page-link {
        color: #fff;
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
</style>

<!-- laporan -->
<section id="laporan">
    <div class="container">
        <div class="table-container container py-4 shadow-lg">
            <h4 class="text-dark fw-bold mb-3">Laporan</h4>
            <table class="table table-hover" id="reportTable">
                <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 10%">Username</th>
                        <th style="width: 30%">Laporan</th>
                        <th style="width: 15%">Lokasi</th>
                        <th style="width: 5%">Gambar</th>
                        <th style="width: 22%">Tanggal</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $offset + 1; ?>
                    <?php foreach ($laporan as $l) { ?>
                        <tr data-id="<?= $l['id'] ?>"
                            data-username="<?= htmlspecialchars($l['username']) ?>"
                            data-laporan="<?= htmlspecialchars($l['laporan']) ?>"
                            data-lokasi="<?= htmlspecialchars($l['lokasi']) ?>"
                            data-tanggal="<?= htmlspecialchars(date('d M Y, H:i', strtotime($l['tanggal']))) ?>"
                            data-gambar="<?= '../../database/img/' . htmlspecialchars($l['gambar']) ?>">
                            <td><?= $i; ?></td>
                            <td><?= htmlspecialchars($l['username']); ?></td>
                            <td><?= htmlspecialchars($l['laporan']); ?></td>
                            <td><?= htmlspecialchars($l['lokasi']); ?></td>
                            <td>
                                <img src="../../database/img/<?= htmlspecialchars($l['gambar']); ?>" alt="Gambar Laporan" style="object-fit: cover; width:50px; height:50px; ">
                            </td>
                            <td><?php
                                if ($l['tanggal']) {
                                    echo htmlspecialchars(date('d M Y, H:i', strtotime($l['tanggal'])));
                                } else {
                                    echo 'Tanggal tidak tersedia';
                                }
                                ?></td>
                            <td class="report-actions">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $l['id'] ?>">
                                    <i class="bi bi-pencil me-1"></i>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <a href="../component/deletelaporan.php?id=<?= $l['id'] ?>&redirect=../page/laporan.php"
                                        onclick="return confirm('Apakah Anda yakin?')"
                                        style="text-decoration: none; color: white;">
                                        <i class="bi bi-trash me-1"></i>
                                    </a>
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
                                                <label for="gambar<?= $l['id'] ?>" class="form-label">Gambar</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="gambar" id="gambar<?= $l['id'] ?>"
                                                        placeholder="Masukkan nama gambar" required value="<?= $l['gambar'] ?>">
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

            <!-- Pagination Navigation -->
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <?php if ($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</section>

<!-- Detail Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportModalLabel">Detail Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Username:</strong> <span id="modalUsername"></span></p>
                        <p><strong>Laporan:</strong> <span id="modalLaporan"></span></p>
                        <p><strong>Lokasi:</strong> <span id="modalLokasi"></span></p>
                        <p><strong>Tanggal:</strong> <span id="modalTanggal"></span></p>
                    </div>
                    <div class="col-md-6">
                        <img id="modalGambar" src="" alt="Gambar Laporan" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Event listener for clicks on report rows to show the detail modal
    document.querySelectorAll('#reportTable tbody tr').forEach(row => {
        row.addEventListener('click', function(event) {
            // Prevent the detail modal from opening if the Edit or Delete button is clicked
            if (event.target.closest('.btn-warning') || event.target.closest('.btn-danger')) {
                return;
            }

            // Get data from row attributes
            const username = this.getAttribute('data-username');
            const laporan = this.getAttribute('data-laporan');
            const lokasi = this.getAttribute('data-lokasi');
            const tanggal = this.getAttribute('data-tanggal');
            const gambar = this.getAttribute('data-gambar');

            // Fill in the Detail Modal
            document.getElementById('modalUsername').textContent = username;
            document.getElementById('modalLaporan').textContent = laporan;
            document.getElementById('modalLokasi').textContent = lokasi;
            document.getElementById('modalTanggal').textContent = tanggal;
            document.getElementById('modalGambar').src = gambar;

            // Show the Detail Modal
            const reportModal = new bootstrap.Modal(document.getElementById('reportModal'));
            reportModal.show();
        });
    });

    // Prevent the delete button from triggering the detail modal
    document.querySelectorAll('.btn-danger a').forEach(deleteBtn => {
        deleteBtn.addEventListener('click', function(event) {
            event.stopPropagation();
        });
    });

    // Add page parameter to delete links
    document.querySelectorAll('.btn-danger a').forEach(link => {
        const currentUrl = new URL(link.href);
        currentUrl.searchParams.append('page', <?= $page ?>);
        link.href = currentUrl.toString();
    });
</script>