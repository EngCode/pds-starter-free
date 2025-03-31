<!-- Loading Script -->
<script defer>
    /*====> Unblock Phenix <====*/
    const phenixJsScript = document.querySelector('#phenix-js') || document.querySelector("script[src*='phenix.js']");
    if(phenixJsScript) phenixJsScript.removeAttribute('async');
</script>