<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */

	//===> Get Meta Info <===//
    $tax_permalink = get_category_link($args->cat_ID);
    $tax_thumbnail = get_field('icon', 'category_'.$args->cat_ID);

	//===> Thumbnail Placeholder <===//
	if (!$tax_thumbnail) {
		$tax_thumbnail = 'https://via.placeholder.com/480x300';
	}
?>
<!-- Sector Card -->
<div class="sector-card col-auto">
    <a href="<?php echo $tax_permalink; ?>" data-src="<?php echo $tax_thumbnail; ?>" class="px-media color-white tx-align-center radius-sm overflow-hidden" data-size="16x9">
        <h3 class="bg-alpha-50 fs-14 weight-medium mb-0 pd-15 lineheight-100 position-ab pos-bottom-0 pos-start-0 fluid"><?php echo $args->name; ?></h3>
    </a>
</div>
<!-- // Sector Card -->