class Contact {
    constructor() {
        this.init();

    }

    init() {
            // Change '(Required)' to '*'
            const requiredTextElements = document.querySelectorAll('.gfield_required_text');
            requiredTextElements.forEach((element) => {
                element.textContent = element.textContent.replace('(Required)', '*');
            });
        }
}

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.contact')) {
        new Contact();
    }
});
