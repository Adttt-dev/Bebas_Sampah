document.addEventListener("DOMContentLoaded", function () {
  // Initialize all features
  initializeSearch();
  attachPaginationListeners();
  attachModalListeners();
  initializeLoginAlert();
});

function initializeSearch() {
  const searchInput = document.getElementById("searchInput");
  const clearButton = document.getElementById("clearSearch");
  const table = document.getElementById("reportTable");
  const rows = table.getElementsByTagName("tr");

  function performSearch() {
    const searchTerm = searchInput.value.toLowerCase();

    // Start from 1 to skip the header row
    for (let i = 1; i < rows.length; i++) {
      const row = rows[i];
      const cells = row.getElementsByTagName("td");
      let found = false;

      for (let j = 0; j < cells.length; j++) {
        const cell = cells[j];
        if (cell.hasAttribute("data-searchable")) {
          const text = cell.textContent || cell.innerText;
          if (text.toLowerCase().indexOf(searchTerm) > -1) {
            found = true;
            break;
          }
        }
      }

      if (found) {
        row.classList.remove("hidden");
        row.style.display = "";
      } else {
        row.classList.add("hidden");
        setTimeout(() => {
          if (row.classList.contains("hidden")) {
            row.style.display = "none";
          }
        }, 300);
      }
    }

    // Show/hide pagination based on search results
    const paginationContainer = document.querySelector(".pagination");
    if (searchTerm.length > 0) {
      paginationContainer.style.display = "none";
    } else {
      paginationContainer.style.display = "flex";
    }
  }

  // Add event listeners
  searchInput.addEventListener("keyup", performSearch);
  searchInput.addEventListener("input", function () {
    if (this.value) {
      clearButton.style.display = "block";
    } else {
      clearButton.style.display = "none";
    }
  });

  // Clear search
  clearButton.addEventListener("click", function () {
    searchInput.value = "";
    performSearch();
    this.style.display = "none";
    searchInput.focus();
  });
}

function attachPaginationListeners() {
  document.querySelectorAll(".pagination-link").forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const page = this.getAttribute("data-page");
      const tableSection = document.getElementById("tableSection");

      fetch(window.location.pathname + "?page=" + page)
        .then((response) => response.text())
        .then((html) => {
          const temp = document.createElement("div");
          temp.innerHTML = html;

          const newTable = temp.querySelector("#reportTable");
          const currentTable = document.querySelector("#reportTable");
          currentTable.innerHTML = newTable.innerHTML;

          const newPagination = temp.querySelector(".pagination");
          const currentPagination = document.querySelector(".pagination");
          currentPagination.innerHTML = newPagination.innerHTML;

          window.history.pushState({}, "", "?page=" + page);

          // Reattach listeners
          attachPaginationListeners();
          attachModalListeners();

          // Reset search
          const searchInput = document.getElementById("searchInput");
          if (searchInput) {
            searchInput.value = "";
            const event = new Event("input");
            searchInput.dispatchEvent(event);
          }

          // Scroll if needed
          if (!isElementInViewport(tableSection)) {
            tableSection.scrollIntoView();
          }
        });
    });
  });
}

function attachModalListeners() {
  document.querySelectorAll(".report-row").forEach((row) => {
    row.addEventListener("click", function () {
      const laporan = this.cells[1].innerText;
      const lokasi = this.cells[2].innerText;
      const gambar = this.cells[3].getElementsByTagName("img")[0].src;

      document.getElementById("laporanDetail").innerText = laporan;
      document.getElementById("lokasiDetail").innerText = lokasi;
      document.getElementById("gambarDetail").src = gambar;

      $("#laporanModal").modal("show");
    });
  });
}

function initializeLoginAlert() {
  document.getElementById("loginAlert")?.addEventListener("click", function () {
    Swal.fire({
      icon: "warning",
      title: "Harap Login Terlebih Dahulu",
      text: "Anda harus login untuk dapat mengirim laporan.",
      confirmButtonText: "Login Sekarang",
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = "../../dashboard/index.php";
      }
    });
  });
}

function isElementInViewport(el) {
  const rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <=
      (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

// Animate elements when they come into view
function animateOnScroll() {
  const animatedElements = document.querySelectorAll("[data-aos]");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("aos-animate");
        }
      });
    },
    {
      threshold: 0.1,
    }
  );

  animatedElements.forEach((element) => {
    observer.observe(element);
  });
}

// Enhanced table row hover effect
function enhanceTableInteractions() {
  const tableRows = document.querySelectorAll(".report-row");

  tableRows.forEach((row) => {
    row.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-2px)";
      this.style.boxShadow = "0 4px 8px rgba(0,0,0,0.1)";
    });

    row.addEventListener("mouseleave", function () {
      this.style.transform = "none";
      this.style.boxShadow = "none";
    });
  });
}

// Image preview enhancement
function enhanceImagePreviews() {
  const images = document.querySelectorAll("td img");

  images.forEach((img) => {
    img.addEventListener("click", function (e) {
      e.stopPropagation(); // Prevent row click event

      Swal.fire({
        imageUrl: this.src,
        imageAlt: "Gambar Laporan",
        imageWidth: 600,
        imageHeight: 400,
        imageClass: "img-fluid",
        showConfirmButton: false,
        showCloseButton: true,
        clickOutside: true,
      });
    });
  });
}

// Initialize all enhancements
document.addEventListener("DOMContentLoaded", function () {
  animateOnScroll();
  enhanceTableInteractions();
  enhanceImagePreviews();
});

// Handle responsive behavior
window.addEventListener("resize", function () {
  const table = document.getElementById("reportTable");
  const container = table.parentElement;

  if (window.innerWidth < 768) {
    container.style.overflowX = "auto";
  } else {
    container.style.overflowX = "hidden";
  }
});

// Add loading indicator for AJAX requests
let loadingTimer;

function showLoading() {
  loadingTimer = setTimeout(() => {
    Swal.fire({
      title: "Loading...",
      allowOutsideClick: false,
      didOpen: () => {
        Swal.showLoading();
      },
    });
  }, 300); // Show loading after 300ms delay
}

function hideLoading() {
  clearTimeout(loadingTimer);
  Swal.close();
}

// Error handler
function handleError(error) {
  console.error("Error:", error);
  Swal.fire({
    icon: "error",
    title: "Oops...",
    text: "Terjadi kesalahan! Silakan coba lagi.",
  });
}
