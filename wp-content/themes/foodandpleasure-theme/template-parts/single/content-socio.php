<?php

/**
 * The template for displaying content in the single.php template
 */
?>
<?php
if (isset($_REQUEST['action']) &&  $_REQUEST['action'] == "loadmore") {
    $esInfinito = true;
    $do_not_duplicate = explode(',', $_REQUEST['not__in']);
} else {
    $esInfinito = false;
}
$do_not_duplicate[] = get_the_ID();

$destacado = get_post_meta(get_the_ID(), 'gg_socio_destaca_por', true);
$menu = get_post_meta(get_the_ID(), 'gg_socio_menu', true);
$hasReservaciones = get_post_meta(get_the_ID(), 'gg_socio_reservaciones', true);
$reservacionesInfo = get_post_meta(get_the_ID(), 'gg_socio_reservaciones_info', true);
$reservacionesURL = get_post_meta(get_the_ID(), 'gg_socio_url_reservacaciones', true);
$direccion = get_post_meta(get_the_ID(), 'gg_socio_direccion', true);
$telefono = get_post_meta(get_the_ID(), 'gg_socio_telefono', true);
$web = get_post_meta(get_the_ID(), 'gg_socio_web', true);
$horarios = get_post_meta(get_the_ID(), 'gg_socio_horarios', true);
$termsSellos = get_the_terms(get_the_ID(), 'gg_certificates');
$location = get_post_meta(get_the_ID(), 'gg_socio_geolocalizacion', true);
$_allSellos = array();

if (is_array($termsSellos)) {
    foreach ($termsSellos as $sello) {
        if ($sello->slug == 'sin-especificar') continue;



        $logo = get_term_meta($sello->term_id, 'gg_certificate_logo', true);

        if (trim($logo) !== "") {


            $_allSellos[] = "<a href='" . esc_url(get_term_link($sello)) . "' data-bs-toggle=\"popover\" data-bs-trigger='hover focus' data-bs-content='" . $sello->name . "'><img src='{$logo}' class='sello-img' alt='" . $sello->name . "' width='56' height='56' loading='lazy' fetchpriority='low'></a>";
        }
    }
}

if ($web) {
    $hostSitio = parse_url($web, PHP_URL_HOST);
}

