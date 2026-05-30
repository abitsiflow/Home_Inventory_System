function openSidebar(action) {
    document.getElementById('sidebarTitle').textContent = action;
    document.getElementById('sidebarContent').textContent = action + ' content goes here.';
    document.getElementById('sidebarOverlay').classList.add('open');
    document.getElementById('sidebarPanel').classList.add('open');
}

function closeSidebar() {
    document.getElementById('sidebarOverlay').classList.remove('open');
    document.getElementById('sidebarPanel').classList.remove('open');
}

const dashboard = document.getElementById('dashboardPanel');

function toggleDashboard() {
    dashboard.style.display = dashboard.style.display === 'none' ? 'block' : 'none';
}
  
function addItem() {
  const input = document.getElementById('sidebarInput');
  const itemName = input.value.trim();

  if (itemName === '') {
    alert('Please enter an item name.');
    return;
  }

  console.log('Item added:', itemName);
  alert('Item added: ' + itemName);
  dashboard.style.display = dashboard.style.display === 'none' ? 'block' : 'none';
  input.value = ''; 
}


function navigateToSearchItems() {
    const query = document.querySelector(".home-searchbar").value.trim();
    fetch("get_items.php?search=" + encodeURIComponent(query))
        .then(r => r.text())
        .then(html => {
            document.getElementById("dashboardTableBody").innerHTML = html;
            document.getElementById("dashboardPanel").style.display = "block";
        });
}