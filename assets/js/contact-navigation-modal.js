
class ContactNavigationModal {
    constructor() {
        this.savedScrollY = 0;
        this.isOpen = false;

        this.disableScroll = this.disableScroll.bind(this);
        this.enableScroll = this.enableScroll.bind(this);

        this.init();
    }

    init() {
        const modal = document.querySelector('.contact-navigation-modal');

        if (!modal) {
            return;
        }

        // Prevent same-page modal links from triggering native anchor scrolling.
        this.preventModalAnchorScroll(modal);

        // Close when clicking X.
        const xButton = modal.querySelector('.modal-close');

        if (xButton) {
            xButton.addEventListener('click', (event) => {
                event.preventDefault();
                this.closeModal(modal);
            });
        }

        // Close when clicking outside the modal container.
        modal.addEventListener('click', (event) => {
            if (event.target.classList.contains('modal-exit')) {
                event.preventDefault();
                this.closeModal(modal);
            }
        });

        // Close when Escape is pressed.
        document.addEventListener('keydown', (event) => {
            if (
                event.key === 'Escape' &&
                modal.classList.contains('open')
            ) {
                event.preventDefault();
                this.closeModal(modal);
            }
        });

        // Preserve browser back/forward functionality.
        window.addEventListener('popstate', () => {
            this.handleLocationChange(modal);
        });

        // Support hash changes on the 2026 pages.
        window.addEventListener('hashchange', () => {
            this.handleLocationChange(modal);
        });

        // Support opening a URL that already contains the modal hash.
        this.handleLocationChange(modal);

        // Preserve existing Gravity Forms adjustments.
        const requiredTextElements = document.querySelectorAll(
            '.gfield_required_text'
        );

        requiredTextElements.forEach((element) => {
            element.textContent = element.textContent.replace(
                '(Required)',
                '*'
            );
        });

        const validationMessageDiv = document.querySelector(
            '.gfield .validation_message'
        );

        if (validationMessageDiv) {
            const pseudoElement = document.createElement('span');
            pseudoElement.classList.add('pseudo-element');
            validationMessageDiv.appendChild(pseudoElement);
        }
    }

    preventModalAnchorScroll(modal) {
        document.addEventListener('click', (event) => {
            const link = event.target.closest(
                'a[href*="#contact-navigation-modal"]'
            );

            if (!link) {
                return;
            }

            const url = new URL(link.href, window.location.href);

            // Allow links to other pages to navigate normally.
            if (
                url.origin !== window.location.origin ||
                url.pathname.replace(/\/$/, '') !==
                    window.location.pathname.replace(/\/$/, '') ||
                url.hash !== '#contact-navigation-modal'
            ) {
                return;
            }

            event.preventDefault();

            // Update the URL without triggering browser anchor scrolling.
            if (window.location.hash !== '#contact-navigation-modal') {
                history.pushState(
                    {},
                    '',
                    window.location.pathname +
                    window.location.search +
                    '#contact-navigation-modal'
                );
            }

            this.openModal(modal);
        });
    }

    handleLocationChange(modal) {
        if (window.location.hash === '#contact-navigation-modal') {
            this.openModal(modal);
        } else if (modal.classList.contains('open')) {
            this.closeModal(modal, false);
        }
    }

    closeModal(modal, removeHash = true) {
        if (!modal) {
            return;
        }

        if (modal.classList.contains('open')) {
            modal.classList.remove('open');
            this.enableScroll();
        }

        this.isOpen = false;

        if (removeHash) {
            this.removeHashFromURL();
        }
    }

    openModal(modal) {
        if (!modal || modal.classList.contains('open')) {
            return;
        }

        // Save the scroll position before locking the page.
        this.disableScroll();

        modal.classList.add('open');
        this.isOpen = true;
    }

    removeHashFromURL() {
        if (window.location.hash === '#contact-navigation-modal') {
            history.replaceState(
                history.state,
                document.title,
                window.location.pathname + window.location.search
            );
        }
    }

    disableScroll() {
        this.savedScrollY = window.scrollY;

        document.body.style.top = `-${this.savedScrollY}px`;
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

        document.body.style.position = '';
        document.body.style.top = '';
        document.body.style.right = '';
        document.body.style.left = '';

        // Restore the original scroll position.
        window.scrollTo({
            top: this.savedScrollY,
            left: 0,
            behavior: 'instant'
        });
    }
}


document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.contact-navigation-modal')) {
        new ContactNavigationModal();
    }
});
