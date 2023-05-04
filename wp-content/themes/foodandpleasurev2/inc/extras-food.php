<?php
/**
 * EXTRA FUNCTIONS
 */

$GLOBALS['carrusel_home']=array();

/**
 * Social Icons Menú
 */

function my_customizer_social_media_array() {

	/* store social site names in array */
	$social_sites = array('facebook', 'instagram', 'twitter', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'spotify', 'email');

	return $social_sites;
}

/* add settings to create various social media text areas. */
add_action('customize_register', 'my_add_social_sites_customizer');

function my_add_social_sites_customizer($wp_customize) {

	$wp_customize->add_section( 'my_social_settings', array(
			'title'    => __('Social Media Icons', 'text-domain'),
			'priority' => 35,
	) );

	$social_sites = my_customizer_social_media_array();
	$priority = 5;

	foreach($social_sites as $social_site) {

		$wp_customize->add_setting( "$social_site", array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		) );

		$wp_customize->add_control( $social_site, array(
				'label'    => __( "$social_site url:", 'text-domain' ),
				'section'  => 'my_social_settings',
				'type'     => 'text',
				'priority' => $priority,
		) );

		$priority = $priority + 5;
	}
}

/* takes user input from the customizer and outputs linked social media icons */
function my_social_media_icons($inverse=true,$search=false) {

    $social_sites = my_customizer_social_media_array();

    /* any inputs that aren't empty are stored in $active_sites array */
    foreach($social_sites as $social_site) {
        if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
            $active_sites[] = $social_site;
        }
    }

    /* for each active social site, add it as a list item */
        if ( ! empty( $active_sites ) ) {

            echo "<ul class='social-media-icons'>";

            foreach ( $active_sites as $active_site ) {

                /* setup the class */

		        $class = 'fab fa-' . $active_site;
                if($active_site=="facebook") $class.="-f";
                if ( $active_site == 'email' ) {
                    ?>
                    <li>
                        <a class="email" target="_blank" href="mailto:<?php echo is_email( get_theme_mod( $active_site ) ); ?>" rel="noopener noreferrer">
                           							<span class="fa-stack fa-2x">

                           	 <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-envelope fa-stack-1x fa-social-icon <?php echo ($inverse) ? 'fa-inverse' : '';?>" title="<?php _e('email icon', 'text-domain'); ?>"></i>
                       		</span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>

                        <a class="social-icon-<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $active_site) ); ?>" rel="noopener noreferrer">

                            <span class="fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x"></i>   
                              <i class="<?php echo esc_attr( $class ); ?> fa-social-icon <?php echo ($inverse) ? 'fa-inverse' : '';?> fa-stack-1x" title="<?php printf( __('%s icon', 'text-domain'), $active_site ); ?>"></i>
                              </span>

                            </a>
                    </li>
                <?php
                }
            }

        if($search){
            ?>
                    <li>

<a class="social-icon-search" target="_blank" href="#search">  
<i class="fas fa-search <?php echo ($inverse) ? 'fa-inverse' : '';?>"></i>
</a>
</li>
            <?php
        }            

            echo "</ul>";
        }
}

/**
* Returns ID of top-level parent category, or current category if you are viewing a top-level
*
* @param    string      $catid      Category ID to be checked
* @return   string      $catParent  ID of top-level parent category
*/
function smart_category_top_parent_id ($catid,$object=false) {

    while ($catid) {
        $cat = get_category($catid); // get the object for the catid
        $catid = $cat->category_parent; // assign parent ID (if exists) to $catid
          // the while loop will continue whilst there is a $catid
          // when there is no longer a parent $catid will be NULL so we can assign our $catParent
        if(!$object)
        $catParent = $cat->cat_ID;
        else $catParent = $cat;
    }
    return $catParent;
}


