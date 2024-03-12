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

    //===> Get Study Information <===//
    $revenue = get_post_meta($post->ID, 'study-revenue', true);
    if (isset($revenue)) { $revenue = "0"; }

    $capital = get_post_meta($post->ID, 'study-capital', true);
    if (isset($capital)) { $capital = "0"; }

	//===> Thumbnail Placeholder <===//
	if ($post_thumbnail === false) {
		$post_thumbnail = 'https://via.placeholder.com/768x500';
	}
?>
<!-- Block Start -->
<div class="study-card col-auto pdy-15 tx-align-center" itemtype="https://schema.org/LocalBusiness" itemscope>
    <div class="position-rv content-box bg-white radius-lg border-1 border-solid border-alpha-10 h-min-100 radius-md bx-shadow-dp-1y">
        <!-- Image -->
        <a itemprop="url" href="<?php echo $post_link; ?>" class="px-media ratio-4x3 radius-md radius-top" data-src="<?php echo $post_thumbnail;?>" data-type="image">
            <img class="px-media-img" src="<?php echo $post_thumbnail;?>" alt="<?php echo $post_title; ?>" itemprop="image" />
        </a>
        <!-- Content -->
        <div class="pdx-25 pdy-20">
            <!-- Title -->
            <a itemprop="url" href="<?php echo $post_link; ?>" class="color-dark">
                <h3 class="fs-17 mb-15" itemprop="name"><?php echo $post_title; ?></h3>
            </a>
            <!-- Info -->
            <div class="flexbox divider-t pdy-15 pdx-5 align-between align-center-y">
                <span class="fas fa-chart-pie tx-icon fs-14 color-primary icon-lg">
                    <strong class="color-dark"><?php echo __("معدل العائد: ", "phenix"). $revenue; ?></strong>
                </span>
                <span class="fas fa-envelope-open-dollar tx-icon fs-14 color-secondary icon-lg">
                    <strong class="color-dark"><?php echo __("رأس المال: ", "phenix"). $capital; ?></strong>
                </span>
            </div>
            <!-- Button -->
            <button data-modal="study-order" class="btn secondary radius-sm fluid fs-14 weight-medium bx-shadow-gls-dp-1"><?php echo __("أطلب الان", "phenix"); ?></button>
        </div>
    </div>
</div>
<!-- // Block End -->