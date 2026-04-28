<?php
include "../db.php";
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

$id = (int)$_GET['id'];
$result = $conn->query("SELECT * FROM news WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imageName = $row['image'];

    if (!empty($_FILES['image']['name'])) {
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $imageName);
    }

    $stmt = $conn->prepare("UPDATE news SET title=?, content=?, image=? WHERE id=?");
    $stmt->bind_param("sssi", $title, $content, $imageName, $id);
    $stmt->execute();

    header("Location: news.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Мэдээ засах</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="form-box">
    <h2>Мэдээ засах</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required>
        <textarea name="content" rows="8" required><?= htmlspecialchars($row['content']) ?></textarea>
        <input type="file" name="image" accept="image/*">
        <button type="submit">Шинэчлэх</button>
    </form>
</div>
</body>
</html>