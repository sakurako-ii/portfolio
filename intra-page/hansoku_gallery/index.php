<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>販促物ギャラリー</title>
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    <style>
     body{
      display: flex;
      width: 100%;
      margin: 0;
      padding: 0;
      font-family:"Zen Maru Gothic", sans-serif;
       cursor: none;
     }
    .zen-maru-gothic-regular {
  font-family: "Zen Maru Gothic", sans-serif;
  font-weight: 400;
  font-style: normal;
}



     .left{
      width: 270px;
     
       background-color: black;
       position: fixed;
       height: 100%;
       overflow-y: scroll;
       color:white;
       background: url("images/left4.jpg") 20% 100% / cover repeat; 
      /* background-size:cover; */
       /* background-position: 10% 50%; 位置調整 */
  /* background-repeat: no-repeat;繰り返し防止 */
   /* overflow: hidden;  
   box-sizing: border-box;
     --shineX: -200px;
  --shineY: -200px;
  */
     }
   
     /*  
.left::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  background: radial-gradient(circle 120px at var(--shineX) var(--shineY), hsla(32, 100%, 72%, 0.70), transparent 60%);
  transition: background 0.05s;
}
  */
     /*  
     .left::before{
       content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 270px;
  height: 100%;
  background: url("images/leftside.jpg") 10% 50% / cover no-repeat;
  filter: blur(2px);      
  z-index: -1;          
     }
  */

     .left::-webkit-scrollbar {
  width: 10px;
}

.left::-webkit-scrollbar-track {
  background: #818daf;   /* 背景 */
}

.left::-webkit-scrollbar-thumb {
  background: linear-gradient(
    #2c2b45,
    #3d3c51
  );
  border-radius: 10px;
}

.left::-webkit-scrollbar-thumb:hover {
  background: linear-gradient(
    #2c2b45,
    #3d3c51
  );
}

     .right{
      width: 100%;
      /* これ書くとleftのメニューが大きいPCでもwidth変わらなかった */
      padding-left: 370px;
      /* position: relative; */
      /* left: 15%; */
      padding-right: 70px;
      padding-bottom: 100px;
      background-color: #26324e;
      background-image: url(images/right.jpg);
      background-repeat: no-repeat;
      background-size: contain;

     }
     .right .text{
      margin: auto;
      display: block;
      
     }
     h1{
      font-size: 24px;
      text-align: center;
      /* h1はインライン要素なのでtext-alin centerできく */
      padding: 40px;
      margin-bottom: 60px;

  /* border: 1px solid rgba(255,255,255,0.3); */
  box-shadow: 0 8px 25px rgba(0,0,0,0.2);
 }

.left h1 span {
  display: inline-block;
  padding: 14px 22px;

  background: rgba(255,255,255,0.12);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);

  border-radius: 20px;

  -webkit-mask-image: radial-gradient(
    ellipse at center,
    rgba(0,0,0,1) 40%,
    rgba(0,0,0,0.8) 60%,
    rgba(0,0,0,0.5) 80%,
    rgba(0,0,0,0.2) 100%,
    transparent 130%
  );
  mask-image: radial-gradient(
    ellipse at center,
    rgba(0,0,0,1) 40%,
    rgba(0,0,0,0.8) 60%,
    rgba(0,0,0,0.5) 80%,
    rgba(0,0,0,0.2) 100%,
    transparent 130%
  );
}

     #menuContainer{
      /* border: 1px red solid; */
      /* margin-left: 40px; */
      margin-bottom: 56px;
      margin-right: 20px;
      width: 200px;
      float: right;
     }
     .menu-item,.menu-sub{
      /* height: 60px; */
      /* cursor: pointer; */
      padding:3px;
       /* border: 1px solid red;  */
       /* text-align: center; */
      
     }
     .menu-item.active,
