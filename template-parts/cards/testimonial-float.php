<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */

    //===> Get Post Information <===//
    $post_title = get_the_title();
	$post_thumbnail   = get_the_post_thumbnail_url($post->ID, 'full');

    //===> Meta information's <===//
    $meta_info = get_post_meta($post->ID);

    //===> Get Study Information <===//
    $job_title = get_post_meta($post->ID, 'job-title', true);

	//===> Thumbnail Placeholder <===//
	if ($post_thumbnail === false) { $post_thumbnail = 'https://via.placeholder.com/200x200.webp'; }
?>
<!-- Testimonial Card -->
<div class="testimonial-card-float col-12">
    <div class="content-box position-rv radius-md">
        <!-- Content -->
        <p class="color-gray pdt-15 mb-30"><?php echo strip_tags(get_the_content()); ?></p>
        <!-- Name -->
        <h3 class="fs-15 mb-10 lineheight-100"><?php echo $post_title; ?></h3>
        <!-- Job Title -->
        <?php if (isset($job_title )) { echo '<p class="fs-13">'.$job_title .'</p>'; } ?>
    </div>
</div>
<!-- // Testimonial Card -->