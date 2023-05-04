<?php

$currentSocio = $GLOBALS['current_post_config'];

$destacado = $currentSocio['gg_socio_destaca_por']; // get_post_meta(get_the_ID(), 'gg_socio_destaca_por', true);
$menu = $currentSocio['gg_socio_menu']; //get_post_meta(get_the_ID(), 'gg_socio_menu', true);
$hasReservaciones = $currentSocio['gg_socio_reservaciones']; //get_post_meta(get_the_ID(), 'gg_socio_reservaciones', true);
$reservacionesInfo = $currentSocio['gg_socio_reservaciones_info']; //get_post_meta(get_the_ID(), 'gg_socio_reservaciones_info', true);
$reservacionesURL = $currentSocio['gg_socio_url_reservaciones']; //get_post_meta(get_the_ID(), 'gg_socio_url_reservacaciones', true);
$direccion = $currentSocio['gg_socio_direccion']; //get_post_meta(get_the_ID(), 'gg_socio_direccion', true);
$telefono = $currentSocio['gg_socio_telefono']; //get_post_meta(get_the_ID(), 'gg_socio_telefono', true);
$whatsapp = $currentSocio['gg_socio_whatsapp']; //get_post_meta(get_the_ID(), 'gg_socio_whatsapp', true);
$web = $currentSocio['gg_socio_web']; //get_post_meta(get_the_ID(), 'gg_socio_web', true);
$horarios = $currentSocio['gg_socio_horarios']; //get_post_meta(get_the_ID(), 'gg_socio_horarios', true);
$termsSellos = get_the_terms(get_the_ID(), 'gg_certificates');
$location = $currentSocio['gg_socio_geolocalizacion']; //get_post_meta(get_the_ID(), 'gg_socio_geolocalizacion', true);
$redesSociales = array();
$redesSociales['facebook'] = $currentSocio['redes_sociales']['facebook']; //get_post_meta(get_the_ID(), 'gg_socio_facebook', true);
$redesSociales['instagram'] = $currentSocio['redes_sociales']['instagram']; //get_post_meta(get_the_ID(), 'gg_socio_instagram', true);
$redesSociales['twitter'] = $currentSocio['redes_sociales']['twitter']; //get_post_meta(get_the_ID(), 'gg_socio_twitter', true);
$topochico = $currentSocio['gg_socio_topochico']; //get_post_meta(get_the_ID(), 'gg_socio_topochico', true);

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
<article data-postid="<?php the_ID(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('post layout-socio container'); ?> <?php getPostDataAttributes(); ?>>

    <div class="socio-container">

        <div class="categories-container scrolling-wrapper">

            <?php
            $taxonomy = 'gg_category';
            $terms = get_the_terms(get_the_ID(), $taxonomy);
            // $terms = wp_get_object_terms(get_the_ID(), $taxonomy, array("orderby" => "name", "parent" => false));

            $output = '';

            $catsTmp = array();

            foreach ($terms as $term) {
                if ($term->parent === 0) {
                    $catsTmp[$term->term_id]['parent'] = $term;
                } else {
                    $catsTmp[$term->parent]['childs'][] = $term;
                }
            }

            foreach ($catsTmp as $p => $c) {

                if ($c['parent']) {
                    $output .= '<a href="' . esc_url(get_term_link($c['parent'])) . '">' . $c['parent']->name . '</a>';
                }

                if (is_array($c['childs'])) {
                    foreach ($c['childs'] as $child) {
                        $output .= '<a href="' . esc_url(get_term_link($child)) . '">' . $child->name . '</a>';
                    }
                }
            }

            echo $output;
            ?>

        </div>


        <div class="social-container">

            <?php waShowSharebar(get_the_ID()); ?>


            <div class="article-item__favorite">
                <?php
                echo get_favorites_button(get_the_ID());
                ?>
            </div>

        </div>


        <div class="socio-inner-container">

            <header class="layout-socio__title">
                <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

                <?php wa_show_rating_avg(get_the_ID()); ?>
            </header>

            <div class="layout-socio__gallery">

                <div class="sticky-top">
                    <div id="carouselSocio" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="expand-image"><i class="fas fa-expand-alt"></i></div>
                                <?php
                                $carouselThumbs = array();
                                $thumbSrc = "";
                                if (has_post_thumbnail()) :
                                    $image = get_the_post_thumbnail(get_the_ID(), 'full', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => "w-100"));
                                    $carouselThumbs[] = get_the_post_thumbnail(get_the_ID(), 'thumbnail', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => "w-100"));
                                    $thumbSrc = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                else :
                                    $image =  '<img src="' . $GLOBALS['default_image'] . '" alt="' . get_the_title() . '" title="' . get_the_title() . '" class="w-100">';
                                    $carouselThumbs[] = $image;
                                endif;
                                ?>
                                <?php if ($thumbSrc !== "") : ?>
                                    <a href="<?php echo $thumbSrc; ?>" class="glightbox" data-gallery="gallery-socio-<?php echo get_the_ID(); ?>">
                                    <?php endif; ?>
                                    <?php echo $image; ?>
                                    <?php if ($thumbSrc) : ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <?php
                            $galeria = get_post_meta(get_the_ID(), 'gg_socio_galeria', true);
                            foreach ($galeria as $k => $v) {
                                $image = wp_get_attachment_image($k, 'large', false, array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => "w-100"));
                                $carouselThumbs[] = wp_get_attachment_image($k, 'thumbnail', false, array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => "w-100"));
                                $thumbSrc = $v;
                            ?>
                                <div class="carousel-item">
                                    <div class="expand-image"><i class="fas fa-expand-alt"></i></div>

                                    <a href="<?php echo $thumbSrc; ?>" class="glightbox" data-gallery="gallery-socio-<?php echo get_the_ID(); ?>">
                                        <?php echo $image; ?>
                                    </a>
                                </div>
                            <?php
                            }
                            ?>

                        </div>


                        <?php if (count($carouselThumbs) > 1) : ?>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselSocio" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselSocio" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        <?php endif; ?>
                    </div>
                    <?php if (count($carouselThumbs) > 1) : ?>
                        <div class="carousel-indicators scroll">
                            <?php
                            foreach ($carouselThumbs as $index => $thumbnail) :
                            ?>
                                <button type="button" data-bs-target="#carouselSocio" data-bs-slide-to="<?php echo $index; ?>" aria-label="Slide <?php echo $index + 1; ?>">
                                    <?php echo $thumbnail; ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="layout-socio__info">
                <?php
                echo (strip_tags(get_the_content(), '<p><a><strong>'));
                ?>
            </div>
            <div class="layout-socio__destaca">
                <?php if ($destacado !== "") : ?>
                    <div class="article-socio__destaca">
                        <strong><?php echo __('Destaca por: ', 'guia-gastronomica'); ?></strong>
                        <?php echo $destacado; ?>
                    </div>
                <?php endif; ?>

                <div class="article-socio__menu-btns">
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
                            <a class="btn btn-primary" href="<?php echo $reservacionesURL; ?>" target="_blank" <?php echo ($reservacionesInfo !== "") ? 'data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="' . strip_tags($reservacionesInfo) . '"' : ''; ?>><?php echo __('Reservar', 'guia-gastronomica'); ?></a>
                    <?php
                        endif;
                    }
                    ?>
                </div>

            </div>


            <?php
            $mapSinSellos = (count($_allSellos) <= 0 && !$topochico) ? "layout-socio__map--sinsellos" : "";
            ?>



            <div class="layout-socio__map <?php echo $mapSinSellos; ?>">
                <div class="mapa-socio" id="mapa-socio-<?php echo get_the_ID(); ?>" data-lat="<?php echo $location['latitude']; ?>" data-long="<?php echo $location['longitude']; ?>" data-title="<?php echo get_the_title(); ?>">

                </div>

                <a class="btn btn-primary btn-guia-primary" href="https://www.google.com/maps/dir/Current+Location/<?php echo implode(",", $location); ?>"><?php echo __('Ir a dirección', 'guia-gastronomica'); ?></a>

            </div>

            <div class="layout-socio__cards">
                <div class="article-socio__info-address">
                    <div class="article-socio__info-button"><i class="fas fa-map-marker-alt"></i></div>
                    <p><?php echo $direccion; ?></p>

                </div>

                <div class="article-socio__info-hours">
                    <div class="article-socio__info-button"><i class="far fa-calendar-check"></i></div>
                    <p><?php echo nl2br($horarios); ?></p>
                </div>
                <?php if (trim($telefono) !== "" || trim($whatsapp) !== "") : ?>
                    <div class="article-socio__info-phone">
                        <div class="article-socio__info-button"><i class="fas fa-phone-alt"></i></div>
                        <p><a href="tel:<?php echo $telefono; ?>" rel="nofollow" target="_blank"><?php echo $telefono; ?></a></p>
                        <?php
                        if (trim($whatsapp) !== "") :
                            $waNumber = wa_Utils::validNumber($whatsapp, "521");
                            $waMsg = "*" . __('Contacto desde la Guía Gastronómica de CDMX', 'guia-gastronomica') . "* - " . get_the_permalink();
                            $waLink = "https://wa.me/{$waNumber}?text=" . urlencode($waMsg);
                        ?>
                            <p><a href="<?php echo $waLink; ?>" rel="nofollow" target="_blank"><i class="fab fa-whatsapp"></i> <?php echo $waNumber; ?></a></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if (trim($web) !== "") : ?>
                    <div class="article-socio__info-web">
                        <div class="article-socio__info-button"><i class="fas fa-mouse-pointer"></i></div>
                        <p><a href="<?php echo $web; ?>" target="_blank"><?php echo $hostSitio; ?></a></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="layout-socio__social">

                <?php
                foreach ($redesSociales as $red => $link) {

                    $userRed = parse_url($link, PHP_URL_PATH);
                    $userRed = trim($userRed, "/");

                    if ($userRed === "") continue;

                ?>
                    <a href="<?php echo $link; ?>" target="_blank" rel="nofollow noreferrer"><i class="fab fa-<?php echo $red; ?>"></i> @<?php echo $userRed; ?></a>
                <?php
                }
                ?>



                <?php
                if (count($_allSellos) > 0) {
                ?>

                    <div class="layout-socio__sellos--logos">
                        <?php echo implode("", $_allSellos); ?>
                    </div>

                <?php
                }
                ?>


                <?php
                if ($topochico) :
                ?>
                    <div class="layout-socio__sellos--logos layout-socio__sellos--topochico">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-topo-chico.png" alt="Topo Chico" class="img-fluid" width="153" height="57">
                    </div>
                <?php
                endif;
                ?>



            </div>



        </div>

    </div>

    <!--Features-->

    <div class="row justify-content-center mb-4">

        <div class="col-6 col-lg-2 flex-fill mb-3 d-flex">
            <div class="bloque-data-restaurante">
                <div class="titulo"><?php echo __('Precio', 'guia-gastronomica'); ?></div>
                <div class="contenido">
                    <p>
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'gg_prices');
                        if ($terms) {
                            foreach ($terms as $term) {
                                if ($term->slug == 'sin-especificar') continue;
                                echo $term->name;
                            }
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-2 flex-fill mb-3 d-flex">
            <div class="bloque-data-restaurante">
                <div class="titulo"><?php echo __('Formas de pago', 'guia-gastronomica'); ?></div>
                <div class="contenido">
                    <p>
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'gg_payments');
                        if ($terms) {
                            $formas = array();
                            foreach ($terms as $term) {
                                if ($term->slug == 'sin-especificar') continue;
                                $formas[] = $term->name;
                            }

                            echo "<p>" . implode(" · ", $formas) . "</p>";
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>



        <?php
        $recomendaciones =  $currentSocio['gg_socio_recomendaciones']; //get_post_meta(get_the_ID(), 'gg_socio_recomendaciones', true);
        if (trim($recomendaciones) !== "") :
        ?>
            <div class="col-12 col-lg-4 flex-fill mb-3 d-flex">
                <div class="bloque-data-restaurante">
                    <div class="titulo"><?php echo __('Recomendaciones', 'guia-gastronomica'); ?></div>
                    <div class="contenido">
                        <?php
                        echo wpautop($recomendaciones);
                        ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
        $opcionesVeganas = $currentSocio['gg_socio_opciones_veganas_vegetarianas']; //get_post_meta(get_the_ID(), 'gg_socio_opciones_veganas_vegetarianas', true);

        if (trim($opcionesVeganas) !== "") :

        ?>

            <div class="col-12 col-lg-4 flex-fill mb-3 d-flex">
                <div class="bloque-data-restaurante">
                    <div class="titulo"><?php echo __('Opciones veganas', 'guia-gastronomica'); ?></div>
                    <div class="contenido">
                        <?php
                        echo wpautop($opcionesVeganas);
                        ?>
                    </div>
                </div>
            </div>
        <?php
        endif;
        ?>


        <div class="col-12 col-lg-12  my-4">
            <div class="bloque-data-restaurante">
                <div class="titulo"><?php echo __('Características', 'guia-gastronomica'); ?></div>
                <div class="contenido">
                    <ul class="caracteristicas">


                        <?php

                        $reservacionFeature =  $currentSocio['gg_socio_reservaciones_info']; //get_post_meta(get_the_ID(), 'gg_socio_reservaciones_info', 1);

                        if (trim($reservacionFeature) !== "") :

                        ?>
                            <li class="item">
                                <strong><?php echo __('Reservación:', 'guia-gastronomica'); ?></strong> <span><?php echo strip_tags($reservacionFeature, '<strong><a><i>'); ?></span>
                            </li>
                        <?php
                        endif;
                        ?>

                        <?php


                        $terms = get_the_terms(get_the_ID(), 'gg_features');
                        // $features = array();
                        if (is_array($terms)) :
                            foreach ($terms as $term) {

                        ?>
                                <li class="item"><?php echo $term->name; ?></li>
                        <?php
                            }
                        endif;

                        ?>
                        <?php
                        $delivery = $currentSocio['gg_socio_delivery']; //get_post_meta(get_the_ID(), 'gg_socio_delivery', 1);
                        $deliveryInfo = $currentSocio['gg_socio_delivery_info']; //get_post_meta(get_the_ID(), 'gg_socio_delivery', 1);

                        if ($delivery) :
                        ?>
                            <li class="item">
                                <button type="button" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="<?php echo strip_tags($deliveryInfo); ?>"><?php echo __('Delivery'); ?></button>
                            </li>
                        <?php endif; ?>

                        <?php
                        $aportaciones = $currentSocio['gg_socio_aportaciones_sociales']; //get_post_meta(get_the_ID(), 'gg_socio_aportaciones_sociales', 1);

                        if (trim($aportaciones)) :
                        ?>

                            <li class="item aportaciones">
                                <strong><?php echo __('Aportaciones sociales:', 'guia-gastronomica'); ?></strong> <?php echo strip_tags($aportaciones, '<strong><a><i>'); ?>
                            </li>

                        <?php
                        endif;
                        ?>

                        <?php
                        $medioAmbiente = $currentSocio['gg_socio_acciones_medioambiente']; //get_post_meta(get_the_ID(), 'gg_socio_acciones_medioambiente', 1);

                        if (trim($medioAmbiente)) :
                        ?>
                            <li class="item medio-ambiente">
                                <strong><?php echo __('Acciones a favor del medio ambiente:', 'guia-gastronomica'); ?></strong> <?php echo strip_tags($medioAmbiente, '<strong><a><i>'); ?>
                            </li>

                        <?php
                        endif;
                        ?>

                    </ul>
                </div>
            </div>
        </div>

        <?php
        $otrasSucursales = $currentSocio['gg_socio_sucursales']; //get_post_meta(get_the_ID(), 'gg_socio_sucursales', true);

        if ($otrasSucursales) :
        ?>
            <div class="col-12 col-lg-6 flex-fill mb-3">
                <div class="bloque-data-restaurante">
                    <div class="titulo"><?php echo __('Otras sucursales', 'guia-gastronomica'); ?></div>
                    <div class="contenido">
                        <?php
                        if ($otrasSucursales) {
                            echo '<ul>';
                            foreach ($otrasSucursales as $sucursal) {
                                echo '<li><a href="' . get_the_permalink($sucursal) . '" target="_blank">' . get_the_title($sucursal) . '</a></li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        endif;
        ?>


        <?php
        $observaciones = $currentSocio['gg_socio_observaciones']; //get_post_meta(get_the_ID(), 'gg_socio_observaciones', true);
        if (trim($observaciones) !== "") :
        ?>

            <div class="col-12 col-lg-6 flex-fill mb-3">
                <div class="bloque-data-restaurante">
                    <div class="titulo"><?php echo __('Observaciones', 'guia-gastronomica'); ?></div>
                    <div class="contenido">
                        <?php
                        echo $observaciones;
                        ?>
                    </div>
                </div>
            </div>
        <?php
        endif;
        ?>


        <?php

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :

        ?>

            <div class="col-12 my-4">
                <div class="bloque-data-restaurante layout-socio__reviews">

                    <div class="layout-socio__reviews--form">
                        <div class="titulo"><?php echo __('Comparte tu experiencia', 'guia-gastronomica'); ?></div>
                        <div class="contenido">

                            <?php
                            $rating  = wa_get_rating(get_the_ID());
                            if ($rating) :


                            ?>

                                <div class="socio-rating" itemprop="aggregateRating" itemtype="https://schema.org/AggregateRating" itemscope>
                                    <i class="fas fa-star"></i> <span itemprop="ratingValue"><?php echo $rating['avg']; ?></span> · <span itemprop="ratingCount"> <?php echo $rating['count']; ?></span> <?php echo __('Reviews', 'guia-gastronomica'); ?>
                                </div>



                            <?php endif; ?>


                            <?php

                            $hasReviews = get_comments(array(
                                // 'user_id' => get_current_user_id(),
                                'post_id' => get_the_ID(),
                                //'count'   => true,
                                'status'       => 'approve',
                                'number' => 5,
                            ));

                            if (comments_open() && !$hasReviews) :
                            ?>
                                <div class="socio-noreviews w-100 text-center">
                                    <h3>
                                        <?php
                                        esc_html_e('¡No existen reseñas!', 'guia-gastronomica');
                                        ?>
                                    </h3>
                                    <p><?php echo __('Sé el primero en escribir una', 'guia-gastronomica'); ?>
                                </div>
                            <?php
                            endif;
                            // Get the comments for the logged in user.
                            if ($hasReviews) :
                            ?>



                                <div id="carouselReviews" class="carousel slide w-100" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php wp_list_comments(array('reverse_top_level' => false, 'callback' => 'guia_gastronomica_reviews'), $hasReviews);
                                        ?>
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselReviews" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselReviews" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>

                            <?php endif; ?>


                            <button class="btn btn-primary btn-guia-primary socio-review_btn" type="button" data-bs-toggle="collapse" data-bs-target="#reviewForm" aria-expanded="false" aria-controls="reviewForm"><?php echo __('Comentar', 'guia-gastronomica'); ?> &#10011;</button>

                        </div>
                    </div>
                    <div class="collapse p-4" id="reviewForm">
                        <?php
                        comment_form();
                        ?>
                    </div>
                </div>
            </div>

        <?php endif; ?>

    </div>

</article><!-- /#post-<?php the_ID(); ?> -->