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
<div class="featured-service-card col-auto pdy-15 tx-align-center" itemtype="https://schema.org/LocalBusiness" itemscope>
    <div class="position-rv content-box bg-white radius-lg border-1 border-solid border-alpha-10 h-min-100 radius-md pd-30 pdx-lg-35 bx-shadow-dp-1y">
        <!-- Image -->
        <a itemprop="url" href="<?php echo $post_link; ?>" style="line-height: 110px;" title="<?php echo $post_title; ?>">
            <img class="mb-20" src="<?php echo $post_thumbnail;?>" alt="<?php echo $post_title; ?>" style="max-height: 100px;" itemprop="image" />
        </a>
        <!-- Title -->
        <a itemprop="url" href="<?php echo $post_link; ?>">
            <h3 class="fs-16" itemprop="name"><?php echo $post_title; ?></h3>
        </a>
        <!-- Description -->
        <p class="fs-14 tx-line-clamp" style="--max-lines: 3;" itemprop="description"><?php echo $post_description; ?></p>
        <!-- Buttons -->
        <div class="px-group">
            <a href="<?php echo $post_link; ?>" class="col fs-13 weight-medium btn btn-icon radius-sm bg-alpha-05 fas fa-up-right-from-square"><?php echo __("Read More", "phenix"); ?></a>
            <button data-modal="service-order" class="col fs-13 weight-medium btn primary btn-icon radius-sm fas fa-briefcase"><?php echo __("طلب الخدمة", "phenix"); ?></button>
        </div>
    </div>
</div>
<!-- // Block End -->