function get_post_primary_category($post_id, $term='category', $return_all_categories=false){
    $return = array();

    if (class_exists('WPSEO_Primary_Term')){
        // Show Primary category by Yoast if it is enabled & set
        $wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
        $primary_term = get_term($wpseo_primary_term->get_primary_term());

        if (!is_wp_error($primary_term)){
            $return['primary_category'] = $primary_term;
        }
    }

    if (empty($return['primary_category']) || $return_all_categories){
        $categories_list = get_the_terms($post_id, $term);

        if (empty($return['primary_category']) && !empty($categories_list)){
            $return['primary_category'] = $categories_list[0];  //get the first category
        }
        if ($return_all_categories){
            $return['all_categories'] = array();

            if (!empty($categories_list)){
                foreach($categories_list as &$category){
                    $return['all_categories'][] = $category->term_id;
                }
            }
        }
    }

    return $return;
}


remove_filter( 'get_the_excerpt', 'wp_trim_excerpt'  ); //Remove the filter we don't want
add_filter( 'get_the_excerpt', 'rob_wp_trim_excerpt' ); //Add the modified filter
add_filter( 'the_excerpt', 'do_shortcode' ); //Make sure shortcodes get processed

function rob_wp_trim_excerpt($text = '') {
	global $post;

	$seodesc = trim(get_post_meta($post->ID,'_yoast_wpseo_metadesc',true));
    $excerpt = trim($post->post_excerpt);
    $theexcerpt="";

if (is_user_logged_in()):
//	print_r($post);
//echo "EXCERPT: ".$excerpt;
endif;

	if($excerpt) {
        $theexcerpt = $excerpt;
        return $excerpt;
    }
	if($seodesc!=""){

        $theexcerpt = $seodesc;
        return $seodesc;
    } 

	if ( '' == $theexcerpt ) {
		$text = get_the_content('');
		//$text = strip_shortcodes( $text ); //Comment out the part we don't want
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$excerpt_length = apply_filters('excerpt_length', 40);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    }
	return apply_filters('wp_trim_excerpt', $text, $post->post_content);
}


function limit_to_tags($terms,$num=1) {
    return array_slice($terms,0,$num,true);
}

add_filter('term_links-post_tag','limit_to_tags_tres');
function limit_to_tags_tres($terms) {
    if(is_single())
    return array_slice($terms,0,3,true);
    else
    return $terms;
}
    


function getTrendingNow(){

    $populares=array();

    if(function_exists('stats_get_csv')):
   
   
           
           //if ( false === ( $popularToday = get_transient( "food_popular_today" ) ) ) {
           
             //  $popularToday = stats_get_csv( 'postviews', "period=days&days=3&limit=15" );
   
               $popularToday = stats_get_csv( 'postviews', array( 'days' => 2, 'limit' => 10 ) );
           
            //   set_transient('food_popular_today', $popularToday, 30*MINUTE_IN_SECONDS); // 30 Minutos
           //}
   
                   $ml=0;
           
           
                   foreach ( $popularToday as $p ) {
           
                     if(intval($p['post_id'])>0):
           
   
                     if (!has_post_thumbnail($p['post_id'])) continue;
   
                     $ml++;
           
                     $populares[]=$p['post_id'];

                     if($ml>3) break;
           

                     endif;
                   }
   
       
    endif;

    return $populares;
           
}





$GLOBALS['default_image']="https://foodandpleasure.com/wp-content/uploads/2018/03/foodandpleasure-icon.png";
$GLOBALS['featured']=array();
$GLOBALS['post_config']=array(
//    'is_featured' => 'false',
//   'is_channel_featured' => 'false',
//    'home_carrusel' => 'false',
    'infinitescroll_off' => 'false',
    'hide_nora' => 'false',
//    'hide_adunits' => 'false',
    'exclude_adunits' => array(),
    'hide_adx' => 'false',
    'slots' => array(),
    'canal'=> array(),
    'tags'=>array(),
);
$GLOBALS['current_post_config']=array();


add_action('wp_head', 'foodSetupScript');


