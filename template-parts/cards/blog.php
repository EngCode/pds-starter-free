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
		$post_thumbnail = 'https://placehold.co/768x500';
	}
?>
<!-- Block Start -->
<div class="blog-card mb-30 col-auto" itemtype="https://schema.org/NewsArticle" itemscope>
    <div class="content-box bg-component-lvl-1 radius-lg border-1 border-solid border-alpha-10 h-min-100">
        <!-- Image -->
        <meta itemprop="image" content="<?php echo $post_thumbnail;?>" />
        <a itemprop="url" href="<?php echo $post_link; ?>" data-src="<?php echo $post_thumbnail;?>" class="px-media ratio-4x3 mb-20 radius-lg radius-top"></a>
        <!-- info -->
        <div class="pdb-20 pdx-25">
            <!-- Date -->
            <span class="fs-12 tx-icon far fa-clock" itemprop="datePublished"><?php echo $post_date;?></span>
            <!-- Title -->
            <a itemprop="url" href="<?php echo $post_link; ?>" class="reset-link"><h3 class="fs-15 fs-md-17 weight-medium color-primary" itemprop="name"><?php echo $post_title; ?></h3></a>
            <!-- Description -->
            <p class="fs-14 mb-10 color-gray tx-line-clamp" style="--max-lines: 3;" itemprop="description"><?php echo $post_description; ?></p>
            <!-- Read More -->
            <a itemprop="url" href="<?php echo $post_link; ?>" class="display-block fs-13 tx-align-end color-primary"><?php echo __('Read More', "phenix"); ?></a>
        </div>
        <!-- // info -->
    </div>
</div>
<!-- // Block End -->