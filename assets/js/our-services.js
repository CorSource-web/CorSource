class OurServices {
  constructor(el) {
    this.el = el;
    this.init();
  }

  init() {
    let $ = jQuery;
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
  }
}

document.addEventListener('DOMContentLoaded', initializeBlock);

if (window.acf) {
  window.acf.addAction('render_block_preview/type=our-services', initializeBlock);
}

function initializeBlock() {
  [...document.querySelectorAll('.our-services')].forEach((el) => {
    new OurServices(el);
  });
}