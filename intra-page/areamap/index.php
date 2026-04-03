<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>折込エリアマップ</title>
<style>
  body {
    margin: 0;
    font-family: sans-serif;
    display: flex;
    height: 100vh;
    overflow: hidden; 
   
  }

  /* 左メニュー */
  .left {
   width: 250px; 
    background-color: #f0f0f0;
    padding: 10px;
    box-sizing: border-box;
    overflow-y: auto;
    transition: width 0.3s, opacity 0.3s;
    position: relative;
    overflow-y: scroll;
  }
 
  /* メニュー開閉 */
  .left.collapsed {
    width: 0;
    padding: 0;
    opacity: 0;
     overflow: hidden;
  }

  .search input {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
    box-sizing: border-box;
  }

  .block-name {
    font-weight: bold;
    cursor: pointer;
    background-color: #d3d3d3;
    padding: 5px;
    margin-top: 5px;
    user-select:none;
  }

  .class-list {
    display: none;
    list-style: none;
    margin: 5px 0 10px 10px;
    padding: 0;
  }
  .class-list li {
    cursor: pointer;
    padding: 3px 0;
    user-select:none;
  }
  .class-list li:hover {
    background-color: #cce5ff;
  }

  /* 右側エリア */
  .right {
    flex: 1;
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  .map-container, .image-container {
    flex: 1;
    height: 100%;
    position: relative;
  }

  iframe {
    width: 100%;
    height: 100%;
    border: none;
  }

  .image-container{
   overflow: hidden; 
    /* これがないと、教室名メニューの上にエリアマップ重なる、エリアマップのすぐ上の親要素がimage-containerなので*/ 
    /* cursor: grab; */
     cursor: default;
  
  }
  #classImage{
   user-select: none;
  pointer-events: auto; /* デフォルトだと none だとドラッグできない場合あり */
    /* classImageの親要素がrelative */
    position: absolute;
    /* top: 0;  */
    /* left: 0;  */
    transform-origin: 0 0;
    /* width: 100%;だけにしても変わらなかった */
    max-width: 100%; 
    max-height: 100%; 
    /* transform-origin: center center; */
    /* user-select: none; */
    /* pointer-events: none; */
    display: none;
  }
  #placeholderText{
    background-color: rgb(255, 255, 255);
    /* padding: 15px; */
    overflow-y: scroll; 
    visibility: visible;
    font-size: 14px;
    max-height: 100%;
    /* height1300pxとか数字で書くと教室名メニューとかグーグルマップまでスクロール分の余白が下に出る */
    /* overflow-y: auto; */
    box-sizing: border-box;
    padding: 60px 30px 60px;
    user-select:none;
  }
  h2{
    font-size: 23px;
    margin: 60px auto 50px;
  }
  h3{
    margin-top: 55px;
    margin-bottom: 20px;
    font-size: 15px;
  }
  .notready{
    font-size: 13px;
    margin-bottom: 5px;
    display: inline-block;
  }
  .tips{
    padding: 5px;
    display: inline-block;
  }
  .additional{
    margin-top: 30px;
    display: inline-block;
  }
  /* 開閉ボタン */
  .toggle-btn {
    position: fixed;
    top: 10px;
    left: 210px;
    z-index: 10;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: none;
    background: #333;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
  }

  /* ホームボタン */
  #homeBtn{
    position: fixed;
    top: 6px;
    left: 155px;
    /* font-size: 32px; */
    border: none;
    /* background-color: #fff; */
    padding: 0 8px 5px;
    display: inline;
  }
  #homeBtn a{
    color: black;
   
    
  }
  .block-name,
.class-list li {
  outline: none;
}


/* 全画面表示ボタン */
  #openImageBtn{
    display: none;
    /* これがないとplaceholdertextの上にも全画面表示ボタン表示される。absoluteですぐ上の親・image-containerに重ねてるから。jsで表示非表示制御 */
     width: 35px;
  height: 35px;
  font-size: 26px;
  line-height: 32px;
  /* line-heightでアイコンをwidth,heightの箱の中で中央ぞろえ */
  position: absolute;
  /* absoluteするとエリアマップの上に重なる */
  top: 10px;
  }

</style>
</head>
<body>

<!-- 左メニュー -->
 <button id="toggle-left" class="toggle-btn">≪</button>
 

