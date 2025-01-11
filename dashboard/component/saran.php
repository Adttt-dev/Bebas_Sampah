<?php
include '../../database/conection.php';

$saran = query('
    SELECT saran.id, 
           COALESCE(users.username, "Anonymous") AS username, 
           saran.kategori, 
           saran.saran, 
           saran.tanggal_pengajuan 
    FROM saran
    LEFT JOIN users ON saran.user_id = users.id
    ORDER BY saran.tanggal_pengajuan DESC
');
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

<!-- saran -->
<section id="saran" class="py-3 mb-5">
    <div class="container py-3">
        <div class="table-container container py-4 shadow-lg">
            <h4 class="text-dark fw-bold mb-3">Saran</h4>
            <input type="text" id="searchInput" class="form-control mb-3" placeholder="Cari data...">
            <table class="table table-hover" id="reportTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th> <!-- Username akan ditampilkan disini -->
                        <th>Kategori</th>
                        <th>Saran</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php $i = 1; ?>
                    <?php foreach ($saran as $s) { ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= htmlspecialchars($s['username']); ?></td> <!-- Menampilkan username -->
                            <td><?= htmlspecialchars($s['kategori']); ?></td>
                            <td><?= htmlspecialchars($s['saran']); ?></td>
                            <td><?php
                                if ($s['tanggal_pengajuan']) {
                                    echo htmlspecialchars(date('d M Y, H:i', strtotime($s['tanggal_pengajuan'])));
                                } else {
                                    echo 'Tanggal tidak tersedia';
                                }
                                ?>
                            </td>
                            <td class="report-actions">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $s['id'] ?>">
                                    <i class="bi bi-pencil me-1"></i>
                                </button>
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <a href="../component/deleteSaran.php?id=<?= $s['id'] ?>&redirect=../page/saran.php" onclick="return confirm('Apakah Anda yakin?')">
                                        <i class="bi bi-trash me-1"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                        <?php include 'modalSaran.php'; ?>
                        <?php $i++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="pagination" id="pagination"></div>
        </div>
    </div>
</section>

<script>
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
