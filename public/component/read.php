<?php

include '../../database/conection.php';

$laporan = query("SELECT * FROM laporan");

?>



<!-- halaman atas -->
<section class="lapor-menu py-5 ">
  <div class="container px-4 container-atas">
    <div class="row">
      <div
        class="col-lg-6 align-self-center"
        data-aos="fade-up"
        data-aos-anchor-placement="center-bottom"
        data-aos-duration="1500">
        <div class="judul">
          <h1 class="fw-bold">Pembuangan Sampah Ilegal</h1>
        </div>
        <p class="py-2">Adalah laporan pembuangan sampah yang dibuang secara ilegal atau tercecer di luar fasilitas pewadahan persampahan.</p>
        <a href="../page/tambahLaporan.php" class="btn tambah text-white">
          + Laporan
        </a>
      </div>
      <div
        class="col-lg-6 text-center"
        data-aos="fade-up"
        data-aos-anchor-placement="center-bottom"
        data-aos-duration="1500">
        <div class="px-4">
          <img src="../../src/img/laporan.png" class="px-4 pb-5 w-75">
        </div>
      </div>
      <!-- <hr class="border-secondary mb-4"> -->
    </div>

    <!-- bagian table -->
    <section class="lapor py-2">
      <div class="container laporan">
      <h2 class="fw-bold text-center py-5">Daftar Laporan</h2>
        <div class="row justify-content-center py-4">
          <div class="col-lg-12">
            <table class="table table-hover tabel-fixed table-striped">
              <thead>
                <tr class="head-table">
                  <th scope="col" style="width: 10%;">No</th>
                  <th scope="col" style="width: 40%;">laporan</th>
                  <th scope="col" style="width: 25%;">Lokasi</th>
                  <th scope="col" style="width: 25%;"">Pelapor</th>
            </tr>
          </thead>
          <tbody>

          <?php $i = 1; ?>
          <?php foreach ($laporan as $lap) { ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $lap['laporan']; ?></td>
              <td><?= $lap['lokasi']; ?></td>
              <td><?= $lap['pelapor']; ?></td>
            </tr>
            <?php $i++; ?>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
  </div>
</section>