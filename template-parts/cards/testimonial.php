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
<div class="testimonial-card mb-30 col-12 col-md-6 col-lg-4 pdy-15">
    <div class="content-box bg-component-lvl-1 color-component-lvl-1 position-rv radius-md pd-25 pd-md-30 h-min-100">
        <!-- Client Info -->
        <div class="flexbox flow-nowrap align-center-y pdb-15 divider-b">
            <!-- Avatar -->
            <img src="<?php echo $post_thumbnail;?>" alt="" class="radius-circle me-15" width="60" height="60">
            <!-- info -->
            <div class="info col">
                <!-- Name -->
                <h3 class="fs-16 fs-md-17 mb-10 lineheight-100"><?php echo $post_title; ?></h3>
                <!-- Job Title -->
                <?php if (isset($job_title )) { echo '<p class="fs-12 fs-md-14">'.$job_title .'</p>'; } ?>
            </div>
        </div>
        <p class="color-gray fs-14 pdt-15"><?php echo strip_tags(get_the_content()); ?></p>
    </div>
</div>
<!-- // Testimonial Card -->