.menu-sub.active {
  /* color: red; */
  /* font-weight: bold; */
}
     .menu-item{
      font-size: 17px;
      transition:transform .25s;
      font-weight:600;
      padding-top: 32px;
      /* border-top: 1px solid #3f3f3f;  */
      padding-bottom:8px;
     }
     /*  
     .menu-item:nth-of-type(1),
     .menu-item:nth-of-type(2)
     {
      padding-bottom: 42px;
     }
      */
     .menu-item:nth-of-type(3),
     .menu-item:nth-of-type(4),
     .menu-item:nth-of-type(5){
      
     }
     .menu-sub{
      font-weight:600;
      font-size: 14px;
      margin-top :4px;
      /* margin-left: 38px; */
      line-height: 1.5;
      transition:transform .25s;
      color:#cfcfcf;
     }
     /*  
     .menu-sub:nth-child(3 of .menu-sub),
     .menu-sub:nth-child(4 of .menu-sub) {
      padding-bottom: 20px;
      }
       */

    div:has(> .menu-sub:nth-of-type(5)) > .menu-sub,
    div:has(> .menu-sub:nth-of-type(2)) > .menu-sub{
      line-height:1.1;
    }
    /* .menu-item:nth-of-type(3) + .menu-sub + div{ 
      padding:5px 0 18px 25px;
    }
     */
   div:has(> .menu-sub:nth-of-type(5)),
    div:has(> .menu-sub:nth-of-type(2)){
      padding:5px 0 18px 0px;
    }



     .menu-item:hover,
     .menu-sub:hover{
      transform:translateX(3px);
     }
     .right .text{
      margin: 61px 0;
      width: 700px;
      /* divはブロック要素なのでwidthで幅決めてからmargin auto */
      font-size: 14px;
      background: #f1f3f9; 
      padding:15px 30px;
      /* background: #fcfaee; */
     }
    
     .text-large{
      font-size: 17px;
      border-bottom:1px dotted black;
      padding-bottom:10px;
      line-height:1.7;
     }
     
     .gallery{
      display: flex;
      flex-wrap: wrap;
      /* flex-direction: row-reverse; */
      margin: 30px auto;
       gap: 15px;
       align-items:flex-end; 
      /* 子要素の一行の中での縦の配置の指定。横長の画像が縦長の画像の中央に配置される */
      /* justify-content: space-between; */
      justify-content: flex-start;
      /* align-content: flex-start; */
      
     }
     .gallery.normal-order{
      /* 同じ要素に2つのclassがついてたらスペースをいれない */
      /* flex-direction: row; */
     }
     .gallery:not(.normal-order){
      /* flex-wrap:wrap-reverse  !important; */
      }
     .gallery-cell{
      justify-content: center; 
      /* ラッパー内で画像中央寄せ */
   
        /* max-width: 30%;  */
        /* 1行に3つまで */ 
      
        margin-bottom: 70px;
     }

    .gallery .gallery-cell img{ 
  
     /* border: 1px black solid; */
     /* cursor: pointer; */
    
     object-fit: contain;
      max-width: 100%; 
      max-height: 100%; 
     width:auto !important;
     height:auto !important;
    display: block;
    box-shadow: 10px 16px 14px -7px rgba(0,0,128,0.2);

    align-self:center;
    /* flexの中身はalign-self:stretchがデフォなんだけどそしたらimgが親要素の大きさに合わせられるので。centerにするとimg本来の大きさになるのでimg本来に影がつく */
     
    transition:transform .25s ease;
  }

    .gallery .gallery-cell img:hover{ 
    /* opacity: 0.6; */
    transform:scale(1.02);
     }
    
    .img-box {
    width: 250px;
    height: 250px;     /* 表示したい枠サイズ */
     display: flex;  /*これがないとalign-items,justify-contentは無効 */
     /* align-items: flex-end;   */
    justify-content: center; 
    /* overflow: hidden; */
    }

.background-color{
 background:#f1f3f9; 
  width: 300px;
  height:300px;
  display:flex;
  align-items:center;
  justify-content:center;
 /* background: #fcfaee; */
}


     h2{
      /* text-align: center; */
      font-size: 20px;
       margin-top: 100px; 
       margin-bottom: 50px;
       color:white; 
      /* width: 100%; */
   
      /* max-width: 1200px;  */
       
     }
/*  
     .info{
      display: flex;
      justify-content:space-around;
      align-items: baseline;
      margin-top: 10px;
      
     }
  */
.info {
  display: flex;
  justify-content: space-around;
  align-items: baseline;
  margin-top: 10px;
  /* 追加 */
   position: relative;
  z-index: 2;
}

.action-box {
  display: flex;
  align-items: center;
  height: 45px;
}

.fav-btn.active {
   /* background: linear-gradient(90deg, #fffb8d, #e5fc51, #d7ff11); */
    color: #f8ff33;
}

     .school-name{
      font-size: 18px;
      line-height: 0.6;
      color:white; 
     }

     .like-btn,
     .fav-btn{
      border: none;
      background: none;
      cursor: pointer;
      line-height: 0.6;
      color: #999;
     }
     .like-btn{
      font-size: 48px;
      display: inline-block;
     }
    .fav-btn{
      font-size: 33px;
    }

     .liked{
      background: linear-gradient(360deg, #ff8dd1, #ff44b4, #ff11a0);
      /* color: rgb(246, 106, 190); */

      /* 背景を文字にクリップ */
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;

  /* Firefox用 */
  background-clip: text;
  color: transparent;

     }
     .like-count{
      font-size: 24px;
      width: 1.2em;
      color: white; 
     }



.modal{
  display: none;
  position: fixed;
  z-index: 9999;
  left:0; top:0;
  width:100%; height:100%;
  background: rgba(0,0,0,0.85);
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s;
  cursor:pointer !important;
}

.modal.show{
  display: block;
  opacity: 1;
  visibility: visible;
}


.modal-content{
  display:block;
  max-width:90%;
  max-height:90%;
  margin:auto;
  position:absolute;
  top:0; left:0; right:0; bottom:0;
}

.modal-close{
  /* position:absolute; */
  /* top:20px; */
  /* right:35px; */
  color:#fff;
  font-size:40px;
  cursor:pointer;
}
.download-btn{
  
  background:none;
  cursor: pointer;
  border: none;
}
.modal-header{
  display: flex;
 gap: 12px;
 align-items: center;
  position: absolute;
  top: 25px;
  right: 30px;
}

#modalImg {
  cursor: grab; /* 通常は grab */
  user-drag: none;
  -webkit-user-drag: none;
  user-select: none;
   -webkit-user-select: none;
}
#modalImg:active {
  cursor: grabbing; /* マウス押してるときは grabbing */
}


