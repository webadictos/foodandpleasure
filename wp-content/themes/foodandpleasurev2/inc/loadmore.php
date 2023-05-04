<?php
/**
 * LOADMORE
 */

?>
<?php

/**
 * Loadmore
 */

function food_load_more_scripts() {
 
	global $wp_query; 


        if(is_home() || is_front_page()){

        
            // register our main script but do not enqueue it yet
            wp_register_script( 'food_loadmore', get_stylesheet_directory_uri() . '/inc/assets/js/loadmore/home.js', array('jquery'), '11032021-1522', true );
         
            // now the most interesting part
            // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
            // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
            wp_localize_script( 'food_loadmore', 'food_loadmore', array(
                'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
                'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
                'current_page' => 1,
                'max_page' => $wp_query->max_num_pages
            ) );
             wp_enqueue_script( 'food_loadmore' );
             
        }
        
        
       // $config = getPostConfig(get_the_ID());

        $hide_scroll ="false";//$config['infinitescroll_off'];


        if(!is_feed() && is_single() && !is_preview() && $hide_scroll!="true"){


       $maxposts = 6;  
 
       $category = get_post_primary_category(get_the_ID());
           // $parent_cat = smart_category_top_parent_id($category['primary_category']->term_id,true);

        //$cats=wp_get_post_categories(get_the_ID());
        $cats = array($category['primary_category']->term_id);
        
                $args = array(
                        'post_status' => 'publish',
                        'post_type' => 'post',
                        'category__in'   => $cats,
                        'posts_per_page' => $maxposts,
                        'post__not_in'   => array(get_the_ID()),
                        'fields' => 'ids',
                        'cache_results'  => false,
                        'update_post_meta_cache' => false,
                        'update_post_term_cache' => false,
                        'has_password' => false,
                );
                $nextPosts = new WP_Query($args);


                $posts = $nextPosts->get_posts();


            //  $excluded=array();

            //  $next_post = get_adjacent_post(true);

             //   $next = intval($nextPost->posts[0]);
                
                
                $slug = str_replace(get_home_url(),"",get_the_permalink());

                // register our main script but do not enqueue it yet
                wp_register_script( 'food_loadmore', get_stylesheet_directory_uri() . '/inc/assets/js/loadmore/single.js', array('jquery'), '18032021-1504', true );
  


            $promote=array();

            if(is_array($GLOBALS['promoted'])){
                $promoted = $GLOBALS['promoted'];
                if(in_array(get_the_ID(),$promoted)){
                    $key = array_search(get_the_ID(), $promoted); 
                    unset($promoted[$key]);
                }

                foreach($promoted as $p=>$v){
                    $promote[]=$v;
                } 
            }

            // now the most interesting part
                // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
                // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
                wp_localize_script( 'food_loadmore', 'food_loadmore', array(
                    //'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
                    //'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
                    'next' => $posts,
                    'previous'=>'',
                    'promote'=> $promote,
                    'initial'=>get_the_ID(),
                    'current' => get_the_ID(),
                    'current_slug' => $slug,
                    'counter' => 1,
                    'max_page' => 5,
                    'previous_ids' => array(get_the_ID()),
                    'cats'=>$cats,
                ) );
                wp_enqueue_script( 'food_loadmore' );
                
            }



}
 
add_action( 'wp_enqueue_scripts', 'food_load_more_scripts' );


function food_loadmorehome_ajax_handler(){
 
  
    $page=isset($_POST['page']) ? $_POST['page'] : 1;
    $not = isset($_POST['not']) ? $_POST['not'] : array();

                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'post__not_in' => $not,
                    'posts_per_page' => 6,
                    'paged'=> $page+1,
                );
                $query = new WP_Query( $args );

                if($query->have_posts()):

            $i=1;
            while ( $query->have_posts() ) :
                $query->the_post();


                ?>
                 <div class="col-12 col-md-6 d-flex mb-4">
                     
                     <?php
                //Lo Último
              get_template_part( 'template-parts/article','item');
            ?>
                      </div>
                <?php

            $i++;
            endwhile;
            wp_reset_postdata();
            ?>

         

                <?php endif; ?>
    <?php
	die; // here we exit the script and even no wp_reset_query() required!
}


add_action('wp_ajax_loadmorehome', 'food_loadmorehome_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmorehome', 'food_loadmorehome_ajax_handler'); // wp_ajax_nopriv_{action}



function food_loadmorepost_ajax_handler(){
    global $wpdb,$post;
 
    $postID = intval($_REQUEST['postid']);
 
    $post = get_post($postID);
 
    
     setup_postdata($post);
 
     if(is_a( $post, 'WP_Post' )):
 
         if(class_exists( 'Jetpack_Lazy_Images' )){
             $instance = Jetpack_Lazy_Images::instance();
             $instance->setup_filters();		
         }
      //add_filter('the_content', 'instyle_gallery');
    
      ob_start();
      get_template_part( 'template-parts/content');

     // get_template_part( 'template-parts/single/related', 'posts' );

      $article = ob_get_clean();
 
      echo $article;
 
     endif;
     die; // here we exit the script and even no wp_reset_query() required!
 }
 
 add_action('wp_ajax_loadmorepost', 'food_loadmorepost_ajax_handler'); // wp_ajax_{action}
 add_action('wp_ajax_nopriv_loadmorepost', 'food_loadmorepost_ajax_handler'); // wp_ajax_nopriv_{action}
