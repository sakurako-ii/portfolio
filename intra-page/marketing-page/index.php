<?php
  session_start();
  
require_once '../auth.php';

// セッションが無ければログイン画面に強制リダイレクト
if (!isset($_SESSION["classroom_id"])) {
    header("Location: ../login.php");
    exit;
}

// キャッシュ無効化（ブラウザバック防止）
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: 0");

  // === アクセスカウンターとログ ===
  $countFile = 'count.txt';
  $logFile   = 'access_log.txt';

  $count = 0;
  if (file_exists($countFile)) {
      $count = (int)file_get_contents($countFile);
  }
  $count++;
  file_put_contents($countFile, $count);

  $time = date('Y-m-d H:i:s');
  $ip   = $_SERVER['REMOTE_ADDR'];
  $page = basename($_SERVER['PHP_SELF']);

  $log = fopen($logFile, 'a');
  fwrite($log, "$time, $ip, $page\n");
  fclose($log);

 // echo "<p>このページの閲覧数：{$count}回</p>";
  ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マーケティング部教室交流ページ</title>
    <link rel="stylesheet" href="style.css">
    <script src="javaScript.js" defer></script>
</head>
<body>
    <div class="flex">
    <div class="left">
        <img src="left-top.png" class="left-top flag">
        <img src="left-bottom.png" class="left-bottom">
    </div>
    <div class="link">
    <div class="sub first">
        <a href="../school_information/">
        <img src="asset1.png" class="rotate" alt="折込チラシ・HP掲載教室情報ページを開く">
        </a>
    </div>
    <div class="sub second">
        <a href="../areamap/" target="_blank" rel="noopener noreferrer">
            <!-- target="_blank" rel="noopener noreferrer"これらはセットで書いた方がいい。遷移前(マーケ部ページ)ページが書き換えられる攻撃を受ける可能性がある -->
        <img src="asset2.png" class="rotate" alt="エリアマップページを開く">
        </a>
    </div>
    <div class="sub third">
       <a href="../hansoku_gallery/">
        <img src="asset4.png" class="rotate" alt="販促物ギャラリーページを開く">
      </a>
    </div>
    <div class="sub fourth">
        <a href="../backnumber/">
        <img src="asset3.png" class="rotate" alt="折込チラシデザインライブラリページを開く">
        </a>
    </div>
    </div>
    <div class="right">
        <img src="right-top.png" class="right-top flag">
        <img src="right-bottom.png" class="right-bottom">
    </div>
    </div>
    <!-- <div class="bottom"></div> -->

<!-- マーケティングページのHTMLの適当な場所に追加 -->
<div class="account">
<div class="login-info">
  <?php if (isset($_SESSION["classroom_id"])): ?>
    <?php echo htmlspecialchars($_SESSION["classroom_name"]); ?> 教室
  <?php endif; ?>
</div>
<form method="POST" action="../logout.php">
    <button type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#815138">
            <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/>
        </svg>
    </button> <!-- ← ★ここ追加 -->
</form>
</div>

<script>
window.addEventListener("pageshow", function(event) {
  if (event.persisted) {
    window.location.reload();
  }
});
</script>
</body>
</html>