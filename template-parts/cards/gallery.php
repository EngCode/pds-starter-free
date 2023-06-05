<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */

    //===> Get Post Information <===//
    $post_link  = get_permalink();
    $post_title = get_the_title();
    $post_date = get_the_date();
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
<div class="gallery-card mb-30 col-auto" itemtype="https://schema.org/LocalBusiness" itemscope>
    <div class="bg-dark radius-lg position-rv">
        <!-- for Data Structure -->
        <meta itemprop="image" content="<?php echo $post_thumbnail;?>" />
        <!-- Image -->
        <a itemprop="url" href="<?php echo $post_link; ?>" data-src="<?php echo $post_thumbnail;?>" class="px-media position-rv ratio-4x3 radius-lg">        
            <!-- info -->
            <div class="content-box pdy-15 pdx-20 bg-alpha-50 position-ab pos-bottom-0 pos-x-center fluid radius-lg radius-bottom color-white">
                <!-- Date -->
                <span class="fs-12" itemprop="datePublished"><?php echo $post_date;?></span>
                <!-- Title -->
                <h3 class="fs-16 weight-medium lineheight-130" itemprop="name"><?php echo $post_title; ?></h3>
            </div>
            <!-- // info -->
        </a>
    </div>
</div>
<!-- // Block End -->