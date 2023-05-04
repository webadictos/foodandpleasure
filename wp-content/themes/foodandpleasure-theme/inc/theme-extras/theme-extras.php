<?php

/**
 * Globals SETUP and other utilities for the theme
 */


$GLOBALS['theme_setup'] = array(
    'general' => array(
        'default_image' => get_template_directory_uri() . '/assets/images/default.png',
        'refreshPage' => true,
        'refreshTime' => 60,
        'promotedTTL' => 86400,
    ),
    'ads' => array(
        'enabled' => true,
        'refreshAds' => true,
        'refresh_time' => 30,
        'prefix' => '',
        'network' => '',
        'enableInRead' => true,
        'inReadParagraph' => 3,
        'enableMultipleInRead' => true,
        'inReadLimit' => 3,
        'loadOnScroll' => false,
    ),
    'scroll' => array(
        'enableScroll' => true,
        'items' => 5,
    ),
    'social' => array(
        'igtoken' =>  "",
    ),
    'lang' => isset($currentLang) ? $currentLang : 'es',

);

$GLOBALS['exclude_ids'] = array();
$GLOBALS['GoogleAPIKey'] = "";
$GLOBALS['waIGToken'] = "";
$GLOBALS['featured_carousel'] = array();
$GLOBALS['default_image'] = get_template_directory_uri() . '/assets/images/default.png';

function checkIsset($value, $default = '')
{
    return isset($value) ? $value : $default;
}
function WA_SetGlobals()
{

    if (!class_exists('Wa_Theme_Manager')) return false;

    $themeSetup = Wa_Theme_Manager::get_opciones('wa_theme_options', 'wa_theme_options_theme_setup');
    $scrollOptions = Wa_Theme_Manager::get_opciones('wa_theme_options', 'wa_theme_options_scroll');
    $adsOptions = Wa_Theme_Manager::get_opciones('wa_theme_options', 'wa_theme_options_ads');
    $socialOptions = Wa_Theme_Manager::get_opciones('wa_theme_options', 'wa_theme_options_social');


    $GLOBALS['default_image'] = isset($themeSetup[0]['default_image']) ?  $themeSetup[0]['default_image'] : '';
    $GLOBALS['waIGToken'] = isset($socialOptions[0]['igtoken']) ? $socialOptions[0]['igtoken'] : "";
    $GLOBALS['GoogleAPIKey'] = isset($socialOptions[0]['GoogleAPIKey']) ? $socialOptions[0]['GoogleAPIKey'] : "";
    $GLOBALS['youtube_channel'] = isset($socialOptions[0]['youtube_channel']) ? $socialOptions[0]['youtube_channel'] : "";


    $GLOBALS['theme_setup'] = array(
        'general' => array(
            'default_image' => isset($themeSetup[0]['default_image']) ? $themeSetup[0]['default_image'] : '',
            'refreshPage' => (isset($themeSetup[0]['refreshPage']) && ($themeSetup[0]['refreshPage'] === "1")) ? true : false,
            'refreshTime' => isset($themeSetup[0]['refreshTime']) ? $themeSetup[0]['refreshTime'] : '',
            'enableDMP' => (isset($themeSetup[0]['enableDMP']) && ($themeSetup[0]['enableDMP'] === "1")) ? true : false,
            'logo' => isset($themeSetup[0]['logo']) ? $themeSetup[0]['logo'] : '',
            'logo_dark' => isset($themeSetup[0]['logo_dark']) ? $themeSetup[0]['logo_dark'] : '',
            'logo_navbar' => isset($themeSetup[0]['logo_navbar']) ? $themeSetup[0]['logo_navbar'] : '',
            'logo_footer' => isset($themeSetup[0]['logo_footer']) ? $themeSetup[0]['logo_footer'] : '',
            'menu_background' => isset($themeSetup[0]['menu_background']) ? $themeSetup[0]['menu_background'] : '',
        ),
        'ads' => array(
            'enabled' => true,
            'refreshAds' => (isset($adsOptions[0]['refreshAds']) && ($adsOptions[0]['refreshAds'] === "1")) ? true : false,
            'refresh_time' => isset($adsOptions[0]['refresh_time']) ? $adsOptions[0]['refresh_time'] : '',
            'refreshAllAdUnits' => (isset($adsOptions[0]['refreshAllAdUnits']) && ($adsOptions[0]['refreshAllAdUnits'] === "1")) ? true : false,
            'timeToRefreshAllAdUnits' => isset($adsOptions[0]['timeToRefreshAllAdUnits']) ? $adsOptions[0]['timeToRefreshAllAdUnits'] : '',
            'prefix' => isset($adsOptions[0]['prefix']) ? $adsOptions[0]['prefix'] : "",
            'network' => isset($adsOptions[0]['network']) ? $adsOptions[0]['network'] : "",
            'enableInRead' => (isset($adsOptions[0]['enableInRead']) && ($adsOptions[0]['enableInRead'] === "1")) ? true : false,
            'inReadParagraph' => isset($adsOptions[0]['inReadParagraph']) ? $adsOptions[0]['inReadParagraph'] : '',
            'enableMultipleInRead' => (isset($adsOptions[0]['enableMultipleInRead']) && ($adsOptions[0]['enableMultipleInRead'] === 1)) ? true : false,
            'inReadLimit' => isset($adsOptions[0]['inReadLimit']) ? $adsOptions[0]['inReadLimit'] : '',
            'loadOnScroll' => (isset($adsOptions[0]['loadOnScroll']) && ($adsOptions[0]['loadOnScroll'] === "1")) ? true : false,
        ),
        'scroll' => array(
            'enableScroll' => (isset($scrollOptions[0]['enableScroll']) && ($scrollOptions[0]['enableScroll'] === "1")) ? true : false,
            'items' => isset($scrollOptions[0]['items']) ? $scrollOptions[0]['items'] : '',
            'criterio' => isset($scrollOptions[0]['criterio']) ? $scrollOptions[0]['criterio'] : '',
            'enablePromoted' => (isset($scrollOptions[0]['enablePromoted']) && ($scrollOptions[0]['enablePromoted'] === "1")) ? true : false,
            'promotedTTL' => isset($scrollOptions[0]['promotedTTL']) ? $scrollOptions[0]['promotedTTL'] : '',
        ),
        'social' => array(
            'igtoken' =>  waGetIGToken(),
        ),
    );


    if (class_exists('Jetpack_Options')) {
        $GLOBALS['theme_setup']['general']['jetpackID'] = Jetpack_Options::get_option('id');
        $GLOBALS['theme_setup']['general']['jetpackApiVersion'] = JETPACK__API_VERSION;
        $GLOBALS['theme_setup']['general']['jetpackVersion'] = JETPACK__VERSION;
    } else {
        $GLOBALS['theme_setup']['general']['jetpackID'] = '166987949';
        $GLOBALS['theme_setup']['general']['jetpackApiVersion'] = '';
        $GLOBALS['theme_setup']['general']['jetpackVersion'] = '';
    }
}

