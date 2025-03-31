<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */

    //===> Get Post Information <===//
    $post_link  = get_permalink();
    $post_title = get_the_title();
	$post_thumbnail   = get_the_post_thumbnail_url($post->ID, 'full');
    $post_description = strip_tags(get_the_excerpt());

    //===> Meta information's <===//
    $meta_info = get_post_meta($post->ID);

	//===> Thumbnail Placeholder <===//
	if ($post_thumbnail === false) {
		$post_thumbnail = 'https://via.placeholder.com/768x500';
	}
?>
<!-- Block Start -->
<div class="standard-card col-auto pdy-10" itemtype="https://schema.org/LocalBusiness" itemscope>
    <div class="content-box bg-component-lvl-1 radius-lg border-1 border-solid border-alpha-10 h-min-100 tx-align-center bx-shadow-dp-1y">
        <!-- Image -->
        <meta itemprop="image" content="<?php echo $post_thumbnail;?>" />
        <a itemprop="url" href="<?php echo $post_link; ?>" data-src="<?php echo $post_thumbnail;?>" class="px-media ratio-4x3 mb-20 radius-lg radius-top"></a>
        <!-- info -->
        <div class="<?php if (isset($post_description)) { echo 'pdb-25';} else { echo 'pdy-15'; }; ?> pdx-20">
            <!-- Title -->
            <a itemprop="url" href="<?php echo $post_link; ?>">
                <h3 class="fs-15 fs-md-16" itemprop="name"><?php echo $post_title; ?></h3>
            </a>
            <?php if (isset($post_description)) : ?>
            <!-- Description -->
            <p class="fs-13 tx-line-clamp" style="--max-lines: 4;" itemprop="description"><?php echo $post_description; ?></p>
            <?php endif; ?>
            <!-- Buttons -->
            <div class="px-group radius-sm">
                <a href="<?php echo $post_link; ?>" class="col fs-13 weight-medium btn dark btn-icon fas fa-up-right-from-square"><?php echo __("Read More", "phenix"); ?></a>
                <button data-modal="service-order" class="col fs-13 weight-medium btn primary btn-icon fas fa-graduation-cap"><?php echo __("طلب الخدمة", "phenix"); ?></button>
            </div>
            <!-- // Buttons -->
        </div>
        <!-- // info -->
    </div>
</div>
<!-- // Block End -->