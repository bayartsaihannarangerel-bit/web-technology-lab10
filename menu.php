<?php
include "../db.php";
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
$menus = $conn->query("SELECT * FROM menus ORDER BY sort_order ASC, id ASC");
?>
<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Цэс удирдах</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="admin-page">
    <h1>Цэс удирдах</h1>
    <a class="add-btn" href="menu_add.php">+ Цэс нэмэх</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Гарчиг</th>
            <th>Link</th>
            <th>Дараалал</th>
            <th>Үйлдэл</th>
        </tr>
        <?php while($row = $menus->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['link']) ?></td>
            <td><?= $row['sort_order'] ?></td>
            <td>
                <a href="menu_edit.php?id=<?= $row['id'] ?>">Засах</a> |
                <a href="menu_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Устгах уу?')">Устгах</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <p><a href="dashboard.php">← Буцах</a></p>
</div>
</body>
</html>