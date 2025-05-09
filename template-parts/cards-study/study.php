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

    //===> Get Study Information <===//
    $revenue = get_post_meta($post->ID, 'study-revenue', true);
    if (isset($revenue)) { $revenue = "0"; }

    $capital = get_post_meta($post->ID, 'study-capital', true);
    if (isset($capital)) { $capital = "0"; }

	//===> Thumbnail Placeholder <===//
	if ($post_thumbnail === false) {
		$post_thumbnail = 'https://placehold.co/768x500';
	}
?>
<!-- Block Start -->
<div class="study-card col-auto pdy-15 tx-align-center" itemtype="https://schema.org/LocalBusiness" itemscope>
    <div class="overflow-hidden position-rv content-box bg-white radius-lg border-1 border-solid border-alpha-10 h-min-100 radius-md bx-shadow-dp-1y">
        <!-- Image -->
        <a itemprop="url" href="<?php echo $post_link; ?>" class="px-media ratio-4x3 radius-md radius-top mb-20" data-src="<?php echo $post_thumbnail;?>" title="<?php echo $post_title; ?>" data-type="image">
            <img class="px-media-img" src="<?php echo $post_thumbnail;?>" alt="<?php echo $post_title; ?>" itemprop="image" />
        </a>
        <!-- Title -->
        <a itemprop="url" href="<?php echo $post_link; ?>" class="color-dark">
            <h3 class="pdx-25 fs-16 mb-15" itemprop="name"><?php echo $post_title; ?></h3>
        </a>
        <!-- Info -->
        <div class="pdx-25 flexbox divider-t pdy-10 align-between align-center-y">
            <span class="fas fa-chart-pie tx-icon fs-14 color-primary icon-lg">
                <strong class="color-dark"><?php echo __("معدل العائد: ", "phenix"). $revenue; ?></strong>
            </span>
            <span class="fas fa-envelope-open-dollar tx-icon fs-14 color-secondary icon-lg">
                <strong class="color-dark"><?php echo __("رأس المال: ", "phenix"). $capital; ?></strong>
            </span>
        </div>
        <!-- Buttons -->
        <div class="flexbox">
            <a href="<?php echo $post_link; ?>" class="col fs-14 weight-medium btn btn-icon dark fas fa-up-right-from-square"><?php echo __("Read More", "phenix"); ?></a>
            <button data-modal="study-order" class="col fs-14 weight-medium btn secondary btn-icon fas fa-phone"><?php echo __("طلب الدراسة", "phenix"); ?></button>
        </div>
        <!-- // Buttons -->
    </div>
</div>
<!-- // Block End -->