add_action('init', 'WA_SetGlobals');



$GLOBALS['featured'] = array();
$GLOBALS['post_config'] = array(
    'enablescroll' => true,
    'exclude_adunits' => array(),
    'hide_adx' => 'false',
    'hide_ads' => 'false',
    'canal' => array(),
    'tags' => array(),
    'posts_scroll' => array(),
);
$GLOBALS['current_post_config'] = array();
$GLOBALS['promoted'] = array();


/**
 * Refresca el token de Instagram
 */
function waGetIGToken()
{

    if (false === ($ig_token = get_transient("wa_ig_tokenv2")) && $GLOBALS['waIGToken'] !== "") {

        $ig_token = trim($GLOBALS['waIGToken']);

        wp_safe_remote_get('https://graph.instagram.com/refresh_access_token?grant_type=ig_refresh_token&access_token=' . $ig_token);


        if ($ig_token !== "") {
            set_transient('wa_ig_tokenv2', $ig_token, MONTH_IN_SECONDS); // 30 Minutos
        }
    }

    return $ig_token;
}


function waGetLogo($typeLogo = '')
{

    $logo = "";

    $logoSufix = "";


    if (trim($typeLogo) !== "") $logoSufix = "_" . $typeLogo;

    if (isset($GLOBALS['theme_setup']['general']['logo' . $logoSufix]) && trim($GLOBALS['theme_setup']['general']['logo' . $logoSufix]) !== "") {
        $logo = $GLOBALS['theme_setup']['general']['logo' . $logoSufix];
    }

    return $logo;
}

