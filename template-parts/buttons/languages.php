<?php
    /**
     * Phenix Blocks
     * @since Phenix WP 1.0
     * @return void
    */

    //===> Get Post Information <===//
    if(function_exists('pll_the_languages')) :
        $post_link  = get_permalink();
        $post_title = get_the_title();
        $post_description = strip_tags(get_the_excerpt());
        $the_languages = pll_the_languages(array('dropdown' => 1,'raw' => 1));
        $current_language = pll_current_language();
?>
<!-- Phenix Dropdown -->
<div class="px-dropdown header-language-btn" data-effect="fade" data-position="bottom, end">
    <?php if ($the_languages) : ?>
    <!-- button -->
    <?php foreach ($the_languages as $language) : ?>
        <?php if ($language['slug'] == $current_language) : ?>
        <button class="btn btn-responsive pdx-0 pdx-md-15 small fs-12 light outline border-alpha-15 radius-height px-toggle tx-uppercase btn-icon fas fa-globe">
            <!-- <img src="<?php echo $language['flag']; ?>" alt="" width="16px" class="icon" /> -->
            <?php echo $language['slug']; ?>
        </button>
        <?php endif; ?>
    <?php endforeach; ?>
    <!-- List -->
    <ul class="px-dropdown-list reset-list bg-white fs-14 w-125 bx-shadow-dp-1 border-1 border-solid border-alpha-10 radius-md primary-font">
        <?php foreach ($the_languages as $language) : ?>
        <li class="item pdx-15 pdy-5">
            <a href="<?php echo $language['url']; ?>"><img src="<?php echo $language['flag']; ?>" alt="" width="16px" class="me-5"> <?php echo $language['name']; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <!-- // List -->
</div>
<!-- // Phenix Dropdown -->
<?php endif; ?>