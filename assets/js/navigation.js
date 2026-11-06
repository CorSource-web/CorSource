

// All code in this file will be injected globally

// Smooth scroll
import './smoothscroll';

// Navigation
export default class Navigation {
    constructor() {
        this.hamburger = this.hamburger.bind(this);
        this.mobileMenuAccordion = this.mobileMenuAccordion.bind(this);
        this.ensureSiteIsScrollable = this.ensureSiteIsScrollable.bind(this);
        this.changeSubmenuColor = this.changeSubmenuColor.bind(this);
        this.checkScreenWidth = this.checkScreenWidth.bind(this);
        this.initStickyMobileNav = this.initStickyMobileNav.bind(this);

        this.init();
    }

    init() {
        this.ensureSiteIsScrollable();
        this.hamburger();
        this.mobileMenuAccordion();
        this.changeSubmenuColor();
        this.checkScreenWidth();
        this.initStickyMobileNav();

        $(window).on("resize", this.checkScreenWidth);
    }

    // ========================================
    // STICKY MOBILE NAVIGATION
    // ========================================

    initStickyMobileNav() {
        const mobileNav = document.querySelector(
            '.navigation-menu-wrapper-mobile'
        );

        if (!mobileNav) return;

        // Fixed positioning removes the mobile navigation
        // from the document flow. This spacer preserves
        // its original space so page content does not jump.
        const spacer = document.createElement('div');
        spacer.className = 'mobile-nav-spacer';
        spacer.setAttribute('aria-hidden', 'true');

        mobileNav.before(spacer);

        const mobileQuery = window.matchMedia('(max-width: 800px)');

        const updateSpacer = () => {
            if (mobileQuery.matches) {
                // Measure the closed navigation height.
                // When the hamburger is open, retain the
                // original spacer height.
                if (!mobileNav.classList.contains('add-100-vh')) {
                    spacer.style.height =
                        mobileNav.getBoundingClientRect().height + 'px';
                }

                spacer.style.display = 'block';
            } else {
                spacer.style.height = '0px';
                spacer.style.display = 'none';
            }
        };

        // Recalculate if the navigation changes size.
        const observer = new ResizeObserver(updateSpacer);
        observer.observe(mobileNav);

        mobileQuery.addEventListener('change', updateSpacer);
        window.addEventListener('resize', updateSpacer);

        updateSpacer();
    }

    // ========================================
    // SCREEN WIDTH / SUBMENU COLORS
    // ========================================

    checkScreenWidth() {
        const screenWidth = $(window).width();

        if (screenWidth > 800) {
            let $ = jQuery;
            let submenu = $(".sub-menu");
            const backgroundColorBand = $('.background-color-band');
            const inlineStyle = backgroundColorBand.attr('style');
            const menuItem = $('.sub-menu .menu-item');

            if (
                inlineStyle &&
                inlineStyle.includes('background-color: #F7F4F0')
            ) {
                menuItem.css('background-color', '#FFF');
            } else {
                submenu.css('background-color', '#F7F4F0');
                menuItem.css('background-color', '#F7F4F0');
            }
        }

        if (screenWidth < 800) {
            let $ = jQuery;
            let submenu = $(".sub-menu");
            const backgroundColorBand = $('.background-color-band');
            const inlineStyle = backgroundColorBand.attr('style');
            const menuItem = $('.sub-menu .menu-item');

            if (
                inlineStyle &&
                inlineStyle.includes('background-color: #F7F4F0')
            ) {
                // console.log("LINEN")
            } else {
                // console.log("WHITE")
            }
        }
    }

    changeSubmenuColor() {
        // Existing placeholder retained.
    }

    // ========================================
    // ENSURE SITE IS SCROLLABLE
    // ========================================

    ensureSiteIsScrollable() {
        // Ensures scrollability if the hamburger menu
        // is opened and the browser is resized to desktop.

        let $ = jQuery;

        $(window).on('resize', function() {
            if (window.innerWidth > 800) {
                $("body").css("overflow", "visible");
                $("body").css("height", "unset");
                $(":root").css("overflow", "visible");
                $(":root").css("height", "unset");
            }
        });
    }

    // ========================================
    // MOBILE HAMBURGER MENU
    // ========================================