function foodSetupScript(){



    $postSetup=array(
        'page' => array(
            'postID' => (string) get_the_ID(),
            'is_single' =>  is_single() ? "true":"false",
            'is_homepage' => is_front_page() ? "true":"false",
            'is_singular' => (is_page() || is_single() && !is_front_page()) ? "true":"false",
            'is_archive' => (is_archive() || is_category()) ? "true":"false",
            'tags'=>'null',
            'canal'=>'null',
        ),
        'canRefresh' => is_user_logged_in() ? "false":"true",
        'activeID' => is_singular() ? get_the_ID():"0",
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
    );

    if(is_front_page() || is_home()){
        $postSetup['page']['canal']="home";
    }else if(is_single()){

        $post_tags = get_the_tags();
        
        $tagsTmp=array();

        if ( $post_tags ) {
            foreach( $post_tags as $t ) {
            $tag_name = preg_replace('/[^A-Za-zÀ-ú0-9 ]/', '', $t->name);

            $tagsTmp[]=htmlentities(strtolower($tag_name));
            }
        }

        $postSetup['page']['tags']=$tagsTmp;

        $canales = get_the_category();

        $canalTmp=array();
        
        foreach($canales as $c){
            $cat_name = preg_replace('/[^A-Za-zÀ-ú0-9 ]/', '', $c->cat_name);
        
            $canalTmp[]=$cat_name;
        }

        $postSetup['page']['canal']=$canalTmp;

        $config = getPostConfig(get_the_ID());
        //print_r($config);
        //error_log(print_r($config));
        //$postSetup['config']=$config;

        //$GLOBALS['current_post_config']=$config;

    }else if(is_category()){

        
        $canales = get_category_parents(get_query_var('cat'));
        if(!is_string($canales)) $canales="";
        $canalesTmp = explode("/",$canales);
        $canalTmp=array();
                
        foreach($canalesTmp as $c){
            if(trim($c)!=""){
                $c = preg_replace('/[^A-Za-zÀ-ú0-9 ]/', '', $c);
                $canalTmp[]=$c;
            }
        }

        $postSetup['page']['canal']=$canalTmp;
    }else if(is_tag()){

        $term = single_tag_title( '', false );

        $c = preg_replace('/[^A-Za-zÀ-ú0-9 ]/', '', $term);

        $postSetup['page']['tags']=$c;
    }    

    echo "<script type='text/javascript'>\n";
    echo "/* <![CDATA[ */\n";
    echo "var food_config =".(json_encode($postSetup)).";\n";
    echo "var postID=JSON.parse(window.food_config.page.postID);\n";
    echo "var is_single=JSON.parse(window.food_config.page.is_single);\n";
    echo "var is_singular=JSON.parse(window.food_config.page.is_singular);\n";
    echo "var is_homepage=JSON.parse(window.food_config.page.is_homepage);\n";
    echo "var is_archive=JSON.parse(window.food_config.page.is_archive);\n";
    echo "var canRefresh=JSON.parse(window.food_config.canRefresh);\n";
    echo "var activeID=JSON.parse(window.food_config.activeID);\n";
    echo "/* ]]> */\n";
    echo "</script>\n";

   if(is_single()){


        $breadcrumb='<script type="application/ld+json">';
        $breadcrumb.='{';
        $breadcrumb.='"@context": "https://schema.org","@type": "BreadcrumbList",';    
        $breadcrumb.='"itemListElement": [';
        $position=1;
        $breadcrumb.='{
            "@type": "ListItem",
            "position": '.$position.',
            "name": "'.get_bloginfo('name').'",   
            "item": "'.get_home_url().'"
        }';
        $primary = get_post_primary_category(get_the_ID());

        $parents = get_ancestors( $primary['primary_category']->term_id, 'category' );

        array_unshift( $parents, $primary['primary_category']->term_id );
        $parents_reverse = array_reverse($parents);

        foreach($parents_reverse as $cat){
            $position++;

            $catname = get_cat_name($cat);       
            $breadcrumb.=",";
            $breadcrumb.='{
                "@type": "ListItem",
                "position": '.$position.',
                "name": "'.$catname.'", 
                "item": "'.get_category_link($cat).'"
            }';    

        }


        $breadcrumb.=']';
        $breadcrumb.='}';
        $breadcrumb.='</script>';

        echo $breadcrumb;

   }


}


