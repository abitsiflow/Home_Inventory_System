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
        <button type="button" class="pushable" data-sidebar-action="Add Item">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front">Add Item</span>
        </button>

        <button type="button" class="pushable" id="dashboardToggle">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front">View Dashboard</span>
        </button>

        <button type="button" class="pushable" data-sidebar-action="Update Item">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front">Update Item</span>
        </button>

        <button type="button" class="pushable" data-sidebar-action="Delete Item">
            <span class="shadow"></span>
            <span class="edge"></span>
            <span class="front">Delete Item</span>
        </button>

        <form class="home-search-form" id="searchForm">
            <input type="text" class="home-searchbar" id="searchInput" placeholder="Search items..." aria-label="Search items">
            <button type="submit" class="pushable">
                <span class="shadow"></span>
                <span class="edge"></span>
                <span class="front">Search</span>
            </button>
        </form>
    </div>

    <!-- DASHBOARD PANEL -->
    <div id="dashboardPanel" hidden>
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
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <div class="sidebar-panel" id="sidebarPanel">
        <div class="sidebar-header">
            <span id="sidebarTitle">Panel</span>
            <button type="button" class="sidebar-close-btn" id="sidebarClose" aria-label="Close sidebar">&times;</button>
        </div>

        <!-- ADD ITEM FORM -->
        <div id="formAddItem" class="sidebar-body" hidden>
            <form action="../backend/add_item.php" method="POST">
                <label class="sr-only" for="addItemName">Item name</label>
                <input type="text" name="name" id="addItemName" class="sidebar-input" placeholder="Item name" required>

                <label class="sr-only" for="addItemQuantity">Quantity</label>
                <input type="number" name="quantity" id="addItemQuantity" class="sidebar-input" placeholder="Quantity" min="0" required>

                <label class="sr-only" for="addItemCategory">Category</label>
                <select name="category_id" id="addItemCategory" class="sidebar-input">
                    <option value="1">Electronics</option>
                    <option value="2">Furniture</option>
                    <option value="3">Stationery</option>
                    <option value="4">Appliances</option>
                    <option value="5">Tools</option>
                </select>

                <label class="sr-only" for="addItemStatus">Status</label>
                <select name="status" id="addItemStatus" class="sidebar-input">
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
        <div id="formUpdateItem" class="sidebar-body" hidden>
            <form action="../backend/update_item.php" method="POST">
                <label class="sr-only" for="updateItemId">Item ID</label>
                <input type="number" name="id" id="updateItemId" class="sidebar-input" placeholder="Item ID" min="1" required>

                <label class="sr-only" for="updateItemName">New name</label>
                <input type="text" name="name" id="updateItemName" class="sidebar-input" placeholder="New name" required>

                <label class="sr-only" for="updateItemQuantity">New quantity</label>
                <input type="number" name="quantity" id="updateItemQuantity" class="sidebar-input" placeholder="New quantity" min="0" required>

                <label class="sr-only" for="updateItemCategory">Category</label>
                <select name="category_id" id="updateItemCategory" class="sidebar-input">
                    <option value="1">Electronics</option>
                    <option value="2">Furniture</option>
                    <option value="3">Stationery</option>
                    <option value="4">Appliances</option>
                    <option value="5">Tools</option>
                </select>

                <label class="sr-only" for="updateItemStatus">Status</label>
                <select name="status" id="updateItemStatus" class="sidebar-input">
                    <option value="In Stock">In Stock</option>
                    <option value="Low Stock">Low Stock</option>
                    <option value="Out of Stock">Out of Stock</option>
                </select>

                <button type="submit" class="pushable">
                    <span class="shadow"></span>
                    <span class="edge"></span>
                    <span class="front">Update Item</span>
                </button>
            </form>
        </div>

        <!-- DELETE ITEM FORM -->
        <div id="formDeleteItem" class="sidebar-body" hidden>
            <form action="../backend/delete_item.php" method="POST" id="deleteItemForm">
                <label class="sr-only" for="deleteItemId">Item ID</label>
                <input type="number" name="id" id="deleteItemId" class="sidebar-input" placeholder="Item ID" min="1" required>

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
