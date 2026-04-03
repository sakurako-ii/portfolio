<?php
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

/* ===== 許可する教室ID ===== */
$valid_classrooms = [
"10101"	=>	"函館",
"10102"	=>	"旭川",
"10103"	=>	"札幌",
"20201"	=>	"弘前",
"20202"	=>	"八戸",
"20203"	=>	"青森",
"20301"	=>	"盛岡",
"20401"	=>	"仙台",
"20501"	=>	"秋田",
"20601"	=>	"山形",
"20701"	=>	"福島",
"20702"	=>	"いわき",
"42001"	=>	"長野",
"30801"	=>	"古河",
"30802"	=>	"ひたちなか",
"30901"	=>	"小山",
"31001"	=>	"高崎",
"31002"	=>	"太田",
"31003"	=>	"伊勢崎",
"31004"	=>	"桐生",
"31101"	=>	"所沢",
"31102"	=>	"岩槻",
"31106"	=>	"大宮",
"31107"	=>	"浦和",
"31103"	=>	"川口",
"31104"	=>	"熊谷",
"31105"	=>	"深谷",
"31108"	=>	"狭山",
"31109"	=>	"春日部",
"31201"	=>	"柏",
"31202"	=>	"佐倉",
"31203"	=>	"松戸",
"31204"	=>	"千葉",
"31208"	=>	"幕張",
"31205"	=>	"市川",
"31206"	=>	"浦安",
"31210"	=>	"新浦安",
"31207"	=>	"船橋",
"31211"	=>	"北習志野",
"31215"	=>	"津田沼",
"31209"	=>	"八千代",
"31212"	=>	"流山",
"31213"	=>	"成田",
"31214"	=>	"野田",
"31301"	=>	"町田",
"31306"	=>	"多摩境",
"31302"	=>	"吉祥寺",
"31305"	=>	"武蔵境",
"31303"	=>	"青梅",
"31304"	=>	"多摩",
"31307"	=>	"日商リカレント",
"31401"	=>	"厚木",
"31402"	=>	"川崎",
"31403"	=>	"海老名",
"31404"	=>	"秦野",
"31405"	=>	"平塚",
"31406"	=>	"大和",
"42101"	=>	"岐阜",
"42201"	=>	"浜松",
"42202"	=>	"静岡",
"42207"	=>	"清水",
"42203"	=>	"沼津",
"42204"	=>	"磐田",
"42205"	=>	"袋井",
"42206"	=>	"富士",
"42301"	=>	"豊田",
"42302"	=>	"瀬戸",
"42303"	=>	"豊橋",
"42304"	=>	"岡崎",
"42305"	=>	"西尾",
"42306"	=>	"春日井",
"52401"	=>	"四日市",
"52402"	=>	"津",
"52403"	=>	"鈴鹿",
"52501"	=>	"大津",
"52502"	=>	"彦根",
"52503"	=>	"八日市",
"52504"	=>	"近江八幡",
"52601"	=>	"烏丸",
"52603"	=>	"伏見",
"52602"	=>	"宇治",
"52703"	=>	"枚方",
"52709"	=>	"寝屋川",
"52705"	=>	"高槻",
"52711"	=>	"門真",
"52714"	=>	"阪急茨木",
"52717"	=>	"JR茨木",
"52901"	=>	"大和高田",
"52902"	=>	"奈良",
"52903"	=>	"橿原",
"52604"	=>	"北大路",
"52904"	=>	"生駒",
"52702" =>  "堺",
"52706" =>  "天王寺",
"52720"	=>	"京橋",
"52722"	=>	"本町",
"52723"	=>	"新大阪",
"52725"	=>	"梅田",
"52707"	=>	"泉大津",
"52708"	=>	"和泉",
"52710"	=>	"泉佐野",
"52712"	=>	"高石",
"52718"	=>	"松原",
"52721"	=>	"東大阪",
"52724"	=>	"八尾",
"53001"	=>	"和歌山",
"52701"	=>	"豊中",
"52716"	=>	"千里中央",
"52704"	=>	"池田",
"52713"	=>	"吹田",
"52715"	=>	"箕面",
"52801"	=>	"尼崎",
"52802"	=>	"塚口",
"52803"	=>	"明石",
"52804"	=>	"西宮",
"52805"	=>	"神戸",
"52808"	=>	"高砂",
"52809"	=>	"加古川",
"52810"	=>	"伊丹",
"52806"	=>	"姫路",
"52807"	=>	"龍野",
"63301"	=>	"岡山",
"63302"	=>	"倉敷",
"63303"	=>	"津山",
"63304"	=>	"総社",
"63401"	=>	"広島",
"63402"	=>	"福山",
"63403"	=>	"呉",
"63404"	=>	"東広島",
"63405"	=>	"廿日市",
"63503"	=>	"下関",
"63501"	=>	"宇部",
"63502"	=>	"徳山",
"73701"	=>	"高松",
"63101"	=>	"鳥取",
"84001"	=>	"博多祇園",
"84002"	=>	"飯塚",
"84004"	=>	"小倉",
"84007"	=>	"黒崎",
"84005"	=>	"大牟田",
"84006"	=>	"久留米",
"84101"	=>	"唐津",
"84201"	=>	"諫早",
"84301"	=>	"熊本",
"84401"	=>	"宇佐",
"84501"	=>	"宮崎",
"84502"	=>	"延岡",
"84503"	=>	"都城",
"84601"	=>	"霧島",
"84701"	=>	"那覇",
"84702"	=>	"沖縄",
"99989"	=>	"広報"
];