?>
<article data-postid="<?php the_ID(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('post layout-restaurante container-fluid'); ?> <?php getPostDataAttributes(); ?>>
    <div class="row d-flex flex-column flex-lg-row align-items-center justify-content-center no-gutters mb-4">
        <div class="entry-content entry-grid mx-auto col-12 col-lg-12 col-xl-11">
            <div class="perfil-restaurante">
                <div class="categorias">
                    <?php
                    $taxonomy = 'gg_category';
                    $terms = get_the_terms(get_the_ID(), $taxonomy);
                    $output = '';
                    foreach ($terms as $term) {
                        $output .= '<div class="cat"><a href="' . esc_url(get_term_link($term)) . '">' . $term->name . '</a></div>';
                    }
                    echo $output;
                    ?>
                </div>
                <div class="title">
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                </div>

                <div class="compartir">
                    <ul class="social-sharebar-row list-unstyled d-flex flex-row justify-content-center align-items-center align-content-start single-share">
                        <li><a href="mailto:?subject=<?php echo get_the_title(); ?>&body=<?php echo get_permalink(); ?>" data-action="share/mail/share" data-social-network="Mail" target="_blank" class="email share-link" title="¡Compartir por Correo!" rel="nofollow noopener noreferrer"><i class="fas fa-envelope"></i></a></li>
                        <li><a href="https://api.whatsapp.com/send?text=<?php echo get_permalink(); ?>" data-action="share/whatsapp/share" data-social-network="WhatsApp" target="_blank" class="whatsapp share-link" title="¡Compartir en WhatsApp!" rel="nofollow noopener noreferrer"><i class="fab fa-whatsapp"></i></a></li>
                        <li><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank" class="fb share-link" data-social-network="Facebook" title="¡Compartir en Facebook!" rel="nofollow noopener noreferrer"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/share?url=<?php echo get_permalink(); ?>&text= <?php echo get_the_title(); ?> " target="_blank" data-social-network="Twitter" class="tw share-link" title="¡Compartir en Twitter!" rel="nofollow noopener noreferrer"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>

                <div class="galeria">
                    <div class="big">
                        <?php
                        if (has_post_thumbnail()) :
                            if (!$esInfinito) {
                                //$thumbSrc = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                                // echo '<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-lcp-src="' . $thumbSrc[0] . '" data-lcp-loaded="false" alt="' . get_the_title() . '" title="' . get_the_title() . '" class="w-100" loading="lazy">';
                                echo get_the_post_thumbnail(get_the_ID(), 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => "w-100"));
                            } else {
                                echo get_the_post_thumbnail(get_the_ID(), 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => "w-100"));
                            }
                        else :
                            echo '<img src="' . $GLOBALS['default_image'] . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" class="w-100">';
                        endif;
                        ?>
                    </div>
                    <?php
                    $galeria = get_post_meta(get_the_ID(), 'gg_socio_galeria', true);
                    foreach ($galeria as $k => $v) {
                        $thumb = wp_get_attachment_image_src($k, 'thumbnail');
                        //print_r($thumb);
                        echo '<div class="small"><img src="' . $thumb[0] . '" border="0" /></div>';
                    }

                    //print_r($destacado);
                    ?>
                </div>

                <div class="contenido">
                    <?php
                    the_content();
                    $data = get_post_meta(get_the_ID());
                    // print_r($data);
                    ?>
                    <div class="article-socio__info">

                        <?php if ($destacado !== "") : ?>
                            <div class="article-socio__destaca">
                                <strong><?php echo __('Destaca por: ', 'guia-gastronomica'); ?></strong>
                                <?php echo $destacado; ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        if ($menu !== "") :
                        ?>
                            <a class="btn btn-primary" href="<?php echo $menu; ?>" target="_blank"><?php echo __('Menú', 'guia-gastronomica'); ?></a>
                        <?php
                        endif;
                        ?>

                        <?php
                        if (intval($hasReservaciones)) {
                            if ($reservacionesURL !== "") :
                        ?>
                                <a class="btn btn-primary" href="<?php echo $reservacionesURL; ?>" target="_blank" <?php echo ($reservacionesInfo !== "") ? 'data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="' . strip_tags($reservacionesInfo) . '"' : ''; ?>>Reservar</a>
                        <?php
                            endif;
                        }
                        ?>

                    </div>

                    <div class="article-socio__info-buttons">

                        <div class="article-socio__info-address">
                            <div class="article-socio__info-button"><i class="fas fa-map-marker-alt"></i></div>
                            <p><?php echo $direccion; ?></p>

                        </div>

                        <div class="article-socio__info-hours">
                            <div class="article-socio__info-button"><i class="far fa-calendar-check"></i></div>
                            <p><?php echo $horarios; ?></p>
                        </div>

                        <div class="article-socio__info-phone">
                            <div class="article-socio__info-button"><i class="fas fa-phone-alt"></i></div>
                            <p><?php echo $telefono; ?></p>
                        </div>

                        <?php if (trim($web) !== "") : ?>
                            <div class="article-socio__info-web">
                                <div class="article-socio__info-button"><i class="fas fa-mouse-pointer"></i></div>
                                <p><a href="<?php echo $web; ?>" target="_blank"><?php echo $hostSitio; ?></a></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php
                    if (count($_allSellos) > 0)  $colSize = "col-md-6";
                    else $colSize = "col-md-12";

                    ?>

                    <div class="row my-4">
                        <div class="col-12 <?php echo  $colSize; ?>">
                            <div class="mapa-socio" id="mapa-socio-<?php echo get_the_ID(); ?>" data-lat="<?php echo $location['latitude']; ?>" data-long="<?php echo $location['longitude']; ?>" data-title="<?php echo get_the_title(); ?>">

                            </div>

                            <a class="btn btn-primary btn-guia-primary" href="https://www.google.com/maps/dir/Current+Location/<?php echo implode(",", $location); ?>">Ir a dirección</a>
                        </div>
                        <?php
                        if (count($_allSellos) > 0) {
                        ?>
                            <div class="col-12 col-md-6 col-sellos">

                                <h3><?php echo __('Sellos:', 'guia-gastronomica'); ?></h3>

                                <div class="sellos-container">
                                    <?php echo implode("", $_allSellos); ?>
                                </div>

                            </div>
                        <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="row justify-content-center mb-4">

        <div class="col-12 col-lg-2 mb-3">
            <div class="bloque-data-restaurante">
                <div class="titulo"><?php echo __('Rango de precios'); ?></div>
                <div class="contenido">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'gg_prices');
                    if ($terms) {
                        foreach ($terms as $term) {
                            if ($term->slug == 'sin-especificar') continue;
                            echo $term->name;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 mb-3">
            <div class="bloque-data-restaurante">
                <div class="titulo"><?php echo __('Recomendaciones'); ?></div>
                <div class="contenido">
                    <?php
                    $terms = get_post_meta(get_the_ID(), 'gg_socio_recomendaciones', true);
                    echo $terms;
                    ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5 mb-3">
            <div class="bloque-data-restaurante">
                <div class="titulo"><?php echo __('Opciones veganas'); ?></div>
                <div class="contenido">
                    <?php
                    $terms = get_post_meta(get_the_ID(), 'gg_socio_opciones_veganas_vegetarianas', true);
                    echo $terms;
                    ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-12 col-xl-11  my-4">
            <div class="bloque-data-restaurante">
                <div class="titulo"><?php echo __('Características'); ?></div>
                <div class="contenido">
                    <div class="caracteristicas">
                        <div class="item">
                            <i class="<?php echo (get_post_meta(get_the_ID(), 'gg_socio_reservaciones', 1) ? 'far fa-check-circle' : 'fas fa-ban'); ?>"></i>
                            <b><?php echo __('Reservación:'); ?></b> <?php echo strip_tags(get_post_meta(get_the_ID(), 'gg_socio_reservaciones_info', 1), '<b><a><i>'); ?>
                        </div>
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'gg_features');
                        $features = array();
                        foreach ($terms as $term) {
                            // echo '<div class="item"><i class="far fa-check-circle"></i> <b>'.$term->name.'</b></div>';
                            $features[] = $term->slug;
                        }
                        $list_terms = get_terms([
                            'taxonomy' => 'gg_features',
                            'hide_empty' => false,
                        ]);
                        foreach ($list_terms as $term) {
                            echo '<div class="item"><i class="' . (in_array($term->slug, $features) ? 'far fa-check-circle' : 'fas fa-ban') . '"></i> <b>' . $term->name . '</b></div>';
                        }
                        ?>
                        <div class="item">
                            <i class="<?php echo (get_post_meta(get_the_ID(), 'gg_socio_delivery', 1) ? 'far fa-check-circle' : 'fas fa-ban'); ?>"></i>
                            <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo get_post_meta(get_the_ID(), 'gg_socio_delivery_info', 1); ?>"><?php echo __('Delivery'); ?></button>
                        </div>
                        <div class="item">
                            <i class="fas fa-user"></i>
                            <b><?php echo __('Aportaciones sociales:'); ?></b> <?php echo strip_tags(get_post_meta(get_the_ID(), 'gg_socio_aportaciones_sociales', 1), '<b><a><i>'); ?>
                        </div>
                        <div class="item">
                            <i class="fas fa-leaf"></i>
                            <b><?php echo __('Acciones a favor del medio ambiente:'); ?></b> <?php echo strip_tags(get_post_meta(get_the_ID(), 'gg_socio_acciones_medioambiente', 1), '<b><a><i>'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-5 mb-3">
            <div class="bloque-data-restaurante">
                <div class="titulo"><?php echo __('Otras sucursales'); ?></div>
                <div class="contenido">
                    <?php
                    $terms = get_post_meta(get_the_ID(), 'gg_socio_sucursales', true);
                    if ($terms) {
                        echo '<ul>';
                        foreach ($terms as $term) {
                            echo '<li><a href="' . get_permalink($term) . '" target="_blank">' . get_the_title($term) . '</a></li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 mb-3">
            <div class="bloque-data-restaurante">
                <div class="titulo"><?php echo __('Observaciones'); ?></div>
                <div class="contenido">
                    <?php
                    $terms = get_post_meta(get_the_ID(), 'gg_socio_observaciones', true);
                    echo $terms;
                    ?>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-12 col-xl-11 my-4">
            <div class="bloque-data-restaurante lateral">
                <div class="titulo"><?php echo __('Comparte tu experiencia'); ?></div>
                <div class="contenido">
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>

                </div>
            </div>
        </div>

    </div>
</article><!-- /#post-<?php the_ID(); ?> -->