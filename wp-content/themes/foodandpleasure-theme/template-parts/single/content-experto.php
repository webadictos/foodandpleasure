<?php

/**
 * The template for displaying content in the single.php template
 */
?>
<?php
$esInfinito = (isset($_REQUEST['action']) &&  $_REQUEST['action'] == "loadmore") ? true : false;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post container article-item-expertos article-item profile-experto'); ?> <?php getPostDataAttributes(); ?>>

    <?php

    if (has_post_thumbnail()) :

        // if (!$esInfinito) {
        //     $thumbSrc = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        //     //$thumb = '<img  class="d-block w-100" width="100%" height="60vh" src="' . $GLOBALS['default_image'] . '" alt="' . get_the_title() . '" title="' . wp_strip_all_tags(get_the_title()) . '">';
        //     $thumb = '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-lcp-src="' . $thumbSrc[0] . '" data-lcp-loaded="false" alt="' . get_the_title() . '" title="' . get_the_title() . '" class="w-100" loading="lazy">';
        // } else {
        $thumb = get_the_post_thumbnail(get_the_ID(), 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => ""));
    // }

    //$thumbPinterest = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');	
    //$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
    else :
        //$thumb[0]=$GLOBALS['default_image'];
        $thumb = '<img src="' . $GLOBALS['default_image'] . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" class="">';
    endif;

    $puesto = get_post_meta(get_the_ID(), 'gg_experto_puesto', true);

    $recomendaciones = get_post_meta(get_the_ID(), 'gg_experto_recomendaciones', true);

    ?>
    <figure class="article-item__thumbnail position-relative"><?php echo $thumb; ?></figure>

    <header class="article-item__header">

        <h1 class="article-item__title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

        <div class="article-item__meta">

            <?php if ($puesto !== "") : ?>
                <p class="profile-experto__puesto"><?php echo $puesto; ?></p>
            <?php endif; ?>

            <div class="profile-experto__bio">
                <?php the_content(); ?>
            </div>
        </div>
    </header><!-- /.entry-header -->
    <div class="article-item__body section section-light">
        <div class="section__title-container section__title-underlined">
            <h2 class="section__title ">
                <span>

                    <?php echo __('Sus recomendaciones', 'guia-gastronomica'); ?>

                </span>
            </h2>
        </div>

        <?php

        if (is_array($recomendaciones) && count($recomendaciones) > 0) :
        ?>
            <ol>
                <?php
                $i = 0;
                foreach ($recomendaciones as $recomendacion) :
                    $socio = get_post($recomendacion['recomendados']);
                ?>

                    <li>

                        <a href="<?php echo get_the_permalink($socio); ?>" title="<?php echo $socio->post_title; ?>"><strong><?php echo $socio->post_title; ?></strong></a>
                        <div class="profile-experto__opinion">
                            <p><?php echo trim($recomendacion['opinion']) !== "" ? $recomendacion['opinion'] : ''; ?></p>
                            <a class="btn btn-primary" href="<?php echo get_the_permalink($socio); ?>" title="<?php echo $socio->post_title; ?>"><?php echo __('Ver', 'guia-gastronomica'); ?></a>
                        </div>
                    </li>

                <?php
                    $i++;
                    if ($i === 3) break;
                endforeach;
                ?>

            </ol>

        <?php endif; ?>

    </div>

    <footer class="article-item__footer">


    </footer>
</article><!-- /#post-<?php the_ID(); ?> -->