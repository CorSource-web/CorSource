import { gsap, Power3 } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";


function injectTextAnimationClass() {
  [...document.querySelectorAll('.animated-text .container')].forEach((el) => {
    [...el.children].forEach((child) => {
      child.classList.add('reveal-text');
    })
  })
}

document.addEventListener("DOMContentLoaded", function () {
  injectTextAnimationClass();

  let splitWords = function (selector) {
    var elements = document.querySelectorAll(selector);

    elements.forEach(function (el) {
      el.dataset.splitText = el.textContent;
      el.innerHTML = el.textContent
        .split(/\s/)
        .map(function (word) {
          return word
            .split("-")
            .map(function (word) {
              return '<span class="word">' + word + "</span>";
            })
            .join('<span class="hyphen">-</span>');
        })
        .join('<span class="whitespace"> </span>');
    });
  };

  let splitLines = function (selector) {
    var elements = document.querySelectorAll(selector);

    splitWords(selector);

    elements.forEach(function (el) {
      var lines = getLines(el);

      var wrappedLines = "";
      lines.forEach(function (wordsArr) {
        wrappedLines += '<span class="reveal-line"><span class="words">';
        wordsArr.forEach(function (word) {
          wrappedLines += word.outerHTML;
        });
        wrappedLines += "</span></span>";
      });
      el.innerHTML = wrappedLines;
    });
  };

  let getLines = function (el) {
    var lines = [];
    var line;
    var words = el.querySelectorAll("span");
    var lastTop;
    for (var i = 0; i < words.length; i++) {
      var word = words[i];
      if (word.offsetTop != lastTop) {
        // Don't start with whitespace
        if (!word.classList.contains("whitespace")) {
          lastTop = word.offsetTop;

          line = [];
          lines.push(line);
        }
      }
      line.push(word);
    }
    return lines;
  };

  setTimeout(() => {
    splitLines(".reveal-text");
    let revealText = document.querySelectorAll(".reveal-text");
    gsap.registerPlugin(ScrollTrigger);
    let revealLines = revealText.forEach((element) => {
      const lines = element.querySelectorAll(".words");

      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: element,
          toggleActions: "restart none none reset"
        }
      });
      tl.set(element, { autoAlpha: 1 });
      tl.from(lines, .6, {
        yPercent: 100,
        ease: Power3.out,
        stagger: 0.1,
        delay: 0.1
      });
    });
  }, 400);
});
