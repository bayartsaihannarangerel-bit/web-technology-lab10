<?php
include "../db.php";
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

$id = (int)$_GET['id'];
$result = $conn->query("SELECT * FROM menus WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $link = $_POST['link'];
    $sort_order = (int)$_POST['sort_order'];

    $conn->query("UPDATE menus SET title='$title', link='$link', sort_order=$sort_order WHERE id=$id");
    header("Location: menu.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Цэс засах</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="form-box">
    <h2>Цэс засах</h2>
    <form method="POST">
        <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required>
        <input type="text" name="link" value="<?= htmlspecialchars($row['link']) ?>" required>
        <input type="number" name="sort_order" value="<?= $row['sort_order'] ?>">
        <button type="submit">Шинэчлэх</button>
    </form>
</div>
</body>
</html>