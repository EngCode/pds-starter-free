<!-- Search Box -->
<form action="<?php echo site_url(); ?>" class="search-box px-group radius-sm" data-add-options='{"px-select": {"data-search": true, "data-placeholder": "<?php echo __('جميع القطاعات', 'phenix'); ?>"}}'>
    <!-- Form Control -->
    <div class="control-icon far fa-search icon-primary col-6">
        <input name="s" type="text" class="form-control" placeholder="<?php echo __("البحث فى دراسات الجدوي.", "phenix"); ?>">
    </div>
    <!-- Hidden Inputs -->
    <input type="hidden" name="post_type[]" value="studies" />
    <!-- Form Control -->
    <?php wp_dropdown_categories(array(
        'order' => 'DESC',
        'name'  => 'sectors',
        'class' => 'form-control px-select col-4',
        'taxonomy'    => 'sectors',
        'hide_empty'  => false,
        'value_field' => 'slug',
        'option_none_value' => '0',
    )); ?>
    <!-- Search Button -->
    <button type="submit" class="btn primary col-2"><?php echo __("بحث", "phenix"); ?></button>
</form>