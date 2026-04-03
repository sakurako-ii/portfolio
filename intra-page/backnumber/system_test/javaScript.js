/*
// モーダルウィンドウ全体を指す要素
const modal = document.getElementById('modal');

// モーダル内で拡大表示される画像を指す要素
const modalImg = document.getElementById('modalImage');

document.querySelectorAll('.popup').forEach(img => {
  img.addEventListener('click', function() {
    modalImg.src = this.currentSrc; // currentSrcを使うとWebPもOK
    modal.style.opacity = "1";
    modal.style.visibility = "visible";
  });
});

// .popupクラスを持つ画像のリストです。これらの画像をクリックすると、モーダルが表示されます
const imgs = document.querySelectorAll('.popup');



// モーダルを閉じるためのボタン
const closeSpan = document.getElementById('close');

// 画像クリックでモーダルを表示するイベント
for( let img of imgs) {
    img.addEventListener("click", function(){

        //モーダルを表示する
        modal.style.opacity = "1";
        modal.style.visibility = "visible";

        // モーダルで表示する画像に、クリックした画像のパスを設定する
        modalImg.src = this.src;
    });
}

// クローズボタンを押したらモーダルを閉じる
closeSpan.addEventListener("click", () => {
    modal.style.opacity = "0";
    modal.style.visibility = "hidden";
//  リセット
    isDragging = false;
});

// 画像以外の部分をクリックしたらモーダルを閉じる


 window.onclick = function(event) {
    if (event.target == modal) {
         modal.style.opacity = "0";
         modal.style.visibility = "hidden";
         //  リセット
        isDragging = false;
     }
}

// ==========================
// ズーム + ドラッグ機能
// ==========================

// 画像の拡大率
let scale = 1;

// 画像の位置
let pos = { x: 0, y: 0 };

// ドラッグ中かどうか
let isDragging = false;

// 最後にドラッグした位置
let last = { x: 0, y: 0 };

// 🖱️ ホイールでズーム
modalImg.addEventListener("wheel", e => {
    e.preventDefault();
    if (e.deltaY < 0) {
        scale += 0.1; // 拡大
    } else {
        scale = Math.max(0.5, scale - 0.1); // 縮小（下限0.5）
    }
    updateTransform();
});

// 🖱️ ドラッグ開始
modalImg.addEventListener("mousedown", e => {
    isDragging = true;
    last = { x: e.clientX, y: e.clientY };

    // document全体でマウス移動・離す処理を監視
    document.addEventListener("mousemove", onDragMove);
    document.addEventListener("mouseup", onDragEnd);
});

// ドラッグ中の処理
function onDragMove(e) {
    if (!isDragging) return;
    pos.x += e.clientX - last.x;
    pos.y += e.clientY - last.y;
    last = { x: e.clientX, y: e.clientY };
    updateTransform();
}

// ドラッグ終了
function onDragEnd() {
    isDragging = false;
    // イベントリスナー解除（無駄に残らないように）
    document.removeEventListener("mousemove", onDragMove);
    document.removeEventListener("mouseup", onDragEnd);
}

modalImg.setAttribute("draggable", "false");


// 画像の位置とスケールを反映
function updateTransform() {
    modalImg.style.transform = `translate(${pos.x}px, ${pos.y}px) scale(${scale})`;
}

// モーダルを開くたびにリセット
for (let img of imgs) {
    img.addEventListener("click", function () {
        modal.style.opacity = "1";
        modal.style.visibility = "visible";
        modalImg.src = this.src;

        // 📌 ズーム・位置をリセット
        scale = 1;
        pos = { x: 0, y: 0 };
        modalImg.style.transform = "translate(0px, 0px) scale(1)";
    });
}


*/

const modal = document.getElementById('modal');
const modalImg = document.getElementById('modalImage');
const closeSpan = document.getElementById('close');

let scale = 1;
let pos = { x: 0, y: 0 };
let isDragging = false;
let last = { x: 0, y: 0 };

// クリックでモーダル表示
document.querySelectorAll('.popup').forEach(img => {
  img.addEventListener('click', function() {
    modalImg.src = this.currentSrc; // WebP対応
    modal.style.opacity = "1";
    modal.style.visibility = "visible";

    // ズーム・位置リセット
    scale = 1;
    pos = { x: 0, y: 0 };
    modalImg.style.transform = "translate(0px,0px) scale(1)";
  });
});

// モーダルクローズ
closeSpan.addEventListener("click", () => {
  modal.style.opacity = "0";
  modal.style.visibility = "hidden";
  isDragging = false;
});

// モーダル外クリックでも閉じる
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.opacity = "0";
    modal.style.visibility = "hidden";
    isDragging = false;
  }
}

// ズーム + ドラッグ
modalImg.addEventListener("wheel", e => {
  e.preventDefault();
  scale += e.deltaY < 0 ? 0.1 : -0.1;
  scale = Math.max(0.5, scale);
  updateTransform();
});

modalImg.addEventListener("mousedown", e => {
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

function updateTransform() {
  modalImg.style.transform = `translate(${pos.x}px, ${pos.y}px) scale(${scale})`;
}
