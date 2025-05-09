<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */

	//===> Get Meta Info <===//
    $tax_permalink = get_category_link($args->cat_ID);
    $tax_thumbnail = get_term_meta($args->cat_ID, "icon", true);

	//===> Thumbnail Placeholder <===//
	if (!$tax_thumbnail) {
		$tax_thumbnail = 'https://placehold.co/480x300';
	}
?>
<!-- Block Start -->
<div class="flag-card col-auto">
    <a href="<?php echo $tax_permalink; ?>" class="display-block content-box color-component-lvl-1 tx-align-center radius-sm">
        <img src="<?php echo $tax_thumbnail;?>" class="mb-15 radius-circle" style="width: 4.688rem;" alt="<?php echo $args->name; ?>" itemprop="image" />
        <h3 class="fs-17 weight-medium mb-0"><?php echo $args->name; ?></h3>
    </a>
</div>
<!-- // Block End -->