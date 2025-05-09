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
    $audio_file = get_post_meta($post->ID, 'sound-file', true);

	//===> Thumbnail Placeholder <===//
	if ($post_thumbnail === false) { $post_thumbnail = 'https://placehold.co/200x200.webp'; }
?>
<!-- Block Start -->
<div class="testimonial-card col-12 col-md-6 col-lg-4 pdy-15">
    <div class="content-box bg-component-lvl-1 color-component-lvl-1 position-rv radius-md h-min-100">
        <!-- Client Info -->
        <div class="flexbox flow-nowrap align-center-y pdx-25 pdy-15 divider-b">
            <!-- Avatar -->
            <img src="<?php echo $post_thumbnail;?>" alt="" class="radius-circle me-15" style="width: 3.75rem; height: 3.75rem;">
            <!-- info -->
            <div class="info col">
                <!-- Name -->
                <h3 class="fs-16 mb-10 lineheight-100"><?php echo $post_title; ?></h3>
                <!-- Job Title -->
                <?php if (isset($job_title )) { echo '<p class="fs-14 lineheight-100 mb-0">'.$job_title .'</p>'; } ?>
            </div>
            <!-- Audio Button -->
            <?php if (isset($audio_file) && $audio_file !== '') : ?>
            <button type="button" class="btn square primary radius-circle fas fa-play ms-15" data-audio="<?php echo $audio_file;?>"></button>
            <?php endif;?>
        </div>
        <!-- Content -->
        <p class="color-gray fs-14 pd-25"><?php echo strip_tags(get_the_content()); ?></p>
    </div>
</div>
<!-- // Block End -->