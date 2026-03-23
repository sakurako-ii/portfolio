<?php
session_start();

$protected_pages = [
    '/system_test/intr2/hansoku_gallery/index.php'
];

$current_path = $_SERVER['PHP_SELF'];

if (in_array($current_path, $protected_pages)) {

    if (!isset($_SESSION['classroom_id']) && isset($_COOKIE['classroom_id'])) {
        $_SESSION['classroom_id'] = $_COOKIE['classroom_id'];
    }

    if (!isset($_SESSION['classroom_id'])) {
        header("Location: /system_test/intr2/login.php");
        exit;
    }
}
