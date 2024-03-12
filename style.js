document.addEventListener('DOMContentLoaded', ready => {
    //===> Copyrights <===//
    Phenix(document).copyrights("Phenix Themes");
    //====> Polylang Replace Saudi-Arabia Flag with Palastaine Flag <====//
    Phenix('[src*="polylang/flags/arab.png"]').forEach((item) => {
        item.setAttribute('src', `https://cdn.jsdelivr.net/gh/EngCode/pdb-assets@master/img/countries/4x3/eg.svg`);
    });
});