@keyframes pop {
  0% {
    transform: scale(1);
  }
  40% {
    transform: scale(1.4);
  }
  60% {
    transform: scale(0.95);
  }
  100% {
    transform: scale(1);
  }
}

.like-btn.pop {
  animation: pop 0.3s ease;
}



@media print {
  body * {
   display: none;
  }

.modal-image {
    display: block !important;
    width: 100%;
     width: calc(100vw - 10mm);
    height: auto;
  }
}


.gallery.loading {
  
  text-align: center;
}


.loading-text {
  width: 100%;
  text-align: center;
  padding: 40px 0;
  font-size: 20px;
  display: block;
}

/*  
.admin-badge {
  position: fixed;
  top: 50px;
  right: 20px;
  background: rgba(220, 0, 0, 0.9);
  color: #fff;
  font-size: 12px;
  padding: 8px 12px;
  border-radius: 4px;
  z-index: 10000;
  display: none;
  font-size: 18px;
}
*/
.popular-link {
  position: absolute;
  top: 70px;
  right: 90px;
  /* cursor: pointer; */
  font-weight: bold;
  font-size: 22px;
  display:flex;
  align-items:baseline;
  gap:4px;
  color:white;

    display: inline-block;
  padding: 14px 22px;

  background: rgba(255,255,255,0.12);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);

  border-radius: 20px;

  -webkit-mask-image: radial-gradient(
    ellipse at center,
    rgba(0,0,0,1) 40%,
    rgba(0,0,0,0.8) 60%,
    rgba(0,0,0,0.5) 80%,
    rgba(0,0,0,0.2) 100%,
    transparent 130%
  );
  mask-image: radial-gradient(
    ellipse at center,
    rgba(0,0,0,1) 40%,
    rgba(0,0,0,0.8) 60%,
    rgba(0,0,0,0.5) 80%,
    rgba(0,0,0,0.2) 100%,
    transparent 130%
  );

}
.popular-link img{
  width: 38px;
}
.modal-prev, .modal-next{
  position:absolute;
  top:50%;
  transform:translateY(-50%);
  font-size:80px;
  color:white;
  cursor:pointer;
  user-select:none;
  padding:0 40px;
 
  
}
.modal-prev{ left:120px; }
.modal-next{ right:120px; }
.modal-prev:hover, .modal-next:hover{
  opacity: 0.6;
}

.hide {
  display: none !important;
}

.img-box{
  position: relative;
}

.back-page{
    position: absolute;
  /* top: 50%; */
  /* left: 50%; */
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 4px;
  pointer-events: none;
 transition:transform .25s ease;
  /* ★ まず中央に置く */
  /* transform: translate(-50%, -50%); */
}

/* 2枚目 */
.back-page{
  transform: translate(10px, 8px);
  /* opacity: 0.6; */
  z-index: 0;
}

.img-box > img:last-child{
  position: relative;
  z-index: 2;
}

/* 「img-box にマウスが乗ったとき、中にある back-page にこのスタイルを当てる」 */
.img-box:hover .back-page
{
    transform:translate(10px, 8px) scale(1.02);
     }
.background-color.popular {
  background-color: #f1f3f9; 
  background-image: url('images/frame.webp'); /* 追加したい背景画像 */
  background-size: contain; /* 画像全体に広げる */
  background-position: center;
  /* 追加 */
  position:relative;
  background-repeat: no-repeat;
  overflow: visible;
   z-index: 1;
}
/* 追加 */
.background-color.popular::before {
  content: "";
  position: absolute;
  top: -55px;          /* 上から照らす */
  left: 50%;
  transform: translateX(-50%);
  width: 330px;
  height: 200px;
  background: radial-gradient(
    ellipse at top,
    rgba(255,255,255,0.35) 0%,
    rgba(255,255,255,0.2) 40%,
    rgba(255,255,255,0.05) 70%,
    transparent 100%
  );
  filter: blur(12px);
  pointer-events: none;
  border-radius: 50%;
}
/* 追加 */
.background-color.popular::after {
  content: "";
  position: absolute;
  bottom: -32px;
  left: 50%;
  transform: translateX(-50%);
  width: 100%;
  height: 42px;
  background: radial-gradient(
    ellipse at center,
    rgba(20,30,55,0.6) 0%,
    rgba(20,30,55,0.35) 40%,
    rgba(20,30,55,0.15) 70%,
    transparent 100%
  );
  filter: blur(4px);
  pointer-events: none;
}
/* .fav-btn.pop { 
  animation: pop 0.3s ease;
}
  
@keyframes sparkle {
  0% {
    transform: scale(1) rotate(0deg);
    color: gold;
    text-shadow: 0 0 2px #fff;
  }
  25% {
    transform: scale(1.3) rotate(-15deg);
    text-shadow: 0 0 6px #fff, 0 0 8px gold;
  }
  50% {
    transform: scale(1.4) rotate(15deg);
    text-shadow: 0 0 10px #fff, 0 0 12px gold;
  }
  75% {
    transform: scale(1.3) rotate(-10deg);
    text-shadow: 0 0 6px #fff, 0 0 8px gold;
  }
  100% {
    transform: scale(1) rotate(0deg);
    text-shadow: 0 0 2px #fff;
  }
}

.fav-btn.sparkle {
  animation: sparkle 0.5s ease forwards;
}
*/
@keyframes flyStar {
  0% {
    opacity: 1;
    transform: translate(0, 0) scale(1);
  }
  100% {
    opacity: 0;
    transform: translate(var(--dx), var(--dy)) scale(0);
  }
}

