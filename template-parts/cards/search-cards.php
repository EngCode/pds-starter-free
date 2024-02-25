<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */

    //===> Get Card Based on its Type <===//
    if (isset($_GET["post_type"]) && $_GET["post_type"] === "studies") {
        get_template_part("template-parts/cards/study", null, $args);
    } else {
        get_template_part("template-parts/cards/standard", null, $args);
    }
?>