<?php
session_start();

$_SESSION = [];
session_destroy();

// セッションクッキー削除（←これが本命）
setcookie(session_name(), '', time() - 3600, '/');

// classroom_idクッキー消すならこれもOK
setcookie("classroom_id", "", time() - 3600, "/");

// キャッシュ完全殺し
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

// ★ 302 リダイレクト（普通のやつ）
header("Location: login.php");
exit;
