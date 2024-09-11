class CapabilityDropdowns {
  constructor(el) {
    this.el = el;
    this.init();
    this.debouncedSetColumnsHeight = this.debounce(this.setColumnsHeight, 100);
  }

  debounce(func, delay) {
    let timeoutId;
    return function (...args) {
      clearTimeout(timeoutId);
      timeoutId = setTimeout(() => func.apply(this, args), delay);
    };
  }

  init() {
    let $ = jQuery;
    // ACCORDION
    $(this.el).find('.accordion-item__content').hide();
    $(this.el).find('.accordion-item__title').click(function () {
      const accordionItem = $(this).closest('.accordion-item');
      const accordionContent = accordionItem.find('.accordion-item__content');
      const otherAccordionItems = accordionItem.siblings('.accordion-item');
      const otherAccordionContents = otherAccordionItems.find('.accordion-item__content');

      if (accordionItem.hasClass('active')) {
        // Close the currently open accordion item
        accordionContent.slideUp();
        accordionItem.removeClass('active');
        $(this).find('.chevron').removeClass('down'); // Remove the 'down' class
      } else {
        // Close other open accordion items
        otherAccordionContents.slideUp();
        otherAccordionItems.removeClass('active');
        otherAccordionItems.find('.chevron').removeClass('down'); // Remove the 'down' class from other chevrons

        // Open the clicked accordion item
        accordionContent.slideDown();
        accordionItem.addClass('active');
        $(this).find('.chevron').addClass('down'); // Add the 'down' class
      }
    });
    this.setColumnsHeight();

    const self = this;
    window.addEventListener('resize', function () {
      window.requestAnimationFrame(() => {
        self.debouncedSetColumnsHeight();
      });
    });
  }

  setColumnsHeight() {
    setTimeout(() => {
      const columns = this.el.querySelectorAll('.column-top-wrapper');
      let maxHeight = 300;
      columns.forEach(function (column) {
        column.style.height = 'auto';
        const height = column.offsetHeight;
        if (height > maxHeight) {
          maxHeight = height;
        }
      });
      columns.forEach(function (column) {
        column.style.height = maxHeight + 'px';
      });
    }, 500);
  }
}

document.addEventListener('DOMContentLoaded', initializeBlock);

if (window.acf) {
  window.acf.addAction('render_block_preview/type=capability-dropdowns', initializeBlock);
}

function initializeBlock() {
  [...document.querySelectorAll('.capability-dropdowns')].forEach((el) => {
    new CapabilityDropdowns(el);
  });
}