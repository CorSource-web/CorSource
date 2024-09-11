class Modal {
    constructor() {
        this.init();
        this.disableScroll = this.disableScroll.bind(this);
        this.enableScroll = this.enableScroll.bind(this);
        this.savedScrollY;
    }

    init() {
        const modal = document.querySelector('.modal');


        // Event listener for URL changes
        window.addEventListener("popstate", (event) => {
            if (window.location.href.includes("#contact-modal")) {
                event.preventDefault();
                modal.classList.add('open');
                this.disableScroll();

                 // Close when clicking outside of modal container or X button
                modal.addEventListener('click', (event) => {
                if (event.target.classList.contains('modal-exit')) {
                    event.preventDefault();
                    this.closeModal(modal);
                }
            });

            // Close when clicking X
            let xButton = document.querySelector(".modal-close");
            xButton.addEventListener('click', (event) => {
                event.preventDefault();
                this.closeModal(modal);
            });

                modal.addEventListener('click', (event) => {
                    if (event.target.classList.contains('modal-exit') || event.target.classList.contains('modal-close')) {
                        event.preventDefault();

                        this.closeModal(modal);
                        this.removeHashFromURL();
                    }
                });

                // Close modal when "Esc" key is pressed
                document.addEventListener('keydown', (event) => {
                    if (event.key === 'Escape') {
                        event.preventDefault();
                        this.closeModal(modal);
                    }
                });

            } else {
                this.closeModal();
            }
        });

        const requiredTextElements = document.querySelectorAll('.gfield_required_text');
        requiredTextElements.forEach((element) => {
            element.textContent = element.textContent.replace('(Required)', '*');
        });

        const validationMessageDiv = document.querySelector('.gfield .validation_message');

        if (validationMessageDiv) {
            const pseudoElement = document.createElement('span');
            pseudoElement.classList.add('pseudo-element');
            validationMessageDiv.appendChild(pseudoElement);
        }
    }

    closeModal(modal) {

        modal.classList.remove('open');
        this.enableScroll(modal);
        this.removeHashFromURL();
    }

    openModal(modal) {
        modal.classList.add('open');
        this.disableScroll(modal);
    }

    removeHashFromURL() {
        history.replaceState('', document.title, window.location.pathname + window.location.search);
    }

    disableScroll() {
        this.savedScrollY = window.scrollY;
        document.body.style.top = `-${window.scrollY}px`;
        document.body.style.right = '0';
        document.body.style.left = '0';
        document.body.style.position = 'fixed';


        document.body.classList.add('disable-scroll');
        document.documentElement.classList.add('disable-scroll');

        document.body.classList.remove('enable-scroll');
        document.documentElement.classList.remove('enable-scroll');



    }

    enableScroll() {
        document.body.classList.add('enable-scroll');
        document.documentElement.classList.add('enable-scroll');

        document.body.classList.remove('disable-scroll');
        document.documentElement.classList.remove('disable-scroll');

        // Restore the saved scroll position
        window.scrollTo(0, this.savedScrollY);

        // Remove the fixed positioning styles from the body element
        document.body.style.position = '';
        document.body.style.top = '';
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.modal')) {
        new Modal();
    }
});