function waGetUserPage($page = '')
{

    if (isset($GLOBALS['theme_setup']['user'][$page])) {
        return $GLOBALS['theme_setup']['user'][$page];
    }

    return false;
}

/**
 * Returns ID of top-level parent category, or current category if you are viewing a top-level
 *
 * @param    string      $catid      Category ID to be checked
 * @return   string      $catParent  ID of top-level parent category
 */
function smart_category_top_parent_id($catid, $object = false, $tax = 'category')
{
    $catParent = null;
    while ($catid) {
        $cat = get_term($catid, $tax);
        //$cat = get_category($catid); // get the object for the catid
        $catid = $cat->parent; // assign parent ID (if exists) to $catid
        // the while loop will continue whilst there is a $catid
        // when there is no longer a parent $catid will be NULL so we can assign our $catParent
        if (!$object)
            $catParent = $cat->term_id;
        else $catParent = $cat;
    }
    return $catParent;
}


function get_post_primary_category($post_id, $term = 'category', $return_all_categories = false)
{
    $return = array();

    if (class_exists('WPSEO_Primary_Term')) {
        // Show Primary category by Yoast if it is enabled & set
        $wpseo_primary_term = new WPSEO_Primary_Term($term, $post_id);
        $primary_term = get_term($wpseo_primary_term->get_primary_term());

        if (!is_wp_error($primary_term)) {
            $return['primary_category'] = $primary_term;
        }
    }

    if (empty($return['primary_category']) || $return_all_categories) {
        $categories_list = get_the_terms($post_id, $term);

        if (empty($return['primary_category']) && !empty($categories_list)) {
            $return['primary_category'] = $categories_list[0];  //get the first category
        }
        if ($return_all_categories) {
            $return['all_categories'] = array();

            if (!empty($categories_list)) {
                foreach ($categories_list as &$category) {
                    $return['all_categories'][] = $category->term_id;
                }
            }
        }
    }

    return $return;
}


remove_filter('get_the_excerpt', 'wp_trim_excerpt'); //Remove the filter we don't want
add_filter('get_the_excerpt', 'wa_wp_trim_excerpt'); //Add the modified filter
add_filter('the_excerpt', 'do_shortcode'); //Make sure shortcodes get processed

function wa_wp_trim_excerpt($text = '')
{
    global $post;

    $seodesc = trim(get_post_meta($post->ID, '_yoast_wpseo_metadesc', true));
    $excerpt = trim($post->post_excerpt);
    $theexcerpt = "";

    if (is_user_logged_in()) :
    //	print_r($post);
    //echo "EXCERPT: ".$excerpt;
    endif;


    if ($seodesc != "") {
        $theexcerpt = $seodesc;
        return $seodesc;
    } else if ($excerpt) {
        $theexcerpt = $excerpt;
        return $excerpt;
    }


    if ('' == $theexcerpt) {
        $text = get_the_content('');
        //$text = strip_shortcodes( $text ); //Comment out the part we don't want
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]&gt;', $text);
        $excerpt_length = apply_filters('excerpt_length', 40);
        $excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $text = wp_trim_words($text, $excerpt_length, $excerpt_more);
    }
    return apply_filters('wp_trim_excerpt', $text, $post->post_content);
}


function limit_to_tags($terms, $num = 1)
{
    return array_slice($terms, 0, $num, true);
}

add_filter('term_links-post_tag', 'limit_to_tags_tres');
function limit_to_tags_tres($terms)
{
    $esInfinito = (isset($_REQUEST['action']) &&  $_REQUEST['action'] == "loadmore") ? true : false;

    if (is_single() || $esInfinito)
        return array_slice($terms, 0, 3, true);
    else
        return $terms;
}



function getTrendingNow()
{

    $populares = array();

    if (function_exists('stats_get_csv')) :



        //if ( false === ( $popularToday = get_transient( "food_popular_today" ) ) ) {

        //  $popularToday = stats_get_csv( 'postviews', "period=days&days=3&limit=15" );

        $popularToday = stats_get_csv('postviews', array('days' => 2, 'limit' => 10));

        //   set_transient('food_popular_today', $popularToday, 30*MINUTE_IN_SECONDS); // 30 Minutos
        //}

        $ml = 0;


        foreach ($popularToday as $p) {

            if (intval($p['post_id']) > 0) :


                if (!has_post_thumbnail($p['post_id'])) continue;

                $ml++;

                $populares[] = $p['post_id'];

                if ($ml > 3) break;


            endif;
        }


    endif;

    return $populares;
}