<div class="left" id="leftMenu">
  <button id="homeBtn"><a href="index.php">
    <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 -960 960 960" width="36px" fill="black"><path d="M226.67-186.67h140v-246.66h226.66v246.66h140v-380L480-756.67l-253.33 190v380ZM160-120v-480l320-240 320 240v480H526.67v-246.67h-93.34V-120H160Zm320-352Z"/></svg>
  </a></button>
  <h2>折込エリアマップ</h2>
  <div class="search">
    <input type="text" id="searchBox" placeholder="教室名を入力">
  </div>
  <div id="menuContainer"></div>
</div>

<!-- 右側 -->
<div class="right">
  <div class="image-container">
    <div id="placeholderText">
      
      <p>現在の折込チラシ配布エリアを確認できるページです。</p>
      自教室の配布エリアを確認し、入学者数/受信者数の観点から、追加または削除した方がいいエリアがあれば、提案をしていただきたいと思います。<br>
      <p>「このあたりに折込チラシを入れたら受信が増えるのではないだろうか」<br>
      「ここに折込チラシを入れても、距離は教室から近いが、アクセスが悪いので効果が乏しいのではないだろうか」</p>
      など、その他お気づきの点がございましたら広報課(<a href="mailto:kouhou@melife.jp">kouhou@melife.jp</a>)までご連絡ください。<br>
      <p>受信数向上にぜひご協力お願いします。</p>

      <h3>配布エリア確認方法</h3>
      <span class="tips">①自教室を検索または選択し、エリアマップを表示させます。<br>
      <span class="notready">(まだ準備中の教室もございます。ご了承ください。)</span><br>
      色が塗られているエリアが、現在折込チラシを配布しているエリアです。<br>
      また、★マークが教室です。</span>
      <span class="tips">②エリアマップが不明瞭な場合は、グーグルマップを参考にしてください。<br>
      全国の教室にピンを立てています。<br></span>
      <span class="tips">③メニュー開閉ボタンをクリックして閉じてください。<br></span>
      <span class="additional">※折込業者による改訂のため、折込チラシ配布エリアが最新の内容と異なる場合があります。ご了承ください。<br>
      ※必要に応じて、エリアマップまたはグーグルマップを全画面表示させたり、エリアマップを印刷したりすることも可能です。ぜひご活用ください。</span>
<!-- 
      <h3>グーグルマップの参考手順</h3>
      <span class="tips">①グーグルマップとエリアマップの両方を表示させたあと、両地図から自教室を探します。
      エリアマップにある★マークが教室です。</span>
      <span class="tips">②エリアマップをズームし、駅名の表記がある場合は周囲の駅名を確認したあと、グーグルマップでその駅名を探します。両地図が同じ位置・同じ表示範囲になるように合わせます。<br></span>
      <span class="tips">③道路や線路の形状、地形をヒントに両地図の縮尺を合わせます。<br>
      必要に応じて、エリアマップまたはグーグルマップを全画面表示させたり、エリアマップを印刷したりすることも可能です。</span>
  -->
    </div>
    <img id="classImage" src="" alt="選択した教室の地図">
    <button id="openImageBtn" class="fullscreen-btn" title="全画面表示">⛶</button>
  </div>
  <div class="map-container">
    <iframe src="https://www.google.com/maps/d/embed?mid=14ibZ0-4yFOZnzxevZ4shgnZeceRSsW8&ehbc=2E312F&hl=ja"></iframe>
  </div>
</div>

<script>

  //dom取得・変数定義
const menuContainer = document.getElementById('menuContainer');
const classImage = document.getElementById('classImage');
const NOT_READY_SRC="images/zyunbityu.webp";

classImage.parentElement.style.cursor = 'default'; // ★追加


  // 画像エラー時フォールバック(エラーのとき、準備中の画像を載せるってこと。空の時は下の方に別でコード書いてる)
        classImage.addEventListener('error', () => {//classImageというimg要素にエラー起きたら(ファイルが存在しない、パスが誤り、画像が壊れてるなど)
        if (classImage.dataset.fallback === '1') return;//fallback(失敗時の戻り先)。文字列1じゃなくてもdoneでもなんでもいい。
        //この画像のフォールバック状態は１という文字になっているか。→この画像はすでにフォールバック済みか。もしそうならreturn：ここで処理をやめてなにもしないで戻る
        //＝準備中画像に切り替えてるならなにもしなくていい。無限ループを防ぐためのコード
        classImage.dataset.fallback = '1';//htmlでは<img data-fallback="1">のイメージ
        classImage.src = NOT_READY_SRC;
        //この二行は、この画像はもうフォールバック済みという印をつけてから、表示画像を準備中ですのものに差し替えるということ
        //フォールバックされてない場合の指示
        });

