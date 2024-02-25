<!-- Search Box -->
<form action="<?php echo site_url(); ?>" data-add-options='{"categories-select": {"data-search": true, "data-placeholder": "<?php echo __('جميع الاقسام', 'phenix'); ?>"}}'>
    <!-- Form Control -->
    <div class="control-icon far fa-search icon-primary col mb-20">
        <input name="s" type="text" class="form-control radius-sm" placeholder="<?php echo __("كلمات البحث.", "phenix"); ?>">
    </div>
    <!-- Hidden Inputs -->
    <input type="hidden" name="post_type" value="post" />
    <!-- Form Control -->
    <?php wp_dropdown_categories(array(
        'order' => 'DESC',
        'name'  => 'category',
        'class' => 'form-control px-select radius-sm mb-20 categories-select',
        'taxonomy'    => 'category',
        'hide_empty'  => false,
        'value_field' => 'slug',
        'option_none_value' => '0',
    )); ?>
    <!-- Search Button -->
    <button type="submit" class="btn primary fluid radius-sm mb-10"><?php echo __("بحث", "phenix"); ?></button>
</form>