add_action('wp_head', 'wa_themeSetupScript');


function wa_themeSetupScript()
{



    $currentLang = apply_filters('wpml_current_language', null);

    $currentLang = !is_null($currentLang) ? $currentLang : 'es';


    $postSetup = array(
        'page' => array(
            'postID' => (string) get_the_ID(),
            'is_single' =>  is_single() ? 'true' : 'false',
            'is_homepage' => is_front_page() ? 'true' : 'false',
            'is_singular' => (is_page() || is_single() && !is_front_page()) ? 'true' : 'false',
            'is_archive' => (is_archive() || is_category()) ? 'true' : 'false',
            'post_type' => get_post_type(get_the_ID()),
            'tags' => 'null',
            'canal' => 'null',
        ),
        'canRefresh' => (is_user_logged_in() || !$GLOBALS['theme_setup']['general']['refreshPage']) ? false : true,
        'refreshTime' => $GLOBALS['theme_setup']['general']['refreshTime'],
        'activeID' => is_singular() ? get_the_ID() : "0",
        'currentID' => is_singular() ? get_the_ID() : "0",
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'themeUri' => get_template_directory_uri(),
        'promotedTTL' => isset($GLOBALS['theme_setup']['scroll']['promotedTTL']) ?  $GLOBALS['theme_setup']['scroll']['promotedTTL'] : '',
        'ads' => isset($GLOBALS['theme_setup']['ads']) ?  $GLOBALS['theme_setup']['ads'] : '',
        'jetpackID' => isset($GLOBALS['theme_setup']['general']['jetpackID']) ? $GLOBALS['theme_setup']['general']['jetpackID'] : '',
        'jetpackApiVersion' => isset($GLOBALS['theme_setup']['general']['jetpackApiVersion']) ? $GLOBALS['theme_setup']['general']['jetpackApiVersion'] : '',
        'jetpackVersion' => isset($GLOBALS['theme_setup']['general']['jetpackVersion']) ? $GLOBALS['theme_setup']['general']['jetpackVersion'] : '',
        'social' => array(
            'igtoken' => isset($GLOBALS['waIGToken']) ?  $GLOBALS['waIGToken'] : '',
        ),
        'map' => isset($GLOBALS['theme_setup']['map']) ? $GLOBALS['theme_setup']['map'] : '',
        'lang' => $currentLang
    );

    if (is_front_page() || is_home()) {
        $postSetup['page']['canal'] = "home";
    } else if (is_single()) {


        $config = getPostConfig(get_the_ID());


        $postSetup['page']['canal'] = $config['canal'];
        $postSetup['page']['tags'] = $config['tags'];
        $postSetup['page']['hide_ads'] = $config['hide_ads'];
        $postSetup['page']['exclude_adunits'] = $config['exclude_adunits'];
        $GLOBALS['current_post_config'] = $config;

        $promote = array();
        if (is_array($GLOBALS['promoted'])) {
            $promoted = $GLOBALS['promoted'];
            if (in_array(get_the_ID(), $promoted)) {
                $key = array_search(get_the_ID(), $promoted);
                unset($promoted[$key]);
            }

            foreach ($promoted as $p => $v) {
                $promote[] = $v;
            }
        }

        $postSetup['promoted'] = $promote;

        if ($GLOBALS['theme_setup']['scroll']['enableScroll']) {

            $postSetup['loadmore'] = getLoadMoreSetup();
        }
    } else if (is_category()) {

        $config = getTaxonomyConfig(get_queried_object_id());

        $canales = get_category_parents(get_query_var('cat'));
        if (!is_string($canales)) $canales = "";
        $canalesTmp = explode("/", $canales);
        $canalTmp = array();

        foreach ($canalesTmp as $c) {
            if (trim($c) != "") {
                $c = preg_replace('/[^A-Za-zÀ-ú0-9 ]/', '', $c);
                $canalTmp[] = $c;
            }
        }

        $postSetup['page']['canal'] = $canalTmp;
        $postSetup['page']['exclude_adunits'] = isset($config['exclude_adunits']) ? $config['exclude_adunits'] : array();
    } else if (is_tag()) {

        $config = getTaxonomyConfig(get_queried_object_id());

        $term = single_tag_title('', false);

        $c = preg_replace('/[^A-Za-zÀ-ú0-9 ]/', '', $term);

        $postSetup['page']['tags'] = $c;
        $postSetup['page']['exclude_adunits'] = isset($config['exclude_adunits']) ? $config['exclude_adunits'] : array();
    }

    if (!is_singular()) {

        $postSetup['loadmore'] = getLoadMoreArchiveSetup();
    }

    if (is_single() && get_post_type() === 'gg_socio') {

        $config = getSocioConfig(get_the_ID());

        $postSetup['socio']['categories'] = $config['categories'];
        $postSetup['socio']['gg_socio_menu'] = $config['gg_socio_menu'];
        $postSetup['socio']['gg_socio_url_reservaciones'] = $config['gg_socio_url_reservaciones'];
        $postSetup['socio']['gg_socio_telefono'] = wa_Utils::validNumber($config['gg_socio_telefono']);
        $postSetup['socio']['gg_socio_whatsapp'] = $config['gg_socio_whatsapp'];
        $postSetup['socio']['gg_socio_menu'] = $config['gg_socio_menu'];
        $postSetup['socio']['gg_socio_geolocalizacion'] = $config['gg_socio_geolocalizacion'];


        // $socioInfo['gg_socio_menu'] = get_post_meta($socioID, 'gg_socio_menu', true);
        // $socioInfo['gg_socio_reservaciones'] =  get_post_meta($socioID, 'gg_socio_reservaciones', true);
        // $socioInfo['gg_socio_reservaciones_info'] =  get_post_meta($socioID, 'gg_socio_reservaciones_info', true);
        // $socioInfo['gg_socio_url_reservaciones'] =  get_post_meta($socioID, 'gg_socio_url_reservacaciones', true);
        // $socioInfo['gg_socio_direccion'] =  get_post_meta($socioID, 'gg_socio_direccion', true);
        // $socioInfo['gg_socio_telefono'] =  get_post_meta($socioID, 'gg_socio_telefono', true);
        // $socioInfo['gg_socio_whatsapp'] =  wa_Utils::validNumber(get_post_meta($socioID, 'gg_socio_whatsapp', true), "521");
        // $socioInfo['gg_socio_web'] = get_post_meta($socioID, 'gg_socio_web', true);
        // $socioInfo['gg_socio_horarios'] =  get_post_meta($socioID, 'gg_socio_horarios', true);
        // $socioInfo['gg_certificates'] =  get_the_terms($socioID, 'gg_certificates');
        // $socioInfo['gg_socio_geolocalizacion'] =  get_post_meta($socioID, 'gg_socio_geolocalizacion', true);
    }

    echo "<script type='text/javascript'>\n";
    echo "/* <![CDATA[ */\n";
    echo "const ThemeSetup =" . (json_encode($postSetup)) . ";\n";
    echo "window.ThemeSetup = ThemeSetup;\n";
    echo "/* ]]> */\n";
    echo "</script>\n";

    if (is_single() && get_post_type() === 'post') {


        $breadcrumb = '<script type="application/ld+json">';
        $breadcrumb .= '{';
        $breadcrumb .= '"@context": "https://schema.org","@type": "BreadcrumbList",';
        $breadcrumb .= '"itemListElement": [';
        $position = 1;
        $breadcrumb .= '{
            "@type": "ListItem",
            "position": ' . $position . ',
            "name": "' . get_bloginfo('name') . '",   
            "item": "' . get_home_url() . '"
        }';
        $primary = get_post_primary_category(get_the_ID());

        $parents = get_ancestors($primary['primary_category']->term_id, 'category');

        array_unshift($parents, $primary['primary_category']->term_id);
        $parents_reverse = array_reverse($parents);

        foreach ($parents_reverse as $cat) {
            $position++;

            $catname = get_cat_name($cat);
            $breadcrumb .= ",";
            $breadcrumb .= '{
                "@type": "ListItem",
                "position": ' . $position . ',
                "name": "' . $catname . '", 
                "item": "' . get_category_link($cat) . '"
            }';
        }


        $breadcrumb .= ']';
        $breadcrumb .= '}';
        $breadcrumb .= '</script>';

        echo $breadcrumb;
    }
}


