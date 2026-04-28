<?php
include "../db.php";
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

$id = (int)$_GET['id'];
$conn->query("DELETE FROM menus WHERE id=$id");
header("Location: menu.php");
exit();