.star {
  position: absolute;
  width: 6px;
  height: 6px;
  background: gold;
  border-radius: 50%;
  pointer-events: none;
  animation: flyStar 0.8s forwards;
}
#light {
  position: fixed;
  width: 30px;
  height: 30px;
  pointer-events: none;
  border-radius: 50%;
  z-index: 5000;
  transform: translate(-50%, -50%);
  opacity: 0.85;

  background:
    radial-gradient(circle at center,
      rgba(255,240,120,1) 0%,
      rgba(255,210,0,0.9) 30%,
      rgba(255,180,0,0.7) 55%,
      rgba(255,140,0,0.4) 70%,
      transparent 85%
    );

  filter: blur(14px);
}

.upload-flex{
  display:flex;
  justify-content:space-between;
  
}
.upload-flex p{
  transform: translateY(-7px);
  line-height:1.6;
}
.upload-button img{
  width: 250px;
   box-shadow: 0 6px 12px rgba(0,0,0,0.3); /* ← 12pxがぼかし */
  transition: 0.25s ease;
  display: inline-block;
}
.upload-flex a {
  cursor: none !important;
}
.upload-button{
  transform: translateY(42px);
  
}
.upload-button img:hover {
  transform: translateY(3px); /* 影の分だけ下に */
  box-shadow: 0 0 0 rgba(0,0,0,0);
   
}
.new-desc {
  font-size: 14px;
  margin-left: 30px;
  color: white;
}
.popular-link{
  transition: 0.25s ease;
}
.popular-link:hover{
  transform:scale(1.07);
}

/* topへ戻るボタン */

.page-top {
  position: fixed;
  bottom: 50px;
  right: 80px;
  width: 100px;
  height: 100px;
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 0;
  /* visibility: hidden; */
  transition: opacity 0.4s ease;
}
/*
 .page-top.is-active { 
  opacity: 0.8;
  visibility: visible;
}
  */

.circle-text {
  position: absolute;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  animation: spin 18s linear infinite; /* 回転アニメーション */
  font-size: 12px;
  font-weight: bold;
  color:white;
  letter-spacing:4px;
  
}

.arrow {
  position: absolute;
  font-size: 28px;
  font-weight: bold;
  pointer-events: none; 
  color:white;
   
}
.page-top:hover{
  opacity: 0.7; 
}

/* 回転アニメーション */
@keyframes spin {
  from { transform: rotate(0deg); }
  to   { transform: rotate(360deg); }
}
     </style> 
</head>
<body>
     <div id="light"></div>
<div class="left" id="leftMenu">
  <h1 id="top"><span>販促物<br>ギャラリー</span></h1>
  <div id="menuContainer"></div>
</div>

<div class="right">
 
  <div class="popular-link" id="popularBtn">
  <img src="images/popular.webp">
    人気作品
  </div>

  <!-- <div id="adminBadge" class="admin-badge">管理者表示中</div>-->

  <div class="text">
    <p class="text-large">
    教室の先生方が作成してくださった販促物を閲覧・保存できるページです。<br>
    各教室でご活用ください。
    </p>
    <div class="upload-flex">
    <p>
    PDF形式に変換の上、UPLOADボタンよりお送りください。<br>
    難しい場合はその他の形式でも受付しております。<br>
    ”函館 追加コマPOP”など教室名とPOP内容が分かるファイル名で<br>
    提出してください。確認後、速やかに掲載いたします。
    </p>
    <div class="upload-button">
      <a href="mailto:kouhou@melife.jp?subject=【○○教室】POP送付"><img src="images/upload.png"></a>
    </div>
  </div>
</div>
  
    <!-- 
    <p>アップしてほしい販促物があれば、月末までに広報課(<a href="mailto:kouhou@melife.jp">kouhou@melife.jp</a>)までお送りください。<br>
    データはPDF形式を推奨しておりますが、難しい場合はその他でも受付しております。<br> 
    翌月5日前後にアップいたします。</p>
    -->
 <h2 id="title"></h2>
  <div class="gallery" id="gallery">
  </div>

 <a href="#top" class="page-top">
    <span class="circle-text">PAGETOPPAGETOPPAGETOP</span>
  <span class="arrow">↑</span>
</a>

<!-- CircleType.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/circletype@2.3.0/dist/circletype.min.js"></script>

</div>

<div id="imgModal" class="modal">
  <div class="modal-header">
      <a class="download-btn" download title="画像をダウンロード">
      <svg xmlns="http://www.w3.org/2000/svg" height="62px" viewBox="0 -960 960 960" width="54px" fill="#fff"><path d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z"/></svg>
      </a>
    <span class="modal-close">&times;</span>
  </div>
    <img class="modal-content" id="modalImg">
    <div class="modal-prev">‹</div>
    <div class="modal-next">›</div>

</div>


  <script>
          // ----- 端末ID取得 / cookie保存 -----
