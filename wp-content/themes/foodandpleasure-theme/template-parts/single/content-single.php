<?php

/**
 * The template for displaying content in the single.php template
 */
?>
<?php
$esInfinito = (isset($_REQUEST['action']) &&  $_REQUEST['action'] == "loadmore") ? true : false;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post article-layout container'); ?> <?php //getPostDataAttributes(); 
                                                                                            ?> <?php function_exists('wa_article_attributes') ? wa_article_attributes() : ''; ?>>
    <header class="entry-header">
        <?php

        if (has_post_thumbnail()) :

            // if (!$esInfinito) {
            //     $thumbSrc = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
            //     //$thumb = '<img  class="d-block w-100" width="100%" height="60vh" src="' . $GLOBALS['default_image'] . '" alt="' . get_the_title() . '" title="' . wp_strip_all_tags(get_the_title()) . '">';
            //     $thumb = '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-lcp-src="' . $thumbSrc[0] . '" data-lcp-loaded="false" alt="' . get_the_title() . '" title="' . get_the_title() . '" class="w-100" loading="lazy">';
            // } else {
            $thumb = get_the_post_thumbnail(get_the_ID(), 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => "w-100"));
        // }

        //$thumbPinterest = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');	
        //$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
        else :
            //$thumb[0]=$GLOBALS['default_image'];
            $thumb = '<img src="' . $GLOBALS['default_image'] . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" class="w-100">';
        endif;
        ?>
        <figure class="post-thumbnail m-0"><?php echo $thumb; ?></figure>


        <?php
        // $category = get_post_primary_category(get_the_ID());
        // $parent_cat = smart_category_top_parent_id($category['primary_category']->term_id, true);
        // $catname = get_cat_name($parent_cat->term_id);

        /*
        */
        ?>
        <div class="entry-info">
            <h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>



            <?php
            $excerpt = get_the_excerpt();
            ?>
            <div class="entry-excerpt">
                <?php echo wpautop($excerpt); ?>
            </div>

        </div>

    </header><!-- /.entry-header -->


    <div class="entry-content entry-grid">

        <?php /*
        <div class="entry-grid__sharebar">

            <div class="entry-meta">
                <time class="post-meta-date" itemprop="datePublished" content="<?php the_date('Y-m-d'); ?>"><?php the_time(get_option('date_format')); ?></time>


                <div class="article-autor" itemprop="author" itemscope itemtype="http://schema.org/Person"><?php echo __('Por', 'guia-gastronomica'); ?> <span itemprop="name">
                        <?php the_author_posts_link(); ?></span>
                </div>


            </div><!-- /.entry-meta -->

        </div>
*/ ?>
        <div class="entry-grid__content-area entry-main-text">

            <div class="article-autor" itemprop="author" itemscope itemtype="http://schema.org/Person"><?php echo __('Por: ', 'foodandpleasure-theme'); ?> <span itemprop="name">
                    <?php the_author_posts_link(); ?></span>
            </div>

            <?php
            /* $excerpt = get_the_excerpt();
            ?>
            <div class="entry-excerpt">
                <?php echo wpautop($excerpt); ?>
            </div>

            <?php
*/
            if (function_exists('wa_show_sharebar')) {
                wa_show_sharebar(get_the_ID(), array('networks' => array('facebook', 'whatsapp', 'twitter')));
            }

            the_content();

            wp_link_pages(array('before' => '<div class="page-link"><span>' . __('Pages:', 'hotbook-theme-v2') . '</span>', 'after' => '</div>'));
            ?>
        </div>

        <?php /*
        <aside class="entry-grid__sidebar d-none d-lg-block">

            <?php //get_sidebar(); 
            ?>

        </aside>

*/ ?>
    </div><!-- /.entry-content -->
    <footer class="my-5">


        <?php
        get_template_part('template-parts/single/content', 'related');
        ?>
        <?php
        // waShowSharebar(get_the_ID(), $class = "list-unstyled d-flex align-items-center single-share justify-content-center justify-content-lg-start")
        ?>

    </footer>
</article><!-- /#post-<?php the_ID(); ?> -->