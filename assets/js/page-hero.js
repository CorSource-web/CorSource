class PageHero {
    constructor() {
        this.init();
        this.countLines = this.countLines.bind(this);
        this.handleResize = this.handleResize.bind(this);
        this.originalFontSize = parseFloat(getComputedStyle(this.h1Element).fontSize);

        window.addEventListener('resize', this.handleResize);
    }

    init() {
        console.log("Solutions page");

        this.h1Element = document.querySelector('h1');
        this.countLines(this.h1Element);
    }

    countLines(element) {

        const windowWidth = window.innerWidth;

        if (windowWidth >= 970 && windowWidth <= 1200) {
            element.style.fontSize = '3.8rem';
        } else if (windowWidth >= 800 && windowWidth < 970) {
            element.style.fontSize = '3.4rem';
        } else {
            element.style.fontSize = ''; 
        }
    }

    handleResize() {
        clearTimeout(this.resizeTimeout);
        this.resizeTimeout = setTimeout(() => {
            this.h1Element.style.fontSize = `${this.originalFontSize}px`;

            this.countLines(this.h1Element);
        }, 100);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const currentPageUrl = window.location.href;
    if (document.querySelector('.page-hero') && currentPageUrl.includes('/solutions')) {
        new PageHero();
    }
});