// セッションが無い場合、クッキーを確認して復元
if (!isset($_SESSION["classroom_id"]) && isset($_COOKIE["classroom_id"])) {
     if (in_array($_COOKIE["classroom_id"], $valid_classrooms, true)) {
    $_SESSION["classroom_id"] = $_COOKIE["classroom_id"];
     }
}


     // すでにログイン済みならマーケティングページへ
if (isset($_SESSION["classroom_id"])) {
    header("Location: marketing_page/index.php");
    exit;
}

$error = ""; // ← ★ここ追加：エラー用変数を先に宣言

// POST送信時の処理（重複を統合） ← ★ここ修正
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $classroomId = isset($_POST["classroom_id"]) ? $_POST["classroom_id"] : ""; // ← ここ変更


    if (array_key_exists($classroomId, $valid_classrooms)) {

        session_regenerate_id(true); // ← ★追加：セッション固定攻撃対策
        $_SESSION["classroom_id"] = $classroomId;
        $_SESSION["classroom_name"] = $valid_classrooms[$classroomId];

        // クッキーに保存（10年間有効） ← ★ここ追加
        setcookie("classroom_id", $classroomId, [
            "expires"  => time() + 10*365*24*60*60,
            "path"     => "/",
            "secure"   => true,    // HTTPS通信のときだけ送信
            "httponly" => true,    // JavaScriptから触れない
            "samesite" => "Lax"    // 外部サイト経由送信を制限
        ]);

        header("Location: marketing_page/index.php"); // ← ★ログイン成功したら遷移
        exit;

    } 
}


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>ログイン</title>
<style>
    body {
  margin: 0;
  height: 100vh;
  display: flex;
  justify-content: center; /* 横中央 */
  align-items: center;     /* 縦中央 */
  background: #f5f7fa;     /* お好み */
}

.login-box {
  width: 320px;
  padding: 30px;
  background: white;
  border-radius: 10px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  height:200px;
  
  
}
h2{
    margin-top:40px;
}
form{
    margin-top:60px;
}
</style>
</head>
<body>
<div class="login-box">
<h2>教室ログイン</h2>
<form method="POST">
    教室ID：
    <input type="text" name="classroom_id" required>
    <button type="submit">入室</button>
    <div id="classroomName" style="margin-top:10px; font-weight:bold; color:#333;"></div>
</form>
<script>
    const classrooms = <?php echo json_encode($valid_classrooms, JSON_UNESCAPED_UNICODE); ?>;
    const input = document.querySelector('input[name="classroom_id"]');
const nameBox = document.getElementById('classroomName');

input.addEventListener('input', () => {
    const id = input.value.trim();

    if (classrooms[id]) {
        nameBox.innerHTML = '教室：<span style="color:red;">' + classrooms[id] + '</span>';
        nameBox.style.color = "black";
        nameBox.style.fontWeight = "400"; // 通常
    } else {
        nameBox.textContent = "教室IDが見つかりません";
        nameBox.style.color = "red";
        nameBox.style.fontWeight = "700"; // 太字
    }
});
</script>
</div>
</body>
</html>
