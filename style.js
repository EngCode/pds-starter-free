document.addEventListener('DOMContentLoaded', ready => {
    //====> Validation Demo <====//
    Phenix('.wpcf7-form').validation();

    //====> Sticky Header <====//
    let headerElement = Phenix('.main-header');
    headerElement.setAttributes({'data-sticky': "absolute"});
    headerElement.addClass('fluid').addClass('z-index-header').sticky();

    //===> Define Data <===//
    let headerHeight = headerElement.height();

    //====> Full Screen Fixes <====//
    Phenix('.full-screen').forEach(element => element.style.minHeight = `calc(100vh - ${headerHeight}px)`);
    Phenix('.full-screen-wide').forEach(element => element.style.minHeight = `calc(85vh - ${headerHeight}px)`);

    //====> Multimedia <====//
    Phenix('.px-media').multimedia();

    //===> Phenix Menu <===//
    Phenix('.px-navigation').menu();

    //====> Dropdown Buttons <====//
    Phenix('.px-dropdown').dropdown();

    //====> Sliders <====//
    Phenix('.px-slider').slider();

    //===> Lightbox Images <===//
    Phenix('.lightbox-image img').forEach(image => {
        image.classList.add('px-lightbox');
        image.classList.add('mouse-pointer');
        image.setAttribute('data-src', image.getAttribute('src'));
    });

    //====> Popups <====//
    Phenix('.px-modal').popup();

    //===> Animations <===//
    Phenix('.px-animate').animations({animateCSS: ["fading", "sliding", "zooming", "utilities"]});

    //====> Activate Select <====//
    Phenix('.px-select').select();

    //===> ... <===//
    Phenix(document).utilities().copyrights("Phenix Blocks");
});