function getTaxonomyConfig($termID)
{

    $postconfig = get_term_meta($termID, 'wa_post_config', true);
    $hide_ads = get_term_meta($termID, 'wa_post_hide_adunits', true);


    $config = array();

    $config['id'] = (string) $termID;

    if ($hide_ads == "on") {
        $adunits = array();
        $adunits = get_term_meta($termID, 'wa_post_adunits', true);
        $config['hide_ads'] = "true";
        $config['exclude_adunits'] = $adunits;
    }

    $GLOBALS['current_post_config'] = $config;

    return $config;
}

function getPostConfig($postID)
{

    $postconfig = get_post_meta($postID, 'wa_post_config', true);
    $hide_ads = get_post_meta($postID, 'wa_post_hide_adunits', true);
    $inread_paragraph = get_post_meta($postID, 'wa_post_inread_paragraph', true);
    $disable_scroll = get_post_meta($postID, 'wa_post_disable_scroll', true);
    $posts_scroll = get_post_meta($postID, 'wa_post_posts_scroll', true);

    //inread_paragraph
    //disable_scroll
    //posts_scroll

    $config = array();

    $config['id'] = (string) $postID;

    foreach ($GLOBALS['post_config'] as $k => $v) {

        $config[$k] = $v;
        if (is_array($postconfig)) {
            if (in_array($k, $postconfig)) {
                if (!is_array($v))
                    $config[$k] = "true";
                else $config[$k] = $v;
            }
        }
    }

    if ($posts_scroll) {
        $config['posts_scroll'] = $posts_scroll;
    }

    if (intval($inread_paragraph) > 0 && $GLOBALS['theme_setup']['ads']['inReadParagraph'] !== intval($inread_paragraph)) {
        $GLOBALS['theme_setup']['ads']['inReadParagraph'] = $inread_paragraph;
    }

    if ($disable_scroll === "on") {
        $GLOBALS['theme_setup']['scroll']['enableScroll'] = false;
    }


    if ($hide_ads == "on") {
        $adunits = array();
        $adunits = get_post_meta($postID, 'wa_post_adunits', true);
        $config['hide_ads'] = "true";
        $config['exclude_adunits'] = $adunits;
    } else {
        // unset($config['hide_adunits']);
        // unset($config['exclude_adunits']);
    }


    if (!$GLOBALS['theme_setup']['ads']['enableMultipleInRead']) {
        $config['hide_ads'] = "true";
        $config['exclude_adunits'][] = "ros-inread-multiple";
    }


    $post_tags = get_the_tags($postID);

    $tagsTmp = array();

    if ($post_tags) {
        foreach ($post_tags as $t) {
            //echo $t->name;
            //$tag_name = preg_replace('/[^A-Za-zÀ-ú0-9 ]/', '', $t->name);
            //echo trim($t->slug);
            $tagsTmp[] = strtolower($t->slug);
        }
    }

    $config['tags'] = $tagsTmp;

    $canales = get_the_category($postID);

    $canalTmp = array();

    foreach ($canales as $c) {
        $cat_name = preg_replace('/[^A-Za-zÀ-ú0-9 ]/', '', $c->cat_name);

        $canalTmp[] = $cat_name;
    }

    $config['canal'] = $canalTmp;


    $yoast_title = get_post_meta(get_the_ID(), '_yoast_wpseo_title', true);
    $title = strstr($yoast_title, '%%', true);
    if (empty($title)) {
        $title = get_the_title(get_the_ID());
    }

    $config['seo'] = $title;


    $GLOBALS['current_post_config'] = $config;

    return $config;
}

