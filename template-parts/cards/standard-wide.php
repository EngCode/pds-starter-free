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
		$post_thumbnail = 'https://placehold.co/768x500';
	}
?>
<!-- Block Start -->
<div class="standard-card-large col-auto pdy-30" itemtype="https://schema.org/LocalBusiness" itemscope>
    <div class="mx-15 content-box bg-component-lvl-1 radius-lg border-1 border-solid border-alpha-10 h-min-100 flexbox overflow-hidden bx-shadow-dp-3">
        <!-- Image -->
        <meta itemprop="image" content="<?php echo $post_thumbnail;?>" />
        <div class="col-12 col-md-4 h-min-100 position-rv">
            <a itemprop="url" href="<?php echo $post_link; ?>" data-src="<?php echo $post_thumbnail;?>" class="fluid px-media ratio-4x3 ratio-md-none h-md-min-100"></a>
        </div>
        <!-- info -->
        <div class="pd-20 pd-md-30 col-12 col-md-8">
            <!-- Title -->
            <a itemprop="url" href="<?php echo $post_link; ?>"><h3 class="fs-16 h3-md weight-medium" itemprop="name"><?php echo $post_title; ?></h3></a>
            <!-- Description -->
            <p class="fs-14 fs-md-19" data-max-text="200" itemprop="description"><?php echo $post_description; ?></p>
        </div>
        <!-- // info -->
    </div>
</div>
<!-- // Block End -->