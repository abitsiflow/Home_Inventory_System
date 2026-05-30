<?php
require "db.php";

$search = trim($_GET["search"] ?? "");

if ($search !== "") {
    $stmt = $pdo->prepare("
        SELECT i.id, i.name, c.name AS category, i.quantity, i.status
        FROM items i
        LEFT JOIN categories c ON i.category_id = c.id
        WHERE i.name LIKE ?
        ORDER BY i.date_added DESC
    ");
    $stmt->execute(["%$search%"]);
} else {
    $stmt = $pdo->query("
        SELECT i.id, i.name, c.name AS category, i.quantity, i.status
        FROM items i
        LEFT JOIN categories c ON i.category_id = c.id
        ORDER BY i.date_added DESC
    ");
}

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($items as $row) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['category']}</td>
        <td>{$row['quantity']}</td>
        <td>{$row['status']}</td>
    </tr>";
}
?>