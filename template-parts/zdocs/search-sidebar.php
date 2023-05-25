<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */
?>
<!-- Search -->
<form class="flexbox search-form align-between pd-10" method="get" action="<?php echo home_url('/'); ?>">
    <!-- Search Controler -->
    <div class="control-icon small far fa-search fluid">
        <input type="text" name="s" placeholder="<?php echo __('Search Docs', 'phenix'); ?>" class="form-control small radius-md">
    </div>
</form>