function ParallaxMaskImg(params) {
  const el = params.el;
  const img = params.img;
  const speed = params.speed;
  var wh, elY, percent, topY;
  var elH = el.getBoundingClientRect().height;
  var imgH;

  const _onresize = () => {
    wh = window.innerHeight;
    elH = el.getBoundingClientRect().height;
    imgH = elH * speed;
    img.style.height = imgH + "px";
    _onscroll();
  }

  function getOffsetTop(element) {
    return element ? (element.offsetTop + getOffsetTop(element.offsetParent)) : 0;
  }

  const _onscroll = () => {
    topY = window.scrollY || window.pageYOffset;
    elY = getOffsetTop(el);
    percent = (topY - elY + wh) / (wh + elH);
    if (percent >= 0 && percent <= 1) {
      img.style.transform = `matrix3d(1,0,0,0,0,1,0,0,0,0,1,0,0,${percent * (imgH - elH)},0,1) rotate(0.00001deg)`;
    }
  }

  window.addEventListener('resize', _onresize);
  window.addEventListener("scroll", _onscroll, { passive: true });

  _onresize();
}

document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll(".parallax-wrapper").forEach(item => {
    new ParallaxMaskImg({
      speed: 1.2,
      el: item,
      img: item.querySelector('img')
    });
  });
})



