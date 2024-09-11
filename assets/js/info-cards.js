class InfoCards {
    constructor() {
        this.init();
    }
    init() {
        const currentPageUrl = window.location.href;
        if (currentPageUrl.includes('/employee-login')) {
            const btnRedElements = document.querySelectorAll('.info-cards .btn_red');
            btnRedElements.forEach((element) => {
            element.setAttribute('target', '_blank');

            let images = document.querySelectorAll('.info-cards__content img');
            images.forEach((x, index) => {
                x.style.width = '7.25rem';
                if (index === 2) {
                    x.style.width = '9rem';
                }
                })
            });
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.info-cards')) {
        new InfoCards();
    }
});