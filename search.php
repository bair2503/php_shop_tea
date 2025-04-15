<?php
require 'requires/connect.php';

if(isset($_POST['query']) && !empty($_POST['query'])) {
    $search = '%' . trim($_POST['query']) . '%';
    
    // Поиск по name, name_page и description
    $stmt = $link->prepare("
        SELECT id, name_page, name, description 
        FROM tea 
        WHERE 
            name LIKE ? OR 
            name_page LIKE ? OR 
            description LIKE ? 
        LIMIT 5
    ");
    
    $stmt->bind_param('sss', $search, $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        echo '<ul>';
        while($row = $result->fetch_assoc()) {
            echo '<li style="padding: 10px; border-bottom: 1px solid #ddd;">
                    <a href="/product.phps/' . htmlspecialchars($row['name_page']) . '" style="color: #333;">
                        <b>' . htmlspecialchars($row['name']) . '</b><br>
                        <small>' . mb_substr(htmlspecialchars($row['description']), 0, 50) . '...</small>
                    </a>
                  </li>';
        }
        echo '</ul>';
    } else {
        echo '<div style="padding: 10px;">Ничего не найдено</div>';
    }
    
    $stmt->close();
} else {
    echo '<div style="padding: 10px;">Введите запрос</div>';
}
?>