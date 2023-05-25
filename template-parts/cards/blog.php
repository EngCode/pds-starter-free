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
		$post_thumbnail = 'https://via.placeholder.com/900x700.webp?text=Media';
	}
?>
<!-- Block Start -->
<div class="blog-card mb-30 col-auto" itemtype="https://schema.org/NewsArticle" itemscope>
    <div class="content-box bg-white radius-lg border-1 border-solid border-alpha-10 h-min-100">
        <!-- Image -->
        <meta itemprop="image" content="<?php echo $post_thumbnail;?>" />
        <a itemprop="url" href="<?php echo $post_link; ?>" data-src="<?php echo $post_thumbnail;?>" class="px-media ratio-4x3 mb-20 radius-lg radius-top"></a>
        <!-- info -->
        <div class="pdb-20 pdx-25">
            <!-- Date -->
            <span class="fs-12 tx-icon far fa-clock" itemprop="datePublished"><?php echo $post_date;?></span>
            <!-- Title -->
            <a itemprop="url" href="<?php echo $post_link; ?>"><h3 class="fs-15 weight-medium tx-nowrap" itemprop="name"><?php echo $post_title; ?></h3></a>
            <!-- Description -->
            <p class="fs-14 mb-10" data-max-text="150" itemprop="description"><?php echo $post_description; ?></p>
            <!-- Read More -->
            <a itemprop="url" href="<?php echo $post_link; ?>" class="display-block fs-13 tx-align-end"><?php echo __('Read More', "phenix"); ?></a>
        </div>
        <!-- // info -->
    </div>
</div>
<!-- // Block End -->