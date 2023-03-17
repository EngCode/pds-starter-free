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

	//===> Thumbnail Placeholder <===//
	if ($post_thumbnail === false) {
		$post_thumbnail = 'https://via.placeholder.com/900x700.webp?text=Media';
	}
?>
<!-- Block Start -->
<div class="service-card col-auto tx-align-center" itemtype="https://schema.org/LocalBusiness" itemscope>
    <div class="content-wrapper bg-white radius-lg border-1 border-solid border-alpha-10 pdy-25 pdy-lg-30 pdx-25">
        <!-- Image -->
        <a itemprop="url" href="<?php echo $post_link; ?>" class="icon">
            <img itemprop="image" src="<?php echo $post_thumbnail;?>" width="75" alt="<?php echo $post_title; ?>" class="mb-15" />
        </a>
        <!-- Title -->
        <a itemprop="url" href="<?php echo $post_link; ?>" class="color-inherit"><h3 class="fs-16 weight-medium" itemprop="name"><?php echo $post_title; ?></h3></a>
        <!-- Description -->
        <p class="fs-13" data-max-text="110"  itemprop="description"><?php echo $post_description; ?></p>
    </div>
</div>
<!-- // Block End -->