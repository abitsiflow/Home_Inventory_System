const sidebarForms = {
    "Add Item": "formAddItem",
    "Update Item": "formUpdateItem",
    "Delete Item": "formDeleteItem",
};

let activeDashboardRequest = null;

function debounce(callback, delay = 300) {
    let timeoutId;

    return (...args) => {
        window.clearTimeout(timeoutId);
        timeoutId = window.setTimeout(() => callback(...args), delay);
    };
}

function escapeHtml(value) {
    return String(value)
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function setDashboardMessage(message) {
    const tableBody = document.getElementById("dashboardTableBody");
    tableBody.innerHTML = `<tr class="dashboard-message-row"><td colspan="5">${escapeHtml(message)}</td></tr>`;
}

function showDashboard() {
    document.getElementById("dashboardPanel").hidden = false;
}

function hideDashboard() {
    document.getElementById("dashboardPanel").hidden = true;
}

function getSearchQuery() {
    return document.getElementById("searchInput").value.trim();
}

function setSearchLoading(isLoading) {
    const searchButton = document.querySelector("#searchForm button[type='submit']");

    if (searchButton) {
        searchButton.disabled = isLoading;
        searchButton.setAttribute("aria-busy", String(isLoading));
    }
}


function setSearchLoading(isLoading) {
    const searchButton = document.querySelector("#searchForm button[type='submit']");

    if (searchButton) {
        searchButton.disabled = isLoading;
        searchButton.setAttribute("aria-busy", String(isLoading));
    }
}

async function loadDashboard(searchQuery = "") {
    const endpoint = new URL("../backend/get_items.php", window.location.href);
    const controller = new AbortController();

    if (activeDashboardRequest) {
        activeDashboardRequest.abort();
    }

    activeDashboardRequest = controller;

    if (searchQuery) {
        endpoint.searchParams.set("search", searchQuery);
    }

    showDashboard();
    setSearchLoading(true);
    setDashboardMessage("Loading items...");

    try {
        const response = await fetch(endpoint, {
            signal: controller.signal,
        });

        if (!response.ok) {
            throw new Error(`Request failed with status ${response.status}`);
        }

        const html = (await response.text()).trim();

        if (!html) {
            setDashboardMessage(searchQuery ? "No matching items found." : "No items found.");
            return;
        }

        document.getElementById("dashboardTableBody").innerHTML = html;
    } catch (error) {
        if (error.name === "AbortError") {
            return;
        }

        console.error("Unable to load inventory dashboard:", error);
        setDashboardMessage("Could not load inventory. Please try again.");
    } finally {
        if (activeDashboardRequest === controller) {
            activeDashboardRequest = null;
            setSearchLoading(false);
        }
    }
}

function openSidebar(action) {
    const formId = sidebarForms[action];

    if (!formId) {
        return;
    }

    document.getElementById("sidebarTitle").textContent = action;
    document.getElementById("sidebarPanel").classList.add("open");
    document.getElementById("sidebarOverlay").classList.add("open");

    Object.values(sidebarForms).forEach((id) => {
        document.getElementById(id).hidden = id !== formId;
    });
}

function closeSidebar() {
    document.getElementById("sidebarPanel").classList.remove("open");
    document.getElementById("sidebarOverlay").classList.remove("open");
}

function toggleDashboard() {
    const panel = document.getElementById("dashboardPanel");

    if (panel.hidden) {
        loadDashboard();
    } else {
        hideDashboard();
    }
}

function navigateToSearchItems() {
    loadDashboard(getSearchQuery());
}

document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.getElementById("searchInput");
    const searchForm = document.getElementById("searchForm");
    const runLiveSearch = debounce(() => {
        loadDashboard(getSearchQuery());
    }, 350);
    
    document.querySelectorAll("[data-sidebar-action]").forEach((button) => {
        button.addEventListener("click", () => openSidebar(button.dataset.sidebarAction));
    });

    document.getElementById("dashboardToggle").addEventListener("click", toggleDashboard);
    document.getElementById("sidebarOverlay").addEventListener("click", closeSidebar);
    document.getElementById("sidebarClose").addEventListener("click", closeSidebar);

    searchForm.addEventListener("submit", (event) => {
        event.preventDefault();
        navigateToSearchItems();
    });

    searchInput.addEventListener("input", runLiveSearch);

    document.getElementById("deleteItemForm").addEventListener("submit", (event) => {
        const itemId = document.getElementById("deleteItemId").value;

        if (!window.confirm(`Delete item #${itemId}?`)) {
            event.preventDefault();
        }
    });

    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            closeSidebar();
        }
    });

    const params = new URLSearchParams(window.location.search);

    if (params.get("reload") === "1") {
        loadDashboard();
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});
