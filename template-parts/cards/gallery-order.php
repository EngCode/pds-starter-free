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
		$post_thumbnail = 'https://via.placeholder.com/960x700';
	}
?>
<!-- Block Start -->
<div class="gallery-card col-auto" itemtype="https://schema.org/LocalBusiness" itemscope>
    <div class="bg-dark radius-lg position-rv">
        <!-- for Data Structure -->
        <meta itemprop="image" content="<?php echo $post_thumbnail;?>" />
        <!-- Image -->
        <a itemprop="url" href="<?php echo $post_link; ?>" data-src="<?php echo $post_thumbnail;?>" class="px-media position-rv ratio-4x3 radius-lg">        
            <!-- info -->
            <div class="content-box pdx-20 pdy-15 pdt-25 bg-alpha-50 position-ab pos-bottom-0 pos-x-center fluid radius-lg radius-bottom color-white">
                <!-- Title -->
                <h3 class="fs-16 fs-md-19 weight-bold lineheight-130 tx-align-center mb-15" itemprop="name"><?php echo $post_title; ?></h3>
                <!-- Tags -->
                <div class="flexbox align-center-y pdy-5">
                    <?php if (!empty(get_the_tags())) : foreach(get_the_tags() as $tag) :?>
                        <span class="pdx-10 pdy-5 fs-12 mb-5 me-5 radius-rounded bg-danger" target="_blank"><?php echo $tag->name; ?></span>
                    <?php endforeach; wp_reset_postdata(); endif; ?>
                    <!-- Date -->
                    <span class="btn small btn-icon fas fa-cart color-white pds-hvr-gradient-move-revert ms-auto me-0 radius-rounded bg-grade-primary-secondary-2nd bg-grade-45">اطلب الان</span>
                </div>
            </div>
            <!-- // info -->
        </a>
    </div>
</div>
<!-- // Block End -->