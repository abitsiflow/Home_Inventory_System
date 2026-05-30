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

function toggleDashboard() {
    const dashboard = document.getElementById('dashboardPanel');
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

  input.value = ''; 
}
