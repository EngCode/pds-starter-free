<!-- Search Box -->
<form action="<?php echo site_url(); ?>" class="search-box">
    <!-- Form Control -->
    <div class="control-icon far fa-search icon-primary small col">
        <input name="s" type="text" class="form-control small radius-sm" placeholder="<?php echo __("Search..", "phenix"); ?>">
    </div>
    <!-- Hidden Inputs -->
    <input type="hidden" name="post_type[]" value="post" />
    <!-- Search Button -->
    <!-- <button type="submit" class="btn primary col-2"><?php echo __("بحث", "phenix"); ?></button> -->
</form>