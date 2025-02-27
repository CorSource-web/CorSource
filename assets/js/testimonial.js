class Testimonials {
  constructor(slides) {
    console.log("Testimonials Constructor:", slides); // Debug log

    this.slides = slides;

    jQuery(document).ready(function($) {
      console.log("jQuery is working:", $);
  });

    if (!this.slides) {
      console.warn("Testimonials: `slides` is undefined or null.");
      return;
    }

    this.setFontSize = this.setFontSize.bind(this);
    this.init();
  }
}
