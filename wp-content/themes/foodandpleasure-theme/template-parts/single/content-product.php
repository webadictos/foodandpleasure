<?php

/**
 * The template for displaying content in the single.php template
 */
?>
<?php
$esInfinito = (isset($_REQUEST['action']) &&  $_REQUEST['action'] == "loadmore") ? true : false;


$subtitulo = get_post_meta(get_the_ID(), 'bushmills_product_subtitulo', true);
$leyenda = get_post_meta(get_the_ID(), 'bushmills_product_leyenda', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post product-layout'); ?> <?php getPostDataAttributes(); ?>>
    <header class="entry-header">
        <div class="entry-header__bg"></div>
        <div class="entry-header__shape"></div>

        <?php

        if (has_post_thumbnail()) :

            $thumb = get_the_post_thumbnail(get_the_ID(), 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => "w-100"));
        else :
            $thumb = '<img src="' . $GLOBALS['default_image'] . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" class="w-100">';
        endif;
        ?>
        <figure class="post-thumbnail entry-header__thumb"><?php echo $thumb; ?></figure>

        <div class="entry-info entry-header__meta">
            <h1 class="entry-title title-with-separator"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

            <h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php echo $subtitulo; ?>"><?php echo $subtitulo; ?></a></h2>

            <p class="">
                <?php echo $leyenda; ?>
            </p>

            <div class="entry-header__meta--btns">
                <a href="<?php echo bushmills_utils::buyLink(get_the_ID()); ?>" class="btn btn-primary btn-product btn-comprar">Comprar</a> <a href="<?php echo bushmills_utils::nearMeLink(get_the_ID()); ?>" class="btn btn-primary btn-product  btn-cerca">Cerca de mi</a>
            </div>

        </div>

    </header><!-- /.entry-header -->


    <div class="entry-content entry-grid">

        <div class="entry-grid__content-area entry-main-text">
            <?php

            the_content();

            wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'hotbook-theme-v2') . '</span>', 'after' => '</div>'));
            ?>
        </div>




    </div><!-- /.entry-content -->
    <footer>


        <?php

        $slug = basename(get_permalink(get_the_ID()));
        $page_for_posts = get_option('page_for_posts');

        $_layoutArgs = array(
            'section_id' => 'seccion-related-product',
            'section_class' => 'section-related ',
            'section_name' => 'Lo último del ícono del whiskey irlandés',
            'grid_layout' => 'grid-container-items scroll-mobile',
            'section_show_link' => false,
            'section_show_more_link' => false,
            'exclude_container' => true,
            'items_layout_css' => 'article-item--related',
            'has_container' => false,
            'show_more_btn' => true,
            'show_more_link' => get_the_permalink($page_for_posts),
            'show_more_txt' => 'Ir a crónicas del whisky',
            'items_config' => array('items_show_tags' => false, 'items_show_main_cat' => false, 'items_show_badge_cat' => false, 'items_show_date' => false, 'items_show_author' => false, 'items_show_excerpt' => false),
            'queryArgs' => array(
                'posts_per_page' => 3,
                'tag' => $slug,
                'post__not_in' => array(get_the_ID()),
            )
        );

        /*
          <?php if ($layoutArgs['show_more_btn']) : ?>
                <div class="text-center my-5">
                    <a class="btn btn-primary btn-show-more" href="<?php echo $layoutArgs['show_more_link']; ?>"><?php echo $layoutArgs['show_more_txt']; ?></a>
                </div>
            <?php endif; ?>
        */

        get_template_part('template-parts/single/content', 'related', $_layoutArgs);
        ?>
        <?php
        // waShowSharebar(get_the_ID(), $class = "list-unstyled d-flex align-items-center single-share justify-content-center justify-content-lg-start")
        ?>

    </footer>
</article><!-- /#post-<?php the_ID(); ?> -->