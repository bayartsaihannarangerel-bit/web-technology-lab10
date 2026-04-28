<?php
include "../db.php";
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

$id = (int)$_GET['id'];
$conn->query("DELETE FROM news WHERE id=$id");
header("Location: news.php");
exit();