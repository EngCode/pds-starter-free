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
<div class="col accordion-item" data-animation="fadeInUp" itemtype="https://schema.org/FAQPage">
    <div class="border-1 border-solid border-alpha-10 radius-lg bg-grade-primary-offwhite bg-grade-180">
        <!-- Heading -->
        <h4 class="display-flex flow-reverse divider-b align-center-y align-between mb-0 icon-end accordion-btn mouse-pointer headline fs-17 tx-uppercase tx-icon fas icon-lg pdt-10 pdb-10 pds-20 pde-10 fa-square-plus" itemprop="name">
            <span><?php echo $post_title; ?></span>
        </h4>
        <!-- Content -->
        <div class="accordion-content pdt-20 hidden pds-25 pde-25 pdb-25 fs-15" itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
            <?php echo the_content(); ?>
        </div>
        <!-- // Content -->
    </div>
</div>
<!-- // Accordion Item -->