function getPostConfig($postID){

    $postconfig = get_post_meta( $postID, 'th_post_config', true);
  //  $isfeatured = get_post_meta( $postID, 'th_post_home_featured', true);
  //  $showcarrusel = get_post_meta( $postID, 'th_post_show_carrusel', true);
  //  $channelfeatured = get_post_meta( $postID, 'th_post_channel_featured', true);
    $hide_ads = get_post_meta( $postID, 'th_post_hide_adunits', true);

    
    $config = array();
/*
$GLOBALS['post_config']=array(
    'is_featured' => 'false',
    'is_channel_featured' => 'false',
    'home_carrusel' => 'false',
    'infinitescroll_off' => 'false',
    'hide_nora' => 'false',
    'hide_adunits' => 'false',
    'exclude_adunits' => array(),
    'hide_adx' => 'false',
);
*/

    $config['id']= (string) $postID;

    foreach($GLOBALS['post_config'] as $k => $v){
        
        $config[$k]=$v;
        if(is_array($postconfig)){
            if(in_array($k,$postconfig)){
                if(!is_array($v))
                $config[$k]="true";
                else $config[$k]=$v;
            }
        }

    }

    if($hide_ads=="on"){
        $adunits=array();
        $adunits = get_post_meta( $postID, 'th_post_adunits', true);
        $config['hide_ads']="true";
        $config['exclude_adunits']=$adunits;

    }else{
       // unset($config['hide_adunits']);
       // unset($config['exclude_adunits']);
    }


        $post_tags = get_the_tags($postID);
        
        $tagsTmp=array();

        if ( $post_tags ) {
            foreach( $post_tags as $t ) {
            $tag_name = preg_replace('/[^A-Za-zÀ-ú0-9 ]/', '', $t->name);

            $tagsTmp[]=strtolower($tag_name);
            }
        }

        $config['tags']=$tagsTmp;

        $canales = get_the_category($postID);

        $canalTmp=array();
        
        foreach($canales as $c){
            $cat_name = preg_replace('/[^A-Za-zÀ-ú0-9 ]/', '', $c->cat_name);
        
            $canalTmp[]=$cat_name;
        }

        $config['canal']=$canalTmp;


    $GLOBALS['current_post_config']=$config;
    
    return $config;
}


/**
 * PROMOTED
 */

add_action( 'init', 'get_promoted' );

function get_promoted() {

    if(!is_admin()){
        $GLOBALS['promoted'] = array();
    }
}



/**
 * Posts Attributes
 */

 function getPostDataAttributes(){
     global $wp_db, $post;

    $slug = str_replace(get_home_url(),"",get_the_permalink());

    

    $canales = get_the_category();

    $canalTmp=array();
    //$canal="[";
    
    foreach($canales as $c){
    
        $cat_name = preg_replace('/[^A-Za-z0-9 ]/', '', $c->cat_name);
    
        $canalTmp[]=$cat_name;
    }
    //$canal.=implode(",",$canalTmp);
    //$canal.="]";

    $config = getPostConfig( get_the_ID());
    
    $post_config = htmlentities(json_encode($config));

    $canal = htmlentities(json_encode($canalTmp));

    //$lazy="";
    
    //$category = get_post_primary_category(get_the_ID());
    //$parent_cat = smart_category_top_parent_id($category['primary_category']->term_id,true);

    /**
     *  data-slug="<?php echo $slug;?>" data-next="<?php echo $next;?>" data-post-id="<?php the_ID(); ?>" data-canal="<?php echo $canal;?>" data-meta="<?php echo $post_config;?>"
     */

        $yoast_title = get_post_meta(get_the_ID(), '_yoast_wpseo_title', true);
        $title = strstr($yoast_title, '%%', true);
        if (empty($title)) {
            $title = get_the_title(get_the_ID());
        }
    
     $attributes=array(
        'data-slug' => $slug,
        'data-post-id' => get_the_ID(),
        'data-canal' => $canal,
        'data-meta' => $post_config,
        'data-seo-title' => htmlentities($title),
     );

     foreach($attributes as $k => $v){
         echo "{$k}='{$v}' ";
     }
 }