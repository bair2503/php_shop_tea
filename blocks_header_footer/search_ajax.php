<?php
require '../requires/connect.php';

if (!isset($_GET['q']) || strlen($_GET['q']) < 3) {
    echo "Введите минимум 3 буквы.";
    exit;
}

$search = $_GET['q'] . '%';

$stmt = $link->prepare("SELECT id, name, description FROM tea WHERE name LIKE ?");
$stmt->bind_param("s", $search);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Ничего не найдено.";
} else {
    echo "<ul style='list-style:none; padding:0;'>";
    while ($row = $result->fetch_assoc()) {
        echo "<li style='padding: 5px 0; border-bottom: 1px solid #ccc;'>
                <a href='product.php?id={$row['id']}' style='text-decoration: none; color: #333;'>
                    <strong>{$row['name']}</strong> — {$row['description']}
                </a>
              </li>";
    }
    echo "</ul>";
}
