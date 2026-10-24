
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

        // Preserve existing browser back/forward functionality.
        window.addEventListener('popstate', () => {
            this.handleLocationChange(modal);
        });

        // NEW: Support same-page anchor links on the 2026 pages.
        window.addEventListener('hashchange', () => {
            this.handleLocationChange(modal);
        });

        // NEW: Support opening a URL that already contains the hash.
        this.handleLocationChange(modal);

        // Preserve existing Gravity Forms adjustments.
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

        modal.classList.add('open');
        this.isOpen = true;
        this.disableScroll();
    }

    removeHashFromURL() {
        if (window.location.hash === '#contact-navigation-modal') {
            history.replaceState(
                '',
                document.title,
                window.location.pathname + window.location.search
            );
        }
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

        document.body.style.position = '';
        document.body.style.top = '';
        document.body.style.right = '';
        document.body.style.left = '';

        // Restore the previous scroll position.
        window.scrollTo(0, this.savedScrollY);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.contact-navigation-modal')) {
        new ContactNavigationModal();
    }
});
