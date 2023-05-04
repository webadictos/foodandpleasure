<?php

/**
 * The template for displaying content in the single.php template
 */
?>
<?php
$esInfinito = (isset($_REQUEST['action']) &&  $_REQUEST['action'] == "loadmore") ? true : false;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post article-layout cocktail-layout container px-0'); ?> <?php getPostDataAttributes(); ?>>
    <header class="entry-header">
        <?php

        if (has_post_thumbnail()) :
            $thumb = get_the_post_thumbnail(get_the_ID(), 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => "w-100"));
        else :
            $thumb = '<img src="' . $GLOBALS['default_image'] . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" class="w-100">';
        endif;
        ?>
        <figure class="post-thumbnail m-0"><?php echo $thumb; ?></figure>


        <div class="entry-info">
            <h1 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>


        </div>

        <div class="entry-share">
            <?php
            waShowSharebar(get_the_ID(), $class = "cocktail-sharebar")
            ?>
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
    <footer class="my-5">

        <?php
        waShowSharebar(get_the_ID(), $class = "cocktail-sharebar cocktail-sharebar--footer")
        ?>


        <a class="cocktail-back" href="<?php echo get_post_type_archive_link('bushmills_cocktail'); ?>" title="Regresar a Highballs / Cócteles">Regresar</a>


    </footer>
</article><!-- /#post-<?php the_ID(); ?> -->