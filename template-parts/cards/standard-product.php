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
    $theme_url = get_post_meta($post->ID, "theme-url", true);

	//===> Thumbnail Placeholder <===//
	if ($post_thumbnail === false) {
		$post_thumbnail = 'https://via.placeholder.com/768x500';
	}

    //===> Get Study Information <===//
    $price = get_post_meta($post->ID, 'price', true);
?>
<!-- Block Start -->
<div class="standard-card col-auto pdb-10" itemtype="https://schema.org/LocalBusiness" itemscope>
    <div class="content-box bg-component-lvl-1 radius-lg border-1 border-solid border-alpha-10 h-min-100 links-inherit position-rv tx-align-center bx-shadow-dp-1">
        <!-- Image -->
        <meta itemprop="image" content="<?php echo $post_thumbnail;?>" />
        <a itemprop="url" title="<?php echo $post_title; ?>" href="<?php echo $theme_url; ?>" data-src="<?php echo $post_thumbnail;?>" class="px-media ratio-4x3 radius-lg radius-top">
            <!-- Price -->
            <?php if (isset($price )) { echo '<p class="weight-bold fs-18 pdx-15 pdy-10 lineheight-100 bg-primary color-white position-ab pos-bottom-30 pos-end-0 radius-rounded radius-start">$'. $price. '</p>'; } ?>
        </a>
        <!-- info -->
        <a itemprop="url" href="<?php echo $theme_url; ?>" class="display-block pdx-25 pdy-15">
            <h3 class="fs-15 mb-0 tx-uppercase" itemprop="name"><?php echo $post_title; ?></h3>
        </a>
    </div>
</div>
<!-- // Block End -->