/**
 * Posts Attributes
 */

function getPostDataAttributes()
{
    global $wp_db, $post;

    $slug = str_replace(get_home_url(), "", get_the_permalink());

    $config = getPostConfig(get_the_ID());

    $post_config = htmlentities(json_encode($config));

    $attributes = array(
        'data-slug' => $slug,
        'data-post-id' => get_the_ID(),
        'data-meta' => $post_config,
    );

    foreach ($attributes as $k => $v) {
        echo "{$k}='{$v}' ";
    }
}

function getSocioConfig($socioID)
{

    $config = array();
    $config['gg_socio_destaca_por'] = get_post_meta($socioID, 'gg_socio_destaca_por', true);
    $config['gg_socio_menu'] = get_post_meta($socioID, 'gg_socio_menu', true);
    $config['gg_socio_reservaciones'] =  get_post_meta($socioID, 'gg_socio_reservaciones', true);
    $config['gg_socio_reservaciones_info'] =  get_post_meta($socioID, 'gg_socio_reservaciones_info', true);
    $config['gg_socio_url_reservaciones'] =  get_post_meta($socioID, 'gg_socio_url_reservacaciones', true);
    $config['gg_socio_direccion'] =  get_post_meta($socioID, 'gg_socio_direccion', true);
    $config['gg_socio_telefono'] =  get_post_meta($socioID, 'gg_socio_telefono', true);
    $config['gg_socio_whatsapp'] =  wa_Utils::validNumber(get_post_meta($socioID, 'gg_socio_whatsapp', true), "521");
    $config['gg_socio_web'] = get_post_meta($socioID, 'gg_socio_web', true);
    $config['gg_socio_horarios'] =  get_post_meta($socioID, 'gg_socio_horarios', true);
    $config['gg_certificates'] =  get_the_terms($socioID, 'gg_certificates');
    $config['gg_socio_geolocalizacion'] =  get_post_meta($socioID, 'gg_socio_geolocalizacion', true);
    $config['redes_sociales'] = array();
    $config['redes_sociales']['facebook'] = get_post_meta($socioID, 'gg_socio_facebook', true);
    $config['redes_sociales']['instagram'] = get_post_meta($socioID, 'gg_socio_instagram', true);
    $config['redes_sociales']['twitter'] = get_post_meta($socioID, 'gg_socio_twitter', true);
    $config['gg_socio_topochico'] = get_post_meta($socioID, 'gg_socio_topochico', true);
    $config['gg_socio_recomendaciones'] = get_post_meta($socioID, 'gg_socio_recomendaciones', true);
    $config['gg_socio_opciones_veganas_vegetarianas'] = get_post_meta($socioID, 'gg_socio_opciones_veganas_vegetarianas', true);
    $config['gg_socio_reservaciones_info'] = get_post_meta($socioID, 'gg_socio_reservaciones_info', 1);
    $config['gg_socio_delivery'] = get_post_meta($socioID, 'gg_socio_delivery', 1);
    $config['gg_socio_delivery_info'] = get_post_meta($socioID, 'gg_socio_delivery_info', 1);

    $config['gg_socio_aportaciones_sociales'] = get_post_meta($socioID, 'gg_socio_aportaciones_sociales', 1);
    $config['gg_socio_acciones_medioambiente'] = get_post_meta($socioID, 'gg_socio_acciones_medioambiente', 1);
    $config['gg_socio_sucursales'] = get_post_meta($socioID, 'gg_socio_sucursales', true);
    $config['gg_socio_observaciones'] = get_post_meta($socioID, 'gg_socio_observaciones', true);


    //inread_paragraph
    //disable_scroll
    //posts_scroll



    $config['id'] = (string) $socioID;

    $terms = get_the_terms($socioID, 'gg_category');

    $tagsTmp = array();

    if ($terms) {
        foreach ($terms as $t) {
            $tagsTmp[] = strtolower($t->slug);
        }
    }

    $config['categories'] = $tagsTmp;

    $yoast_title = get_post_meta($socioID, '_yoast_wpseo_title', true);
    $title = strstr($yoast_title, '%%', true);
    if (empty($title)) {
        $title = get_the_title($socioID);
    }

    $config['seo_title'] = $title;


    $GLOBALS['current_post_config'] = $config;

    return $config;
}



