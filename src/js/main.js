AOS.init();

// Add active class to current page's navbar item
document.addEventListener("DOMContentLoaded", function () {
  // Get the current page filename
  const currentPage = window.location.pathname.split("/").pop();

  // Select all nav links
  const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

  navLinks.forEach((link) => {
    // Get the href of the link and compare with current page
    const linkPage = link.getAttribute("href");

    if (linkPage === currentPage) {
      // Remove active class from all links first
      navLinks.forEach((l) => l.classList.remove("active"));

      // Add active class to the matching link
      link.classList.add("active");
    }
  });
});



