function openSidebar(action) {
    document.getElementById("sidebarTitle").textContent = action;
    document.getElementById("sidebarPanel").classList.add("open");
    document.getElementById("sidebarOverlay").classList.add("open");

    document.getElementById("formAddItem").style.display    = "none";
    document.getElementById("formUpdateItem").style.display = "none";
    document.getElementById("formDeleteItem").style.display = "none";

    if (action === "Add Item")    document.getElementById("formAddItem").style.display    = "block";
    if (action === "Update Item") document.getElementById("formUpdateItem").style.display = "block";
    if (action === "Delete Item") document.getElementById("formDeleteItem").style.display = "block";
}

function closeSidebar() {
    document.getElementById("sidebarPanel").classList.remove("open");
    document.getElementById("sidebarOverlay").classList.remove("open");
}

function toggleDashboard() {
    const panel = document.getElementById("dashboardPanel");
    const isHidden = panel.style.display === "none";

    if (isHidden) {
        fetch("../backend/get_items.php")
            .then(r => r.text())
            .then(html => {
                document.getElementById("dashboardTableBody").innerHTML = html;
                panel.style.display = "block";
            });
    } else {
        panel.style.display = "none";
    }
}

function navigateToSearchItems() {
    const query = document.querySelector(".home-searchbar").value.trim();
    fetch("../backend/get_items.php?search=" + encodeURIComponent(query))
        .then(r => r.text())
        .then(html => {
            document.getElementById("dashboardTableBody").innerHTML = html;
            document.getElementById("dashboardPanel").style.display = "block";
        });
}

// Auto-show dashboard after add, update, or delete
window.onload = function () {
    const params = new URLSearchParams(window.location.search);
    if (params.get("reload") === "1") {
        fetch("../backend/get_items.php")
            .then(r => r.text())
            .then(html => {
                document.getElementById("dashboardTableBody").innerHTML = html;
                document.getElementById("dashboardPanel").style.display = "block";
            });
        // Clean the URL so reload=1 disappears from the address bar
        window.history.replaceState({}, document.title, window.location.pathname);
    }
};