/**
 * Eliminar <p>&nbsp;</p>
 */
function trimBlankParagraphs($content)
{

    $content = str_replace("<p>&nbsp;</p>", "", $content);

    return $content;
}

//add_filter('the_content', 'trimBlankParagraphs');


function reading_time()
{
    global $post;

    $content = get_post_field('post_content', $post->ID);
    $word_count = str_word_count(strip_tags($content));
    $readingtime = ceil($word_count / 200);
    if ($readingtime == 1) {
        $timer = " min.";
    } else {
        $timer = " mins.";
    }
    $totalreadingtime = 'Lectura ' . $readingtime . $timer;
    return $totalreadingtime;
}


// This will suppress empty email errors when submitting the user form
add_action('user_profile_update_errors', 'my_user_profile_update_errors', 10, 3);
function my_user_profile_update_errors($errors, $update, $user)
{
    $errors->remove('empty_email');
}

// This will remove javascript required validation for email input
// It will also remove the '(required)' text in the label
// Works for new user, user profile and edit user forms
add_action('user_new_form', 'my_user_new_form', 10, 1);
add_action('show_user_profile', 'my_user_new_form', 10, 1);
add_action('edit_user_profile', 'my_user_new_form', 10, 1);
function my_user_new_form($form_type)
{
?>
    <script type="text/javascript">
        jQuery('#email').closest('tr').removeClass('form-required').find('.description').remove();
        // Uncheck send new user email option by default
        <?php if (isset($form_type) && $form_type === 'add-new-user') : ?>
            jQuery('#send_user_notification').removeAttr('checked');
        <?php endif; ?>
    </script>
<?php
}


