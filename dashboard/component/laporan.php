<?php 
include '../../database/conection.php';

$query = "
    SELECT laporan.id, laporan.laporan, laporan.lokasi, laporan.gambar, laporan.tanggal, users.username
    FROM laporan
    INNER JOIN users ON laporan.user_id = users.id
    ORDER BY laporan.tanggal DESC
";

$laporan = query($query);
?>

<style>
    a {
        text-decoration: none;
        color: white;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 15px;
    }

    .pagination a {
        margin: 0 5px;
        padding: 5px 10px;
        border: 1px solid #ccc;
        color: #000;
        text-decoration: none;
        border-radius: 5px;
    }

    .pagination a.active {
        background-color: #007bff;
        color: white;
    }

    .pagination a:hover {
        background-color: #ddd;
    }
</style>

<!-- laporan -->
<section id="laporan" class="py-3 mb-5">
    <div class="container py-3">
        <div class="table-container container py-4 shadow-lg">
            <h4 class="text-dark fw-bold mb-3">Laporan</h4>
            <input type="text" id="searchInput" class="form-control mb-3" placeholder="Cari data...">
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
                <tbody id="tableBody">
                    <?php $i = 1; ?>
                    <?php foreach ($laporan as $l) { ?>
                        <tr data-id="<?= $l['id'] ?>" 
                            data-username="<?= htmlspecialchars($l['username']) ?>"
                            data-laporan="<?= htmlspecialchars($l['laporan']) ?>" 
                            data-lokasi="<?= htmlspecialchars($l['lokasi']) ?>"
                            data-tanggal="<?= htmlspecialchars(date('d M Y, H:i', strtotime($l['tanggal']))) ?>"
                            data-gambar="<?= '../../database/img/' . htmlspecialchars($l['gambar']) ?>"
                            onclick="showReportDetail(this)">
                            <td><?= $i; ?></td>
                            <td><?= htmlspecialchars($l['username']); ?></td>
                            <td><?= htmlspecialchars($l['laporan']); ?></td>
                            <td><?= htmlspecialchars($l['lokasi']); ?></td>
                            <td>
                                <img src="../../database/img/<?= htmlspecialchars($l['gambar']); ?>" alt="Gambar Laporan" style="object-fit: cover; width:50px; height:50px;">
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
                                    <a href="../component/deletelaporan.php?id=<?= $l['id'] ?>&redirect=../page/laporan.php" onclick="return confirm('Apakah Anda yakin?')" style="text-decoration: none; color: white;">
                                        <i class="bi bi-trash me-1"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="pagination" id="pagination"></div>
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
    // Function to display report details in modal
    function showReportDetail(row) {
        const username = row.getAttribute('data-username');
        const laporan = row.getAttribute('data-laporan');
        const lokasi = row.getAttribute('data-lokasi');
        const tanggal = row.getAttribute('data-tanggal');
        const gambar = row.getAttribute('data-gambar');

        document.getElementById('modalUsername').textContent = username;
        document.getElementById('modalLaporan').textContent = laporan;
        document.getElementById('modalLokasi').textContent = lokasi;
        document.getElementById('modalTanggal').textContent = tanggal;
        document.getElementById('modalGambar').src = gambar;

        const modal = new bootstrap.Modal(document.getElementById('reportModal'));
        modal.show();
    }

    // Search Realtime
    document.getElementById('searchInput').addEventListener('keyup', function () {
        const searchText = this.value.toLowerCase();
        const tableRows = document.querySelectorAll('#tableBody tr');

        tableRows.forEach(row => {
            const cells = row.querySelectorAll('td');
            let match = false;

            cells.forEach(cell => {
                if (cell.textContent.toLowerCase().includes(searchText)) {
                    match = true;
                }
            });

            row.style.display = match ? '' : 'none';
        });
    });

    // Pagination
    const rowsPerPage = 10;
    const tableBody = document.getElementById('tableBody');
    const rows = tableBody.querySelectorAll('tr');
    const totalPages = Math.ceil(rows.length / rowsPerPage);
    const pagination = document.getElementById('pagination');

    function showPage(page) {
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        rows.forEach((row, index) => {
            row.style.display = index >= start && index < end ? '' : 'none';
        });

        pagination.innerHTML = '';

        for (let i = 1; i <= totalPages; i++) {
            const pageLink = document.createElement('a');
            pageLink.textContent = i;
            pageLink.href = '#';
            pageLink.className = page === i ? 'active' : '';

            pageLink.addEventListener('click', function (e) {
                e.preventDefault();
                showPage(i);
            });

            pagination.appendChild(pageLink);
        }
    }

    showPage(1);
</script>
