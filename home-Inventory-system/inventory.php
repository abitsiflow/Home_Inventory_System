<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System - Home</title>
    <link rel="stylesheet" href="inventory-design.css">
</head>
<body>


    <div class="home-navbar">
        <h1 id="welcomeMessage">Welcome to the Home Inventory System</h1>
        <p id="inventoryDescription">Manage your inventory efficiently and effectively.</p>
    </div>
    
    <hr class="line-break">

    <div class="home-navigations-buttons">
        <button  class="pushable" onclick="openSidebar('Add Item')">
           <span class="shadow"></span>
           <span class="edge"></span>
           <span class="front">Add Item</span>
        </button>
        <button class="pushable" onclick="toggleDashboard()">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front">View Dashboard</span>
        </button>
        <button class="pushable" onclick="openSidebar('Update Item')">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front">Update Item</span>
        </button>
        <button class="pushable" onclick="openSidebar('Delete Item')">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front">Delete Item</span>
        </button>


        <input type="text" class="home-searchbar" placeholder="Search items...">
          <button class="pushable" onclick="navigateToSearchItems()">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front">Search</span>
        </button>
        </input>

    </div>
    
        <!--- DASHBOARD PANEL --->
        <div id="dashboardPanel" style="display:none; padding: 20px; margin-top: 30px;">
        <table class="dashboard-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="dashboardTableBody">
                <!-- Dashboard data will be dynamically inserted here -->
            </tbody>
        </table>
    </div>
  
        <!-- SIDEBAR -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>
    <div class="sidebar-panel" id="sidebarPanel">
    <div class="sidebar-header">
        <span id="sidebarTitle">Panel</span>
        <button class="sidebar-close-btn" onclick="closeSidebar()">✕</button>
    </div>


    <!-- ADD ITEM FORM -->
        <div id="formAddItem" class="sidebar-body" style="display:none;">
            <form action="../backend/add_item.php" method="POST">
                <input type="text"   name="name" id="sidebarInput" placeholder="Item name" required>
                <input type="number" name="quantity" id="sidebarInput"placeholder="Quantity" min="0">
                <select name="category_id" id="sidebarInput">
                    <option value="1">Electronics</option>
                    <option value="2">Furniture</option>
                    <option value="3">Stationery</option>
                    <option value="4">Appliances</option>
                    <option value="5">Tools</option>
                </select>
                <select name="status" id="sidebarInput">
                    <option value="In Stock">In Stock</option>
                    <option value="Low Stock">Low Stock</option>
                    <option value="Out of Stock">Out of Stock</option>
                </select>
                <button type="submit" class="pushable">
                    <span class="shadow"></span>
                    <span class="edge"></span>
                    <span class="front">Add Item</span>
                </button>
            </form>
        </div>

      <!-- UPDATE ITEM FORM -->
        <div id="formUpdateItem" class="sidebar-body" style="display:none;">
            <form action="../backend/update_item.php" method="POST">
                <input type="number" name="id"    id="sidebarInput"   placeholder="Item ID" required>
                <input type="text"   name="name"   id="sidebarInput"  placeholder="New name" required>
                <input type="number" name="quantity" id="sidebarInput" placeholder="New quantity" min="0">
                <select name="category_id" id="sidebarInput">
                    <option value="1">Electronics</option>
                    <option value="2">Furniture</option>
                    <option value="3">Stationery</option>
                    <option value="4">Appliances</option>
                    <option value="5">Tools</option>
                </select>
                <select name="status" id="sidebarInput">
                    <option value="In Stock">In Stock</option>
                    <option value="Low Stock">Low Stock</option>
                    <option value="Out of Stock">Out of Stock</option>
                </select>
                <button type="submit" class="pushable" ">
                    <span class="shadow"></span>
                    <span class="edge"></span>
                    <span class="front">Update Item</span>
                </button>
            </form>
        </div>

       <!-- DELETE ITEM FORM -->
        <div id="formDeleteItem" class="sidebar-body" style="display:none;">
            <form action="../backend/delete_item.php" method="POST">
                <input type="number" name="id" id="sidebarInput" placeholder="Item ID" required>
                <button type="submit" class="pushable">
                    <span class="shadow"></span>
                    <span class="edge"></span>
                    <span class="front">Delete Item</span>
                </button>
            </form>
        </div>
    </div>

<script src="inventoryFunction.js"></script>
</body>
</html>