    hamburger = () => {
        let open;
        let $ = jQuery;

        // Elements
        let hamburger = document.querySelector('.hamburger');
        let mobileColorBand = $('.background-color-band-mobile');
        let navigationMenu =
            $(".navigation-menu-wrapper-mobile .navigation-menu");
        let mobileWrapper =
            $(".navigation-menu-wrapper-mobile");
        let mobileContainer =
            $(".navigation-menu-wrapper-mobile .mobile-container");

        if (!hamburger) return;

        hamburger.addEventListener('click', function() {

            // Toggle Menu
            hamburger.classList.toggle('open');
            open = hamburger.classList.contains("open");

            if (open) {
                // Expand the mobile navigation so its
                // contents can scroll independently.
                mobileWrapper.addClass("add-100-vh");
                mobileContainer.addClass(
                    "add-padding-and-min-height"
                );

                // Open navigation
                navigationMenu.fadeIn();

                mobileColorBand.css({
                    "display": "none"
                });

                $(".mobile-container").css({
                    "background-color": "white"
                });

                // Prevent background page scrolling.
                $(":root").css("overflow", "hidden");
                $(":root").css("height", "100%");
                $("body").css("overflow", "hidden");
                $("body").css("height", "100%");
            }

            if (!open) {
                // Restore normal navigation height.
                mobileWrapper.removeClass("add-100-vh");
                mobileContainer.removeClass(
                    "add-padding-and-min-height"
                );

                // Close navigation
                navigationMenu.css({
                    "display": "none"
                });

                $(".mobile-container").css({
                    "background-color": "transparent"
                });

                mobileColorBand.css({
                    "display": "block"
                });

                // Restore background page scrolling.
                $(":root").css("overflow", "visible");
                $(":root").css("height", "unset");
                $("body").css("overflow", "visible");
                $("body").css("height", "unset");
            }
        });
    }

    // ========================================
    // MOBILE MENU ACCORDION
    // ========================================

    mobileMenuAccordion() {
        let $ = jQuery;

        let hasChildren = $(
            ".navigation-menu-wrapper-mobile .navigation-menu .menu-item-has-children"
        );

        // Open / close accordion
        hasChildren.click(function(e) {
            e.preventDefault();

            let submenu = $(this).find('.sub-menu');

            submenu.slideToggle();
            $(this).toggleClass('active');

            let subMenuATags = $(".sub-menu *");

            subMenuATags.click(function(e) {
                e.stopPropagation();
            });
        });

        // Change title color when accordion is active
        hasChildren.click(function() {
            let title = $(this).find('a:first');
            let container = $('.menu-item-has-children');

            if (container.hasClass('active')) {
                title.css("color", "#D64936");
            }

            if (!container.hasClass('active')) {
                title.css("color", "#1D0800");
            }
        });
    }
}

// Initialize navigation
document.addEventListener('DOMContentLoaded', () => new Navigation());


















// // All code in this file will be injected globally

// //smooth scroll
// import './smoothscroll';

// // Navigation
// export default class Navigation {
//         constructor() {
//             this.hamburger = this.hamburger.bind(this);
//             this.mobileMenuAccordion = this.mobileMenuAccordion.bind(this);
//             this.init();
//             this.ensureSiteIsScrollable = this.ensureSiteIsScrollable.bind(this);
//             this.changeSubmenuColor = this.changeSubmenuColor.bind(this);
//             this.checkScreenWidth = this.checkScreenWidth.bind(this);
//         }
//         init() {
//             this.ensureSiteIsScrollable();
//             this.hamburger();
//             this.mobileMenuAccordion();
//             this.changeSubmenuColor();
//             this.checkScreenWidth();
//             $(window).on("resize", this.checkScreenWidth);
//         }
//         checkScreenWidth() {
//             const screenWidth = $(window).width();
          
//             if (screenWidth > 800) {
    
//                 let $ = jQuery;
//                 let submenu = $(".sub-menu");
//                 const backgroundColorBand = $('.background-color-band');
//                 const inlineStyle = backgroundColorBand.attr('style');
//                 const menuItem = $('.sub-menu .menu-item')
    
//                 if (inlineStyle && inlineStyle.includes('background-color: #F7F4F0')) {
//                     menuItem.css('background-color', '#FFF');
//                 } else {
//                     submenu.css('background-color', '#F7F4F0');
//                     menuItem.css('background-color', '#F7F4F0');
//                 }
//             } 
//             if (screenWidth < 800) {
//                 let $ = jQuery;
//                 let submenu = $(".sub-menu");
//                 const backgroundColorBand = $('.background-color-band');
//                 const inlineStyle = backgroundColorBand.attr('style');
//                 const menuItem = $('.sub-menu .menu-item')
    
