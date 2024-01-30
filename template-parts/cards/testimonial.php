<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */

    //===> Get Post Information <===//
    $post_title = get_the_title();
	$post_thumbnail   = get_the_post_thumbnail_url($post->ID, 'full');
	//===> Thumbnail Placeholder <===//
	if ($post_thumbnail === false) { $post_thumbnail = 'https://via.placeholder.com/200x200.webp'; }
?>
<!-- Testimonial Card -->
<div class="testimonail-card mb-30 col-12 col-md-6 col-lg-4">
    <div class="content-box bg-component-lvl-1 position-rv radius-md pd-25 pd-md-30 far fa-quote-left h-min-100">
        <?php if (get_field('sound-file')) : ?>
            <button data-audio="<?php echo get_field('sound-file'); ?>" class="btn square radius-circle far fa-volume-up position-ab pos-top-20 pos-end-20 primary small"></button>
        <?php endif; ?>
        <h3 class="fs-15 mb-15"><img src="<?php echo $post_thumbnail;?>" alt="" class="radius-circle me-10" width="30" height="30"> <?php echo $post_title; ?></h3>
        <p class="color-gray fs-12"><?php echo strip_tags(get_the_content()); ?></p>
    </div>
</div>
<!-- // Testimonial Card -->