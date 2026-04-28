<?php
include "../db.php";
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}
$news = $conn->query("SELECT * FROM news ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Мэдээ удирдах</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="admin-page">
    <h1>Мэдээ удирдах</h1>
    <a class="add-btn" href="news_add.php">+ Мэдээ нэмэх</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Гарчиг</th>
            <th>Огноо</th>
            <th>Үйлдэл</th>
        </tr>
        <?php while($row = $news->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
                <a href="news_edit.php?id=<?= $row['id'] ?>">Засах</a> |
                <a href="news_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Устгах уу?')">Устгах</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <p><a href="dashboard.php">← Буцах</a></p>
</div>
</body>
</html>