let scale = 1;
let originX = 0;
let originY = 0;
let isDragging = false;
let startX, startY;
let imageVisible = false; // ★追加

function updateMap(lat, lng, z){
  const iframe = document.querySelector(".map-container iframe");
  const MAP_ID = "14ibZ0-4yFOZnzxevZ4shgnZeceRSsW8&ehbc=2E312F";
  iframe.src = `https://www.google.com/maps/d/embed?mid=${MAP_ID}&hl=ja&ll=${lat},${lng}&z=${z}`;
}

//エリアマップ全画面表示
const openImageBtn = document.getElementById('openImageBtn');

openImageBtn.addEventListener('click', () => {
  if (!classImage.src) return;
  window.open(classImage.src, '_blank');
});

// メニュー読み込み
fetch('data.json')
  .then(res => res.json())
  .then(data => {
    const blocks = {};
    data.forEach(item => {//forEach()のなかのitemは変数なのでitemでなくても何でもいい。dataっていう配列の中から1つずつ取り出していて、
      // それに名前をここではitemってつけただけ。forEach()の中は全部そう

      if(!blocks[item.block]) blocks[item.block] = [];
      blocks[item.block].push(item);
    });

    Object.keys(blocks).forEach(blockName => {
      const blockDiv = document.createElement('div');
      blockDiv.classList.add('block');
      const blockHeader = document.createElement('div');
      blockHeader.classList.add('block-name');
      blockHeader.textContent = blockName;
      blockDiv.appendChild(blockHeader);

      const ul = document.createElement('ul');
      ul.classList.add('class-list');//ul class="class-list"ってこと。作ったulにクラス名をつけた

      blocks[blockName].forEach(cls => {//jsonの1行分のデータそのもの。clsでなくてもいい。自由に決められる変数
        const li = document.createElement('li');//liはメニューの各教室の行と思えばいい。liをhtmlに作ってる。
        li.textContent = cls.name;//liタグの中の文字(textContent)＝jsonのnameタグにある文字
        
        li.dataset.image = cls.image;
        li.dataset.lat = cls.lat;
        li.dataset.lng = cls.lng;

      //  <li data-image="shinjuku.webp" data-lat="35.69" data-lng="139.70"/>
      //  函館
      // </li>
//こういうイメージ。datasetをつけてるのは、textContentと違って表示させないものだから。あとで使う用に覚えておかせるものだから。
//htmlのdata- イコール jsのdataset

        li.addEventListener('click', () => {

          // ★追加：表示状態リセット
  scale = 1;
  originX = 0;
  originY = 0;
  classImage.style.transform = 'translate(0px, 0px) scale(1)';

        document.getElementById("placeholderText").style.display = "none";//初めの説明文は表示しない
        openImageBtn.style.display = "block";//全画面表示のアイコン表示
        classImage.style.display = "block";//cssでdisplay:none;だったものをblockに書き換えて表示させてる。クリックなどで画像を表示させたいときによく使う方法
        
          imageVisible = true; // ★追加
  classImage.parentElement.style.cursor = 'grab'; // ★追加
          

         classImage.dataset.fallback = '0'; // フラグリセット.前にかいてるエラー状態をなかったことにする。

        const imgPath = (cls.image && cls.image.trim()) ? cls.image.trim() : NOT_READY_SRC;//jsonのimage空かチェック
        //cls.image && cls.image.trim()でcls.imageが存在して、かつ、空白を消したら中身はあるか。trim()が空白消すので" "→""になる。""これは空として扱われる
        //条件 ? A : B 条件がtrueならA,falseならB
 
        classImage.src = imgPath;
       //<img id="classImage" src="" alt="選択した教室の地図">htmlでこうしてるので、このimgに対してclassImage.src=で、エリアマップか準備中かを出すってこと

        updateMap(cls.lat, cls.lng, 14);
      });
        ul.appendChild(li);
      });

      blockDiv.appendChild(ul);
      menuContainer.appendChild(blockDiv);

      blockHeader.addEventListener('click', () => {
        ul.style.display = ul.style.display === 'block' ? 'none' : 'block';
      });
    });
  });


