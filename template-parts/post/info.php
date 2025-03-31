<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */

    //===> Get Post Information <===//
    $post_author_id = get_post_field( 'post_author', $post->ID);
    $post_author_name = get_the_author_meta( 'display_name', $post_author_id);
?>
<span class="tx-icon far me-15 fa-clock"><?php echo get_the_date('F j, Y', $post->ID); ?></span>
<span class="tx-icon far me-15 fa-user"><?php echo $post_author_name; ?></span>

<!-- Share -->
<div class="px-dropdown inline-block ms-auto" data-position="bottom, end">
    <!-- Toggle Button -->
    <button class="px-toggle reset-button far fa-share-alt tx-icon pdy-5 color-behance">Share</button>
    <!-- Dropdown Target -->
    <ul class="px-dropdown-list reset-list bg-white fs-14 w-min-200 bx-shadow-dp-1 border-1 border-solid border-alpha-10 radius-md">
        <li class="color-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" class="tx-icon fab fa-facebook-square"><?php echo __("Share via Facebook","phenix"); ?></a></li>
        <li class="color-twitter"><a href="https://twitter.com/intent/tweet?url=link&text=<?php the_title(); ?>" class="tx-icon fab fa-twitter-square"><?php echo __("Share via Twitter","phenix"); ?></a></li>
        <li class="color-linkedin"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php the_title(); ?>" class="tx-icon fab fa-linkedin"><?php echo __("Share via Linked-In","phenix"); ?></a></li>
        <li class="color-whatsapp"><a href="whatsapp://send?text=<?php the_title(); ?>" class="tx-icon fab fa-whatsapp-square"><?php echo __("Share via WhatsApp","phenix"); ?></a></li>
    </ul>
    <!-- // Dropdown Target -->
</div>