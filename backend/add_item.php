<?php
require "db.php";

$name        = trim($_POST["name"] ?? "");
$category_id = intval($_POST["category_id"] ?? 0);
$quantity    = intval($_POST["quantity"] ?? 0);
$status      = trim($_POST["status"] ?? "In Stock");

if ($name === "") {
    die("Item name is required.");
}

$stmt = $pdo->prepare("INSERT INTO items (name, category_id, quantity, status) VALUES (?, ?, ?, ?)");
$stmt->execute([$name, $category_id, $quantity, $status]);

header("Location: home-inventory-system/inventory.php");
exit;
?>