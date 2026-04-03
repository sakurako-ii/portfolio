<?php
session_start();
// エラーをJSONで返す
// ini_set('display_errors', 0);


error_reporting(E_ALL);
set_error_handler(function($severity, $message, $file, $line) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(array("error" => $message));
    exit;
});

// ログインチェック
if (!isset($_SESSION["classroom_id"])) {
    header('Content-Type: application/json');
    echo json_encode(array("error" => "not logged in"));
    exit;
}

$classroomId = $_SESSION["classroom_id"];


header('Content-Type: application/json');

$file = __DIR__ . '/favorites.json';
$favorites = array();

// JSON読み込み
if (file_exists($file)) {
    $content = file_get_contents($file);
    $favorites = json_decode($content, true);
    if (!is_array($favorites)) $favorites = array();
}

// 教室ごとの配列がなければ作る
if (!isset($favorites[$classroomId]) || !is_array($favorites[$classroomId])) {
    $favorites[$classroomId] = array();
}

// リクエスト取得
$method = $_SERVER['REQUEST_METHOD'];
// ★ お気に入り一覧取得（表示用）
//if ($method === 'GET' && !isset($_GET['action'])) {
  //  echo json_encode($favorites[$classroomId]);
  //  exit;
//}

$imageId = null;
$action  = null;

// GETパラメータ（古いPHP対応）
if (isset($_GET['imageId'])) {
    $imageId = $_GET['imageId'];
}

// POSTパラメータ（古いPHP対応）
if ($method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!is_array($data)) $data = array();
    $imageId = isset($data['imageId']) ? $data['imageId'] : $imageId;
    $action  = isset($data['action']) ? $data['action'] : null;
}

// 追加・削除
if ($method === 'POST' && $imageId && $action) {
    if ($action === 'add' && !in_array($imageId, $favorites[$classroomId])) {
        $favorites[$classroomId][] = $imageId;
    } elseif ($action === 'remove') {
        $favorites[$classroomId] = array_values(array_diff($favorites[$classroomId], array($imageId)));
    }
    // JSON書き込み
   $result = file_put_contents($file, json_encode($favorites), LOCK_EX);

if ($result === false) {
    echo json_encode(array(
        "error" => "保存失敗",
        "path" => $file
    ));
    exit;
}

}

// レスポンス（キーが重複しないように）
echo json_encode(array(
    "favorites" => $favorites[$classroomId],
    "favorited" => ($imageId && in_array($imageId, $favorites[$classroomId]))
));
exit;
