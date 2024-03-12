<!-- Search Box -->
<form action="<?php echo site_url(); ?>" data-add-options='{"sectors-select": {"data-search": true, "data-placeholder": "<?php echo __('جميع القطاعات', 'phenix'); ?>"}}'>
    <!-- Form Control -->
    <div class="control-icon far fa-search icon-primary col mb-20">
        <input name="s" type="text" class="form-control radius-sm" placeholder="<?php echo __("كلمات البحث.", "phenix"); ?>">
    </div>
    <!-- Form Control -->
    <select name="post_type" class="form-control radius-sm mb-20 px-select" data-placeholder="<?php echo __("نوع البيانات", "phenix"); ?>" data-search="1" data-holder-classes="tx-icon far fa-map-marker-alt">
        <option value="studies"><?php echo __("دراسات الجدوي", "phenix"); ?></option>
        <option value="opportunities"><?php echo __("الفرص الاستثمارية", "phenix"); ?></option>
        <option value="production-lines"><?php echo __("خطوط الانتاج", "phenix"); ?></option>
        <option value="portfolio"><?php echo __("سابقة الاعمال", "phenix"); ?></option>
    </select>
    <!-- Form Control -->
    <select name="countries" class="form-control radius-sm mb-20 px-select" data-placeholder="<?php echo __("حسب الدولة", "phenix"); ?>" data-search="1" data-holder-classes="tx-icon far fa-map-marker-alt">
        <?php 
            $countries = get_categories(array('taxonomy'=> 'countries', 'post_type'=>'portfolio', 'hide_empty'=>false));
            foreach ($countries as $term) :
                //===> Get Meta Info <===//
                $tax_thumbnail = get_field('icon', 'category_'.$term->cat_ID);
                //===> Thumbnail Placeholder <===//
                if (!$tax_thumbnail) {$tax_thumbnail = 'https://via.placeholder.com/480x300';}
        ?>
        <option data-image="<?php echo $tax_thumbnail; ?>" value="<?php echo $term->name; ?>"><?php echo $term->name; ?></option>
        <?php endforeach; ?>
    </select>
    <!-- Form Control -->
    <?php wp_dropdown_categories(array(
        'order' => 'DESC',
        'name'  => 'sectors',
        'class' => 'form-control px-select radius-sm mb-20 sectors-select',
        'taxonomy'    => 'sectors',
        'hide_empty'  => false,
        'value_field' => 'slug',
        'option_none_value' => '0',
    )); ?>
    <!-- Search Button -->
    <button type="submit" class="btn primary fluid radius-sm mb-10"><?php echo __("بحث", "phenix"); ?></button>
</form>