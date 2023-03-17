<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */
?>
<!-- Order Form -->
<div class="px-modal hidden align-center" id="contact-form">
    <!-- Container -->
    <div class="modal-content bg-white radius-sm col-12 w-max-570">
        <!-- Title -->
        <h3 class="fs-14 pdx-25 divider-b pdy-10"><?php echo px__("Order Form"); ?></h3>
        <!-- Form -->
        <div class="pd-25 pdx-md-30">
            <?php echo do_shortcode('[contact-form-7 id="46"]'); ?>
        </div>
        <!-- Close Button -->
        <button class="modal-close far fa-times-circle btn square fs-16 tiny color-danger bg-transparent position-ab pos-top-10 pos-end-10 z-index-header"></button>
    </div>
    <!-- Container -->
</div>
<!-- // Order Form -->