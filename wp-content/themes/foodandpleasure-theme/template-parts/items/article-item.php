<?php

/**
 * Article Item Part with Arguments
 */

/*
                'items_config' => array('items_show_tags' => false, 'items_show_main_cat' => true, 'items_show_rounded_cat' => true, 'items_show_date' => true, 'items_show_author' => false),


 */

$_itemArgs = array(
    'items_layout_css' => 'article-item',
    'items_config' => array(
        'items_show_tags' => false,
        'items_show_main_cat' => false,
        'items_show_badge_cat' => false,
        'items_show_date' => false,
        'items_show_author' => false,
        'items_show_excerpt' => false,
        'items_show_arrow' => false,
        'items_show_more_btn' => false,
        'items_more_btn_txt' => __('Leer más', 'wa-theme'),

    ),
);


$itemArgs = wp_parse_args($args, $_itemArgs);
$seodesc = "";

/**
 * FIX debido a que no siempre se envian todos los parámetros de items_config en el archivo que llama a article-item
 */
try {
    $itemArgs['items_config'] = $GLOBALS['WA_Theme']->helper('utils')->fix_args($_itemArgs['items_config'], $itemArgs['items_config']);
} catch (Throwable $e) {
}


if ($itemArgs['items_config']['items_show_excerpt']) {
    $seodesc = get_the_excerpt();
}
if (has_post_thumbnail()) :
    $thumb = get_the_post_thumbnail(get_the_ID(), 'large', array('title' => wp_strip_all_tags(get_the_title()), 'alt' => wp_strip_all_tags(get_the_title()), 'class' => 'd-block article-item__thumbnail--img'));
else :
    $thumb = '<img  class="d-block article-item__thumbnail--img" width="100%" height="auto" src="' . $GLOBALS['default_image'] . '" alt="' . get_the_title() . '" title="' . wp_strip_all_tags(get_the_title()) . '">';
endif;

$primary_category = null;

if ($itemArgs['items_config']['items_show_main_cat'] || $itemArgs['items_config']['items_show_badge_cat']) {

    $primary_category = apply_filters('get_primary_category', $primary_category, get_the_ID());
    // $categories = get_the_category();

    // if (!empty($categories)) {
    //     $main_category['primary_category'] = $categories[0];
    // }
}


?>
<article <?php post_class("article-item " . $itemArgs['items_layout_css'], get_the_ID()); ?> <?php function_exists('wa_article_item_attributes') ? wa_article_item_attributes() : ''; ?>>

    <figure class="article-item__thumbnail <?php echo get_post_format(); ?>">
        <a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo $thumb; ?></a>
        <?php if ($itemArgs['items_config']['items_show_badge_cat']) : ?>
            <a class="article-item__cat--badge post-category" href="<?php echo get_category_link($primary_category['parent_category']->term_id); ?>"><?php echo $primary_category['parent_category']->name; ?></a>
        <?php endif; ?>
    </figure>

    <header class="article-item__header">

        <div class="article-item__meta">

            <?php if ($itemArgs['items_config']['items_show_main_cat']) : ?>
                <a class="article-item__cat post-category" href="<?php echo get_category_link($primary_category['parent_category']->term_id); ?>"><?php echo $primary_category['parent_category']->name; ?></a>
            <?php endif; ?>

            <?php if ($itemArgs['items_config']['items_show_date']) : ?>
                <time class="article-item__time" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
            <?php endif; ?>

            <?php if ($itemArgs['items_config']['items_show_tags']) : ?>
                <div class="article-item__tag"><?php the_tags('', ', ', ''); ?></div>
            <?php endif; ?>

            <div class="article-item__title-container">
                <h2 class="article-item__title"><a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo get_the_title(); ?></a></h2>
            </div>

            <?php if ($itemArgs['items_config']['items_show_excerpt']) : ?>
                <div class="article-item__excerpt">
                    <?php echo $seodesc; ?>
                </div>
            <?php endif; ?>

            <?php if ($itemArgs['items_config']['items_show_author']) : ?>

                <div class="article-item_author" itemprop="author" itemscope itemtype="http://schema.org/Person">
                    <?php echo __('Por: ', 'wa-theme'); ?>
                    <span itemprop="name">
                        <?php the_author_posts_link(); ?>
                    </span>
                </div>

            <?php endif; ?>


            <?php if ($itemArgs['items_config']['items_show_more_btn']) : ?>
                <div class="article-item__more">
                    <a class="btn btn-primary article-item__btn-more" href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>">
                        <?php echo $itemArgs['items_config']['items_more_btn_txt']; ?>
                    </a>
                </div>
            <?php endif; ?>

        </div>





    </header>
</article>