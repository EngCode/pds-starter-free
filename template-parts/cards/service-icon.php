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
		$post_thumbnail = 'https://via.placeholder.com/900x700.webp?text=Media';
	}
?>
<!-- Block Start -->
<div class="service-icon-card col-auto" itemtype="https://schema.org/LocalBusiness" itemscope>
    <div class="content-wrapper bg-white radius-lg pdy-25 pdy-lg-30 pdx-25 bx-shadow-dp-1 position-rv">
        <!-- Image -->
        <a itemprop="url" href="<?php echo $post_link; ?>" class="icon mb-15 radius-sm inline-block pd-10 border-2 border-solid border-primary">
            <img itemprop="image" src="<?php echo $post_thumbnail;?>" width="30" alt="<?php echo $post_title; ?>" />
        </a>
        <!-- Button -->
        <button class="btn primary radius-height small position-ab pos-top-20 pos-end-20" data-modal="order-form"><?php echo __("Order Now","phenix");?></button>
        <!-- Title -->
        <a itemprop="url" href="<?php echo $post_link; ?>"><h3 class="fs-16 weight-medium" itemprop="name"><?php echo $post_title; ?></h3></a>
        <!-- Description -->
        <p class="fs-13" data-max-text="110"  itemprop="description"><?php echo $post_description; ?></p>
    </div>
</div>
<!-- // Block End -->