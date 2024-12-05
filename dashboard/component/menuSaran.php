<style>
    a{
        text-decoration: none;
        color: white;
    }
</style>

<!-- saran -->
<section id="saran" class="mb-5">
    <!-- <h1 class="fw-bold text-center pt-4">Lorem ipsum dolor sit amet consectetur!</h1> -->
    <div class="container py-3">
        <div class="table-container container py-4 shadow-lg">
            <h4 class="text-dark fw-bold mb-3">saran</h4>
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
                                <button class="btn btn-warning btn-sm">
                                    <a href="../page/update_saran.php?id=<?= $s['id'] ?>" class="text-dark"><i class="bi bi-pencil me-1"></i>Edit</a>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash me-1"></i>
                                    <a href="../component/deleteSaran.php?id=<?= $s['id'] ?>" onclick="return confirm('Apakah Anda yakin?')">Delete</a>
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