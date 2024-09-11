class Testimonials {
  constructor(slides) {
    this.slides = slides;
    this.setFontSize = this.setFontSize.bind(this);
    this.init();
  }

  init() {
    jQuery(this.slides).slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoPlay: true,
      autoPlaySpeed: 5000,
      dots: true,
    });

    this.setFontSize();
    window.addEventListener('resize', this.setFontSize);
  }

  setFontSize() {
    [...this.slides.querySelectorAll('.testimonial__quote')].forEach((parent) => {
      const quote = parent.querySelector('h3');

      quote.style.fontSize = '0.5rem';
      let remFontSize = 0.5;
      while (quote.getBoundingClientRect().height <= parent.getBoundingClientRect().height && remFontSize <= 2.3) {
        remFontSize = remFontSize + .1;
        quote.style.fontSize = `${remFontSize}rem`;
      }
    })
  }
}

document.addEventListener('DOMContentLoaded', initializeBlock)

if (window.acf) {
  window.acf.addAction('render_block_preview/type=testimonial', initializeBlock);
}

function initializeBlock($block) {
  if ($block[0]) {
    const slides = jQuery($block[0]).find('.testimonial__slides');
    new Testimonials(slides[0]);
  } else {
    [...document.querySelectorAll('.testimonial__slides')].forEach((el) => {
      new Testimonials(el);
    })
  }
}