//function getDeviceId() {
  //let id = document.cookie.replace(/(?:(?:^|.*;\s*)deviceId\s*\=\s*([^;]*).*$)|^.*$/, "$1");
  //if (!id) {
    //id = 'dev_' + Math.random().toString(36).substr(2, 9);
    //document.cookie = `deviceId=${id}; path=/`;
  //}
  //return id;
//}

 //const deviceId = getDeviceId();


let favIds = [];

    fetch('data.json')
      .then(res => res.json())//res.json()は、「とってきたやつjsonだからjsで使えるオブジェクトに変換して。response」
      // thenはちょっと待ってから処理するって意味。fetchは非同期なので。
      .then(async data => {//dataはres.json()で変換された中身；jsonからとったデータをdataという名前で扱います。dataは変数
    
    try {
      const resFav = await fetch('favorites.php');
        const favData = await resFav.json();
        favIds = favData.favorites || [];   // ← ★これが正解
    
    } catch (e) {
      console.error('お気に入り取得失敗', e);
      favIds = [];
    }
        const menuContainer = document.getElementById('menuContainer');
        const gallery = document.getElementById('gallery');
        const title = document.getElementById('title');
        const popularBtn = document.getElementById('popularBtn');
        const POPULAR_BORDER = 10;
        const textDiv = document.querySelector('.right .text');
        const defaultText = textDiv.innerHTML;
       

// ★ メニュー active を全部消す共通関数
function clearActiveMenu() {
  document
    .querySelectorAll('.menu-item, .menu-sub')
    .forEach(el => el.classList.remove('active'));
 
}
function clearBackgrounds() {
  document.querySelectorAll('.background-color.popular').forEach(bg => {
    bg.classList.remove('popular');
  });
}


popularBtn.addEventListener('click', async () => {
  clearActiveMenu();

  title.textContent = '人気作品';
  textDiv.innerHTML = `
    <p class="text-large">人気作品ページです。</p>
    <p>たくさん♡いいねされた作品をまとめています。</p>
  `;

  gallery.classList.add('loading');
  gallery.innerHTML = '<p class="loading-text">読み込み中…</p>';
  gallery.scrollTop = 0;

  await new Promise(r => setTimeout(r, 0)); // 描画させる

  // ① 全画像収集
  const allImages = [];
  Object.values(data).forEach(item =>
    collectImagesSameOrder(item, allImages)
  );

  // ② IDをまとめる
  const ids = allImages.map(img => img.id);
  // ③ まとめて1回だけ取得
  //const res = await fetch(`like.php?ids=${ids}`);
  const res = await fetch('like.php', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({ ids: ids })
});

  const allLikes = await res.json();

  const fragment = document.createDocumentFragment();
  const seenIds = new Set();
   const popularList = [];

  allImages.forEach(imgData => {


    const likeData = allLikes[imgData.id];
    const likeCount = likeData ? likeData.likeCount : 0;
    

    if (likeCount >= POPULAR_BORDER && !seenIds.has(imgData.id)) {
      seenIds.add(imgData.id);

        // ★ここ変更（直接appendしない）
        popularList.push({
          ...imgData,
        likeCount
    });
     // fragment.appendChild(createGalleryItem(imgData, true));
    }
  });
// ★③ ソート
popularList.sort((a, b) => b.likeCount - a.likeCount);

// ★④ 描画
popularList.forEach(item => {
  fragment.appendChild(createGalleryItem(item, true));
});

  gallery.classList.remove('loading');
  gallery.innerHTML = '';

  if (!fragment.hasChildNodes()) {
    gallery.innerHTML = `
      <p style="padding:40px 0; text-align:center; color:white;">
        まだ人気作品はありません。
      </p>
    `;
  } else {
    gallery.appendChild(fragment);
  }
});

    

        function createGalleryItem(imgData, isPopular = false) {
           console.log("生成ID:", imgData.id); // ← 追加
  const wrapper = document.createElement('div');
  wrapper.className = 'gallery-cell';

  const img = document.createElement('img');
  //img.src = imgData.src;
  img.src = imgData.thumb || imgData.src;

  img.dataset.id = imgData.id;

  // ===== モーダル =====
 img.addEventListener('click', () => {
  modal.classList.add('show');
  modalImg.src = imgData.src;
  resetZoom();

  openModal(imgData);
});


  //img.onerror = () => wrapper.remove();

  // ===== info =====
  const info = document.createElement('div');
  info.className = 'info';

  const school = document.createElement('span');
  school.className = 'school-name';
  school.textContent = imgData.school + '教室作品';

  const likeBtn = document.createElement('button');
  likeBtn.className = 'like-btn';
  likeBtn.textContent = '♥';

  const count = document.createElement('span');
  count.className = 'like-count';
  count.textContent = "0";

// ⭐ favorite
const favBtn = document.createElement('button');
favBtn.className = 'fav-btn';
favBtn.textContent = '★'; // or ⭐

if (favIds.includes(imgData.id)) {
  favBtn.classList.add('active');
}

// 右側まとめ
const actionBox = document.createElement('div');
actionBox.className = 'action-box';

 actionBox.appendChild(favBtn);   // ← 左
actionBox.appendChild(likeBtn);  // ← 右
actionBox.appendChild(count);

  info.appendChild(school);
info.appendChild(actionBox);

  // ===== 画像BOX =====
  const imgBox = document.createElement('div');
  imgBox.className = 'img-box';

  // ★ 2枚目3枚目を物理的に追加
if (imgData.pages && imgData.pages.length > 1) {
  imgData.pages.slice(1,2).forEach((src, i) => {
    const backImg = document.createElement('img');
    backImg.src = src;
    backImg.className = 'back-page';
    imgBox.appendChild(backImg);
  });
}

  imgBox.appendChild(img);


//background-color
const backgroundcolor = document.createElement('div');
backgroundcolor.className = 'background-color';

  // 人気作品なら popular クラスをつける
  if (isPopular) {
    backgroundcolor.classList.add('popular');
  }

backgroundcolor.appendChild(imgBox);

  // ===== wrapper に詰める =====
  wrapper.appendChild(backgroundcolor);
  wrapper.appendChild(info);

  // 初期 like 状態
fetch(`like.php?imageId=${imgData.id}`)
  .then(res => res.json())
  .then(data => {
    // 管理者 or 自分がいいねしてたら数を表示
  count.textContent = data.likeCount;

    // 自分がいいねしてたら色を付ける
    if (data.liked) {
      likeBtn.classList.add('liked');
    } else {
      likeBtn.classList.remove('liked');
    }
  });

fetch(`favorites.php?imageId=${imgData.id}`, { credentials: 'same-origin' })
  .then(res => res.json())
  .then(data => {
    if (data.favorited) {
      favBtn.classList.add('active');
    }
  });



  // like クリック
  likeBtn.addEventListener('click', async () => {
    const action = likeBtn.classList.contains('liked') ? 'unlike' : 'like';

    const res = await fetch('like.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        imageId: imgData.id,
        action,
      })
    });

 const result = await res.json();

if (result.liked) {
  likeBtn.classList.add('liked');

    // ★ ポン！アニメ
  likeBtn.classList.remove('pop'); // 連打対策
  void likeBtn.offsetWidth;        // 再描画トリガー
  likeBtn.classList.add('pop');

} else {
  likeBtn.classList.remove('liked');
}
// ★ ここ共通で毎回更新
count.textContent = result.likeCount;
  });

    