//                 if (inlineStyle && inlineStyle.includes('background-color: #F7F4F0')) {
//                     // console.log("LINEN")
//                 } else {
//                     // console.log("WHITE")
//                 }
//             } 


//           }

//         changeSubmenuColor (){

//             // let $ = jQuery;
//             // let submenu = $(".sub-menu");
//             // const backgroundColorBand = $('.background-color-band');
//             // const inlineStyle = backgroundColorBand.attr('style');
//             // const menuItem = $('.menu-item')

//             // if (inlineStyle && inlineStyle.includes('background-color: #F7F4F0')) {
//             //     console.log("hello")
//             // } else {
//             //     submenu.css('background-color', '#F7F4F0');
//             //     menuItem.css('background-color', '#FFF');
//             // }


//         }

//         ensureSiteIsScrollable() {
//             // This ensures scrollability if one were to open the hamburger and change from mobile view to desktop view in browser
//             let $ = jQuery;
//             $(window).on('resize', function(){
//                 if (screen.width > 800) {
//                     $("body").css("overflow", "none");
//                     $("body").css("height", "unset");
//                     $(":root").css("overflow", "none");
//                     $(":root").css("height", "unset");
//                 }
//             });
//         }

//         hamburger = () => {
//             let open;
//             let $ = jQuery;

//             //Elements
//             let hamburger = document.querySelector('.hamburger');
//             let mobileColorBand = $('.background-color-band-mobile');
//             let navigationMenu = $(".navigation-menu-wrapper-mobile .navigation-menu");
//             let mobileWrapper = $(".navigation-menu-wrapper-mobile");
//             let mobileContainer = $(".navigation-menu-wrapper-mobile .mobile-container");
//             hamburger.addEventListener('click', function() {

//             //Toggle Menu
//             hamburger.classList.toggle('open');
//             open = hamburger.classList.contains("open");

//                 if(open){
//                     // These styles need to be injected in order to make the opened menu scrollable. These styles can't be on the style sheet as they interfere with the clickability of elements on the site.
//                     mobileWrapper.addClass( "add-100-vh" );
//                     mobileContainer.addClass("add-padding-and-min-height");

//                     // CSS necessary to open the Nav Menu
//                     navigationMenu.fadeIn();
//                     // mobileWrapper.css({"background-color": "#F7F4F0"})
//                     mobileWrapper.css({"z-index": "1000"})
//                     mobileColorBand.css({"display": "none"})
//                     $(".mobile-container").css({"background-color": "white"});
//                     $(":root").css("overflow", "hidden");
//                     $(":root").css("height", "100%");
//                     $("body").css("overflow", "hidden");
//                     $("body").css("height", "100%");
//                 }
//                 if(!open){
//                     // Remove these styles added to make the content on the site clickable after the mobile nav has been closed.
//                     mobileWrapper.removeClass( "add-100-vh" );
//                     mobileContainer.removeClass("add-padding-and-min-height");

//                     // CSS necessary to close menu
//                     navigationMenu.css({"display": "none"});
//                     $(".mobile-container").css({"background-color": "transparent"});
//                     mobileWrapper.css({"z-index": "1"})
//                     // mobileWrapper.css({"background-color": "transparent"})
//                     mobileColorBand.css({"display": "block"})
//                     $(":root").css("overflow", "visible");
//                     $(":root").css("height", "unset");
//                     $("body").css("overflow", "visible");
//                     $("body").css("height", "unset");
//                 }
//             });
//         }

//         mobileMenuAccordion () {
//             // OPEN CLOSE ACCORDION
//             let $ = jQuery;
//             let hasChildren = $(".navigation-menu-wrapper-mobile .navigation-menu .menu-item-has-children");
//             hasChildren.click(function(e) {
//                 e.preventDefault();
//                 let submenu = $(this).find('.sub-menu');
//                 submenu.slideToggle();
//                 $(this).toggleClass('active');
//                 let subMenuATags = $(".sub-menu *")
//                 subMenuATags.click(function(e) {
//                     e.stopPropagation();
//                 });
//             });


//             // Make Title of Accordion red when active and
//             hasChildren.click(function() {
//                 let title = $(this).find('a:first');
//                 let container = $('.menu-item-has-children')

//                 // chevron.hasClass('rotate')
//                 if(container.hasClass('active')){
//                     title.css("color", "#D64936");
//                 }
//                 if(!container.hasClass('active')){
//                     title.css("color", "#1D0800");
//                 }
//             });
//         }
//     }

//     document.addEventListener('DOMContentLoaded', () => new Navigation());