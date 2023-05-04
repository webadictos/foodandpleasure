<?php
/**
 * Funciones de optimización
 */



add_filter( 'the_content', 'add_lazyframe_class',99 );

function add_lazyframe_class( $content ){

    if(!is_feed() && is_single() && !is_preview() || wp_doing_ajax()){
  
      // Convert character encoding to 'HTML-ENTITIES' - characters become HTML entities
      // ---------------------------------------------------------------------
      $content = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
  
      // Set up the_content as a DOM
      // ---------------------------------------------------------------------
      $document = new DOMDocument();
      libxml_use_internal_errors( true );
      $document->loadHTML( utf8_decode( $content ), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
  
      // Get an array of images in the content - iterate & add the class
      // ---------------------------------------------------------------------
      $iframes = $document->getElementsByTagName( 'iframe' );
  
      foreach ( $iframes as $iframe ) {
        $lazyclass="lazy-wa";
        $iframeSrc="";
        if($iframe->hasAttribute('class')){
            $class=$iframe->getAttribute('class');
            $lazyclass=$class." ".$lazyclass;
        }
  
         $iframe->setAttribute('class',$lazyclass);
  
        if($iframe->hasAttribute('src')){
            $iframeSrc=$iframe->getAttribute('src');
            $iframe->removeAttribute('src');
            $iframe->setAttribute('data-src',$iframeSrc);
        }

      }
  
      $html = $document->saveHTML();
  
      return $html;
  
    }else{
        return $content;
    }
  }




/**
 * Remove Instagram embed.js script on each embed
 */
add_filter('embed_oembed_html', function($html, $url, $attr, $post_id) {
    $regex =    '/<script.*instagram\.com\/embed.js.*\s?script>/U';
    $regex_2 =  '/<script.*platform\.instagram\.com\/.*\/embeds\.js.*script>/U';
  
    if(preg_match($regex, $html) || preg_match($regex_2, $html)) {
      add_filter('kh_has_instagram_embed', '__return_true');
  
      $html = preg_replace($regex, '', $html);
      $html = preg_replace($regex_2, '', $html);
  
      return $html;
    }
  
    return $html;
  }, 100, 4);




function omit_instagram_script($provider, $url, $args) {
    $host = parse_url($provider, PHP_URL_HOST);
    if (strpos($host, 'instagram.com') !== false || $provider=="https://graph.facebook.com/v5.0/instagram_oembed/") {
        $provider = add_query_arg('omitscript', 'true', $provider);
    }
    return $provider;
}
add_filter('oembed_fetch_url', 'omit_instagram_script', 10, 3);

function omit_twitter_script($provider, $url, $args) {
    $host = parse_url($provider, PHP_URL_HOST);
    if (strpos($host, 'twitter.com') !== false) {
        $provider = add_query_arg('omit_script', 'true', $provider);
    }
    return $provider;
}
add_filter('oembed_fetch_url', 'omit_twitter_script', 10, 3);

function omit_facebook_script($provider, $url, $args) {
    $host = parse_url($provider, PHP_URL_HOST);
    if (strpos($host, 'facebook.com') !== false) {
        $provider = add_query_arg('omitscript', 'true', $provider);
    }
    return $provider;
}
add_filter('oembed_fetch_url', 'omit_facebook_script', 10, 3);



function preloadFeaturedImage(){
	global $post;
	if(is_single()){

        if (has_post_thumbnail()):
        $thumb = get_the_post_thumbnail(get_the_ID(),'large',array());

        $featuredImg = wp_kses_hair($thumb, array('https','http'));
        //href="<?php echo $featuredImg['src']['value']; 
		?>
        <link rel='preload' as='image' imagesrcset="<?php echo $featuredImg['srcset']['value'];?>" imagesizes="<?php echo $featuredImg['sizes']['value'];?>">
        <?php
        endif;
	}
}

add_action('wp_head','preloadFeaturedImage',-1000);


add_filter('autoptimize_filter_css_defer_inline','my_ao_css_defer_inline',10,1);
function my_ao_css_defer_inline($inlined) {


	if (is_single()) { 

        $filename = get_stylesheet_directory()."/inc/assets/css/critical-single.css";

        if(file_exists($filename)){
        $single_css = file_get_contents($filename);    
        return $single_css."";
        }else{
            return $inlined;
        }
	}else if (is_category()) { 

        $filename = get_stylesheet_directory()."/inc/assets/css/critical-category.css";

        if(file_exists($filename)){
        $single_css = file_get_contents($filename);    
        return $single_css."";
        }else{
            return $inlined;
        }
	}else if (is_author()) { 

        $filename = get_stylesheet_directory()."/inc/assets/css/critical-author.css";

        if(file_exists($filename)){
        $single_css = file_get_contents($filename);    
        return $single_css."";
        }else{
            return $inlined;
        }
	}else if (is_page('our-favorites')) { 

        $filename = get_stylesheet_directory()."/inc/assets/css/critical-favorites.css";

        if(file_exists($filename)){
        $single_css = file_get_contents($filename);    
        return $single_css."";
        }else{
            return $inlined;
        }
	}else if (is_archive()  || is_search()) { 

        $filename = get_stylesheet_directory()."/inc/assets/css/critical-archive.css";

        if(file_exists($filename)){
        $single_css = file_get_contents($filename);    
        return $single_css."";
        }else{
            return $inlined;
        }
	}else{
		return $inlined; // use default a-t-f CSS for all other types 
	}


}