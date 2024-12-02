
// Sidebar Toggle
document.getElementById("toggleSidebar").addEventListener("click", () => {
    const sidebar = document.querySelector(".sidebar");
    sidebar.classList.toggle("collapsed");
});

// Confirmation for Delete
function confirmDelete() {
    if(confirm("Are you sure you want to delete this report?")) {
        // Perform delete action
        alert("Report deleted successfully!");
    }
}
