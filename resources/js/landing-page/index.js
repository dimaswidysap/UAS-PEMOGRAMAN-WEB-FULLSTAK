// Sidebar mobile toggle
document.addEventListener("DOMContentLoaded", () => {
    const hamburger = document.querySelector(".hamburger-btn");
    const sidebar = document.querySelector(".sidebar");
    const overlay = document.querySelector(".sidebar-overlay");
    const closeBtn = document.querySelector(".sidebar-close");

    const openSidebar = () => {
        sidebar.classList.add("open");
        overlay.classList.add("active");
        hamburger.setAttribute("aria-expanded", "true");
        document.body.style.overflow = "hidden";
    };

    const closeSidebar = () => {
        sidebar.classList.remove("open");
        overlay.classList.remove("active");
        hamburger.setAttribute("aria-expanded", "false");
        document.body.style.overflow = "";
    };

    hamburger?.addEventListener("click", openSidebar);
    closeBtn?.addEventListener("click", closeSidebar);
    overlay?.addEventListener("click", closeSidebar);

    // Close on Escape
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closeSidebar();
    });
});

const header = document.querySelector(".header");

window.addEventListener("scroll", () => {
    // header.classList.toggle("header-active", window.scrollY > 0);
});
