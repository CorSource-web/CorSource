class Testimonial2026 {
    constructor(slider) {
        console.log('[Testimonial2026] constructor', slider);

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
        console.log('[Testimonial2026] init', {
            track: this.track,
            slides: this.slides.length,
            prev: this.prev,
            next: this.next
        });

        if (!this.track || !this.slides.length) {
            console.warn('[Testimonial2026] missing track or slides');
            return;
        }

        this.updateSlider();

        if (this.slides.length <= 1) {
            return;
        }

        if (this.prev) {
            this.prev.addEventListener('click', () => {
                console.log('[Testimonial2026] prev clicked');

                this.current--;

                if (this.current < 0) {
                    this.current = this.slides.length - 1;
                }

                this.updateSlider();
            });
        }

        if (this.next) {
            this.next.addEventListener('click', () => {
                console.log('[Testimonial2026] next clicked');

                this.current++;

                if (this.current >= this.slides.length) {
                    this.current = 0;
                }

                this.updateSlider();
            });
        }
    }

    updateSlider() {
        console.log('[Testimonial2026] update', this.current);

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
    console.log('[Testimonial2026] script loaded');

    const sliders = document.querySelectorAll('.testimonial-2026-slider');

    console.log('[Testimonial2026] sliders found:', sliders.length);

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