function createSparkle(favBtn) {
  const rect = favBtn.getBoundingClientRect();
  const parent = document.body;

  for (let i = 0; i < 8; i++) {
    const star = document.createElement('div');
    star.className = 'star';

    // 飛ぶ方向
    const dx = (Math.random() - 0.5) * 80 + 'px';
    const dy = (Math.random() - 0.5) * 80 + 'px';
    star.style.setProperty('--dx', dx);
    star.style.setProperty('--dy', dy);

    // 初期位置（スクロール補正）
    star.style.left = rect.left + rect.width/2 + window.scrollX + 'px';
    star.style.top = rect.top + rect.height/2 + window.scrollY + 'px';

    parent.appendChild(star);

    star.addEventListener('animationend', () => star.remove());
  }
}


// ⭐ お気に入りクリック（サーバー保存版）
favBtn.addEventListener('click', async (e) => {
  e.stopPropagation();

  const isFav = favBtn.classList.contains('active');

  const res = await fetch('favorites.php', {
    method: 'POST',
     credentials: 'same-origin',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
      imageId: imgData.id,
      action: isFav ? 'remove' : 'add'
    })
  });
  
  const data = await res.json();

  favBtn.classList.toggle('active', data.favorited);

  // ★ ポン！アニメ（追加された場合だけ）
  if (data.favorited && !isFav) {
    createSparkle(favBtn);
  }

 // ★ JSメモリ更新 ← 超重要
  if (data.favorited) {
    if (!favIds.includes(imgData.id)) favIds.push(imgData.id);
  } else {
    favIds = favIds.filter(id => id !== imgData.id);
  }

  // ★ 今「お気に入りフォルダ表示中」なら即削除
  if (title.textContent === '★お気に入り' && !data.favorited) {
    wrapper.remove();
  }
  // ← ここに入れる
  if (!isFav) createSparkle(favBtn);
});


  return wrapper;
}


    window.addEventListener('pageshow', async function () {
  try {
    const resFav = await fetch('favorites.php');
    const favData = await resFav.json();
    favIds = favData.favorites || [];

    // すでに表示されている★ボタンを全更新
    document.querySelectorAll('.fav-btn').forEach(btn => {
      const id = btn.closest('.gallery-cell')
                    .querySelector('img').dataset.id;
      btn.classList.toggle('active', favIds.includes(id));
    });

  } catch (e) {
    console.error('再同期失敗', e);
  }
});

        


    // メニュー生成
        //Object.keys(data).forEach(key => {
          //Object.keys(data).でdataのキー名一覧(new,like,admission...)を配列で取り出す。Object.keys()は関数。dataというオブジェクトのキーをくださいって意味
          // dataは.then(data =>で自分でつけた名前
          //dataの中身を一個ずつ取り出して、同じ処理を繰り返す
          //Object.keys(data)で抽出したキー名の一つずつをkeyと呼ぶねって意味。keyがappleでもnew,like...が抽出される
          //const item = data[key];
          // data[key]でkeyの中身を使って探す。data.keyだとkeyという名前のプロパティを探すになるけどないから
          //data["new"],data["like"]になる
          

