<?php
include "../db.php";
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imageName = null;

    if (!empty($_FILES['image']['name'])) {
        $imageName = time() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $imageName);
    }

    $stmt = $conn->prepare("INSERT INTO news(title, content, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $content, $imageName);
    $stmt->execute();

    header("Location: news.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="mn">
<head>
    <meta charset="UTF-8">
    <title>Мэдээ нэмэх</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="form-box">
    <h2>Мэдээ нэмэх</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Гарчиг" required>
        <textarea name="content" rows="8" placeholder="Агуулга" required></textarea>
        <input type="file" name="image" accept="image/*">
        <button type="submit">Хадгалах</button>
    </form>
</div>
</body>
</html>