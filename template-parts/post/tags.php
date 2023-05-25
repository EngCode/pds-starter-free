<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */
?>

<?php if (!empty(get_the_tags())) : ?>
<div class="tags-wraper flexbox pdt-20 divider-t">
    <!-- Title -->
    <h3 class="fluid fs-15 mb-10"><?php __('Tags Keywords', 'phenix') ?></h3>
    <!-- Tags -->
    
    <?php foreach(get_the_tags() as $tag) : ?>
        <a href="<?php echo get_tag_link( $tag->term_id ); ?>" class="btn tiny gray mb-5 me-5" target="_blank"><?php echo $tag->name; ?></a>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
</div>
<?php endif; ?>