<?php
require "db.php";

$id          = intval($_POST["id"] ?? 0);
$name        = trim($_POST["name"] ?? "");
$category_id = intval($_POST["category_id"] ?? 0);
$quantity    = intval($_POST["quantity"] ?? 0);
$status      = trim($_POST["status"] ?? "In Stock");

if ($id <= 0) {
    die("Invalid item ID.");
}

$stmt = $pdo->prepare("UPDATE items SET name = ?, category_id = ?, quantity = ?, status = ? WHERE id = ?");
$stmt->execute([$name, $category_id, $quantity, $status, $id]);

header("Location: ../home-Inventory-system/inventory.php?relaod=1");
exit;
?>