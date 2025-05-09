<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */

    //===> Get Post Information <===//
    $post_thumbnail   = get_the_post_thumbnail_url($post->ID, 'full');
    //===> Thumbnail Placeholder <===//
	if ($post_thumbnail === false) {
		$post_thumbnail = 'https://placehold.co/768x500';
	}
?>
<!-- Image -->
<meta itemprop="image" content="<?php echo $post_thumbnail;?>" />
<a itemprop="url" href="<?php echo $post_thumbnail;?>" data-src="<?php echo $post_thumbnail;?>" class="px-media ratio-4x3 mb-20 radius-lg radius-top"></a>