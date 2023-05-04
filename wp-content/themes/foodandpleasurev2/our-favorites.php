<?php
/**
 * Template Name: Our Favorites
 */

get_header(); 

$favorites = Foodandpleasure_Public::get_opciones('foodandpleasure_settings','foodandp_our_favorites');
$ourfavorites_desc = Foodandpleasure_Public::get_opciones('foodandpleasure_settings','foodandp_our_favorites_desc');

?>

	<section id="primary" class="content-area">
		<div id="main" class="site-main container px-md-0 my-4 our-favorites-container" role="main">

        <header class="page-header our-favorites my-5 mx-auto text-center">
            <h1 class="section-title">Our Favorites</h1>
            <?php if($ourfavorites_desc!=""):?>
                <p><?php echo $ourfavorites_desc;?></p>
            <?php endif;?>
		</header><!-- .page-header -->

        <?php

//if ( false === ( $tag_ids[] = get_transient( "thRelatedPosts_tags_".$post->ID ) ) ) {
  

  $i=1;
  foreach($favorites as $post):
    $order="";
      //if($i==3) break;
      setup_postdata($post);
     
      if($i % 2 == 0){
        $order="order-md-last";
    }
    //$GLOBALS['carrusel_home'][]=get_the_ID();
    $seodesc = get_the_excerpt();
    if (has_post_thumbnail()):
        //$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
        $thumb = get_the_post_thumbnail(get_the_ID(),'full',array( 'title' => wp_strip_all_tags(get_the_title()), 'alt'=> wp_strip_all_tags(get_the_title()),'class'=>'d-block w-100'));
        else:
        //$thumb[0]=$GLOBALS['default_image'];
        $thumb ='<img  class="d-block w-100" width="100%" height="60vh" src="'.$GLOBALS['default_image'].'" alt="'.get_the_title().'" title="'.wp_strip_all_tags(get_the_title()).'">';
        endif;  
    
    
        $category = get_post_primary_category(get_the_ID());
        $parent_cat = smart_category_top_parent_id($category['primary_category']->term_id,true);
        $catname = get_cat_name($parent_cat->term_id);    
    
    
        add_filter('term_links-post_tag','limit_to_tags');
     
               //  $category = get_post_primary_category(get_the_ID());
               //  $parent_cat = smart_category_top_parent_id($category['primary_category']->term_id,true);
               //  $catname = strtolower(get_cat_name($parent_cat));
                 //$tags = getWokiiTags(get_the_ID(),2);
     ?>
     
     <article class="article-carousel d-flex flex-column flex-md-row mb-4">
        <div class="thumbnail-carousel <?php echo $order;?>">
        <a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo $thumb;?></a>
        </div>
        <header class="d-flex flex-column pt-5 px-5 pb-2 p-md-5 text-center article-carousel-header">

             <a class="mt-auto article-cat align-self-center" href="<?php  echo get_category_link( $parent_cat->term_id );?>"><?php echo $catname;?></a>

            <div class="carousel-meta my-auto px-md-5 pb-4 pb-md-0">
                <div class="article-tag d-none d-md-block"><?php the_tags( '', ', ', '' ); ?></div>
                 <h2 class="article-title"><a href="<?php the_permalink() ?>" title="<?php echo get_the_title() ?>"><?php echo get_the_title();?></a></h2>
                <div class="article-author">Por: <?php the_author_posts_link(); ?></div>
            </div>

            <a class="mb-auto mx-auto d-none d-md-block arrow-link" href="<?php the_permalink() ?>" title="Ver <?php echo get_the_title() ?>"></a>
        </header>
    </article>
             
     
           <?php 
           $i++;
      endforeach;
?>
  <?php     remove_filter('term_links-post_tag','limit_to_tags'); ?>

		</div><!-- #main -->

	</section><!-- #primary -->

<?php
get_footer();