Object.values(data).forEach(item => {
          createMenu(item);
         });



   


          function createMenu(item, level = 0, parentEl = menuContainer) {
  const div = document.createElement('div');
  div.className = level === 0 ? 'menu-item' : 'menu-sub';
  div.textContent = item.label;
  // div.style.marginLeft = level * 20 + 'px';

  parentEl.appendChild(div);

  // ★ children を入れる箱
  let childrenBox = null;

  // 2階層目で子を持つ場合だけ開閉式
  if (item.children && level === 1) {
    // 子がある場合は開閉ボックス作る
    childrenBox = document.createElement('div');
    childrenBox.style.display = 'none'; // 初期は閉じる
    parentEl.appendChild(childrenBox);

    Object.values(item.children).forEach(child => {
      createMenu(child, level + 1, childrenBox);
    });
  } else if (item.children) {
    // それ以外は通常展開（開閉式なし）
    Object.values(item.children).forEach(child => {
      createMenu(child, level + 1, parentEl);
    });
  }


  // クリックしたら画像を全部表示
  div.addEventListener('click', async(e) => {
      e.stopPropagation(); // ← これを必ず入れる

// children を持たない「表示切り替え系」だけ active
if (!childrenBox) {
  clearActiveMenu();
  div.classList.add('active');
}

       // children がある場合 → 開閉
    if (childrenBox) {
      childrenBox.style.display =
        childrenBox.style.display === 'none' ? 'block' : 'none';
      return;
    }

   // ★ お気に入り（like）メニュー用
if (item.label === '★お気に入り') {

  title.textContent = item.label;
  gallery.innerHTML = '';
  gallery.scrollTop = 0;
  textDiv.innerHTML = `
    <p class="text-large">お気に入りページです。</p>
    <p>気になる作品はお気に入り登録するとまとめて確認できます。</p>
  `;

  // サーバーからお気に入り一覧を取得
const res = await fetch('favorites.php');
//const favIds = await res.json(); // favorites.php が配列を返す場合

console.log("サーバーfavIds:", favIds); // ← 追加

  if (favIds.length === 0) {
    gallery.innerHTML = `
      <p style="padding:40px 0; text-align:center; color:white;">
        まだお気に入り作品はありません。
      </p>
    `;
    return;
  }

  // 全画像を一旦集める
  const allImages = [];
  Object.values(data).forEach(d =>
    collectImagesSameOrder(d, allImages)
  );


console.log("favIds:", favIds);
console.log("all image ids:", allImages.map(i => i.id));


  const seen = new Set();

  favIds.forEach(favId => {
    const imgData = allImages.find(img => img.id === favId);
    if (!imgData) return;
    if (seen.has(imgData.id)) return;

    seen.add(imgData.id);
    gallery.appendChild(createGalleryItem(imgData));
  });

  return;
}




//console.log('clicked:', item.label, item);


  
    // children が無い場合 → 画像表示（※今回は触らない）
    if (item.label.includes('All')) {
  title.innerHTML = `
    ${item.label}
    <span class="new-desc">✨は新たに追加した作品です。</span>
  `;
} else {
  title.textContent = item.label;
}

    gallery.innerHTML = '';
    gallery.scrollTop = 0;
    appendImages(item);
    textDiv.innerHTML = defaultText; 

  });


  if (item.label.includes('All')) {
  setTimeout(() => div.click(), 0);
}


}

function appendImages(item) {
  if (item.images) {
    // console.log('append images:', item.label, item.images.length);

     // JSON順をコピーして逆にする
    const reversedImages = item.images.slice().reverse();

    reversedImages.forEach(imgData => {
      //  console.log('append one:', imgData.src);
      gallery.appendChild(createGalleryItem(imgData));
    });
  }

  if (item.children) {
    Object.values(item.children).forEach(child => {
      appendImages(child);
    });
  }
}
function collectImages(item, arr) {
  if (item.images) {
    item.images.forEach(img => arr.push(img));
  }
  if (item.children) {
    Object.values(item.children).forEach(child => collectImages(child, arr));
  }
}

function collectImagesSameOrder(item, arr) {
  if (item.images) {
    item.images
      .slice()
      .reverse()
      .forEach(img => arr.push(img));
  }

  if (item.children) {
    Object.values(item.children).forEach(child =>
      collectImagesSameOrder(child, arr)
    );
  }
}

        
        }
      );
      
      // 面積同じにして縦長小さくして横長おおきくしようとしたけどむり
const modal = document.getElementById('imgModal');
const closeBtn = document.querySelector('.modal-close');

/* ← ここに入れる！！ */
let modalPages = [];
let modalIndex = 0;

const nextBtn = document.querySelector('.modal-next');
const prevBtn = document.querySelector('.modal-prev');

function showModalPage() {
  modalImg.src = modalPages[modalIndex];
  resetZoom();
 // ←ここ追加
 prevBtn.classList.toggle('hide', modalIndex === 0);
  nextBtn.classList.toggle('hide', modalIndex === modalPages.length - 1);
}

closeBtn.onclick = () => modal.classList.remove('show');

modal.onclick = (e) => {
  if (e.target === modal) modal.classList.remove('show');
};

// ===== モーダルズーム＆ドラッグ =====
const modalImg = document.getElementById("modalImg");

let scale = 1;
let pos = { x: 0, y: 0 };
let isDragging = false;
let last = { x: 0, y: 0 };

