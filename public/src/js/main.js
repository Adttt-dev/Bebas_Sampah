// const toggleButton = document.getElementById("theme-toggle");
// const themeIcon = document.getElementById("theme-icon");

// toggleButton.addEventListener("click", () => {
//   document.body.classList.toggle("dark-mode");
//   const isDarkMode = document.body.classList.contains("dark-mode");

//   themeIcon.textContent = isDarkMode ? "dark_mode" : "light_mode";
//   toggleButton.classList.toggle("btn-dark", isDarkMode);
//   toggleButton.classList.toggle("btn-light", !isDarkMode);
// });

document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    
    navLinks.forEach(function(link) {
      link.addEventListener('click', function() {
        navLinks.forEach(function(item) {
          item.classList.remove('active'); // Hapus kelas aktif dari semua link
        });
        this.classList.add('active'); // Tambahkan kelas aktif ke link yang diklik
      });
    });
  });