//教室検索
const searchBox = document.getElementById('searchBox');

searchBox.addEventListener('input', () => {//検索欄に入力したら、
  const keyword = searchBox.value.trim();//keywordは検索欄に入力した値（空白を除く）
  if (!keyword) return;//!は否定なので、「検索欄に入力した値が存在しなければ＝空なら」これより下に書いてる処理を実行しない
  //これがなければ、検索欄が空で検索されても表示される。バグの温床になる。

  const allLis = document.querySelectorAll('.class-list li');//class-listは作ったulのクラス名

  allLis.forEach(li => {//foreachの意味は、「allLis の中にある li を、1個ずつ順番に取り出して処理する」。変数なのでliじゃなくてもitemでもOK
    if (li.textContent.includes(keyword)) {//li.tectContent=jsonのnameから作られた教室名 
      li.click();//検索した値（keyword)が教室メニューにある教室名(li.textContent)に含まれているなら、そのliをクリック
      //「寝」と検索→寝屋川教室が表示される
    }
  });
});



// 左メニュー開閉
const leftMenu = document.getElementById('leftMenu');
const toggleBtn = document.getElementById('toggle-left');
toggleBtn.addEventListener('click', () => {
  leftMenu.classList.toggle('collapsed');
  toggleBtn.textContent = leftMenu.classList.contains('collapsed') ? '≫' : '≪';
  toggleBtn.style.left = leftMenu.classList.contains("collapsed") ? "40px" : "210px";
});


// ホイールでズーム（中央基準）
classImage.parentElement.addEventListener('wheel', e => {//変数eなのでeじゃなくてもOK
if (!imageVisible) return; // ★追加
  if(isDragging) return; // ドラッグ中はズームしない
  
  if (e.target.closest('#placeholderText')) return;//説明文#placeholderTextではホイールでズームさせたいので、returnでやめさせてる
    e.preventDefault();//wheelの標準(default)動作であるスクロールをやめて(prevent)

   const zoomFactor = 1.1; // 1.1倍で調整（0.1固定より安定）
  const parentRect = classImage.parentElement.getBoundingClientRect();

   // 親要素基準＋現在のtranslateを引く
  const offsetX = e.clientX - parentRect.left - originX;
  const offsetY = e.clientY - parentRect.top - originY;

  const prevScale = scale;
  scale = e.deltaY < 0 ? scale * zoomFactor : scale / zoomFactor;
  scale = Math.min(Math.max(scale, 0.1), 5);

  originX -= offsetX * (scale / prevScale - 1);
  originY -= offsetY * (scale / prevScale - 1);

  classImage.style.transform = `translate(${originX}px, ${originY}px) scale(${scale})`;
});

// ドラッグ
classImage.addEventListener('mousedown', e => {//mousedownはドラッグ開始
 if (!imageVisible) return; // ★追加：画像ない時は何もしない
  e.preventDefault();
  isDragging = true;
  startX = e.clientX - originX;
  startY = e.clientY - originY;//座標をstartX/Y = mouse - origin に保存
  classImage.parentElement.style.cursor = 'grabbing';
});




document.addEventListener('mousemove', e => {  //mousemoveはドラッグ移動
  if(!isDragging) return;
  originX = e.clientX - startX;  //originX/Y = マウス-startX/Y
  originY = e.clientY - startY;  
  classImage.style.transform = `translate(${originX}px, ${originY}px) scale(${scale})`;
});
document.addEventListener('mouseup', () => {  //mouseupはドラッグ終了
  isDragging = false;
  classImage.parentElement.style.cursor = imageVisible ? 'grab' : 'default';
});

window.addEventListener('pageshow', () => {

  // --- ズーム状態リセット ---
  scale = 1;
  originX = 0;
  originY = 0;
  isDragging = false;
  imageVisible = false;

  classImage.style.transform = 'translate(0px, 0px) scale(1)';
  classImage.style.display = 'none';

  // --- UI状態リセット ---
  document.getElementById("placeholderText").style.display = "block";
  openImageBtn.style.display = "none";

  // --- カーソル戻す ---
  classImage.parentElement.style.cursor = 'default';

});

window.addEventListener('load', () => {
  scale = 1;
  originX = 0;
  originY = 0;
  classImage.style.transform = 'translate(0px, 0px) scale(1)';
});


</script>

 <?php
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

</body>
</html>
