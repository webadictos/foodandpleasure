<?php

/**
 * 
 */

class WA_Social_Module extends WA_Module
{

    public function init()
    {
        // $this->load_config();

        $this->loader->add_filter('wa_theme_get_wa_theme_options_page_fields', $this, 'add_settings_page', 10, 2);
    }




    public function add_settings_page($optionsFields, $prefix = "wa_theme_options_")
    {

        $fieldID = $prefix . "social";

        $optionsFields["{$fieldID}"] =
            array(
                'id'          => "{$fieldID}",
                'type'        => 'group',
                'description' => 'Configuración de redes sociales',
                'repeatable'  => false, // use false if you want non-repeatable group
                'options'     => array(
                    'group_title'       => __('Configuración de redes sociales', 'cmb2'), // since version 1.1.4, {#} gets replaced by row number
                    // 'add_button'        => __( 'Add Another Entry', 'cmb2' ),
                    // 'remove_button'     => __( 'Remove Entry', 'cmb2' ),
                    'sortable'          => false,
                    'closed'         => false, // true to have the groups closed by default
                    // 'remove_confirm' => esc_html__( 'Are you sure you want to remove?', 'cmb2' ), // Performs confirmation before removing group.
                ),
                'tab_name' => 'Redes Sociales',
                'tab_icon' => 'dashicons-share',
                'wa_group_fields' => apply_filters("wa_theme_get_{$fieldID}_fields", array(
                    'social_networks' => array(
                        'name'    => "Perfiles sociales",
                        'desc' => 'Agrega cada uno de los links de perfiles sociales',
                        'id'      => 'social_networks',
                        'type'    => 'social',
                        'repeatable' => true,
                        'options' => array(
                            'add_row_text' => __('Agregar red social', 'wa-theme'),
                        ),
                    ),
                    'igtoken' => array(
                        'name' => 'Token de Instagram',
                        'desc' => 'Token de Instagram para poder tener acceso a los últimos posts',
                        'id'   => 'igtoken',
                        'type' => 'text',
                    ),
                    'GoogleAPIKey' => array(
                        'name' => 'YouTube API Key',
                        'desc' => '',
                        'id'   => 'GoogleAPIKey',
                        'type' => 'text',
                    ),
                    'youtube_channel' => array(
                        'name' => 'YouTube Channel ID',
                        'desc' => '',
                        'id'   => 'youtube_channel',
                        'type' => 'text',
                    )
                )),

            );

        return $optionsFields;
    }

    public function load_config()
    {
        $social_options = array(
            'igtoken' => '',
            'GoogleAPIKey' => '',
            'youtube_channel' => '',
            'social_networks' => array(),
        );
        if (class_exists('Wa_Theme_Manager')) {
            $social_options_cmb = Wa_Theme_Manager::get_opciones('wa_theme_options', 'wa_theme_options_social');

            $social_options = $social_options_cmb[0];
        }

        $this->module_config = $social_options;
    }

    public function show_social_icons($opts = array())
    {
        $default = array(
            'exclude' => array(),
            'css' => '',
        );

        $params = wp_parse_args($opts, $default);


        $social_networks_icons = array(
            'facebook' => '<i class="fab fa-facebook-f"></i>',
            'twitter' => '<i class="fab fa-twitter"></i>',
            'instagram' => '<i class="fab fa-instagram"></i>',
            'youtube' => '<i class="fab fa-youtube"></i>',
            'tiktok' => '<i class="fab fa-tiktok"></i>',
            'linkedin' => '<i class="fab fa-linkedin"></i>',
            'pinterest' => '<i class="fab fa-pinterest"></i>',
            'flipboard' => '<i class="fab fa-flipboard"></i>',
            'email' => '<i class="fas fa-envelope"></i>',
        );

        $social_networks = $this->module_config['social_networks'];

        if (is_array($social_networks) && count($social_networks) > 0) {

            $custom_class = "";

            if (trim($params['css']) !== "") $custom_class = $params['css'];


            echo "<ul class='wa-social-profiles {$custom_class}'>";

            foreach ($social_networks as $social_network) {

                echo "<li>";

                echo '<a class="wa-social-profiles__link" target="_blank" rel="noopener noreferrer" title="' . sprintf(__('Síguenos en %s', 'wa-theme'), ucfirst($social_network['social'])) . '" href="' . $social_network['url'] . '">' . apply_filters("wa_social_{$social_network['social']}_icon", $social_networks_icons[$social_network['social']]) . '</a>';

                echo "</li>";
            }

            echo "</ul>";
        }
    }

