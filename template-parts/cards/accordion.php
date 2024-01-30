<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */

    //===> Get Post Information <===//
    $post_title = get_the_title();
?>
<!-- Accordion Item -->
<div class="col accordion-item" itemtype="https://schema.org/FAQPage">
    <div class="bg-component-lvl-1 radius-sm border-1 border-solid border-alpha-15">
        <!-- Heading -->
        <h4 class="accordion-btn display-flex fs-15 pdx-20 pdy-10 mb-0 align-between align-center-y transition-fast mouse-pointer" itemprop="name">
            <span><?php echo $post_title; ?></span>
            <i class="fas fa-plus lineheight-100"></i>
        </h4>
        <!-- Content -->
        <div class="accordion-content pd-20 hidden divider-t border-alpha-15 fs-14" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
            <?php echo the_content(); ?>
        </div>
        <!-- // Content -->
    </div>
</div>
<!-- // Accordion Item -->