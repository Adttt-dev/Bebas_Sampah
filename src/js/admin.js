// Fungsi untuk scroll ke tabel laporan
function scrollToLaporanTable() {
  const laporanTable = document.querySelector("#laporan-table");
  if (laporanTable) {
    laporanTable.scrollIntoView({ behavior: "smooth" });
  }
}

// Menambahkan event listener untuk tombol "Lihat Semua" atau "Perkecil"
document.addEventListener("DOMContentLoaded", function () {
  const toggleButton = document.querySelector('a[href*="lihat_semua_laporan"]');

  if (toggleButton) {
    toggleButton.addEventListener("click", function (event) {
      // Cegah aksi default link (refresh halaman)
      event.preventDefault();

      // Scroll ke tabel laporan
      scrollToLaporanTable();

      // Pilih tombol yang diklik dan lakukan aksi seperti biasa
      const isLaporanFull = window.location.search.includes(
        "lihat_semua_laporan"
      );
      if (!isLaporanFull) {1 
        window.location.search =
          window.location.search + "&lihat_semua_laporan=1";
      } else {
        window.location.search = window.location.search.replace(
          "&lihat_semua_laporan=1",
          ""
        );
      }
    });
  }
});
