<?php
require "db.php";

$id = intval($_POST["id"] ?? 0);

if($id > 0) {
    $stmt = $pdo->prepare("DELETE FROM items WHERE id = ?");
    $stmt->execute([$id]);
    
    echo json_encode(["success" => true]);
}

$stmt = $pdo->prepare("DELETE FROM items WHERE id = ?");
$stmt->execute([$id]);

header("Location: ../home-inventory-system/inventory.php?reload=1");
exit;

?>