function resetZoom() {
  scale = 1;
  pos = { x: 0, y: 0 };
  updateTransform();
}

function updateTransform() {
  modalImg.style.transform =
    "translate(" + pos.x + "px," + pos.y + "px) scale(" + scale + ")";
}

// ズーム
modalImg.addEventListener("wheel", function(e) {
  e.preventDefault();
  scale += e.deltaY < 0 ? 0.1 : -0.1;
  if (scale < 0.5) scale = 0.5;
  updateTransform();
});

// ドラッグ開始
modalImg.addEventListener("mousedown", function(e) {
  isDragging = true;
  last = { x: e.clientX, y: e.clientY };
  document.addEventListener("mousemove", onDragMove);
  document.addEventListener("mouseup", onDragEnd);
});

function onDragMove(e) {
  if (!isDragging) return;
  pos.x += e.clientX - last.x;
  pos.y += e.clientY - last.y;
  last = { x: e.clientX, y: e.clientY };
  updateTransform();
}

function onDragEnd() {
  isDragging = false;
  document.removeEventListener("mousemove", onDragMove);
  document.removeEventListener("mouseup", onDragEnd);
}

modalImg.setAttribute("draggable", "false");




  // DL設定
//function openModal(item) {
  //const downloadBtn = document.querySelector('.download-btn');

  //const ext = item.dlExt || 'pdf';

  // src の拡張子を何であれ差し替える
  //const dlPath = item.src.replace(/\.[^.]+$/, `.${ext}`);

  //downloadBtn.href = dlPath;
  //downloadBtn.download = `${item.school}_${item.id}.${ext}`;
//}

function openModal(item) {
  const downloadBtn = document.querySelector('.download-btn');

  // ★ 複数ページ対応
  modalPages = item.pages || [item.src];
  modalIndex = 0;
  showModalPage();

 const ext = item.dlExt || 'pdf';

// ダウンロードボタンクリック時に現在ページを保存
downloadBtn.onclick = (e) => {
  e.stopPropagation(); // 念のため
  const currentSrc = modalPages[modalIndex];  // 今見ているページ
  const dlPath = currentSrc.replace(/\.[^.]+$/, `.${ext}`);
  downloadBtn.href = dlPath;
  downloadBtn.download = `${item.school}_${item.id}_${modalIndex + 1}.${ext}`;
};


  // ボタン表示制御
  nextBtn.style.display = modalPages.length > 1 ? 'block' : 'none';
  prevBtn.style.display = modalPages.length > 1 ? 'block' : 'none';
}
nextBtn.onclick = () => {
  if (modalIndex < modalPages.length - 1) {
    modalIndex++;
    showModalPage();
  }
};

prevBtn.onclick = () => {
  if (modalIndex > 0) {
    modalIndex--;
    showModalPage();
  }
};


//left menuの光

//const leftMenu = document.getElementById('leftMenu');

//leftMenu.addEventListener('mousemove', e => {
  //const rect = leftMenu.getBoundingClientRect();
  
  // 要素内座標（スクロール分を加算）
  //const x = e.clientX - rect.left + leftMenu.scrollLeft;
  //const y = e.clientY - rect.top + leftMenu.scrollTop;

  //leftMenu.style.setProperty('--shineX', x + 'px');
  //leftMenu.style.setProperty('--shineY', y + 'px');
//});

//leftMenu.addEventListener('mouseleave', () => {
  //leftMenu.style.setProperty('--shineX', '-200px');
  //leftMenu.style.setProperty('--shineY', '-200px');
//});


//虹色

//const light = document.getElementById("light");

//document.addEventListener("mousemove", (e) => {
  //light.style.left = e.clientX + "px";
  //light.style.top = e.clientY + "px";
//});

//虹色leftでも鮮やか

const light = document.getElementById("light");
const left = document.getElementById("leftMenu");

document.addEventListener("mousemove", (e) => {
  light.style.left = e.clientX + "px";
  light.style.top = e.clientY + "px";

  const rect = left.getBoundingClientRect();

  // 左メニュー判定
  const isLeft =
    e.clientX >= rect.left &&
    e.clientX <= rect.right &&
    e.clientY >= rect.top &&
    e.clientY <= rect.bottom;

  // 特定のとこだけ光を消す
  const target = e.target;
  const isButton =
    target.closest(".like-btn") ||
    target.closest(".fav-btn") ;
    // target.closest("a"); 

  if (isButton) {
    light.style.opacity = "0";
  } else if (isLeft) {
    light.style.opacity = "0.9";
    light.style.filter = "blur(14px)";
  } else {
    light.style.opacity = "0.6";
    light.style.filter = "blur(10px)";
  }
});

// topへ戻るボタン

const circle = new CircleType(document.querySelector('.circle-text'));
circle.radius(50); // 半径(px)を調整

document.querySelector('.page-top').addEventListener('click', e => {
  e.preventDefault();
  window.scrollTo({ top: 0, behavior: 'smooth' });
});


// スクロールでTOPボタン表示/非表示
//const toTopBtn = document.querySelector('.page-top');
//window.addEventListener('scroll', () => {
  //  if (window.scrollY > 50) {
    //    toTopBtn.classList.add('is-active');
    //} else {
      //  toTopBtn.classList.remove('is-active');
    //}
//});

  </script>
</body>
</html>