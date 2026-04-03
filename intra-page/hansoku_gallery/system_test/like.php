<?php
session_start();
header('Content-Type: application/json');

// Warning / Notice を JSON に混ざらないようにオフ
ini_set('display_errors', 0);
error_reporting(0);


$classroomId = isset($_SESSION["classroom_id"]) ? $_SESSION["classroom_id"] : null;



// ファイル読み込み
$file = 'likes.json';
$likes = array();

if (file_exists($file)) {
    $fp = fopen($file, 'r');
    if (flock($fp, LOCK_SH)) { // 読み込みロック
        $json = stream_get_contents($fp);
        flock($fp, LOCK_UN);
        $likes = json_decode($json, true);
        if (!is_array($likes)) $likes = array();
    }
    fclose($fp);
} else {
    $likes = array();
}

// メソッド取得
$method = $_SERVER['REQUEST_METHOD'];

// GET / POST で imageId と action を取得
// 🔽 複数IDまとめ取得モード
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['ids'])) {
    $ids = explode(',', $_GET['ids']);
    $response = array();

    foreach ($ids as $id) {
        if (!isset($likes[$id])) {
            $response[$id] = array(
                'likeCount' => 0,
                'liked' => false
            );
        } else {
            $response[$id] = array(
                'likeCount' => $likes[$id]['count'],
                'liked' => in_array($classroomId, $likes[$id]['classrooms'])
            );
        }
    }

    echo json_encode($response);
    exit;
}

$imageId  = isset($_GET['imageId']) ? $_GET['imageId'] : null;
$action   = null;

if ($method === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!is_array($data)) $data = array();

    if (isset($data['imageId'])) $imageId = $data['imageId'];
    if (isset($data['action'])) $action = $data['action'];
}

// 必須チェック
if (!$imageId || !$classroomId) {
    echo json_encode(array('error' => 'imageId missing or not logged in'));
    exit;
}

// 初期化
if (!isset($likes[$imageId]) || !is_array($likes[$imageId])) {
    $likes[$imageId] = array('count' => 0, 'classrooms' => array());
}

if ($method === 'POST' && $action) {

    if (!in_array($classroomId, $likes[$imageId]['classrooms']) && $action === 'like') {
        $likes[$imageId]['count']++;
        $likes[$imageId]['classrooms'][] = $classroomId;
    } elseif (in_array($classroomId, $likes[$imageId]['classrooms']) && $action === 'unlike') {
        $likes[$imageId]['count'] = max(0, $likes[$imageId]['count'] - 1);
        $likes[$imageId]['classrooms'] = array_values(
            array_diff($likes[$imageId]['classrooms'], [$classroomId])
        );
    }

    // 🔥ここでだけ書き込む
    $fp = fopen($file, 'w');
    if (flock($fp, LOCK_EX)) {
        fwrite($fp, json_encode($likes));
        flock($fp, LOCK_UN);
    }
    fclose($fp);
}


// レスポンス
echo json_encode(array(
    'likeCount' => $likes[$imageId]['count'],
    'liked' => in_array($classroomId, $likes[$imageId]['classrooms'])
));
exit;