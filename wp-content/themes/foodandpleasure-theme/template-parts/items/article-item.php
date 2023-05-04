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
    ),
);


$itemArgs = wp_parse_args($args, $_itemArgs);
$seodesc = "";

foreach ($_itemArgs['items_config'] as $k => $v) {
    if (!isset($itemArgs['items_config'][$k])) $itemArgs['items_config'][$k] = $v;
}

if ($itemArgs['items_config']['items_show_excerpt']) {
    $seodesc = get_the_excerpt();
}
if (has_post_thumbnail()) :
    //$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
    $thumb = get_the_post_thumbnail(get_the_ID(), 'large', array('title' => wp_strip_all_tags(get_the_title()), 'alt' => wp_strip_all_tags(get_the_title()), 'class' => 'd-block'));
else :
    //$thumb[0]=$GLOBALS['default_image'];
    $thumb = '<img  class="d-block" width="100%" height="60vh" src="' . $GLOBALS['default_image'] . '" alt="' . get_the_title() . '" title="' . wp_strip_all_tags(get_the_title()) . '">';
endif;


$category = get_post_primary_category(get_the_ID());
$parent_cat = isset($category['primary_category']->term_id) ? smart_category_top_parent_id($category['primary_category']->term_id, true) : null;
$catname = isset($parent_cat->term_id) ? get_cat_name($parent_cat->term_id) : null;

$parent_cat = getPrimaryCatSlug(get_the_ID());


// var_dump($itemArgs);

?>
<article <?php post_class("article-item " . $itemArgs['items_layout_css'], get_the_ID()); ?> data-main-category="<?php echo isset($parent_cat->slug) ? $parent_cat->slug : ''; ?>">
    <div class="article-item__thumbnail <?php echo get_post_format(); ?>">
        <a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo $thumb; ?></a>
        <?php if ($itemArgs['items_config']['items_show_badge_cat']) : ?>
            <a class="article-item__cat--badge post-category category-bg" href="<?php echo get_category_link($parent_cat->term_id); ?>"><?php echo $parent_cat->name; ?></a>
        <?php endif; ?>

    </div>
    <header class="article-item__header">

        <?php if ($itemArgs['items_config']['items_show_main_cat'] || $itemArgs['items_config']['items_show_date'] || $itemArgs['items_config']['items_show_tags']) : ?>

            <div class="article-item__meta">

                <?php if ($itemArgs['items_config']['items_show_main_cat']) : ?>
                    <a class="article-item__cat post-category inline-category" href="<?php echo get_category_link($parent_cat->term_id); ?>"><?php echo $parent_cat->name; ?></a>
                <?php endif; ?>

                <?php if ($itemArgs['items_config']['items_show_date']) : ?>
                    <time class="category-color" datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
                <?php endif; ?>

                <?php if ($itemArgs['items_config']['items_show_tags']) : ?>
                    <div class="article-item__tag"><?php the_tags('', ', ', ''); ?></div>
                <?php endif; ?>

            </div>

        <?php endif; ?>
        <div class="article-item__title-container">
            <h2 class="article-item__title"><a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo get_the_title(); ?></a></h2>

            <?php if ($itemArgs['items_config']['items_show_excerpt']) : ?>
                <div class="article-item__excerpt">
                    <?php echo $seodesc; ?>
                </div>
            <?php endif; ?>

            <?php if ($itemArgs['items_config']['items_show_author']) : ?>

                <div class="article-item_author" itemprop="author" itemscope itemtype="http://schema.org/Person">
                    <?php echo __('Por: ', 'guia-gastronomica'); ?>
                    <span itemprop="name">
                        <?php the_author_posts_link(); ?>
                    </span>
                </div>

            <?php endif; ?>
        </div>


        <?php if ($itemArgs['items_config']['items_show_more_btn']) : ?>
            <div class="article-item__more">
                <a class="btn btn-primary article-item__btn-more" href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>">
                    Leer más
                </a>
            </div>
        <?php endif; ?>



    </header>
</article>