    public function sharebar($postID, $opts)
    {


        $default = array(
            'networks' => array('facebook', 'twitter', 'linkedin', 'whatsapp'),
            'css' => '',
        );

        $params = wp_parse_args($opts, $default);

        $networks = $params['networks'];

        $social_networks = array(
            'facebook' => array(
                'link' => 'https://www.facebook.com/sharer.php?u={URL}',
                'icon' => '<i class="fab fa-facebook-f"></i>',
                'share_title' => __('¡Compartir en Facebook!', 'wa-theme'),
            ),
            'twitter' => array(
                'link' => 'https://twitter.com/share?url={URL}&text={TITLE}',
                'icon' => '<i class="fab fa-twitter"></i>',
                'share_title' => __('¡Compartir en Twitter!', 'wa-theme'),
            ),
            'linkedin' => array(
                'link' => 'https://www.linkedin.com/sharing/share-offsite/?url={URL}',
                'icon' => '<i class="fab fa-linkedin-in"></i></a>',
                'share_title' => __('¡Compartir en LinkedIn!', 'wa-theme'),
            ),
            'whatsapp' => array(
                'link' => 'https://api.whatsapp.com/send?text={URL}',
                'icon' => '<i class="fab fa-whatsapp"></i>',
                'share_title' => __('¡Compartir en LinkedIn!', 'wa-theme'),
            )
        );

        $custom_class = "";

        if (trim($params['css']) !== "") $custom_class = $params['css'];

        echo '<ul class="wa-social-sharebar ' . $custom_class . '">';

        foreach ($networks as $network) {

            $current_network = "";

            if (isset($network['link'])) {
                $current_network = $network;
            } else if (isset($social_networks[$network])) {
                $current_network = $social_networks[$network];
            }

            if ($current_network !== "") {
                echo "<li>";
                $link = str_replace("{URL}", urlencode(get_permalink($postID)), $current_network['link']);
                $link = str_replace("{TITLE}", apply_filters("wa_share_{$network}_title", get_the_title($postID)), $link);

                echo '<a href="' . $link . '" target="_blank" class="' . $network . '-social-share__link wa-social-share__link">' . apply_filters("wa_share_{$network}_icon", $current_network['icon']) . '</a>';
                echo "</li>";
            }
        }

        echo "</ul>";
    }

    /**
     * Refresca el token de Instagram
     */
    public function get_instagram_token()
    {

        $ig_token = "";

        if ($this->module_config['igtoken'] !== "") {
            if (false === ($ig_token = get_transient("wa_ig_tokenv2"))) {

                $ig_token = trim($this->module_config['igtoken']);

                wp_safe_remote_get('https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=' . $ig_token);


                if ($ig_token !== "") {
                    set_transient('wa_ig_tokenv2', $ig_token, MONTH_IN_SECONDS); // 30 Minutos
                }
            }
        }



        return $ig_token;
    }

    public function get_front_settings($settings)
    {

        unset($settings['social_networks']);

        $settings['igtoken'] = $this->get_instagram_token();

        return $settings;
    }
}

/**
 * Funcion para imprimir los links de los perfiles de redes sociales configurados en el THEME MANAGER
 */

function wa_show_social_profiles($opts = array())
{
    $wa_theme = $GLOBALS['WA_Theme'];

    if (is_a($wa_theme, 'WA_Theme')) {
        $modulos = $wa_theme->modules();

        if ($social_module = $modulos->module("social")) {

            $social_module->show_social_icons($opts);
        }
    }
}

/**
 * Imprime la barra de compartir
 */

function wa_show_sharebar($postID, $opts = array())
{
    $wa_theme = $GLOBALS['WA_Theme'];

    if (is_a($wa_theme, 'WA_Theme')) {
        $modulos = $wa_theme->modules();

        if ($social_module = $modulos->module("social")) {

            $social_module->sharebar($postID, $opts);
        }
    }
}
