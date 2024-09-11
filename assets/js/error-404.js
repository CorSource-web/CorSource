class Error {
    constructor() {
        this.init();
    }
    init() {
        let el = document.querySelector('.count'),
            total = el.innerHTML,
            timeinterval = setInterval(function () {
                total = --total;
                el.textContent = total;
                if (total <= 0) {
                    clearInterval(timeinterval);
                    window.location = '/';
                }
            }, 1000);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.error404')) {
        new Error()
    }
});