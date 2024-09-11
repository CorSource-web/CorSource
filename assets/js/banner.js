class Banner {
    constructor() {
        this.init();
    }
    init() {
        const containers = document.querySelectorAll('.banner-wrapper .container');
        containers.forEach(function(container) {
          const btnWrapper = container.querySelector('.btn-wrapper a');
          if (btnWrapper) {
            container.addEventListener('click', function() {
              window.location.href = btnWrapper.getAttribute('href');
            });
            container.style.cursor = 'pointer';
          }
        });

    }
}

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.banner-wrapper')) {
        new Banner()
    }
});