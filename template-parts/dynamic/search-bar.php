<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */

    //===> Define Template Meta Options <===//
    $meta_opts = array(); $meta_features = array();
    if(isset($args['part_options']['options'])) $meta_opts = $args['part_options']['options'];
    if(isset($args['part_options']['features'])) $meta_features = $args['part_options']['features'];
    
    //===> Define Options <===//
    $controls_size = '';
    $font_size = '';

    //===> Control Size <===//
    if (isset($meta_opts['controls-size'])) { $controls_size = $meta_opts['controls-size']; }
    //===> Control Font Size <===//
    if (isset($meta_opts['font-size'])) { $font_size = $meta_opts['font-size']; }
?>
<form action="<?php echo home_url( '/' ); ?>" class="px-group <?php if(isset($args['className'])) { echo $args['className']; };?>">
    <!-- Search Control -->
    <div class="control-icon col col-5 far fa-search mb-15 icon-primary <?php echo $controls_size; ?>">
        <!-- Keywords Input -->
        <input name="s" type="text" class="form-control <?php echo $controls_size; ?> <?php echo $font_size; ?>" placeholder="<?php echo __('Search keywords', 'phenix');?>" />
        <!-- Search Data Types -->
        <?php if (isset($meta_opts['search-type'])) : foreach ($meta_opts['search-type'] as $post_type) { ?>
            <input type="hidden" name="post_type[]" value="<?php echo $post_type;?>" />
        <?php } else : ?>
            <input type="hidden" name="post_type[]" value="post" />
        <?php endif; ?>
    </div>
    <!-- Taxonomies Control -->
    <?php if (isset($meta_opts['taxonomies']) && $meta_opts['taxonomies']['status'] == true) : ?>
        <?php if (isset($meta_opts['taxonomies']['taxonomy-types'])) : foreach ($meta_opts['taxonomies']['taxonomy-types'] as $taxonomy) { ?>
            <div class="control-icon col col-3 far fa-folder mb-15 icon-primary <?php echo $controls_size; ?>" data-add-options='{"px-select": {"multiple": <?php if (isset($meta_opts['taxonomies']['multiple-mode'])) { echo $meta_opts['taxonomies']['multiple-mode']; } else { echo "false"; } ?>, "data-placeholder": "<?php echo __('Show All', 'phenix'); ?>"}}'>
                <?php wp_dropdown_categories(array(
                    'order' => 'DESC',
                    'name'  => $taxonomy.'[]',
                    'class' => 'form-control px-select'.' '.$controls_size.' '.$font_size,
                    'taxonomy'    => 'category',
                    'hide_empty'  => false,
                    'value_field' => 'slug',
                    'option_none_value' => '0',
                ));?>
            </div>
        <?php } endif; ?>
    <?php endif; ?>
    <!-- Button -->
    <input type="submit" value="<?php echo __('Search Now', 'phenix'); ?>" class="btn primary <?php echo $controls_size; ?> display-block ms-auto w-min-120 <?php echo $font_size; ?>">
</form>