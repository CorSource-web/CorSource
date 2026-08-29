class Testimonial2026 {
    constructor(slider) {
        this.slider = slider;
        this.track = slider.querySelector('.testimonial-2026-track');

        this.slides = Array.from(
            slider.querySelectorAll('[data-testimonial-slide]')
        );

        this.prev = slider.querySelector('.testimonial-2026-prev');
        this.next = slider.querySelector('.testimonial-2026-next');

        this.current = 0;

        this.init();
    }

    init() {
        if (!this.track || !this.slides.length) {
            return;
        }

        this.updateSlider();

        if (this.slides.length <= 1) {
            return;
        }

        if (this.prev) {
            this.prev.addEventListener('click', () => {
                this.current--;

                if (this.current < 0) {
                    this.current = this.slides.length - 1;
                }

                this.updateSlider();
            });
        }

        if (this.next) {
            this.next.addEventListener('click', () => {
                this.current++;

                if (this.current >= this.slides.length) {
                    this.current = 0;
                }

                this.updateSlider();
            });
        }
    }

    updateSlider() {
        this.track.style.transform =
            `translate3d(-${this.current * 100}%, 0, 0)`;

        this.slides.forEach((slide, index) => {
            slide.setAttribute(
                'aria-hidden',
                index === this.current ? 'false' : 'true'
            );
        });
    }
}

const initTestimonial2026 = () => {
    const sliders = document.querySelectorAll('.testimonial-2026-slider');

    sliders.forEach((slider) => {
        if (slider.dataset.sliderInitialized) {
            return;
        }

        slider.dataset.sliderInitialized = 'true';

        new Testimonial2026(slider);
    });
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initTestimonial2026);
} else {
    initTestimonial2026();
}