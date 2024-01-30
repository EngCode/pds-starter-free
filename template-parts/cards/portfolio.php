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
?>
<!-- Block Start -->
<div class="standard-card col-auto" itemtype="https://schema.org/LocalBusiness" itemscope>
    <div class="content-box bg-component-lvl-1 radius-lg border-1 border-solid border-alpha-10 h-min-100 links-inherit">
        <!-- Image -->
        <meta itemprop="image" content="<?php echo $post_thumbnail;?>" />
        <a itemprop="url" title="<?php echo $post_title; ?>" href="<?php echo $theme_url; ?>" data-src="<?php echo $post_thumbnail;?>" class="px-media ratio-4x3 radius-lg radius-top"></a>
        <!-- info -->
        <a itemprop="url" href="<?php echo $theme_url; ?>" class="display-block pdx-25 pdy-15">
            <h3 class="fs-16 mb-0 tx-uppercase" itemprop="name"><?php echo $post_title; ?></h3>
        </a>
    </div>
</div>
<!-- // Block End -->