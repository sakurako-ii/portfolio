
const imgs = document.querySelectorAll('.sub');

// 各要素ごとの拡大率を指定（ここで自由に調整）
const scales = [2.2, 1.95, 2.3, 2.0];

function wobble() {
  const now = Date.now();
  imgs.forEach((img, i) => {
    const angle = Math.sin((now / 500) + i * 2) * 3;
    const scale = scales[i % scales.length]; // 要素数を超えてもOK
    img.style.transform = `scale(${scale}) rotate(${angle}deg)`;
  });
  requestAnimationFrame(wobble);
}

wobble();

const flags = document.querySelectorAll('.flag');

function swayFlags() {
  const now = Date.now();

  flags.forEach((flag, i) => {
    const speed = 900 + i * 200;        // 旗ごとに周期をずらす
    const maxAngle = 2 + i * 0.5;       // 傾きは控えめ
    const angle = Math.sin(now / speed + i) * maxAngle;

    flag.style.transform = `rotate(${angle}deg)`; // 位置は CSS に任せる
  });

  requestAnimationFrame(swayFlags);
}

swayFlags();

const rotate = document.querySelectorAll(".rotate");
rotate.forEach(img =>{
  img.addEventListener("mouseenter",()=>{
    img.style.transition = "none";
    img.style.transform = "rotate(0deg)";
    void img.offsetWidth;
    img.style.transition = "transform 0.58s ease";
    img.style.transform = "rotate(360deg)";
  });
});




