<?php
// Pagination setup
$rows_per_page = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $rows_per_page;

// Get total number of rows for pagination
$total_rows_query = "SELECT COUNT(*) as count FROM saran";
$total_rows_result = query($total_rows_query);
$total_rows = $total_rows_result[0]['count'];
$total_pages = ceil($total_rows / $rows_per_page);

// Get paginated data
$saran = query("
    SELECT saran.id, 
           COALESCE(users.username, 'Anonymous') AS username, 
           saran.kategori, 
           saran.saran, 
           saran.tanggal_pengajuan 
    FROM saran
    LEFT JOIN users ON saran.user_id = users.id
    ORDER BY saran.tanggal_pengajuan DESC
    LIMIT $rows_per_page OFFSET $offset
");
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

    html {
        scroll-behavior: smooth;
    }
</style>

<!-- saran -->
<section id="saran" class="py-3 mb-5">
    <div class="container py-3">
        <div id="tableContainer" class="table-container container py-4 shadow-lg">
            <h4 class="text-dark fw-bold mb-3">Saran</h4>
            <table class="table table-hover" id="reportTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Kategori</th>
                        <th>Saran</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = $offset + 1; ?>
                    <?php foreach ($saran as $s) { ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= htmlspecialchars($s['username']); ?></td>
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
                                    <a href="../component/deleteSaran.php?id=<?= $s['id'] ?>&redirect=../page/saran.php&page=<?= $page ?>#tableContainer" 
                                       onclick="return confirm('Apakah Anda yakin?')">
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

            <!-- Pagination Navigation -->
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <?php if($page > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page-1 ?>#tableContainer" aria-label="Previous">
                                Previous
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i ?>#tableContainer"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>

                    <?php if($page < $total_pages): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?= $page+1 ?>#tableContainer" aria-label="Next">
                                Next
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</section>

<script>
// Check if there's a hash in the URL and scroll to it smoothly
if(window.location.hash) {
    const element = document.querySelector(window.location.hash);
    if(element) {
        // Wait for any dynamic content to load
        setTimeout(() => {
            element.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }, 100);
    }
}
</script>
