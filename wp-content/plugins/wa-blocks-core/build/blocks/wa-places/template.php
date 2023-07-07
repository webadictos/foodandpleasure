<?php
$place = $attributes['selectedContent'];


$direccion = get_post_meta($place['id'], 'fp_location_direccion', true) ?? '';
$telefono = get_post_meta($place['id'], 'fp_location_telefono', true) ?? '';
$web = get_post_meta($place['id'], 'fp_location_web', true) ?? '';
$whatsapp = get_post_meta($place['id'], 'fp_location_whatsapp', true) ?? '';
$redes = get_post_meta($place['id'], 'fp_location_social_networks', true) ?? array();
$geo = get_post_meta($place['id'], 'fp_location_geolocalizacion', true) ?? array();
$title = get_the_title($place['id']);

$extraAttributes = array(
    'data-place-id' => $place['id'] ?? 0,
    'data-place-latitude' => $place['cmb2']['fp_location_fields']['fp_location_geolocalizacion']['latitude'] ?? 0,
    'data-place-longitude' => $place['cmb2']['fp_location_fields']['fp_location_geolocalizacion']['longitude'] ?? 0,
    'data-place-title' => $title ?? '',
);



ob_start();

?>

<div <?php echo get_block_wrapper_attributes($extraAttributes); ?>>

    <div class="wa-place-item">
        <h3 class="wa-place-item__item--title">
            <?php echo $title; ?>
        </h3>

        <ul class="wa-place-item__info">
            <?php if (!empty($direccion)) : ?>
                <li>
                    <span class="wa-place-item__info--label"><?php echo __('Dirección:', 'wa-theme'); ?></span> <span class="wa-place-item__info--value"><?php echo $direccion; ?></span>
                </li>
            <?php endif; ?>

            <?php if (!empty($telefono)) : ?>
                <li class="wa-place-item__telefonos">
                    <span class="wa-place-item__info--label"><?php echo __('Teléfono:', 'wa-theme'); ?></span> <span class="wa-place-item_info--value"> <a href="tel:<?php echo $telefono; ?>" target="_blank" rel="noopener"><?php echo $telefono; ?></a></span>

                    <?php if (!empty($whatsapp)) : ?>
                        <a class="wa-place-item__whatsapp" href="https://wa.me/<?php echo $whatsapp; ?>" target="_blank" rel="noopener"><?php echo $whatsapp; ?></a>
                    <?php endif; ?>

                </li>
            <?php endif; ?>
            <?php
            if (!empty($web)) :
                $url = wp_parse_url($web);
            ?>
                <li>
                    <span class="wa-place-item__info--label"><?php echo __('Sitio web:', 'wa-theme'); ?></span> <span class="wa-place-item__info--value"><a href="<?php echo $web; ?>" target="_blank" rel="noopener"><?php echo $url['host']; ?></a></span>
                </li>
            <?php endif; ?>

            <?php if (is_array($redes) && count($redes) > 0) : ?>
                <li class="wa-place-item__social-networks">
                    <span class="wa-place-item__info--label">Redes sociales:</span>
                    <?php
                    foreach ($redes as $network) :
                        $url = wp_parse_url($network['url']);

                        $social = str_replace("/", "", $url['path']);

                    ?>
                        <a class="wa-place-item__info--value wa-place-item__social--<?php echo $network['social']; ?>" href="<?php echo $network['url']; ?>" target="_blank" rel="noopener noreferrer">
                            <?php echo $social; ?>
                        </a>
                    <?php endforeach; ?>
                </li>
            <?php endif; ?>

        </ul>
    </div>

</div>
<?php

$render = ob_get_clean();

$render = str_replace(array("\r", "\n"), '', $render);

echo $render;
?>