add_action('pre_get_posts', 'exclude_ids_from_loop');

function exclude_ids_from_loop($query)
{

    if ($query->is_main_query()  && $query->is_home()) {

        $queried_object = get_queried_object();

        $args = array(
            "showposts" => 1,
            // "cat" => $queried_object->term_id,
            // 'meta_key'     => 'rrm_post_show_portada_canal',
            // 'meta_value'   => 'on',			
            'no_found_rows' => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
        );

        $featuredCatPost = new WP_Query($args); // exclude category 9
        $GLOBALS['featured_post'] = $featuredCatPost;
        foreach ($featuredCatPost->posts as $featuredPost) {
            $GLOBAL['exclude_ids'][] = $featuredPost->ID;
        }



        wp_reset_query();
        //        $GLOBAL['exclude_ids']=$featuredCatPost->

        $query->set('post__not_in', $GLOBAL['exclude_ids']);
    }
}
/**
 *  Dejamos solo la sección principal entre las clases de la función post class de wordpress
 */
add_filter('post_class', 'waPostClass', 10, 3);

function waPostClass($classes, $class, $postId)
{


    $primary = get_post_primary_category($postId);
    $parent_cat = isset($primary['primary_category']) ? smart_category_top_parent_id($primary['primary_category']->term_id, true) : null;

    // $classesWithPrimaryOnly = array();
    // $func = function ($clase) {
    //     if (!strstr($clase, 'category-')) {
    //         return $clase;
    //     }
    // };

    // $classesWithPrimaryOnly = array_map($func, $classes);

    if (is_object($parent_cat))    $classes[] = "main-category-" . $parent_cat->slug;

    return $classes;
}


function getPrimaryCatSlug($post_id)
{
    global $post;

    if (!$post_id) $post_id = get_the_ID();

    $category = get_post_primary_category($post_id);
    $parent_cat = isset($category['primary_category']) ? smart_category_top_parent_id($category['primary_category']->term_id, true) : null;

    return $parent_cat;
}
add_filter('get_primary_cat_slug', 'getPrimaryCatSlug');




function wpa_category_nav_class($classes, $item)
{
    if ('category' == $item->object) {
        $category = get_category($item->object_id);
        $parent_cat = smart_category_top_parent_id($category->term_id, true);

        $classes[] = 'main-category-' . $parent_cat->slug;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'wpa_category_nav_class', 10, 2);


add_action('nav_menu_css_class', 'add_current_nav_class', 10, 2);

function add_current_nav_class($classes, $item)
{

    // Getting the current post details
    global $post;

    // Get post ID, if nothing found set to NULL
    $id = (isset($post->ID) ? get_the_ID() : NULL);

    // Checking if post ID exist...
    if (isset($id)) {

        $category = get_post_primary_category(get_the_ID());
        $parent_cat = isset($category['primary_category']) ? smart_category_top_parent_id($category['primary_category']->term_id, true) : null;


        // Getting the post type of the current post
        //$current_post_type = get_post_type_object(get_post_type($post->ID));
        //$current_post_type_slug = $current_post_type->rewrite['slug'];          

        // Getting the URL of the menu item
        $menu_slug = strtolower(trim($item->url));

        // If the menu item URL contains the current post types slug add the current-menu-item class
        if (is_object($parent_cat)) {
            if (strpos($menu_slug, $parent_cat->slug) !== false) {

                $classes[] = 'main-category';
            }
        }
    }
    // Return the corrected set of classes to be added to the menu item
    return $classes;
}

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}
add_action('admin_head', 'fix_svg');


function wa_get_lang()
{
    $currentLang = apply_filters('wpml_current_language', null);

    $currentLang = !is_null($currentLang) ? $currentLang : 'es';

    return $currentLang;
}
